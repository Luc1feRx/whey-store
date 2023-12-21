<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Common;
use App\Helpers\UploadImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class AccountController extends Controller
{
    public function index(Request $request){
        $superadminRoleId = Admin::withoutAdminRole();
        if($request->keyword){
            $searchKeyword = Common::escapeLike($request->keyword);
            $superadminRoleId->where(function ($q) use ($searchKeyword) {
                $q->where('name', 'LIKE', "%" . $searchKeyword . "%")
                    ->orWhere('email', 'LIKE', "%" . $searchKeyword . "%");
            });
        }
        $superadminRoleId = $superadminRoleId->paginate(10);
        return view('backend.account.index', [
            'admins' => $superadminRoleId
        ]);
    }

    public function create(){
        $roles = Role::whereNotIn('name', ['admin'])->get();
        return view('backend.account.create',[
            'roles' => $roles
        ]);
    }

    public function store(AccountRequest $request){
        try {
            DB::beginTransaction();
            $admin = new Admin;
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->phone = $request->phone;
            $admin->address = $request->address;
            $avatar_upload = UploadImage::handleUploadFile('avatar', 'img/admin/', $request);
            $admin->avatar = $avatar_upload;
            $admin->password = Hash::make($request->password);
            $admin->save();
            $roleID = $request->input('role_id');
            $role = Role::find($roleID);
            if ($role) {
                $admin->assignRole($role->name);
            }
            DB::commit();
            return redirect()->route('admin.accounts.index')->with(['success' => 'Thêm tài khoản thành công']);
        } catch (Exception $e) {
            Log::error('[AccountController][store] error ' . $e->getMessage());
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Thêm tài khoản thất bại']);
        }
    }

    public function edit($id){
        $roles = Role::whereNotIn('name', ['admin'])->get();
        $admin = Admin::findOrFail($id);
        return view('backend.account.edit',[
            'roles' => $roles,
            'admin' => $admin
        ]);
    }

    public function update(AccountRequest $request, $id){
        try {
            DB::beginTransaction();
            $admin = Admin::findOrFail($id);
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->phone = $request->phone;
            $admin->address = $request->address;
            $avatar_upload = '';
            if($request->hasFile('avatar')){
                $deletedExist = UploadImage::handleDeleteFileExist($admin->avatar);
                $avatar_upload = UploadImage::handleUploadFile('avatar', 'img/admin/', $request);
            }
            $admin->avatar = $avatar_upload;
            $admin->password = Hash::make($request->password);
            $admin->save();
            $roleID = $request->input('role_id');
            $role = Role::find($roleID);
            if ($role) {
                $admin->syncRoles($role->name);
            }
            DB::commit();
            return redirect()->route('admin.accounts.index')->with(['success' => 'Sửa tài khoản thành công']);
        } catch (Exception $e) {
            Log::error('[AccountController][store] error ' . $e->getMessage());
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Sửa tài khoản thành công']);
        }
    }
}
