<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Listing;
use App\ListingImage;

class ListingController extends Controller
{

    public function __construct(User $user, Listing $listing , ListingImage $listingImage)
    {
        $this->user = $user;
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


    public function searchListing(Request $request){
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
           $listing->where('beds_count' , $inputs['beds_baths']['0'])->where('baths_count' , '>' , $inputs['beds_baths']['1']);
        }

        $listings = $listing->get();
        $langLtd = [];
        foreach ($listings as $listing){
            $new = '['.$listing->lat.' , '.$listing->lng.', "images/pin-apartment.png"],';
            array_push($langLtd ,$new);
        }
        return view('pages.searched_listing' , compact('listings' , 'langLtd'));


    }


    public function searchListingAjax(Request $request){
       $points = $this->listing->where('lat' , '!=' ,  'null')->select('lat' , 'lng')->get();
       $array = json_decode($request->datas);
       dd($array);
       $listings = [];
       /*foreach ($array as $ar){
          $listing =  $this->listing->where('lat' , get_object_vars($ar)['lat'])->where('lng' , get_object_vars($ar)['lng'])->first();
            array_push($listings , $listing);
       }*/
       $this->pointInPolygon($points ,$array );
    }


    var $pointOnVertex = true;

    public function pointLocation() {
    }

    public  function pointInPolygon($point, $polygon, $pointOnVertex = true) {
        $this->pointOnVertex = $pointOnVertex;
        $point = $this->pointStringToCoordinates($point);
        $vertices = array();
        foreach ($polygon as $vertex) {
            dd($vertex);
            $vertices[] = $this->pointStringToCoordinates($vertex);
        }
        if ($this->pointOnVertex == true and $this->pointOnVertex($point, $vertices) == true) {
            return "vertex";
        }
        $intersections = 0;
        $vertices_count = count($vertices);
        for ($i=1; $i < $vertices_count; $i++) {
            $vertex1 = $vertices[$i-1];
            $vertex2 = $vertices[$i];
            if ($vertex1['y'] == $vertex2['y'] and $vertex1['y'] == $point['y'] and $point['x'] > min($vertex1['x'], $vertex2['x']) and $point['x'] < max($vertex1['x'], $vertex2['x'])) { // Check if point is on an horizontal polygon boundary
                return "boundary";
            }
            if ($point['y'] > min($vertex1['y'], $vertex2['y']) and $point['y'] <= max($vertex1['y'], $vertex2['y']) and $point['x'] <= max($vertex1['x'], $vertex2['x']) and $vertex1['y'] != $vertex2['y']) {
                $xinters = ($point['y'] - $vertex1['y']) * ($vertex2['x'] - $vertex1['x']) / ($vertex2['y'] - $vertex1['y']) + $vertex1['x'];
                if ($xinters == $point['x']) { // Check if point is on the polygon boundary (other than horizontal)
                    return "boundary";
                }
                if ($vertex1['x'] == $vertex2['x'] || $point['x'] <= $xinters) {
                    $intersections++;
                }
            }
        }
        if ($intersections % 2 != 0) {
            return "inside";
        } else {
            return "outside";
        }
    }

    public  function pointOnVertex($point, $vertices) {
        foreach($vertices as $vertex) {
            if ($point == $vertex) {
                return true;
            }
        }
    }

     public function pointStringToCoordinates($pointString) {
         $coordinates = [];
         return array("x" => $coordinates[0], "y" => $coordinates[1]);
    }




}
