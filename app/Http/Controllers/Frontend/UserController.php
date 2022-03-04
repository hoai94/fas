<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    
    public function getLogin (){
        return view('frontend.users.login');
    }
    public function postLogin(Request $request){
        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($login)) {
            return redirect()->route('home.page');
        } else {
            return redirect()->back();
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('dang-nhap.html');
    }


    public function getRegister(){
        return view('frontend.users.register');
    }
    public function postRegister(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'flag' => 1,
        ]);
        return redirect()->route('home.page');
    }

    public function ajaxLogin(Request $request){
        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($login)) {
            return response()->json([
                'messages' => 'Đăng nhập thành công'
            ]);;
        } else {
            return response()->json([
                'errors' => 'Mật khẩu hoặc email không đúng.Vui lòng thử lại!'
            ]);
        }
    }
}
