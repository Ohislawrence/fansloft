<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Platform;
use App\Models\Niche;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Auth;
use Image;

class PlatformController extends Controller
{
	public function __construct() {
    $this->middleware('role:admin');
    }

   public function show()
   {
   	$platform = Platform::orderby('id', 'desc')->paginate(20);
   	
   	return view('admin.platform', compact('platform'));
   }

   public function edit($id)
   {
   	$platform = Platform::findorfail($id);
   	$niche = Niche::all();

   	return view('admin.editplatform', compact('platform','niche'));
   }

   public function post($id, Request $request)
   {
   	$this->validate($request,[
			'username' => 'required|string',
			'followers' => 'required|numeric',
			'following' => 'required|numeric',
			'date' => 'required|string',
			'category' => 'required|string',
		]);
       
       $platforms = Platform::findorfail($id);

		$platforms->handle = $request->input('username');
		$platforms->followers = $request->input('followers');
		$platforms->members = $request->input('following');
		$platforms->startdate = $request->input('date');
		$platforms->category = $request->input('category');
		//$platforms->user_id = $request-> input('uid');
		$platforms->platform = $request->input('platform');
		$platforms->is_verify = $request->input('verify');

		$platforms->save();

		return redirect()->action('App\Http\Controllers\Admin\PlatformController@edit', $id)->with('message','This platform has been updated!');
   }
}
