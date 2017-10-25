<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Listing;
use App\Favorit;
use App\ListingImage;
use App\Review;
use App\Mail\AgentsEamil;


class ListingController extends Controller
{

    public function __construct(User $user, Listing $listing , ListingImage $listingImage , Favorit $favorit ,Review $review)
    {
        $this->user = $user;
        $this->favorit = $favorit;
        $this->listing = $listing;
        $this->listingImage = $listingImage;
        $this->review = $review;
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitListing(Request $request){
        $this->validate($request, [
            'listing_type' => 'required',
            'square_feet' => 'required',
            'rent' => 'required',
            'deposit' => 'required',
            'available_date' => 'required',
            'lease_length' => 'required',
            'parking_type' => 'required',
            'parking_fee' => 'required',
            'description' => 'required',
            'state' => 'required',
            'zip_code' => 'required'
        ]);

        $pass =    $this->randomPassword();
        $inputs = $request->except('_token' , 'file', 'featured');
        if(Auth::user()){
            $this->user->where('id' , Auth::user()->id)->update([
               'first_name' => $inputs['first_name'],
               'last_name' => $inputs['last_name'],
               'email' => $inputs['email'],
               'phone' => $inputs['phone'],
               'contact_type' => $inputs['contact_type']

            ]);
        }else{
            $this->user->updateOrCreate(
                [
                    'email' => $inputs['email']
                ],
                [
                    'first_name' => $inputs['first_name'],
                    'last_name' => $inputs['last_name'],
                    'phone' => $inputs['phone'],
                    'contact_type' => $inputs['contact_type'],
                    'password' =>   bcrypt($pass)
            ]);
        }
        if(!Auth::user()){
            Auth::attempt(['email' =>$inputs['email'] ,  'password' => $pass]);
        }
        $name = $request->featured->hashName();
        $request->featured->move(public_path() . '/assets/images/' , $name);
        $inputs['user_id'] = Auth::user()->id;
        $inputs['listing_status'] = 'done';
        $inputs['available_date'] = \Carbon\Carbon::parse($inputs['available_date'])->format('Y-m-d H:i:s');
        $this->listing->create($inputs);
        $listing = $this->listing->latest()->first();
        $this->listingImage->create(['listing_id' => $listing->id, 'image' => $name , 'featured' => '1']);
        if($request->file()){
            $images = $this->getImagesName($request->file());
            foreach ($images as $image){
                  $this->listingImage->create(['listing_id' => $listing->id, 'image' => $image['image']]);
            }
        }
            return redirect()->route('payment' , ['type' => 'user']);
    }


    /**
     * @param Request $request
     * @return mixed
     *
     * save the listing
     */
    public function saveListing(Request $request){
        $pass =    $this->randomPassword();
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
           $this->validate($request, [
                'email' => 'required|string|email|max:255|unique:users',
                'last_name' => 'required',
                'first_name' => 'required',
                'phone' => 'required'
            ]);
            $this->user->updateOrCreate(
                [
                'email' => $inputs['email']
                ],
                [
                'first_name' => $inputs['first_name'],
                'last_name' => $inputs['last_name'],
                'phone' => $inputs['phone'],
                'contact_type' => $inputs['contact_type'],
                'password' =>   bcrypt($pass)
            ]);
        }
        if(!Auth::user()){
            Auth::attempt(['email' =>$inputs['email'] ,  'password' => $pass]);
        }
        $inputs['user_id'] = Auth::user()->id;
        $inputs['listing_status'] = 'save';
        $inputs['available_date'] = \Carbon\Carbon::parse($inputs['available_date'])->format('Y-m-d H:i:s');
        $this->listing->create($inputs);
        $listing = $this->listing->latest()->first();
        if($request->file()){
            $images = $this->getImagesName($request->file());
            foreach ($images as $image){
                $this->listingImage->create(['listing_id' => $listing->id, 'image' => $image['image']]);
            }
        }

        return \Response::json(['massage' => 'true' , 'id' => Auth::user()->id]);
    }


    /**
     * @param $files
     * @return array|string
     */
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


