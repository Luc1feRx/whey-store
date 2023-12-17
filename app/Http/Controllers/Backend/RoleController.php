<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Common;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    const PAGE = 20;
    public function index(Request $request){
        $roles = Role::whereNotIn('name', ['admin']);
        if($request->keyword){
            $searchKeyword = Common::escapeLike($request->keyword);
            $roles->where(function ($q) use ($searchKeyword) {
                $q->where('roles.name', 'LIKE', "%" . $searchKeyword . "%");
            });
        }
        $roles = $roles->paginate(self::PAGE);
        return view('backend.role.index', [
            'roles' => $roles
        ]);
    }

    public function create(){
        $permissions = Permission::whereNotIn('name', ['manage decentralized'])->get();
        return view('backend.role.create', [
            'permissions' => $permissions
        ]);
    }

    public function store(Request $request){
        try {
            DB::beginTransaction();
            $request->validate([
                'name' => 'required|unique:roles,name',
                'permission' => 'required|array',
            ]);
            $role = new Role();
            $role->name = $request->name;
            $permissions = Permission::whereIn('id', $request->input('permission'))->pluck('id')->toArray();
            $role->syncPermissions($permissions);
            $role->save();
            DB::commit();
            return redirect()->route('admin.roles.index')->with(['success' => 'Thêm vai trò thành công']);
        } catch (Exception $e) {
            Log::error('[RoleController][store] error ' . $e->getMessage());
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Thêm vai trò thất bại']);
        }
    }


    public function edit($id){
        $role = Role::findOrFail($id);
        $permissions = Permission::whereNotIn('name', ['manage decentralized'])->get();
        $assignPermissions = $role->permissions->pluck('id')->toArray();
        return view('backend.role.edit', [
            'permissions' => $permissions,
            'role' => $role,
            'assignPermissions' => $assignPermissions
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            // Xử lý việc cập nhật tên của vai trò (nếu cần)
            $role = Role::findOrFail($id);
            $role->name = $request->name;
            $permissions = Permission::whereIn('id', $request->input('permission'))->pluck('id')->toArray();
            $role->syncPermissions($permissions);
            $role->save();

            return redirect()->route('admin.roles.index')->with(['success' => 'Sửa vai trò thành công']);
        } catch (Exception $e) {
            Log::error('[RoleController][update] error ' . $e->getMessage());
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Sửa vai trò thất bại']);
        }
    }
}
