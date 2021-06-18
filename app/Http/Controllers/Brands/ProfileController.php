<?php


namespace App\Http\Controllers\Brands;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Image;
use App\Models\country;
use App\Models\Niche;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Http\Requests\profile;
use Rinvex\Subscriptions\Models\Plan;
use Rinvex\Subscriptions\Models\PlanFeature;
use Rinvex\Subscriptions\Models\PlanSubscription;
use Rinvex\Subscriptions\Models\PlanSubscriptionUsage;
use Rave;
use App\Models\Wallet;
use App\Models\Transaction;

class ProfileController extends Controller
{
    public function __construct() {
        $this->middleware('role:brand');
      }


    public function show() {
        $niche = Niche::all();
    	$user = Auth::user();
        $country = country::all();
        
        return view('brands.profile', compact('user','country','niche'));
    }

    public function update(profile $request)
    {	
        $validated = $request->validated();

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
		$User->bio = $request->input('bio');
		$User->url = $request->input('url');
		$User->country = $request->input('country');
		$User->state = $request->input('state');
		$User->address = $request-> input('Address');
		$User->maincategory = $request->input('maincategory');
		$User->morecategory = $request->input('morecategory');
		$User->brandname = $request->input('brandname');

		$User->save();

    	return redirect()->action('App\Http\Controllers\Brands\ProfileController@show')->with('message','Your account has been updated!');
    }

    public function account()
    {
        $allplan = Plan::all();
        $monthly = $allplan->where('name','Monthly')->first();
        $quarterly = $allplan->where('name','Quarterly')->first();

        $checkvalidity = PlanSubscription::where('subscriber_id', Auth::user()->id)->first();

        if ($checkvalidity->plan_id == 3) {
            $planends = $checkvalidity->trial_ends_at;
            $active = 0;
        } elseif ($checkvalidity->plan_id == 2 ) {
            $planends = $checkvalidity->ends_at;
            $active = 1;
        } elseif ($checkvalidity->plan_id == 4 ){
            $planends = $checkvalidity->ends_at;
            $active = 2;
            } 
         
        
        $now = Carbon::now()->toDateTimeString();

        $plan = $checkvalidity->plan->name;

        $price = $checkvalidity->plan->price;



        if ($planends->gt($now)) {
            $planis = 'is Active';
            $remainingdays = round((strtotime($planends) - strtotime($now))/86400);
            
        } else {
            $planis = 'has Expired';
            $remainingdays = '0';
            
        }
    
        return view('brands.account', compact('remainingdays','planis','plan','price','monthly','quarterly','active','checkvalidity'));
        }

    

    public function webhook()
    {
        $res_json = json_decode(request()->request->get('resp'));
        $txref = $res_json->tx->txRef;
        $data = Rave::verifyTransaction($txref);
        $chargeResponsecode = $data->data->chargecode;
        $uniqid = $data->data->txref;
        
        $chargeAmount = $data->data->amount;
        //dd($data);
        $txn = Transaction::where('ref', $uniqid )->first();
        $amount = $txn->amount;
        
        $subplan = $data->data->paymentplan;
        $sub_id = PlanSubscription::where('subscriber_id', Auth::user()->id)->first();
        $sub_id = $sub_id->id;

        if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount) )

            {
                $txn->update([
                'comfirmed' => '1',
                ]);


                if ($subplan == '10744' ) 
                {
                    $plan = app('rinvex.subscriptions.plan')->find(2);
                    $subscription = app('rinvex.subscriptions.plan_subscription')->find($sub_id);
                    //dd($sub_id);
                    // Change subscription plan
                    $subscription->changePlan($plan);

                return redirect()->action('App\Http\Controllers\Brands\ProfileController@account')->with('message','Your monthly subscription is now active.');

                } 
                if ($subplan == '10745') 
                {
                    $plan = app('rinvex.subscriptions.plan')->find(4);
                    $subscription = app('rinvex.subscriptions.plan_subscription')->find($sub_id);
                    // Change subscription plan
                    
                    $subscription->changePlan($plan);

                    return redirect()->action('App\Http\Controllers\Brands\ProfileController@account')->with('message','Your quarterly subscription is now active');
                }
            
            }
            else
            {
               return redirect()->action('App\Http\Controllers\Brands\ProfileController@account')->with('message','Your subscription was not successful, please try again or contact the Fansloft support.'); 
            }
        } 
         




    public function paysub(Request $request)
    {
        //This generates a payment reference
        //$reference = Rave::generateReference();


    $prefix = config()->get('rave.prefix');
    $transactionPrefix = $prefix . '_';
    request()->request->add(['ref' => uniqid($transactionPrefix)]); 
    //$wallet2 = Wallet::where('user_id', Auth::user()->id)->latest()->first();
    
    request()->request->add(['ref' => uniqid($transactionPrefix)]);


    
    $transaction = new Transaction;
    $transaction->wallet_id = 0;
    $transaction->amount = $request->input('amount');
    $transaction->commission = $request->input('amount');
    $transaction->type = $request->input('plan');
    $transaction->currency = $request->input('currency');
    $transaction->comfirmed = 2;
    $transaction->ref = $request->input('ref');
    $transaction->user_id = Auth::user()->id;
    $transaction->desc= 'Deposit from card';
    $transaction->save();

    Rave::initialize(route('webhookplan'));

    }

    
}