    /**
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function deleteListing($id){
        if($this->listing->where('id' , $id)->delete()){
            return redirect()->back()->with('success' , 'Sucessfully deleted');
        }else{
            return redirect()->back()->withErrors('error' , 'Ups something goes wrong');
        }
    }


    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postEditListing(Request $request){
        $this->validate($request, [
            'listing_type' => 'required',
            'square_feet' => 'required',
            'rent' => 'required',
            'deposit' => 'required',
            'available_date' => 'required',
            'lease_length' => 'required',
            'description' => 'required',
            'parking_type' => 'required',
            'parking_fee' => 'required',
        ]);
        $inputs = $request->except('_token' , 'listingid'  ,'files');
        $inputs['listing_status'] = 'done';
        $inputs['available_date'] = \Carbon\Carbon::parse($inputs['available_date'])->format('Y-m-d H:i:s');
        if($request->file()){
            $images = $this->getImagesName($request->file());
            foreach ($images as $image){
                $this->listingImage->create(['listing_id' => $request->get('listingid'), 'image' => $image['image']]);
            }
        }
        if($this->listing->where('id' , $request->get('listingid'))->update($inputs)){
            return redirect()->back()->with('success' , 'Successfully Updated');
        }else{
            return redirect()->back()->withErrors('error' , 'Please try again');
        }

    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editListing($id){
      $listing =   $this->listing->where('id' , $id)->first();
        return view('pages.editListing' , compact('listing'));
    }

    public function index()
    {
        //
    }


    /**
     * @return string
     */
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


