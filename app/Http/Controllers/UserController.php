<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $userModel)
    {
        $title = 'Admin | Category';
        $users = User::all();
        $roles = Role::all();
        return view('admin.user.index',compact('users','userModel','title','roles'));
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
    public function store(Requests\UserRequest $request, User $user)
    {   
        $data = $request->all();
        $user->name = $data['name'];
        $user->role_id = $data['role_id'];
        $user->password = Hash::make($data['password']);
        $user->email = $data['email'];
        $user->save();
        return redirect(route('user.index'))->with('save_msg','User Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function updateRole($id, $role_id){
        $user = User::findOrFail($id);
        $user->role_id = $role_id;
        $user->save();
        return back()->with('save_msg','Role Updated');
    }
}
