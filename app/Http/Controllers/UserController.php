<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{ 
    public function userhome(){
        return view('user.home',['msg'=>'i am user role hellllllllllooooo']);
    }    
    public function adminhome(){
        return view('user.home',['msg'=>'i am admin role hellllllllllooooo']);
    }
    public function managerhome(){
        return view('user.home',['msg'=>'i am manager role hellllllllllooooo']);
    }
}
