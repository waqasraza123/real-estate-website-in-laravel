<?php

namespace App\Http\Controllers;
use App\Mail\ContactClient;
use App\User;
use Illuminate\Http\Request;
use App\Listing;
use App\Favorit;
use App\SavedSearch;
use App\UserNotification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user , Listing $listing , Favorit $favorit , SavedSearch $savedSearch ,UserNotification $notification)
    {
        $this->user = $user;
        $this->savedSearch = $savedSearch;
        $this->favorits = $favorit;
        $this->listing = $listing;
        $this->notification = $notification;
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

        $this->validate($request,[
                'first_name' => 'required',
                'last_name' => 'required',
                'phone' => 'required',
                'email' => 'required'
        ]);
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



    public function accountFavorites($id){
       $list =  $this->favorits->where('user_id' , $id)->get();
       return view('user.favorites' , compact('list'));
    }


    public function saveSearch(Request $request){
        $inputs =  $request->except('_token');
        if($this->savedSearch->create($inputs)){
            return \Response::json(['sucess' => 'true']);
        }
    }


    public function accountSavedSearches($id){
       $searches = $this->savedSearch->where('user_id' , $id)->get();

       return view('user.savedSearch' , compact('searches'));
    }

    public function userNotification($id){
        $notification = $this->notification->where('user_id' , $id)->first();
        if($notification == null){
            $this->notification->create([
                'saved_searches' => 1,
                'user_id' => $id,
                'favorites' => 1,
                'delivery_option' => 2
            ]);
        $notification = $this->notification->where('user_id' , $id)->first();
        }
        return view('user.notifications' , compact('notification'));
    }

    public function saveUserNotify(Request $request){
        $this->validate($request, [
            'saved_searches' => 'required',
            'favorites' => 'required',
            'delivery_option' => 'required'
        ]);

        $inputs = $request->except('_token');
        if($this->notification->where('user_id' , \Auth::user()->id)->update($inputs)){
                return redirect()->back()->with('success' , 'Sucessfully updated');
        }else{
                return redirect()->back()->withErrors(['error' => 'Please try aggain']);
        }
    }

    public function mailToClient(Request $request){
        $userinfo = $request->except('_token' , 'sending_email');
        \Mail::to($request->sending_email)->send(new ContactClient($userinfo));
        return redirect()->back()->with('success' , 'The massage sucessfully sendet');

    }
}
