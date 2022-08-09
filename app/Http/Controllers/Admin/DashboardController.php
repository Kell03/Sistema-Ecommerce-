<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\products;


class DashboardController extends Controller
{
    
    public function __construct(){

       $this->middleware('auth');
       //$this->middleware('isadmin');
       $this->middleware('Middleware_Permission');
       $this->middleware('userstatus');
    }

    public function getDashboard(){
         

         $user = user::select('*')->count();
         $products = products::select('*')->count();
        return view('Admin.dashboard', compact('user', 'products'));
    }
}
