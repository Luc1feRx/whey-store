<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\UploadImage;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.dashboard.dashboard');
    }

    public function profile()
    {
        return view('backend.profile.profile');
    }

    public function update(Request $request){
        try {
            DB::beginTransaction();
            $admin = Admin::findOrFail(Auth::guard('admin')->user()->id);
            $admin->name = $request->name;
            $admin->address = $request->address;
            if($request->has('password')){
                $admin->password = Hash::make($request->input('password'));
            }
            if($request->hasFile('avatar')){
                $avatar_upload = UploadImage::handleUploadFile('avatar', 'img/admin/', $request);
                $admin->avatar = $avatar_upload;
            }
            $admin->phone = $request->phone;
            $admin->save();
            DB::commit();
            return back()->with(['success' => 'Sửa thông tin cá nhân thành công']);
        } catch (Exception $e) {
            Log::error('[DashboardController][update] error ' . $e->getMessage(). '' . $e->getLine());
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Sửa thông tin cá nhân thất bại']);
        }
    }
}
