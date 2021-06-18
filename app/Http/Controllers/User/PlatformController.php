<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Platform;
use App\Models\PlatformService;
use App\Models\Niche;
use App\Models\User;
use App\Models\Service;

class PlatformController extends Controller
{
    public function __construct() {
        $this->middleware('role:creator');
      }
    public function show() {
        
    	$platform = Platform::where('user_id', Auth::user()->id)->get();
        $niche = Niche::all();
        $niche1 = Niche::all();
        return view('user.platform', compact('platform', 'niche', 'niche1'));
    }

    public function AddTwitter(){

    	return view('user.addtwitter');
    }

    public function AddTwitterInsert(Request $request){
    	
		$this->validate($request,[
			'username' => 'required|string',
			'followers' => 'required|numeric',
			'following' => 'required|numeric',
			'date' => 'required|string',
			'category' => 'required|string',
		]);
        

		$Platforms = new Platform;

		$Platforms->handle = $request->input('username');
		$Platforms->followers = $request->input('followers');
		$Platforms->members = $request->input('following');
		$Platforms->startdate = $request->input('date');
		$Platforms->category = $request->input('category');
		$Platforms->user_id = $request-> input('uid');
		$Platforms->platform = $request->input('platform');

		$Platforms->save();

    	return redirect()->action('App\Http\Controllers\User\PlatformController@show')->with('message','Your platform has been added, it will be verified shortly!');
    }

    public function updateplatform($id){
        
    	$platform = Platform::find($id);
        $niche = Niche::all();

    	return view('user.updateplatform', compact('platform','niche'));
    }

    public function updateplatformpost(Request $request, $id){
        $this->validate($request,[
            
            'followers' => 'required|numeric',
            'following' => 'required|numeric',
            'date' => 'required|string',
            'category' => 'required|string',
        ]);
        
        $platform = Platform::findorfail($id);
        
        $platform->followers = $request->input('followers');
        $platform->members = $request->input('following');
        $platform->startdate = $request->input('date');
        $platform->category = $request->input('category');
        
        $platform->save();

        return redirect()->action('App\Http\Controllers\User\PlatformController@updateplatform', $id)->with('message','Your platform has been updated!');
    }

    public function UpdateTwitterInsert(Request $request, $id){

    	//$updatetwitter = Platform::where('id', $platform_id)->update(['']);
    	$this->validate($request,[
			'username' => 'required',
			'followers' => 'required',
			'following' => 'required',
			'date' => 'required',
			'category' => 'required',
		]);

    	$Platforms = Platform::findorfail($id);

    	$Platforms->handle = $request->input('username');
		$Platforms->followers = $request->input('followers');
		$Platforms->members = $request->input('following');
		$Platforms->startdate = $request->input('date');
		$Platforms->category = $request->input('category');
		$Platforms->user_id = $request-> input('uid');
		$Platforms->platform = $request->input('platform');

		$Platforms->save();

    	

    	return redirect()->action('App\Http\Controllers\User\PlatformController@show')->with('message','Your twitter account has been Updated!');

    }

    public function destroy($id)
    	{
            
    		$platform = Platform::findorfail($id);
    		$platform->delete();
    		return redirect()->action('App\Http\Controllers\User\PlatformController@show')->with('message','You have successfully removed the platform!');

    	}

    	public function AddServices($id)
    	{
    		
    		$platform = Platform::findorfail($id);
    		$platformservices = PlatformService::where('platform_id', $id)->get();
    		$service = Service::get();
    		
    		return view('user.addservices', compact('platform','platformservices','service'));
    	}

    	public function AddServicesInsert(Request $request)
    	{
    		$this->validate($request,[
            'description' => 'required|string',
            'price' => 'required|numeric',
            'platform_id' => 'required|numeric',
            'post' => 'required|string',
            'freq' => 'required|numeric',
        ]);


		$Services = new PlatformService;

		$Services->platform_id = $request->input('platform_id');
		$Services->service = $request->input('post');
		$Services->description = $request->input('description');
		$Services->duration = $request->input('duration');
		$Services->frequency = $request->input('freq');
		$Services->price = $request-> input('price');
		

		$Services->save();

    	return redirect()->action('App\Http\Controllers\User\PlatformController@show')->with('message','Service has been added!');
    	}

        
}

