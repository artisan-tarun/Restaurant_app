<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Role $roleModel, Request $request)
    {
        $status = $request->get('status');
        if($status == 'trash'){
            $roles = Role::onlyTrashed()->get();
            $onlyTrashed = TRUE;
        }else{
            $roles = Role::with('users')->get();
            $onlyTrashed = FALSE;
        }
        return view('admin.role.index',compact('roles','roleModel','onlyTrashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\RoleRequest $request, Role $role)
    {
        $data = $request->all();
        $role->create($data);
        return redirect(route('role.index'))->with('save_msg','New Role Created!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect(route('role.index'))->with('trash_msg','Item moved to Trash');
    }
    public function restore($id){
        $role = Role::withTrashed()->findOrFail($id);
        $role->restore();
        return redirect(route('role.index'))->with('save_msg','Role Restored');
    }
}
