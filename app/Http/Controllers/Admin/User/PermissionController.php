<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        $permissions = Permission::paginate(4);
        return view('admin.page.permission.index',compact('permissions'));
    }

    public function store(Request $request){
        Permission::create(['name' => $request->name]);
        return to_route('admin.permission.index');
    }
}
