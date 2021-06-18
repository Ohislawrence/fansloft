<?php

namespace App\Http\Controllers\Brands;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Proposal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Charts\ImpressionstatChart;
use App\Charts\LikestatChart;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class CampaignstatController extends Controller
{
    public function __construct() {
        $this->middleware('role:brand');
      }


    public function index($id)
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

    	$campaign = Campaign::where('id', $id)->first();
    	$stats = $campaign->proposal->where('owner',Auth::user()->id);
    	//campaign time
        $data = $campaign->duration;
        $due = explode("-","$data");
        $due = $due[1];
        $start = substr($data,0,10);
        $today = Carbon::now()->format(' m/d/Y');

        //dataset
        $impress = $stats->where('status','approved')->sum('impressions');
        $reach = $stats->where('status','approved')->sum('numberofviews');
        $likes = $stats->where('status','approved')->sum('numberoflikes');
        $shares = $stats->where('status','approved')->sum('retweets');

        //chart data
        $ImpressionstatCharts = new ImpressionstatChart;
        $ImpressionstatCharts->minimalist(true);
        $ImpressionstatCharts->labels(['Impression', 'Reach']);
        $ImpressionstatCharts->dataset('Total Impression/Reach', 'doughnut', [$impress, $reach])
            ->color($borderColors)
            ->backgroundcolor($fillColors);


        //chart data likes
            $LikestatCharts= new LikestatChart;
            $LikestatCharts->minimalist(true);
        $LikestatCharts->labels(['Likes', 'Shares']);
        $LikestatCharts->dataset('Users by trimester', 'doughnut', [$likes, $shares])
            ->color($borderColors)
            ->backgroundcolor($fillColors);
        
    	return view('brands.campaignstats', compact('stats','campaign','due','start','ImpressionstatCharts','LikestatCharts','impress','likes','reach','shares'));
    }
}
