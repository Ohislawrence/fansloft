<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Models\Campaign;
use App\Models\Proposal;
use App\Models\Message;
use App\Models\User;
use App\Models\Platform;
use App\Notifications\ProposalNotice;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class DashboardController extends Controller
{
    public function __construct() {
    $this->middleware('role:creator');
  }

  public function index(Request $request) 
  {
    $category = DB::table('campaigns')->select('niche')->distinct()->get()->pluck('niche')->sort();

    $platform = DB::table('campaigns')->select('qualification')->distinct()->get()->pluck('qualification')->sort();

    $campaign = Campaign::query()->orderby('id', 'desc')->where('hashtag',null)->where('status','approved');

    if ($request->filled('niche')) 
    {
      $campaign->where('niche', $request->niche);
    }

    if ($request->filled('qualification')) 
    {
      $campaign->where('qualification', $request->qualification);
    }
    
    return view('user.dashboard', ['campaign'=>$campaign->paginate(9), 'category'=>$category, 'platform'=>$platform]);
  }


  public function show($id, $amount)
      {

        $campaign = Campaign::findorfail($id);
        $platform = Platform::where('user_id', Auth::user()->id)->get();

        $data = $campaign->duration;
        $due = explode("-","$data");
        $due = $due[1];
        $start = substr($data,0,10);
        $today = Carbon::now()->format(' m/d/Y');
        
      	return view('user.proposal', compact('campaign','platform','today','due'));
      }

    public function sendProposal($id, Request $request){
    	
		$this->validate($request,[
			'bid' => 'required',
			'proposal' => 'required',
			'duration' => 'required',
		]);
        
    $campaign = Campaign::findorfail($id);


    
		$Proposal = new Proposal;

		$Proposal->bid = $request->input('bid');
		$Proposal->proposal = $request->input('proposal');
		$Proposal->duration = $request->input('duration');
		$Proposal->proposalfile = $request->input('proposalfile');
		$Proposal->campaign_id = $request->input('campaign_id');
		$Proposal->user_id = $request->input('user_id');
    $Proposal->status = 'pending';
    $Proposal->owner = $campaign->user_id;
    $Proposal->platform = $request->input('platform');
		

		$Proposal->save();

    	return redirect()->action('App\Http\Controllers\User\DashboardController@index')->with('message','Your proposal has been sent!');
    }

    public function showProposal(Request $request)
    {
      $status = DB::table('proposals')->select('status')->distinct()->get()->pluck('status')->sort();

    	//$vproposal = Proposal::where('user_id', Auth::user()->id)->orderby('id', 'desc')->paginate(8);
      $vproposal = Proposal::query()->orderby('id', 'desc')->where('user_id', Auth::user()->id);

      if ($request->filled('status')) 
    {
      $vproposal->where('status', $request->status);
    }

    	return view('user.proposalview',['vproposal'=> $vproposal->paginate(8), 'status' => $status ]);
    }


    public function myProposal($id)
    {
    	$myproposal = Proposal::find($id);
    

    	return view('user.singleproposal', compact('myproposal'));
    }

    public function myProposalMgs($id, Request $request)
    {
      $proposal = Proposal::findorfail($id);

      if ($request->has('send')) 
      {
        $mgs = new Message;
        $mgs->topic = $proposal->campaign->campaign_name;
        $mgs->message = $request->input('kt-ckeditor-5');
        $mgs->to_user = $proposal->campaign->user->id;
        $mgs->from_user = Auth::user()->id;
        $mgs->proposal_id = $proposal->id;
        //$mgs->file = $request->input('');

        $mgs->save();

        $user = User::findorfail($proposal->campaign->user->id); 
          $user->notify(new ProposalNotice(Auth::user()));
      }
      return redirect()->action('App\Http\Controllers\User\DashboardController@myProposal',$id)->with('message','Your message has been sent!');
    }



}
