<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use function GuzzleHttp\Promise\all;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.page.role.index',compact('roles','permissions'));
    }

    public function store(Request $request){
        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permissions);
        return to_route('admin.role.index');
    }

    public function update(Role $role,Request $request){
        $role->update(['name' => $request->name]);
        return to_route('admin.role.index');
    }

    public function updatePermission(Role $role,Request $request){
        $role->syncPermissions($request->permission);
        return to_route('admin.role.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        $role->permissions()->detach();
        return to_route('admin.role.index');
    }
}
