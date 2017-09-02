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


    public function homePage(){
        $listing = $this->listing->paginate(6);
        return view('welcome'  , compact('listing'));
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

    public function updateProfile(Request $request){
        $inputs = $request->except('_token' , 'id' , 'password' , 'repeat-password' , 'avatar');
        $inputs['birthday'] = \Carbon\Carbon::parse($inputs['birthday'])->format('Y-m-d H:i:s');
        if($request->file()) {
            $images = $this->getImagesName($request->file());
            $this->user->where('id' , $request->get('id'))->update([
                'avatar' => $images[0]['image']
            ]);
        }
        if($this->user->where('id' , $request->get('id'))->update($inputs)){
            return redirect()->back()->with('success' , 'Sucessfully Updated');
        }else{
            return redirect()->back()->withErrors('error' , 'Please try again');
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
}
