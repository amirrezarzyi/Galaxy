<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Admin\User\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index(){
        $roles = Role::all();
        $users = User::orderby('id','DESC')->paginate(5);;
        return view('admin.page.user.index',compact('users','roles'));
    }

    public function create(){
        $roles = Role::all();
        return view('admin.page.user.create',compact('roles'));
    }

    public function store(UserRequest $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password,),
        ]);

        $user->syncRoles($request->roles);

        return redirect()->route('admin.user.index');
    }

    public function destroy(User $user){
        $user->delete();
        $user->roles()->detach();
        $user->permissions()->detach();
        return back();
    }

    public function setRole(User $user,Request $request) {
        $user->syncRoles($request->roles);
        return back();
    }



}
