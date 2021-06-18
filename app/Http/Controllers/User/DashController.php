<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;
use App\Models\Campaign;
use App\Models\proposal;
use App\Models\Transaction;
use App\Models\Platform;
use Image;
use App\Charts\PlatformFollowers;
use App\Charts\OpenTask;

class DashController extends Controller
{
    public function __construct() {
    $this->middleware(['role:creator','verified']);
  }

  public function show()
  {
  	$borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];
        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"

        ];
        $instagram = Platform::where('platform','Instagram')->where('user_id', Auth::user()->id)->sum('followers');
        $tiktok = Platform::where('platform','Tiktok')->where('user_id', Auth::user()->id)->sum('followers');
        $twitter = Platform::where('platform','Twitter')->where('user_id', Auth::user()->id)->sum('followers');


        $total = $instagram + $tiktok + $twitter ;

        if ($total > 0) {
          
          $instagram1 = round(($instagram/$total)*100);
          $tiktok1 = round(($tiktok/$total)*100);
          $twitter1 = round(($twitter/$total)*100);
        }else{
          $instagram1 = 0;
          $tiktok1 = 0;
          $twitter1 = 0;
        }
        
        //piechart 1
  	$PlatformFollowers = new PlatformFollowers;
  		$PlatformFollowers->minimalist(true);
  		$PlatformFollowers->labels(['Twitter %','Tiktok %','Instagram %']);
  		$PlatformFollowers->dataset('Followers','doughnut',[$twitter1,$tiktok1,$instagram1])->color($borderColors)->backgroundcolor($fillColors);

  	//piechart2
  		$ct1 = Proposal::whereMonth('created_at','=',Carbon::now()->month)->where('status','completed')->where('user_id',Auth::user()->id)->count('status');
  		$ot1 = Proposal::whereMonth('created_at','=',Carbon::now()->month)->where('status','approved')->where('user_id',Auth::user()->id)->count('status');

  		$avgall = $ct1 + $ot1;

  		if ($avgall == 0) {
  			$ct = 0;
  			$ot = 0;
  		} else {
  		$ct = round(($ct1/$avgall)*100);
  		$ot = round(($ot1/$avgall)*100);
  		}
  		
  		

  		$OpenTask = new OpenTask;
  		$OpenTask->minimalist(true);
  		$OpenTask->labels(['Competed Task %','Ongoing Task %']);
  		$OpenTask->dataset('Followers','doughnut',[$ct,$ot])->color($borderColors)->backgroundcolor($fillColors);




  	//top stats
  	$earningthismonth = Proposal::whereMonth('created_at','=',Carbon::now()->month)->where('status','completed')->where('user_id',Auth::user()->id)->sum('bid');
  	$earninglastmonth = Proposal::whereMonth('created_at','=',Carbon::now()->subMonth(1))->where('status','completed')->where('user_id',Auth::user()->id)->sum('bid');
  	$opentaskthismonth = Proposal::whereMonth('created_at','=',Carbon::now()->month)->where('status','approved')->where('user_id',Auth::user()->id)->count('bid');

  	$taskthismonth = Proposal::whereMonth('created_at','=',Carbon::now()->month)->where('status','approved')->where('user_id',Auth::user()->id)->get();
  	


  	return view('user.dashboard2',compact('earningthismonth','earninglastmonth','opentaskthismonth','PlatformFollowers','taskthismonth','OpenTask'));
  }

}
