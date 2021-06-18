<?php

namespace App\Http\Controllers\Brands;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Transaction;
use Rave;

use Illuminate\Support\Facades\Redirect;

class WalletController extends Controller
{
    public function __construct() {
        $this->middleware('role:brand');
      }


      
  public function show() 
  {
  	$user = User::where('id', Auth::user()->id)->first();
    $wallet = Wallet::where('user_id', Auth::user()->id)->latest()->first();
    if ($wallet === null) {
      $transs = '';
    }else{
      $transs = $wallet->transaction()->latest()->first();
    }
    
    //$transs = Transaction::where('wallet_id', '3')->latest()->first();
  	
    return view('brands.wallet', compact('user', 'wallet', 'transs'));
  }


  public function deposit(Request $request)
  {
    $this->validate($request,[
      'amount' => 'required|min:4|numeric|',
    ]);

    if (Auth::user()->wallet === null ) {
      $wallet = new Wallet;
      $wallet->user_id = Auth::user()->id;
      $wallet->balance = '0';
      $wallet->currency = 'NGN';
      $wallet->save();
    }
    

    $prefix = config()->get('rave.prefix');
    $transactionPrefix = $prefix . '_';
    request()->request->add(['ref' => uniqid($transactionPrefix)]); 
    $wallet2 = Wallet::where('user_id', Auth::user()->id)->latest()->first();
    
    request()->request->add(['ref' => uniqid($transactionPrefix)]);


    
    $transaction = new Transaction;
    $transaction->wallet_id = $wallet2->id;
    $transaction->amount = $request->input('amount');
    $transaction->type = 'deposit';
    $transaction->currency = $request->input('currency');
    $transaction->comfirmed = 2;
    $transaction->ref = $request->input('ref');
    $transaction->user_id = Auth::user()->id;
    $transaction->desc= 'Deposit from card';
    $transaction->save();

    Rave::initialize(route('callback'));


    /*return redirect()->action('App\Http\Controllers\Brands\WalletController@show')->with('message','Your account has been updated!');*/
    }
  

  public function callback()
  {     

        $res_json = json_decode(request()->request->get('resp'));
        $txref = $res_json->tx->txRef;
        $data = Rave::verifyTransaction($txref);
        $chargeResponsecode = $data->data->chargecode;
        $uniqid = $data->data->txref;
        
        //$success = $data->status;&& ($success == "successful") 
        $chargeAmount = $data->data->amount;

        //dd($uniqid);

        $txn = Transaction::where('ref', $uniqid )->first();
        $amount = $txn->amount;
        
        $wallet2 = Wallet::where('user_id', Auth::user()->id)->latest()->first();


      if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount) )
     {

      $txn->update([
      'comfirmed' => '1',
      ]);

      $wallet = Wallet::updateOrCreate(
      ['user_id' => Auth::user()->id ] , ['balance' => $wallet2->balance + $amount, 'currency' => 'USD', ]);



    return redirect()->action('App\Http\Controllers\Brands\WalletController@show')->with('message','Your wallet has been successfully funded!');
      }else{
        
    return redirect()->action('App\Http\Controllers\Brands\WalletController@show')->with('message','Transaction fail! Try again');
    }
  }

}
