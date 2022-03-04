<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\UserRequest;
class UserController extends Controller
{
    public function index (){
        return view('backend.users.list',
        [
            'list' => User::all()
        ]);
    }
    public function roles (User $user){

        return view('backend.users.role',
        [
            'user' => $user,
            'roles' => Role::all(),
        ]);
    }
    public function login (){
        return view('backend.login');
    }
    public function postLogin(Request $request){
        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($login)) {
            return redirect('/backend');
        } else {
            return redirect()->back();
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function postAssign(Request $request, User $user){
        $user->roles()->sync($request->role);
        return redirect()->back();
    }

    public function getAdd(){
        return view('backend.users.form');
    }
    public function postAdd(UserRequest $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->back();
    }
}
