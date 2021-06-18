<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Platform;
use App\Models\Country;
use App\Models\Niche;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Auth;
use Image;

class UserlistController extends Controller
{
    public function __construct() {
    $this->middleware('role:admin');
    }


  public function AllUsers(Request $request) {

  	$role = DB::table('users')->select('role')->distinct()->get()->pluck('role')->sort();

    $maincategory = DB::table('users')->select('maincategory')->distinct()->get()->pluck('maincategory')->sort();

  	$allusers = User::query()->orderby('id', 'desc');
  	


  	if ($request->filled('role')) 
    {
      $allusers->where('role', $request->role);
    }

    if ($request->filled('maincategory')) 

    {
      $allusers->where('maincategory', $request->maincategory);
    }

  	
  	return view('admin.allusers',['allusers' => $allusers->paginate(16), 'role' => $role, 'maincategory' => $maincategory]);
  }


  public function edituser($id, Request $request)
  {	
  	$user = User::findorfail($id);
  	$country = Country::all();
  	$niche = Niche::all();
  	$interest = Niche::all();
  	$datathis = json_decode($user->morecategory);
  	return view('admin.edituser', compact('user','country','niche','interest','datathis'));
  }

  public function update($id,Request $request)
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
            'brandname' => '',
            'acc_name' => 'string',
            'acc_bank' => 'string',
            'acc_number' => '',

        ]);

    	if($request->hasFile('avatar'))
    	{
    	$avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('uploads/avatars/' . $filename ) );
        }
    	
    	
		$User = User::findorfail($id);

		if($request->hasFile('avatar'))
    	{
    		$User->avatar = $filename;
		}
        
		$User->name = $request->input('name');
		$User->mobilenumber = $request->input('mobilenumber');
		$User->bod = $request->input('bod');
        $User->bio = $request->input('bio');
        $User->url = $request->input('url');
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

    	return redirect()->action('App\Http\Controllers\Admin\UserlistController@edituser', $id)->with('message','Your account has been updated!');
    }
}
