<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PlatformService;
use App\Models\Service;
use Auth;

class ServiceController extends Controller
{
	public function __construct() {
        $this->middleware('role:creator');
      }


    public function AddServicesInsert(Request $request, $id)
    
    	{
    		

    		$this->validate($request,[
            'description' => 'required|string',
            'price' => 'required|numeric',
            'platform_id' => 'required|numeric',
            'service' => 'required|string',
            //'freq' => 'required|numeric',
        ]);

    		$Services = new PlatformService;

		$Services->platform_id = $request->input('platform_id');
		$Services->service = $request->input('service');
		$Services->description = $request->input('description');
		//$Services->duration = $request->input('duration');
		$Services->frequency = '1';
		$Services->price = $request-> input('price');
		
		$Services->save();

    	return redirect()->action('App\Http\Controllers\User\PlatformController@AddServices', $id)->with('message','Your service has been added!');
    }

    public function destroy($id, Request $request)
        {

            $serviceform = PlatformService::find($request->input('theid'));
            $serviceform->delete();

            return redirect()->action('App\Http\Controllers\User\PlatformController@AddServices', $id)->with('message','You have successfully removed the service!');

        }
}
