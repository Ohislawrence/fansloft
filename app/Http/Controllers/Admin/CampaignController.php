<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Platform;
use App\Models\country;
use App\Models\Niche;
use App\Models\Service;
use App\Models\Campaign;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Auth;
use Image;


class CampaignController extends Controller
{
	public function __construct() {
    $this->middleware('role:admin');
    }

    public function show()
    {
    	$campaign = Campaign::orderby('id', 'desc')->paginate(20);
    	return view('admin.campaign', compact('campaign'));
    }

    public function edit($id)
    {

    	$campaign = Campaign::findorfail($id);
    	$niches = Niche::all();
    	$interest = Niche::all();
    	$country = country::all();
    	$services = Service::all();
    	$datathis = json_decode($campaign->interests);
    	return view('admin.editcampaign', compact('campaign','niches','interest','country','datathis','services'));
    }

    public function viewcampaign($id)
    {
    	$campaign = Campaign::findorfail($id);
    	return view('admin.viewcampaign', compact('campaign'));
    }


    public function postedit($id, Request $request)
    {
    	//$validated = $request->validated();

    	$Campaigns = Campaign::findorfail($id);
    	


        //if($request->hasFile('image'))
      //{
      //$image = $request->file('image');
            //$filename = time() . '.' . $image->getClientOriginalExtension();
            //Image::make($image)->resize(300, 300)->save( public_path('uploads/campaign/' . $filename ) );
       // }

      $uid = $Campaigns->user->id;

    

    //if($request->hasFile('image'))
      //{
        //$Campaigns->media = $filename;
      //}

    //$interestss = $request->input('interest');
    //1st page
    $Campaigns->user_id = $uid;
    $Campaigns->campaign_name = $request->input('campaign_name');
    $Campaigns->desc = $request->input('desc');
    $Campaigns->link = $request->input('url');
    $Campaigns->niche = $request->input('category');
    $Campaigns->interests = json_encode($request->input('interest'));
    //$Campaigns->ads_text = explode(", ", $request->input('interest'));

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
    $Campaigns->status = $request->input('status');
    

    $Campaigns->save();

    return redirect()->action('App\Http\Controllers\Admin\CampaignController@edit', $id)->with('message','This campaign has been updated!');
    }
}
