<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Listing;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user , Listing $listing)
    {
        $this->user = $user;
        $this->listing = $listing;
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
        $listings = $this->listing->where('user_id' , $id)->get();
        return view('user.listings' , compact('listings'));

    }

    public function account($id){
       $user =  User::find($id)->first();
       return view('user.profile');
    }
}
