<?php

namespace App\Http\Controllers\Brands;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Campaign;
use App\Models\Proposal;
use App\Models\User;
use Image;
use App\Charts\UserChart;
use App\Charts\platformReach;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Rinvex\Subscriptions\Models\Plan;
use Rinvex\Subscriptions\Models\PlanFeature;
use Rinvex\Subscriptions\Models\PlanSubscription;
use Rinvex\Subscriptions\Models\PlanSubscriptionUsage;

class DashboardController extends Controller
{
    public function __construct() {
    $this->middleware(['role:brand','verified']);
  }


  public function index() {
  
  	//chartdata
  	$like = Proposal::whereMonth('created_at','=',Carbon::now()->month)->where('owner', Auth::user()->id)->sum('numberoflikes');
  	$like1 = Proposal::whereMonth('created_at','=',Carbon::now()->subMonth(1))->where('owner', Auth::user()->id)->sum('numberoflikes');
  	$like2 = Proposal::whereMonth('created_at','=',Carbon::now()->subMonth(2))->where('owner', Auth::user()->id)->sum('numberoflikes');
  	$like3 = Proposal::whereMonth('created_at','=', Carbon::now()->subMonth(3))->where('owner', Auth::user()->id)->sum('numberoflikes');
  	$like4 = Proposal::whereMonth('created_at','=', Carbon::now()->subMonth(4))->where('owner', Auth::user()->id)->sum('numberoflikes');
  	$like5 = Proposal::whereMonth('created_at','=', Carbon::now()->subMonth(5))->where('owner', Auth::user()->id)->sum('numberoflikes');
  	//clicks
  	$click = Proposal::whereMonth('created_at','=', Carbon::now()->month)->where('owner', Auth::user()->id)->sum('numberofclicks');
  	$click1 = Proposal::whereMonth('created_at','=',Carbon::now()->subMonth(1))->where('owner', Auth::user()->id)->sum('numberofclicks');
  	$click2 = Proposal::whereMonth('created_at','=',Carbon::now()->subMonth(2))->where('owner', Auth::user()->id)->sum('numberofclicks');
  	$click3 = Proposal::whereMonth('created_at','=',Carbon::now()->subMonth(3))->where('owner', Auth::user()->id)->sum('numberofclicks');
  	$click4 = Proposal::whereMonth('created_at','=',Carbon::now()->subMonth(4))->where('owner', Auth::user()->id)->sum('numberofclicks');
  	$click5 = Proposal::whereMonth('created_at','=',Carbon::now()->subMonth(5))->where('owner', Auth::user()->id)->sum('numberofclicks');

  	//share
  	$share = Proposal::whereMonth('created_at','=', Carbon::now()->month)->sum('retweets');
  	$share1 = Proposal::whereMonth('created_at','=',Carbon::now()->subMonth(1))->where('owner', Auth::user()->id)->sum('retweets');
  	$share2 = Proposal::whereMonth('created_at','=',Carbon::now()->subMonth(2))->where('owner', Auth::user()->id)->sum('retweets');
  	$share3 = Proposal::whereMonth('created_at','=',Carbon::now()->subMonth(3))->where('owner', Auth::user()->id)->sum('retweets');
  	$share4 = Proposal::whereMonth('created_at','=',Carbon::now()->subMonth(4))->where('owner', Auth::user()->id)->sum('retweets');
  	$share5 = Proposal::whereMonth('created_at','=',Carbon::now()->subMonth(5))->where('owner', Auth::user()->id)->sum('retweets');


    //instagram reach
    $insta = Proposal::whereMonth('created_at','=',Carbon::now()->month)->where('platform','Instagram')->where('owner', Auth::user()->id)->sum('numberofviews');
    $insta1 = Proposal::whereMonth('created_at','=',Carbon::now()->subMonth(1))->where('platform','Instagram')->where('owner', Auth::user()->id)->sum('numberofviews');
    $insta2 = Proposal::whereMonth('created_at','=',Carbon::now()->subMonth(2))->where('platform','Instagram')->where('owner', Auth::user()->id)->sum('numberofviews');
    $insta3 = Proposal::whereMonth('created_at','=', Carbon::now()->subMonth(3))->where('platform','Instagram')->where('owner', Auth::user()->id)->sum('numberofviews');
    $insta4 = Proposal::whereMonth('created_at','=', Carbon::now()->subMonth(4))->where('platform','Instagram')->where('owner', Auth::user()->id)->sum('numberofviews');
    $insta5 = Proposal::whereMonth('created_at','=', Carbon::now()->subMonth(5))->where('platform','Instagram')->where('owner', Auth::user()->id)->sum('numberofviews');

    //tictok reach
    $tic = Proposal::whereMonth('created_at','=',Carbon::now()->month)->where('platform','Tiktok')->where('owner', Auth::user()->id)->sum('numberofviews');
    $tic1 = Proposal::whereMonth('created_at','=',Carbon::now()->subMonth(1))->where('platform','Tiktok')->where('owner', Auth::user()->id)->sum('numberofviews');
    $tic2 = Proposal::whereMonth('created_at','=',Carbon::now()->subMonth(2))->where('platform','Tiktok')->where('owner', Auth::user()->id)->sum('numberofviews');
    $tic3 = Proposal::whereMonth('created_at','=', Carbon::now()->subMonth(3))->where('platform','Tiktok')->where('owner', Auth::user()->id)->sum('numberofviews');
    $tic4 = Proposal::whereMonth('created_at','=', Carbon::now()->subMonth(4))->where('platform','Tiktok')->where('owner', Auth::user()->id)->sum('numberofviews');
    $tic5 = Proposal::whereMonth('created_at','=', Carbon::now()->subMonth(5))->where('platform','Tiktok')->where('owner', Auth::user()->id)->sum('numberofviews');
    //twitter reach
    $twit = Proposal::whereMonth('created_at','=',Carbon::now()->month)->where('platform','Twitter')->where('owner', Auth::user()->id)->sum('numberofviews');
    $twit1 = Proposal::whereMonth('created_at','=',Carbon::now()->subMonth(1))->where('platform','Twitter')->where('owner', Auth::user()->id)->sum('numberofviews');
    $twit2 = Proposal::whereMonth('created_at','=',Carbon::now()->subMonth(2))->where('platform','Twitter')->where('owner', Auth::user()->id)->sum('numberofviews');
    $twit3 = Proposal::whereMonth('created_at','=', Carbon::now()->subMonth(3))->where('platform','Twitter')->where('owner', Auth::user()->id)->sum('numberofviews');
    $twit4 = Proposal::whereMonth('created_at','=', Carbon::now()->subMonth(4))->where('platform','Twitter')->where('owner', Auth::user()->id)->sum('numberofviews');
    $twit5 = Proposal::whereMonth('created_at','=', Carbon::now()->subMonth(5))->where('platform','Twitter')->where('owner', Auth::user()->id)->sum('numberofviews');



  	//Chart starts here

  $usersChart = new UserChart;
        $usersChart->labels([Carbon::now()->subMonth(5)->format('M Y'),
    					Carbon::now()->subMonth(4)->format('M Y'),
    					Carbon::now()->subMonth(3)->format('M Y'),
    					Carbon::now()->subMonth(2)->format('M Y'),
    					Carbon::now()->subMonth(1)->format('M Y'),
    					Carbon::now()->subMonth(0)->format('M Y'),
    					]);
        $usersChart->dataset('Likes', 'line', [$like5,$like4,$like3,$like2,$like1,$like])
            ->color("rgb(255, 50, 250)")
            ->backgroundcolor("rgb(0,255,0)");
        $usersChart->dataset('Clicks', 'line', [$click5,$click4,$click3,$click2,$click1,$click])
            ->color("rgb(255, 99, 132)")
            ->backgroundcolor("rgb(225,48,108)");
        $usersChart->dataset('Comments', 'line', [$share5, $share4, $share3, $share2,$share1,$share])
            ->color("rgb(255, 99, 132)")
            ->backgroundcolor("rgb(255,255,0)");



  $platformReach = new platformReach;
        $platformReach->labels([Carbon::now()->subMonth(5)->format('M Y'),
    					Carbon::now()->subMonth(4)->format('M Y'),
    					Carbon::now()->subMonth(3)->format('M Y'),
    					Carbon::now()->subMonth(2)->format('M Y'),
    					Carbon::now()->subMonth(1)->format('M Y'),
    					Carbon::now()->format('F Y')]);
        $platformReach->dataset('Instagram', 'line', [$insta5,$insta4,$insta3,$insta2, $insta1,$insta])
            ->color("rgb(29, 161, 242)")
            ->backgroundcolor("rgb(29, 161, 242)");
        $platformReach->dataset('Tiktok', 'line', [$tic5,$tic4,$tic3,$tic2,$tic1,$tic])
            ->color("rgb(0, 242, 234)")
            ->backgroundcolor("rgb(255, 0, 80)");
        $platformReach->dataset('Twitter', 'line', [$twit5,$twit4,$twit3,$twit2, $twit1,$twit])
            ->color("rgb(253,29,29)")
            ->backgroundcolor("rgb(225,48,108)");


  
  	$campaign = Campaign::where('user_id', Auth::user()->id)->orderby('id', 'desc')->get();

  	 $proposal = Proposal::all();
    
  	$postnumber = Proposal::whereMonth('created_at','=',Carbon::now()->month)->where('status','approved')->where('owner',Auth::user()->id)->count('link');
  	$impression = Proposal::whereMonth('created_at','=',Carbon::now()->month)->where('status','approved')->where('owner',Auth::user()->id)->sum('impressions');
  	$click = Proposal::whereMonth('created_at','=',Carbon::now()->month)->where('status','approved')->where('owner',Auth::user()->id)->sum('numberofclicks');


//plan and the likes
    $allplan = Plan::all();
        $monthly = $allplan->where('name','Monthly')->first();
        $quarterly = $allplan->where('name','Quarterly')->first();

        $checkvalidity = PlanSubscription::where('subscriber_id', Auth::user()->id)->first();

        if ($checkvalidity->plan_id == 3) {
            $planends = $checkvalidity->trial_ends_at;
            $active = 0;

        } elseif ($checkvalidity->plan_id == 2) {
            $planends = $checkvalidity->ends_at;
            $active = 1;
        } elseif ($checkvalidity->plan_id == 4){
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

        

    return view('brands.dashboard', compact('campaign','usersChart', 'platformReach', 'proposal','postnumber','impression','click','plan','planis', 'remainingdays'));
  }

}
