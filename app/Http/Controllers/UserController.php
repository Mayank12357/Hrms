<?php

namespace App\Http\Controllers;

use DB;
use Hash;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:role.read|role.create|role.edit|role.delete', ['only' => ['index','store']]);
        $this->middleware('permission:role.create', ['only' => ['create','store']]);
        $this->middleware('permission:role.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role.delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        dd('1222');

       // $users = User::orderBy('id','DESC')->paginate(10);


        return view('users.index',compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }

    public function store(UserFormRequest $request)
    {
        $data = $request->validated();
        try {

            $user = User::create($data);
            $user->assignRole($request->input('roles'));

            return redirect('users')->with('message','User created successfully');

        } catch(\Exception $ex){

            return redirect('users')->with('message','Something Went Wrong  - '.$ex->getMessage());
        }
    }

    public function show(User $user)
    {


        return view('users.show',compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('users.edit',compact('user','roles','userRole'));
    }

    public function update(UserFormRequest $request, $id)
    {
        $data = $request->validated();
        try {

            if(!empty($data['password'])){
                $data['password'] = Hash::make($data['password']);
            }else{
                $data = Arr::except($data,array('password'));
            }

            $user = User::find($id);
            $user->update($data);

            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $user->assignRole($request->input('roles'));

            return redirect('users')->with('message','User updated successfully');

        } catch(\Exception $ex){

            return redirect('users')->with('message','Something Went Wrong - '.$ex->getMessage());
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect('users')->with('message','User Deleted Succeessfully');
        } catch(\Exception $ex){

            return redirect('users')->with('message','Something Went Wrong - '.$ex->getMessage());
        }
    }
}