<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\RoleFormRequest;

class RoleController extends Controller
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
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::get();
        return view('roles.create',compact('permissions'));
    }

    public function store(RoleFormRequest $request)
    {
        $data = $request->validated();
        try {

            $role = Role::create(['name' => $data['name']]);
            $role->syncPermissions($request['permission']);
            return redirect('roles')->with('message','Role created successfully');

        } catch(\Exception $ex){

            return redirect('roles')->with('message','Something Went Wrong - '.$ex->getMessage());
        }
    }

    public function show(Role $role)
    {
        $role = Role::find($role->id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
                                ->where("role_has_permissions.role_id",$role->id)
                                ->get();
        return view('roles.show', compact('role','rolePermissions'));
    }

    public function edit(Role $role)
    {
        $role = Role::find($role->id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$role->id)
                                ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                                ->all();

        return view('roles.edit',compact('role','permission','rolePermissions'));
    }

    public function update(RoleFormRequest $request, $id)
    {
        $data = $request->validated();
        try {

            $role = Role::find($id);
            $role->name = $data['name'];
            $role->save();
            $role->syncPermissions($data['permission']);
            return redirect()->route('roles.index')->with('success','Role updated successfully');

        } catch(\Exception $ex){

            return redirect('roles')->with('message','Something Went Wrong - '.$ex->getMessage());
        }
    }

    public function destroy(Role $role)
    {
        try {

            $role->delete();
            return redirect()->route('roles.index')->with('success','Role deleted successfully');
        } catch(\Exception $ex){

            return redirect('roles')->with('message','Something Went Wrong - '.$ex->getMessage());
        }
    }
}