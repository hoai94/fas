<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    protected function guard()
    {
        return Auth::guard('customer');
    }
    public function index(){
        $cus = Auth::guard('customer')->user();
        dd($cus);
    }

    
    
}
