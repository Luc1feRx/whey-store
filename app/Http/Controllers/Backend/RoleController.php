<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    const PAGE = 20;
    public function index(){
        $roles = Role::whereNotIn('name', ['admin'])->paginate(self::PAGE);
        return view('backend.role.index', [
            'roles' => $roles
        ]);
    }

    public function create(){
        $permissions = Permission::all();
        return view('backend.role.create', [
            'permissions' => $permissions
        ]);
    }

    public function store(Request $request){
        try {
            DB::beginTransaction();
            $role = new Role();
            $role->name = $request->name;
            $role->save();
            DB::commit();
            return redirect()->route('admin.roles.index')->with(['success' => 'Thêm vai trò thành công']);
        } catch (Exception $e) {
            Log::error('[RoleController][store] error ' . $e->getMessage());
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Thêm vai trò thất bại']);
        }
    }


    public function edit(){
        
    }

    public function update(){
        
    }
}
