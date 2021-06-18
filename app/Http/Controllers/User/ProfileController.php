<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Http\Requests;
use App\Models\User;
use App\Models\country;
use App\Models\Niche;
use Auth;
use Image;


class ProfileController extends Controller
{
    public function __construct() {
        $this->middleware('role:creator');
      }
    public function show() 
    {   
        //$datathis = [];
    	$user = Auth::user();
        $niche = Niche::all();
        $country = country::all();
        $interest = Niche::all();
        $thisuser = User::where('id', Auth::user()->id);

        //foreach ($thisuser as $users) 
        //{
        
            $datathis = json_decode($user->morecategory);
        
        
            
        //}
        
        return view('user.profile', compact('user' ,'niche','country','interest','datathis'));
    }

    public function update(Request $request)
    {	
        $this->validate($request,[
            'name' => 'string',
            'mobilenumber' => 'unique:users,mobilenumber',
            'bod' => '',
            'bio' => '',
            'gender' => '',
            'country' => '',
            'state' => 'string',
            'address' => '',
            'maincategory' => '',
            'morecategory' => '',
            'brandname' => 'string',
            'acc_name' => 'string',
            'acc_bank' => '',
            'acc_number' => '',

        ]);

    	if($request->hasFile('avatar'))
    	{
    	$avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('uploads/avatars/' . $filename ) );
        }
    	
    	$uid = Auth::user()->id;
		$User = User::findorfail($uid);

		if($request->hasFile('avatar'))
    	{
    		$User->avatar = $filename;
		}
        
		$User->name = $request->input('name');
		$User->mobilenumber = $request->input('mobilenumber');
		$User->bod = $request->input('bod');
        $User->bio = $request->input('bio');
		$User->gender = $request->input('gender');
		$User->country = $request->input('country');
		$User->state = $request->input('state');
		$User->address = $request-> input('address');
		$User->maincategory = $request->input('maincategory');
		$User->morecategory = json_encode($request->input('morecategory'));
		$User->brandname = $request->input('brandname');
        $User->acc_name = $request->input('acc_name');
        $User->acc_bank = $request->input('acc_bank');
        $User->acc_number = $request->input('acc_number');

		$User->save();

    	return redirect()->action('App\Http\Controllers\User\ProfileController@show')->with('message','Your account has been updated!');
    }
}
