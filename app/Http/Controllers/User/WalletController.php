<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Wallet;
use App\Models\Transaction;
use App\Models\User;


class WalletController extends Controller
{
    public function __construct() {
    $this->middleware('role:creator');
  }
  
  public function show() 
  {
  	$user = User::where('id', Auth::user()->id)->first();
    $wallet = Wallet::where('user_id', Auth::user()->id)->latest()->first();
    
      //$transs = $wallet->transaction()->latest()->first();
    
  	//$txn = Wallet::where('user_id', Auth::user()->id)->get();

    return view('user.wallet', compact('user','wallet'));
  }

  public function AddAmount(Request $request){
    	
		$this->validate($request,[
			'amount' => 'required|numeric',
		]);
        
  
    
		$user = User::where('id', Auth::user()->id)->first();
		$wallet1 = Wallet::where('user_id', Auth::user()->id )->first();

    if (empty($wallet1->balance)) {
      $bal1 = 0;
    } else {
      $bal1 = $wallet1->balance;
    }
    
    if (empty($wallet1->balance2)) {
      $bal2 = 0;
    } else {
      $bal2 = $wallet1->balance2;
    }

		$request1 = $request->input('amount');
    $NewBal = $bal1 - $request1 ;
    $SecBal = $bal2 + $request1;

    if ($wallet1->balance >= $request1 ) {
      $wallet = Wallet::updateOrCreate(
      ['user_id' => Auth::user()->id ] ,['balance2' => $SecBal, 'balance' => $NewBal,'currency' => 'NGN', ]);
      //dd($SecBal);

    $transaction = new Transaction;
    $transaction->wallet_id = $wallet1->id;
    $transaction->amount = $request1;
    $transaction->type = 'payment_request';
    $transaction->currency = 'NGN';
    $transaction->desc = 'Request payment from main balance';
    $transaction->user_id = Auth::user()->id;
    $transaction->comfirmed = 1;
    $transaction->save();

      return redirect()->action('App\Http\Controllers\User\WalletController@show')->with('message','Your request has been received!');
    } else {
      return redirect()->action('App\Http\Controllers\User\WalletController@show')->with('message','Sorry, you do not have up to the requested amount in your main balance!');    }

		
    }

}
