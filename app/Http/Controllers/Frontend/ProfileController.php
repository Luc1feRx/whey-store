<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\UploadImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function getProfile(){
        return view('frontend.profile.profile');
    }

    public function updateProfile(Request $request){
        try {
            DB::beginTransaction();
            // Lấy user hiện tại
            $user = Auth::user();
            
            // Cập nhật thông tin profile
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->name = $request->last_name . ' ' . $request->first_name;
            $avatar_upload = '';
            if($request->hasFile('avatar')){
                $deletedExist = UploadImage::handleDeleteFileExist($user->avatar);
                $avatar_upload = UploadImage::handleUploadFile('avatar', 'img/user/', $request);
            }
            $user->avatar = $avatar_upload;
    
            // Kiểm tra xem có thay đổi mật khẩu không
            if (!empty($request->password)) {
                $user->password = Hash::make($request->password);
            }
    
            // Lưu các thay đổi
            $user->save();
    
            DB::commit();
            
            return redirect()->back()->with(['success' => 'Cập nhật thông tin thành công']);
        } catch (Exception $e) {
            Log::error('[ProfileController][updateProfile] error ' . $e->getMessage());
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Cập nhật thông tin thất bại']);
        }
    }
}
