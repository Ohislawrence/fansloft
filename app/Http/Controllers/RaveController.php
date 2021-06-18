<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rave;
use App\Models\User;
use App\Models\Wallet;
use Auth;

class RaveController extends Controller
{
    public function initialize()
  {
  	
    Rave::initialize(route('callback'));

  }

  public function callback(Request $request)
  {

        $resp = $request->resp;
        $body = json_decode($resp, true);
        $txRef = $body['data']['data']['txRef'];
        $data = Rave::verifyTransaction($txRef);
        dd($data);

    return redirect()->action('App\Http\Controllers\Brands\WalletController@show')->with('message','Your wallet has been funded!');

    

  }




}
