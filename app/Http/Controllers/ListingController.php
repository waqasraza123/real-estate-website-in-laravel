<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Listing;
use App\Favorit;
use App\ListingImage;

class ListingController extends Controller
{

    public function __construct(User $user, Listing $listing , ListingImage $listingImage , Favorit $favorit)
    {
        $this->user = $user;
        $this->favorit = $favorit;
        $this->listing = $listing;
        $this->listingImage = $listingImage;
    }



    public function submitListing(Request $request){
        $this->validate($request, [
            'listing_type' => 'required',
            'square_feet' => 'required',
            'rent' => 'required',
            'deposit' => 'required',
            'available_date' => 'required',
            'lease_length' => 'required',
            'description' => 'required',
            'loundry_type' => 'required',
            'parking_type' => 'required',
            'parking_fee' => 'required'
        ]);
        $pass=    $this->randomPassword();
        $inputs = $request->except('_token' , 'file');
        if(Auth::user()){
            $this->user->where('id' , Auth::user()->id)->update([
               'first_name' => $inputs['first_name'],
               'last_name' => $inputs['last_name'],
               'email' => $inputs['email'],
               'phone' => $inputs['phone'],
               'contact_type' => $inputs['contact_type']

            ]);
        }else{
            $this->user->create([
                'first_name' => $inputs['first_name'],
                'last_name' => $inputs['last_name'],
                'email' => $inputs['email'],
                'phone' => $inputs['phone'],
                'contact_type' => $inputs['contact_type'],
                'password' =>   bcrypt($pass)
            ]);
        }
        if(!Auth::user()){
            Auth::attempt(['email' =>$inputs['email'] ,  'password' => $pass]);
        }
        $inputs['user_id'] = Auth::user()->id;
        $inputs['available_date'] = \Carbon\Carbon::parse($inputs['available_date'])->format('Y-m-d H:i:s');
        $this->listing->create($inputs);
        $listing = $this->listing->latest()->first();
        if($request->file()){
            $images = $this->getImagesName($request->file());
            foreach ($images as $image){
                  $this->listingImage->create(['listing_id' => $listing->id, 'image' => $image['image']]);
            }
        }
            return redirect()->route('accountListing' , ['id' => Auth::user()->id]);
    }


    public function getImagesName($files)
    {
        $file_names = [];
        if ($files) {
            foreach ($files as $file) {
                foreach($file as $fil){
                    $filename = str_random(20) . "." . $fil->getClientOriginalExtension();
                    $file_names[]['image'] = $filename;
                    $fil->move(public_path() . '/assets/images/', $filename);
                }
                }
            return $file_names;
        }
        return '';
    }


    public function deleteListing($id){
        if($this->listing->where('id' , $id)->delete()){
            return redirect()->back()->with('success' , 'Sucessfully deleted');
        }else{
            return redirect()->back()->withErrors('error' , 'Ups something goes wrong');
        }
    }


    public function postEditListing(Request $request){
        $inputs = $request->except('_token' , 'id');
        $inputs['available_date'] = \Carbon\Carbon::parse($inputs['available_date'])->format('Y-m-d H:i:s');
        if($this->listing->where('id' , $request->get('id'))->update($inputs)){
            return redirect()->back()->with('success' , 'Successfully Updated');
        }else{
            return redirect()->back()->withErrors('error' , 'Please try again');
        }

    }



    public function editListing($id){
      $listing =   $this->listing->where('id' , $id)->first();
        return view('pages.editListing' , compact('listing'));
    }


    public function index()
    {
        //
    }


    public function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890&$&*';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }


    public function singleListing($id){
        $listing = $this->listing->where('id' , $id)->first();
        return view('pages.single_listing' , compact('listing'));
    }


    public function searchListing(Request $request){
        $request->flash();
        $points = $this->listing->where('lat' , '!=' ,  'null')->get();
        $inputs = $request->except('token');
        $listing = $this->listing->where('listing_type' , $inputs['listing_type'])->where('address' , $inputs['address']);
        if($inputs['rent'] != null){
            $rent_amount = explode('-' , $inputs['rent']);
            $listing->where('rent', '>' , $rent_amount['0'])->where('rent', '<' ,$rent_amount['1']);
        }if($request->has('beds_baths')){
            if($inputs['beds_baths']['0'] == 'all_baths'){
                $listing->where('baths_count' , '>' , $inputs['beds_baths']['1']);
            }
            if($inputs['beds_baths']['0'] == 'all'){
                $listing->where('beds_count' , $inputs['beds_baths']['0']);
            }

                if (array_key_exists('0', $inputs['beds_baths']) && array_key_exists('1', $inputs['beds_baths'])) {
                    $listing->where('beds_count', $inputs['beds_baths']['0'])->where('baths_count', '>', $inputs['beds_baths']['1']);
                }

        }

        $listings = $listing->get();
        $langLtd = [];
       foreach ($listings as $listing){
            if($listing->lat != '') {
                $new = '[' . $listing->lat . ' , ' . $listing->lng . ', "images/pin-apartment.png"],';
                array_push($langLtd, $new);
            }
        }


        return view('pages.searched_listing' , compact('listings' , 'langLtd'));


    }


    public function searchListingAjax(Request $request){
       $points = $this->listing->where('lat' , '!=' ,  'null')->select('lat' , 'lng')->get();
       $array = json_decode($request->datas);

       $listings = [];
       foreach ($array as $ar){
          $listing =  $this->listing->where('lat' ,'>' ,  get_object_vars($ar)['lat'])->where('lng' ,'>' ,  get_object_vars($ar)['lng'])->first();
          if($listing != null) {
              array_push($listings, $listing);
          }
       }
        return \Response::json(['listing' => $listings]);
    }


    public function addFavorite($user_id , $listing_id){
        $listing = $this->favorit->where('user_id' , $user_id)->where('listing_id' , $listing_id)->first();
        if($listing){
            return redirect()->back()->with('addet' , 'This Listing in your favorites already');
        }else {
            if ($this->favorit->create(['user_id' => $user_id, 'listing_id' => $listing_id])) {
                return redirect()->back()->with('addet', 'Sucessfuly addet to your favorites');
            }
        }
    }

    public function searchSavedSeraches(Request $request){
        $inputs = [];
        foreach($request->except('_token') as  $key=>$value){
            if($value !=null){
                $inputs[$key] = $value;
            }
        }

        $listings =  $this->listing->where($inputs)->get();
        $langLtd = [];
        foreach ($listings as $listing){
            if($listing->lat != '') {
                $new = '[' . $listing->lat . ' , ' . $listing->lng . ', "images/pin-apartment.png"],';
                array_push($langLtd, $new);
            }
        }


        return view('pages.searched_listing' , compact('listings' , 'langLtd'));
    }




}
