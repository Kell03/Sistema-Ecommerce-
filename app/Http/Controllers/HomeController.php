<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;


class HomeController extends Controller
{

    public function __construct(){
  
     //$this->middleware('auth');
      // $this->middleware('userstatus');
    }
    

    public function home(){

      
      return view('home');
    }



    public function practica(){

      
      return view('practica_css');
    }
}
