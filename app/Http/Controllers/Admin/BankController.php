<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Wallet;
use App\Models\Proposal;
use Auth;

class BankController extends Controller
{
    public function __construct() {
    $this->middleware('role:admin');
    }


    public function transactions()
    {
    	$transaction = Transaction::orderBy('id', 'DESC')->get(); 
    	return view('admin.bank.transactions', compact('transaction'));
    }

    public function withdrawalrequest()
    {
    	
    	$transaction = Transaction::where('type','payment_request')->orderBy('id', 'DESC')->get();
    	return view('admin.bank.withdrawalrequest', compact('transaction'));
    }

    public function withdrawaledit($id, Request $request)
    {
    	$transaction = Transaction::findorfail($id);

    	
    	return view('admin.bank.withdrawaledit', compact('transaction'));

    }

    public function withdrawaleditpost($id, Request $request)
    	{
    		if ($request->input('type') == 'paid') {
    			
    		$transaction = Transaction::findorfail($id);

    	$wallet2 = Wallet::where('user_id',$transaction->user_id)->first();
    	$amount= $request->input('amount');

    	$newbalance = $wallet2->balance + $amount;

    	$pbalance = $wallet2->pending_balance - $amount;

    	$wallet = Wallet::updateOrCreate(
      ['user_id' => $transaction->user_id ] , ['balance' => $newbalance , 'currency' => 'NGN', 'pending_balance' => $pbalance ]);

    	$transaction->update([
      'type' => 'paid',
      ]);

    	return redirect()->action('App\Http\Controllers\Admin\BankController@withdrawaledit',$id)->with('message','withdrawal request fulfilled!');
    		}else{
    			return redirect()->action('App\Http\Controllers\Admin\BankController@withdrawaledit',$id)->with('message','Transaction unchange');
    		}

    	}

    	public function taskcompletepay()
    	{
    		$proposal = Proposal::all();
    		
    		//dd($proposal->user_id);
    		
    		$transaction = Transaction::where('ref','proposal-26')->orderBy('id', 'DESC')->get();

    		//dd($proposal->transaction);

    		return view('admin.bank.taskcompletepay',compact('transaction','proposal'));
    	}
}
