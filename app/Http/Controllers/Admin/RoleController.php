<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //
    public function index(){
        $roles = Role::whereNotIn('name', ['admin'])->get();
        return view('admin.roles.index', compact('roles'));
    }
    public function create(){
        return view('admin.roles.create');
    }
    public function store(Request $request){
        $validated = $request->validate(['name'=> ['required', 'min:3'] ]);
        Role::create($validated);

        return to_route('admin.roles.index');
    }

    public function edit(Role $role){
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }
    public function update(Request $request, Role $role){
         $validated = $request->validate(['name'=>'required']);
         $role->update($validated);
         return to_route('admin.roles.index')->with('message', 'Role Updated Successfully!');
    }
    public function destroy(Role $role){
        $role->delete();
         return back()->with('message', 'Delete has been Successfully');
    }

    //Add Permission
    public function givePermission(Role $role, Request $request){
        if($role->hasPermissionTo($request->permission)){
            return back()->with('message', 'Permission Exists');

        }
        $role->givePermissionTo($request->permission);
          return back()->with('message', 'Permission Added');
    }

    //Remove Permission
    public function revokePermission(Role $role, Permission $permission)
    {
        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            return back()->with('message', 'Permission Revoked');
        }
         return back()->with('message', 'Permission not exists');
    }
}
