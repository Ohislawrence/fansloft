<?php

namespace App\Http\Controllers\Brands;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Campaign;
use App\Models\Niche;
use App\Models\User;
use App\Models\Proposal;
use App\Models\country;
use App\Models\Wallet;
use App\Models\Message;
use App\Models\Service;
use App\Models\Transaction;
use App\Notifications\ProposalNotice;
use DB;
use Image;
use App\Notifications\ProposalReceived;
use App\Http\Requests\CampaignPostRequest;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Str;
use Rinvex\Subscriptions\Models\Plan;
use Rinvex\Subscriptions\Models\PlanSubscription;


class CampaignController extends Controller
{


    public function __construct() {
        $this->middleware('role:brand');
      }

      
      public function show(Request $request)
      {
        $uid = Auth::User()->id;
        $privacy = DB::table('campaigns')->select('hashtag')->distinct()->get()->pluck('hashtag')->sort();
        $platform = DB::table('campaigns')->select('qualification')->distinct()->get()->pluck('qualification')->sort();
        $status = DB::table('campaigns')->select('status')->distinct()->get()->pluck('status')->sort();

        $campaign = Campaign::query()->where('user_id', Auth::user()->id)->orderBy('id','DESC');

        if ($request->filled('hashtag')) {
            $campaign->where('hashtag', $request->hashtag);
        }
        
        if ($request->filled('qualification')) {
            $campaign->where('qualification', $request->qualification);
        }

        if ($request->filled('status')) {
            $campaign->where('status', $request->status);
        }

        //sub check
        $checkvalidity = PlanSubscription::where('subscriber_id', Auth::user()->id)->first();


    if ($checkvalidity->plan_id == 3) 
    {
            $planends = $checkvalidity->trial_ends_at;
        } 
        else
        {
            $planends = $checkvalidity->ends_at;
        } 
       
        $now = Carbon::now()->toDateTimeString();

        if ($planends->gt($now)) {
            $planis = 1;
            
        } else {
            $planis = 0;
         }

      	return view('brands.campaign', ['campaign'=>$campaign->paginate(9), 'privacy' =>$privacy, 'platform' => $platform, 'status' => $status,'planis' => $planis]);
      }


      public function viewCampaign($id, $amount)
      {
        

        $campaign = Campaign::findorfail($id);
        $proposal = Proposal::where('campaign_id',$id)->get();
        //$prop = $proposal::where('status','approved')->count();
        $camp = $campaign->get();

        //campaign time
        $data = $campaign->duration;
        $due = explode("-","$data");
        $due = $due[1];
        $start = substr($data,0,10);
        $today = Carbon::now()->format(' m/d/Y');
        

        if($campaign->user_id == auth()->id()){
      return view('brands.viewcampaign', compact('campaign','proposal','camp','today','due'))->with('message','You have approved on creator!');
        }else{
        return view('noaccess');
        }
        
      }


      public function TwitterPost()
      {
        $niches = Niche::all();
        $country = country::all();
        $interest = Niche::get();
        $services = Service::all();

        //check sub
        $checkvalidity = PlanSubscription::where('subscriber_id', Auth::user()->id)->first();


    if ($checkvalidity->plan_id == 3) 
    {
            $planends = $checkvalidity->trial_ends_at;
        } 
        else
        {
            $planends = $checkvalidity->ends_at;
        } 
       
        $now = Carbon::now()->toDateTimeString();

        if ($planends->gt($now)) {
            $planis = 1;
            
        } else {
            $planis = 0;
         }

        return view('brands.campaignnew', ['niches' => $niches , 'country' => $country, 'interest' => $interest, 'services' => $services,'planis' => $planis]);
      }

      public function viewActions($id)
      {
        $proposal = Proposal::findorfail($id);
        $wallet = Wallet::where('user_id', Auth::user()->id)->first();
        
        $services = Service::all();


        

        if($proposal->campaign->user_id == auth()->id()){
      return view('brands.proposalview', ['proposal' => $proposal, 'services' => $services]);
        }else{
        return view('noaccess');
        }

        
      }


