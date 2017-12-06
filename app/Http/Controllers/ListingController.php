<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Listing;
use App\ListingAttribute;
use App\Favorit;
use App\ListingImage;
use App\Review;
use App\Mail\AgentsEamil;
use Illuminate\Support\Facades\DB;


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
            'description' => 'required',
            'parking_type' => 'required',
            'parking_fee' => 'required',
        ]);
        $inputs = $request->except('_token' , 'file', 'featured', 'listing_type' , 'beds_count' , 'baths_count' , 'square_feet' , 'rent', 'deposit' , 'available_date' , 'lease_length');
        $inputs['user_id'] = Auth::user()->id;
        $inputs['listing_status'] = 'done';
        $this->listing->create($inputs);
        $listing = $this->listing->latest()->first();
        if($request->listing_type != null) {
            foreach (array_keys($request->listing_type) as $key) {
                ListingAttribute::create([
                    'listing_id' => $listing->id,
                    'listing_type' => $request->listing_type[$key],
                    'beds_count' => $request->beds_count[$key],
                    'baths_count' => $request->baths_count[$key],
                    'square_feet' => $request->square_feet[$key],
                    'rent' => $request->rent[$key],
                    'deposit' => $request->deposit[$key],
                    'available_date' => $request->available_date[$key],
                    'lease_length' => $request->lease_length[$key],
                ]);
            }
        }
        if($request->file('featured')){
            $name = $request->featured->hashName();
            $request->featured->move(public_path() . '/assets/images/' , $name);
            $this->listingImage->create(['listing_id' => $listing->id, 'image' => $name , 'featured' => '1']);
        }
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
            'description' => 'required',
            'parking_type' => 'required',
            'parking_fee' => 'required',
        ]);


        $inputs = $request->except('_token' , 'listingid', 'list_a_id', 'file', 'featured', 'listing_type' , 'beds_count' , 'baths_count' , 'square_feet' , 'rent', 'deposit' , 'available_date' , 'lease_length');
        $inputs['listing_status'] = 'done';
        if($request->listing_type != null) {
            foreach (array_keys($request->listing_type) as $key) {
                ListingAttribute::where('id', $request->list_a_id[$key])->update([
                    'listing_type' => $request->listing_type[$key],
                    'beds_count' => $request->beds_count[$key],
                    'baths_count' => $request->baths_count[$key],
                    'square_feet' => $request->square_feet[$key],
                    'rent' => $request->rent[$key],
                    'deposit' => $request->deposit[$key],
                    'available_date' => $request->available_date[$key],
                    'lease_length' => $request->lease_length[$key],
                ]);
            }
        }
        if($request->file('featured')){
            $name = $request->featured->hashName();
            $request->featured->move(public_path() . '/assets/images/' , $name);
            $this->listingImage->create(['listing_id' => $request->get('listingid'), 'image' => $name , 'featured' => '1']);
        }
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
        //dd($request->all());
        $request->flash();
        $min = [];

        $points = $this->listing->where('lat' , '!=' ,  'null')->where('listing_status' , 'done')->whereNotNull('approved')->get();

        $inputs = $request->except('token');
        $listing = Listing::where('listings.listing_status' , 'done')
            ->where('listings.approved', "1")
            ->join('listing_attributes', 'listings.id', '=', 'listing_attributes.listing_id');

        if(isset($inputs['min']) && isset($inputs['max'])){
            $listing->whereBetween('listing_attributes.rent', [(int)$inputs['min'], (int)$inputs['max']]);
        }

        if(isset($request->input('beds_baths')[0])){
            $listing->where('listing_attributes.beds_count', $request->input('beds_baths')[0]);
        }

        if(isset($request->input('beds_baths')[1])){
            $listing->where('listing_attributes.baths_count', $request->input('beds_baths')[1]);
        }

        if($inputs['wq-street_address'] || $inputs['wq-street_number'] || $inputs['wq-intersection'] || $inputs['wq-route'] || $inputs['wq-neighborhood']){
            if (isset($inputs['wq-street_address']))
                $listing->where('wq-street_address', $inputs['wq-street_address']);
            if (isset($inputs['wq-street_number']))
                $listing->where('wq-street_number', $inputs['wq-street_number']);
            if (isset($inputs['wq-intersection']))
                $listing->where('wq-intersection', $inputs['wq-intersection']);
            if (isset($inputs['wq-route']))
                $listing->where('wq-route', $inputs['wq-route']);
            if(isset($inputs['wq-neighbourhood']))
                $listing->where('wq-neighbourhood', $inputs['wq-neighbourhood']);
        }

        elseif ($inputs['wq-sublocality']){
            $zipCodes = DB::table('zip_codes')->where('zip_code_primary_city', $inputs['wq-sublocality'])->pluck('zip_code')->toArray();
            $listing->whereIn('zip_code', $zipCodes);
        }
        if ($inputs['wq-locality']){
            $zipCodes = DB::table('zip_codes')->where('zip_code_primary_city', $inputs['wq-locality'])->pluck('zip_code')->toArray();
            $listing->whereIn('zip_code', $zipCodes);
            dd($listing->toSql());
        }
        elseif ($inputs['wq-administrative_area_level_2']){

            $zipCodes = DB::table('zip_codes')->where('zip_code_county', $inputs['wq-administrative_area_level_2'])->pluck('zip_code')->toArray();
            $listing->whereIn('zip_code', $zipCodes);
        }
        elseif ($inputs['wq-administrative_area_level_1']){
            $zipCodes = DB::table('zip_codes')->where('zip_code_state', $inputs['wq-administrative_area_level_1'])->pluck('zip_code')->toArray();
            dd($zipCodes);
            $listing->whereIn('zip_code', $zipCodes);
        }

        $listings = $listing->get();
        $langLtd = [];
        $new = '';
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
                }else{
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
            'parking_type' => 'required',
            'parking_fee' => 'required',
            'description' => 'required',
            'state' => 'required',
            'zip_code' => 'required'
        ]);
        $pass =    $this->randomPassword();
        $inputs = $request->except('_token' , 'file', 'featured', 'listing_type' , 'beds_count' , 'baths_count' , 'square_feet' , 'rent', 'deposit' , 'available_date' , 'lease_length');
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

        $this->listing->create($inputs);
        $listing = $this->listing->latest()->first();
        foreach(array_keys($request->listing_type) as $key) {
            ListingAttribute::create([
                'listing_id' => $listing->id,
                'listing_type' => $request->listing_type[$key],
                'beds_count' => $request->beds_count[$key],
                'baths_count' => $request->baths_count[$key],
                'square_feet' => $request->square_feet[$key],
                'rent' => $request->rent[$key],
                'deposit' => $request->deposit[$key],
                'available_date' => $request->available_date[$key],
                'lease_length' => $request->lease_length[$key],
            ]);
        }
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
