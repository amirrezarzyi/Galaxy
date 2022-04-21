<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Admin\User\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Blade;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index(){
        $count_users = User::all()->count();
        return view('admin.page.user.index',compact('count_users'));
    }
    /*
    AJAX request
    */
    public function getUsers(Request $request){
   ## Read value
   $draw = $request->get('draw');
   $start = $request->get("start");
   $rowperpage = $request->get("length"); // Rows display per page

   $columnIndex_arr = $request->get('order');
   $columnName_arr = $request->get('columns');
   $order_arr = $request->get('order');
   $search_arr = $request->get('search');

   $columnIndex = $columnIndex_arr[0]['column']; // Column index
   $columnName = $columnName_arr[$columnIndex]['data']; // Column name
   $columnSortOrder = $order_arr[0]['dir']; // asc or desc
   $searchValue = $search_arr['value']; // Search value

   // Total records
   $totalRecords = User::select('count(*) as allcount')->count();
   $totalRecordswithFilter = User::select('count(*) as allcount')
       ->where('name', 'like', '%' . $searchValue . '%')
       ->orWhere('email', 'like', '%' . $searchValue . '%')
       ->count();

   // Fetch records
   $users = User::orderBy($columnName, $columnSortOrder)

       ->where('users.name', 'like', '%' . $searchValue . '%')
       ->orWhere('users.email', 'like', '%' . $searchValue . '%')
       ->select('users.*')
       ->skip($start)
       ->take($rowperpage)
       ->get();

   $data_arr = array();

   $roles = Role::all(); //ROLES
   foreach ($users as $key => $user) {
       $id = $key += 1;
       $name = $user->name;
       $email = $user->email;
       $role = Blade::render("admin.datatables.users.roles", compact('user','roles')); //lable roles
       $created_at = jdate($user->created_at)->format('Y/m/d - H:i');
       $dropdown = Blade::render("admin.datatables.users.actions", compact('user','roles')); //edit rolemodal and delete buton

       $data_arr[] = array(
           "id" => $id,
           "name" => $name,
           "email" => $email,
           "role" => $role,
           "created_at" => $created_at,
           "dropdown" => $dropdown,
       );
   }

   $response = array(
       "draw" => intval($draw),
       "iTotalRecords" => $totalRecords,
       "iTotalDisplayRecords" => $totalRecordswithFilter,
       "aaData" => $data_arr
   );

   echo json_encode($response);
   exit;
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

        return redirect()->route('admin.user.index')->with('toast-success','کاربر جدید ایجاد شد');;
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
