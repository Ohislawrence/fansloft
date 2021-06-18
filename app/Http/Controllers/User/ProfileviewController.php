<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Auth;
use Image;
use App\Models\PlatformService;
use App\Models\Campaign;
use App\Notifications\campaignInvite;
use Illuminate\Support\Facades\Notification;
use App\Models\ListName;

class ProfileviewController extends Controller
{
    public function index($brandname)
    {
        
    	
    	$user = User::where('brandname',$brandname)->first();
        if (empty($user->platform)) {
            
        } else {
            $platform = $user->platform;
        }
    
        
    	if ($user === null) {
    		return view('user.usernotfound');
    	} else {

            if(Auth::check()){
                $campaign = Campaign::where('user_id',Auth::user()->id)->where('status','approved')->orderby('id', 'desc')->get();
            }else{
                $campaign=0;
            }
            
        $listnames = ListName::where('user_id', Auth::user()->id)->get();    

    		return view('user.profileview', ['user'=> $user, 'platform' => $platform, 'campaign' => $campaign, 'listnames' => $listnames]);
    	}
    }

    public function invite($brandname,Request $request)
      {
        $thecamp = $request-> input('campaign_name');
        $note = $request-> input('mgs');
        $user = User::where('brandname',$brandname)->first();
        
        $user->notify(new campaignInvite(Auth::user()->id));
        //Notification::send($user2, new campaignInvite(Auth::user()->id));
        return redirect()->action('App\Http\Controllers\User\ProfileviewController@index',$brandname)->with('message','Invite sent!');
      }
}
