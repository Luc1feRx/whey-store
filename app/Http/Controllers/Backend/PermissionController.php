<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Common;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    const PAGE = 20;
    public function index(Request $request){
        $permissions = Permission::query();
        if($request->keyword){
            $searchKeyword = Common::escapeLike($request->keyword);
            $permissions->where(function ($q) use ($searchKeyword) {
                $q->where('permissions.name', 'LIKE', "%" . $searchKeyword . "%");
            });
        }
        $permissions = $permissions->paginate(self::PAGE);
        return view('backend.permission.index', [
            'permissions' => $permissions
        ]);
    }

    public function create(){
        return view('backend.permission.create');
    }

    public function store(Request $request){
        try {
            DB::beginTransaction();
            $request->validate([
                'name' => 'required|unique:permissions,name',
            ]);
            $permission = new Permission();
            $permission->name = $request->name;
            $permission->save();
            DB::commit();
            return redirect()->route('admin.permissions.index')->with(['success' => 'Thêm quyền thành công']);
        } catch (Exception $e) {
            Log::error('[PermissionController][store] error ' . $e->getMessage());
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Thêm quyền thất bại']);
        }
    }


    public function edit($id){
        $permission = Permission::findOrFail($id);
        return view('backend.permission.edit', [
            'permission' => $permission,
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|unique:permissions,name',
            ]);
            // Xử lý việc cập nhật tên của vai trò (nếu cần)
            $permission = Permission::findOrFail($id);
            $permission->name = $request->name;
            $permission->save();

            return redirect()->route('admin.permissions.index')->with(['success' => 'Sửa quyền thành công']);
        } catch (Exception $e) {
            Log::error('[PermissionController][update] error ' . $e->getMessage());
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Sửa quyền thất bại']);
        }
    }
}