      public function viewProposal($id, Request $request)
      {
        $proposal = Proposal::findorfail($id);
        $wallet = Wallet::where('user_id', Auth::user()->id)->first();
        

      if ($request->has('send')) 
      {
        $mgs = new Message;
        $mgs->topic = $proposal->campaign->campaign_name;
        $mgs->message = $request->input('kt-ckeditor-5');
        $mgs->to_user = $proposal->user->id;
        $mgs->from_user = Auth::user()->id;
        $mgs->proposal_id = $proposal->id;
        //$mgs->file = $request->input('');

        $mgs->save();
        $user = User::findorfail($proposal->user->id); 
          $user->notify(new ProposalReceived(Auth::user()));
      }

      if ($request->has('submit')) 
      {
  
          if ($wallet->balance > $proposal->bid) {

            $wallet = Wallet::updateOrCreate(
      ['user_id' => Auth::user()->id ] , ['balance' => $wallet->balance - $proposal->bid, 'currency' => 'USD', ]
    );
            $transaction = new Transaction;
            $transaction->wallet_id = $wallet->id;
            $transaction->amount = $proposal->bid;
            $transaction->type = 'payment';
            $transaction->currency = 'NGN';
            $transaction->comfirmed = 1;
            $transaction->user_id = Auth::user()->id;
            $transaction->desc = 'Payment for campaign';
            $transaction->proposal_id = $proposal->id;
            $transaction->save();

            $pending = $proposal->bid * 0.8 ;
            $commission = $proposal->bid - $pending ;
            $p_balance = $wallet->pending_balance + $pending ;
            $wallet3 = Wallet::where('user_id', $proposal->user_id)->first();
           $wallet2 = Wallet::updateOrCreate(
      ['user_id' => $proposal->user_id ] , ['pending_balance' => $wallet3->pending_balance + $pending , 'currency' => 'USD', ]
    );
            $transaction = new Transaction;
            $transaction->wallet_id = $wallet2->id;
            $transaction->amount = $pending;
            $transaction->type = 'pending_payment';
            $transaction->currency = 'NGN';
            $transaction->comfirmed = 1;
            $transaction->user_id = $proposal->user_id;
            $transaction->desc = 'Payment for '.$proposal->campaign->campaign_name;
            $transaction->commission = $commission;
            $transaction->proposal_id = $proposal->id;
            $transaction->save();
     


          $proposal->status = 'approved';
          $proposal->save();


          $user = User::findorfail($proposal->user_id); 
          $user->notify(new ProposalReceived(Auth::user()));

          return view('brands.proposalview', ['proposal' => $proposal])->with('message','You have approved this creator, the bid amount has been moved to your active balance!');

          } else {
            return view('brands.proposalview', ['proposal' => $proposal])->with('message','Your wallet balance is less than the creator bid, fund your wallet before you approve!');
          }
          

          
        }else {
        return redirect()->action('App\Http\Controllers\Brands\CampaignController@viewActions',$id)->with('message','Sent!');
      }
    }


      public function TwitterPostInsert(CampaignPostRequest $request)
      {
        $validated = $request->validated();


        if($request->hasFile('image'))
      {
      $image = $request->file('image');

      foreach ($image as $imagefile) {
            $filename = time() . uniqid() . '.' . $imagefile->getClientOriginalExtension();

            Image::make($imagefile)->save( public_path('uploads/campaign/' . $filename ));
            $images[] = $filename;
            
            }
            
        }


      $uid = Auth::User()->id;

    $Campaigns = new Campaign;

    
   
    //$interestss = $request->input('interest');
    //1st page
    $Campaigns->user_id = $uid;
    $Campaigns->media = json_encode($images);
    $Campaigns->campaign_name = $request->input('campaign_name');
    $Campaigns->desc = $request->input('desc');
    $Campaigns->link = $request->input('url');
    $Campaigns->niche = $request->input('category');
    $Campaigns->hashtag = $request->input('privacy');
    $Campaigns->interests = json_encode($request->input('interest'));
    $Campaigns->amount = Str::slug($Campaigns->campaign_name);
    


    //2nd page
    $Campaigns->cta = $request->input('cta');
    $Campaigns->details = $request->input('details');
    $Campaigns->isproduct = $request->input('isproduct');
    $Campaigns->tags = $request-> input('tags');
    $Campaigns->quotes = $request-> input('quotes');

    //3rd page
    $Campaigns->qualification = $request->input('platform');
    $Campaigns->service = $request->input('service');
    $Campaigns->gender = $request->input('gender');
    $Campaigns->age = $request->input('age');
    $Campaigns->country = $request->input('country');
    $Campaigns->minfollowers = $request->input('minfollowers');
    //$Campaigns->interests = $request->input('interest');

    //4th page
    $Campaigns->budget = $request->input('budget');
    $Campaigns->duration = $request->input('duration');
    $Campaigns->frequency = $request->input('freq');
    $Campaigns->status = 'Pending Review';
    

    $Campaigns->save();

      return redirect()->action('App\Http\Controllers\Brands\CampaignController@show')->with('message','Congratulation! Your campaign has been created, it will be approved shortly.');
      }


      public function allProposal($id)
      {
        $campaign = Campaign::findorfail($id);
        $proposal = Proposal::where('campaign_id',$campaign->id)->orderBy('id', 'DESC')->get();
        return view('brands.proposals', compact('proposal','campaign'));
      }

      public function destroy($id)
      {
        $campaign = Campaign::findorfail($id);
        $campaign->delete();

        return redirect()->action('App\Http\Controllers\Brands\CampaignController@show')->with('message','Your chosen campaign has been deleted!');
      }

      public function updatecampaign()
      {
        return view('brands.updatecampaign');
      }
      
}
