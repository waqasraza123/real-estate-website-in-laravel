<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Logo;
use App\Listing;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function __construct(User $user ,Logo $logo , Listing $listing){
        $this->user = $user;
        $this->logo = $logo;
        $this->listing = $listing;
    }

    public function index(){
        return view('admin.login.login');
    }

    public function adminPostLogin(Request $request){
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            Auth::Login(Auth::user(), false);
            return redirect()->route('adminHome');
        }else{
            return redirect()->back()->withErrors('error' , 'Wrong Creterias');
        }
    }

    public function adminHome(){
        return view('admin.dashboard');
    }



    /*=============================================================
                Users Editing Deleting area
    ==============================================================*/

    public function admUsers(){
       $users =  $this->user->whereNull('role')->get();
       return view('admin.user.index' , compact('users'));
    }

    public function admEditUsers($id){
        $user = $this->user->where('id' , $id)->first();
        return view('admin.user.edit' , compact('user'));
    }

    public function admUsersCreate(){
        return view('admin.user.create');
    }

    public function postadmUsersCreate(Request $request){

        $this->validate($request, [
            'first_name' => 'required',
            'last_name'  => 'required',
            'phone'      => 'required',
            'email'      => 'required|unique:users|email',
            'password'   => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);
        $inputs  = $request->except('_token' , 'password_confirmation');
        if($this->user->create($inputs)){
            return redirect()->back()->with('success' , 'Successfully complated');
        }else{
            return redirect()->back()->withErrors('error' , 'please try again');
        }
    }


    public function postEditUser(Request $request){

        $this->validate($request, [
            'first_name' => 'required',
            'last_name'  => 'required',
            'phone'      => 'required',
            'email'      => 'required|unique:users|email',
            'password'   => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        $inputs = $request->except('id' , '_token' , 'password_confirmation');
        if($this->user->where('id' , $request->get('id'))->update($inputs)){
            return redirect()->back()->with('success' , 'Successfully complated');
        }else{
            return redirect()->back()->withErrors('error' , 'please try again');
        }
    }

    public function admDeleteUsers($id){
        if($this->user->where('id' , $id)->delete()){
            return redirect()->back()->with('success' , 'Successfully complated');
        }else{
            return redirect()->back()->withErrors('error' , 'please try again');
        }
    }


    /*=============================================================
                Logo Editing Deleting area
    ==============================================================*/

    public function admLogo(){
        $logo = $this->logo->first();
        return view('admin.logo.index' , compact('logo'));
    }

    public function admPostLogo(Request $request){
        $this->validate($request, [
           'image' => 'required|image|dimensions:max_height=80px,max_width=452px'
        ]);
        $image = $this->getImagesName($request->file());
        if($this->logo->first()){
            if($this->logo->first()->update(['image' => $image[0]['image']])){
                return redirect()->back()->with('success' , 'Successfully complated');
            }else{
                return redirect()->back()->withErrors('error' , 'please try again');
            }
        }else{
            if($this->logo->create(['image' => $image[0]['image']])){
                return redirect()->back()->with('success' , 'Successfully complated');
            }else{
                return redirect()->back()->withErrors('error' , 'please try again');
            }
        }

    }


    public function getImagesName($files)
    {
        $file_names = [];
        if ($files) {
            foreach ($files as $file) {
                $filename = str_random(20) . "." . $file->getClientOriginalExtension();
                $file_names[]['image'] = $filename;
                $file->move(public_path() . '/assets/images/', $filename);
            }
            return $file_names;
        }
        return '';
    }




    /*=============================================================
            Listings Editing Deleting area
    ==============================================================*/

    public function admListing(){
        $listings = $this->listing->get();
        return view('admin.listings.index'  ,compact('listings'));
    }

    public function admEditListing($id){
        $listing = $this->listing->where('id' , $id)->first();
        return view('admin.listings.edit' , compact('listing'));
    }

    public function admPostEditListing(Request $request){
        $inputs = $request->except('id' , '_token' );
        if($this->listing->where('id' , $request->get('id'))->update($inputs)){
            return redirect()->back()->with('success' , 'Successfully complated');
        }else{
            return redirect()->back()->withErrors('error' , 'please try again');
        }
    }

    public function admDeleteListing($id){
        if($this->listing->where('id' , $id)->delete()){
            return redirect()->back()->with('success' , 'Successfully complated');
        }else{
            return redirect()->back()->withErrors('error' , 'please try again');
        }
    }



    /*=============================================================
        Listings Editing Deleting area
    ==============================================================*/


    public function admBlog(){

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
