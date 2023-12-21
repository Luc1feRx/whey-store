<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Common;
use App\Helpers\UploadImage;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::query();
        if($request->keyword){
            $searchKeyword = Common::escapeLike($request->keyword);
            $users->where(function ($q) use ($searchKeyword) {
                $q->where('name', 'LIKE', "%" . $searchKeyword . "%")
                    ->orWhere('email', 'LIKE', "%" . $searchKeyword . "%");
            });
        }
        $users = $users->paginate(10);
        return view('backend.customer.index', [
            'users' => $users
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $avatar_upload = UploadImage::handleUploadFile('avatar', 'img/user/', $request);
            $user->avatar = $avatar_upload;
            $user->password = Hash::make($request->password);
            $user->save();
            DB::commit();
            return redirect()->route('admin.customers.index')->with(['success' => 'Thêm tài khoản thành công']);
        } catch (Exception $e) {
            Log::error('[CustomerController][store] error ' . $e->getMessage());
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Thêm tài khoản thất bại']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
