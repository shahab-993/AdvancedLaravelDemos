<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Roles;
use App\Models\RoleWisePermission;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $roles = Roles::all();
       return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required|string|max:255']);
        Roles::create($request->all());
        return redirect()->route('admin.roles.index')->with('success', 'Role created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Roles $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Roles $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Roles $role)
    {
        $request->validate(['name'=>'required|string|max:255']);
        $role->update($request->all());
        return redirect()->route('admin.roles.index')->with('success','Role Updataed successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Roles $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('success','Role deleted successfully.');
    }

    public function role_permission_show($roleId){
        $permissions =Permission::all();
        $rolePermissions=RoleWisePermission::where('role_id',$roleId)->pluck('permission_id')->toArray();
        $role =Roles::find($roleId);
        return view('admin.roles.assign_permissions',compact('permissions','rolePermissions','roleId','role'));


    }

    public function role_permission_update(Request $request, $roleId){
        RoleWisePermission::where('role_id',$roleId)->delete();
        if($request->has('permissions')){
            foreach($request->permissions as $permissionId){

                RoleWisePermission::create([
                    'role_id'=>$roleId,
                    'permission_id'=>$permissionId,
                ]);
            }
            }
            return redirect()->route('admin.roles.index')->with('success','Permissions were assigned to role successfully!');

    }
}
