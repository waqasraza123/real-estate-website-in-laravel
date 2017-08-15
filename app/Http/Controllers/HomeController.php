<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function  addListing(){
        return view('pages.addListing');
    }

    public function accountListing($id){
        #Here is coing db get from listings table as user_id and return it to view
        return view('user.listings');

    }

    public function account($id){
       $user =  User::find($id)->first();
       return view('user.profile');
    }
}