    /**
     * @param $id
     * @param $title
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function singleListing($id , $title){
        $listing = $this->listing->where('id' , $id)->first();
        if(Auth::user()){
          $hasfavorite =   $this->favorit->where('user_id' , Auth::user()->id)->where('listing_id' , $listing->id)->first();
        }
        return view('pages.single_listing' , compact('listing' , 'hasfavorite'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchListing(Request $request){
        $request->flash();
        $points = $this->listing->where('lat' , '!=' ,  'null')->where('listing_status' , 'done')->whereNotNull('approved')->get();
        $inputs = $request->except('token');
        $listing = $this->listing
            ->where('listing_type' , $inputs['listing_type'])
            ->where('listing_status' , 'done')
            ->where('address' , $inputs['address'])
            ->whereNotNull('approved');
        if($inputs['rent'] != null){
            $rent_amount = explode('-' , $inputs['rent']);
            $listing
                ->where('rent', '>' , $rent_amount['0'])
                ->where('listing_status' , 'done')
                ->where('rent', '<' ,$rent_amount['1'])
                ->whereNotNull('approved');
        }if($request->has('beds_baths')){
            if($inputs['beds_baths']['0'] == 'all_baths'){
                $listing->where('listing_status' , 'done')->whereNotNull('approved')->where('baths_count' , '>' , $inputs['beds_baths']['1']);
            }
            if($inputs['beds_baths']['0'] == 'all'){
                $listing->where('listing_status' , 'done')->whereNotNull('approved')->where('beds_count' , $inputs['beds_baths']['0']);
            }
            if (array_key_exists('0', $inputs['beds_baths']) && array_key_exists('1', $inputs['beds_baths'])) {
                $listing->where('listing_status' , 'done')->whereNotNull('approved')->where('beds_count', $inputs['beds_baths']['0'])->where('baths_count', '>', $inputs['beds_baths']['1']);
            }
        }
        $listings = $listing->get();
        $langLtd = [];
       foreach ($listings as $listing){
            if($listing->lat != '') {
                if($listing->listing_type == '2'){
                    $new = '[' . $listing->lat . ' , ' . $listing->lng . ', "images/pin-apartment.png"],';
                }elseif($listing->listing_type == '7'){
                    $new = '[' . $listing->lat . ' , ' . $listing->lng . ', "images/pin-house.png"],';
                }elseif($listing->listing_type == '5'){
                    $new = '[' . $listing->lat . ' , ' . $listing->lng . ', "images/pin-commercial.png"],';
                }elseif($listing->listing_type == '3'){
                    $new = '[' . $listing->lat . ' , ' . $listing->lng . ', "images/pin-land.png"],';
                }
                array_push($langLtd, $new);
            }
        }
        return view('pages.searched_listing' , compact('listings' , 'langLtd'));
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function searchListingAjax(Request $request){
       $points = $this->listing->where('listing_status' , 'done')->where('lat' , '!=' ,  'null')->select('lat' , 'lng')->get();
       $array = json_decode($request->datas);

       $listings = [];
       foreach ($array as $ar){
          $listing =  $this->listing->where('listing_status' , 'done')->where('lat' ,'>' ,  get_object_vars($ar)['lat'])->where('lng' ,'>' ,  get_object_vars($ar)['lng'])->first();
          if($listing != null) {
              array_push($listings, $listing);
          }
       }
        return \Response::json(['listing' => $listings]);
    }


    /**
     * @param $user_id
     * @param $listing_id
     * @return \Illuminate\Http\RedirectResponse
     */
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


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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
                if($listing->listing_type == '2'){
                    $new = '[' . $listing->lat . ' , ' . $listing->lng . ', "images/pin-apartment.png"],';
                }elseif($listing->listing_type == '7'){
                    $new = '[' . $listing->lat . ' , ' . $listing->lng . ', "images/pin-house.png"],';
                }elseif($listing->listing_type == '5'){
                    $new = '[' . $listing->lat . ' , ' . $listing->lng . ', "images/pin-commercial.png"],';
                }elseif($listing->listing_type == '3'){
                    $new = '[' . $listing->lat . ' , ' . $listing->lng . ', "images/pin-land.png"],';
                }
                array_push($langLtd, $new);
            }
        }
        return view('pages.searched_listing' , compact('listings' , 'langLtd'));
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delListingImages($id){
        if($this->listingImage->where('id' ,$id)->delete()){
             return redirect()->back();
        }
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function writeReviews(Request $request){
        if($this->review->create($request->all())){
            return redirect()->back()->with('writed' , 'Your review Sucessfully addet');
        }
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteReviews($id){
        $this->review()->where('id'  ,$id)->delete();
        return redirect()->back();
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function chooseType(){
        return view('pages.listing_option');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function agentForm(){
        return view('pages.agents');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function PostagentForm(Request $request){
        $this->validate($request, [
            'name'           => 'required',
            'email'          => 'required|email',
            'phone'          => 'required',
            'license_number' => 'required'
        ]);

        $inputs = $request->except('_token');
        if(\Mail::to('info@2ndchanceleasing.com')->send(new AgentsEamil($inputs)) == 0) {
           return redirect()->back()->with('sucess' , 'Thank you for your massage we will contact with you soon ');
        }
    }

    public function emailToAgent($email){

    }



   /*=======================================================
                Agent Form
    ========================================================*/
    public function getAgentForm(){
        return view('pages.agent_form');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitAgentListing(Request $request){
        $this->validate($request, [
            'listing_type' => 'required',
            'square_feet' => 'required',
            'rent' => 'required',
            'deposit' => 'required',
            'available_date' => 'required',
            'lease_length' => 'required',
            'parking_type' => 'required',
            'parking_fee' => 'required',
            'description' => 'required',
            'state' => 'required',
            'zip_code' => 'required'
        ]);
        $pass =    $this->randomPassword();
        $inputs = $request->except('_token' , 'file', 'featured');
        if(Auth::user()){
            $this->user->where('id' , Auth::user()->id)->update([
                'first_name' => $inputs['first_name'],
                'last_name' => $inputs['last_name'],
                'email' => $inputs['email'],
                'phone' => $inputs['phone'],
                'contact_type' => $inputs['contact_type']

            ]);
        }else{
            $this->user->updateOrCreate(
                [
                    'email' => $inputs['email']
                ],
                [
                    'first_name' => $inputs['first_name'],
                    'last_name' => $inputs['last_name'],
                    'phone' => $inputs['phone'],
                    'contact_type' => $inputs['contact_type'],
                    'password' =>   bcrypt($pass)
                ]);
        }
        if(!Auth::user()){
            Auth::attempt(['email' =>$inputs['email'] ,  'password' => $pass]);
        }
        $name = $request->featured->hashName();
        $request->featured->move(public_path() . '/assets/images/' , $name);
        $inputs['user_id'] = Auth::user()->id;
        $inputs['listing_status'] = 'done';
        $inputs['available_date'] = \Carbon\Carbon::parse($inputs['available_date'])->format('Y-m-d H:i:s');
        $this->listing->create($inputs);
        $listing = $this->listing->latest()->first();
        $this->listingImage->create(['listing_id' => $listing->id, 'image' => $name , 'featured' => '1']);
        if($request->file()){
            $images = $this->getImagesName($request->file());
            foreach ($images as $image){
                $this->listingImage->create(['listing_id' => $listing->id, 'image' => $image['image']]);
            }
        }
        return redirect()->route('payment' , ['type' => 'agent']);
    }


    /**
     * @param $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function payment($type){
        return view('pages.payment' , compact('type'));
    }


    public function makeFeatureImage($id , $listing_id){
        $this->listingImage->where('listing_id' , $listing_id)->update(['featured' => NULL]);
        if($this->listingImage->where('id' , $id)->update(['featured' => '1'])){
            return redirect()->back()->with('success' , 'Featured image changed');
        }
    }

}
