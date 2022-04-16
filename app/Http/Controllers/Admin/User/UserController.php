<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Admin\User\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(){
        $users = User::orderby('id','DESC')->paginate(2);;
        return view('admin.page.user.index',compact('users'));
    }

    public function create(){
        return view('admin.page.user.create');
    }

    public function store(UserRequest $request){

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password,),
        ]);

        return redirect()->route('admin.user.index');
    }

}
