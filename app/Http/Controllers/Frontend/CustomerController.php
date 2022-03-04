<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function getLogin (){
        return view('frontend.users.login');
    }
    public function postLogin(Request $request){
        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::guard('customer')->attempt($login)) {
            return redirect()->route('home.page');
        } else {
            return redirect()->back();
        }
    }
    public function getLogout()
    {
        
        Auth::guard('customer')->logout();
        return redirect('dang-nhap.html');
    }


    public function getRegister(){
        return view('frontend.users.register');
    }
    public function postRegister(Request $request){
        $user = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'address' => $request->address,
        ]);
        return redirect()->route('home.page');
    }

    public function ajaxLogin(Request $request){
        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::guard('customer')->attempt($login)) {
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
