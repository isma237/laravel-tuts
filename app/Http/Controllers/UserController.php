<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', ['users'=>  $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exist = User::where('email', $request->email)->first();
        if($exist == null){
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $password = \Illuminate\Support\Str::random(10);
            $message = "Email " . $user->email ." -Password: " .$password;
            Log::info($message);
            $user->password = Hash::make($password);
            $user->save();

            return view('user.index');
        }
        dd("Email déjà présent en base de données");


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $user = User::find($id);
       $roles = Role::all();

       return view('user.update', [
           'user'   => $user,
           'roles'  => $roles
       ]);

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
        $roles = $request->roles;

        $exists = UserRole::where('user_id', $id)->get();

        foreach ($exists as $role){
            $role->delete();
        }

        foreach ($roles as $roleId){
            $userRole = new UserRole();
            $userRole->user_id = $id;
            $userRole->role_id = $roleId;
            $userRole->save();
        }

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
}
