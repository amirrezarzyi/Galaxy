<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        $permissions = Permission::paginate(8);
        return view('admin.page.permission.index',compact('permissions'));
    }

    public function store(Request $request){
        Permission::create(['name' => $request->name]);
        return to_route('admin.permission.index')->with('toast-success','دسترسی جدید ایجاد شد');
    }

    public function destroy(Permission $permission){
        $permission->delete();
        return to_route('admin.permission.index')->with('toast-confirm',' دسترسی ' . $permission->name . ' حذف شد ');
    }
}
