<?php

namespace App\Http\Controllers\Brands;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Platform;
use App\Models\Campaign;
use DB;
use Auth;
use App\Notifications\NewMessage;
use Illuminate\Support\Facades\Notification;
use App\Models\ListName;
use App\Models\ListMember;
use App\Models\Niche;




class InfluencersController extends Controller
{
    public function __construct() {
        $this->middleware('role:brand');
      }

     
       
 public function show(Request $request)
      {
        $location = DB::table('users')->select('country')->distinct()->get()->pluck('country')->sort();
        $gender = DB::table('users')->select('gender')->distinct()->get()->pluck('gender')->sort();
        $category = DB::table('users')->select('maincategory')->distinct()->get()->pluck('maincategory')->sort();

        $users = USER::query()->where('role','creator')->whereNotNull('bio')->with('platform');
        //$userr = User::where('role','user')->with('platform')->get() ;
        $campaign = Campaign::where('user_id', Auth::user()->id)->orderby('id', 'desc')->where('status','approved')->get();

        if ($request->filled('country')) {
            $users->where('country', $request->country);
        }
        
        if ($request->filled('gender')) {
            $users->where('gender', $request->gender);
        }

        if ($request->filled('maincategory')) {
            $users->where('maincategory', $request->maincategory);
        }

        $listnames = ListName::where('user_id', Auth::user()->id)->get();
    return view('brands.influencers',['users' =>$users->paginate(10), 'location' => $location, 'gender' => $gender, 'category' => $category, 'campaign' => $campaign, 'listnames' => $listnames]);
      }

      
      public function store(Request $request)
      {
        return $request->all();
        return view('brands.influencers');
      }


      public function mylist()
      {
        $listnames = ListName::orderBy('id','DESC')->where('user_id', Auth::user()->id)->get();
        $campaign = Campaign::where('user_id', Auth::user()->id)->orderby('id', 'DESC')->get();
        

        return view('brands.mylist',compact('listnames','campaign'));
      }

      public function mylistpost(Request $request)
      {
        $this->validate($request,[
      'listname' => 'required|min:4',
    ]);
        $list = new ListName;
        $list->listname = $request->listname;
        $list->user_id = $request->user_id;
        $list->save();

    return redirect()->action('App\Http\Controllers\Brands\InfluencersController@mylist')->with('message','Congratulation! Your list has been created.');
      }



      public function myinfluencers($id)
      {
        $listnames = ListName::findorfail($id);
        //$list55 = ListName::where('user_id', Auth::user()->id)->first();
        //$listsmembers = ListMember::findorfail($id);
       
        return view('brands.myinfluencers', ['listnames' => $listnames]);
      }

      
      public function myinfluencerspost(Request $request)
      {
        //ListMember::create(['uid' => $request->uid,'listname' =>$request->listname,]);
        
        $listmember = new ListMember;
        $listmember->list_id = $request->input('listname');
        $listmember->user_id = $request->input('uid');

        $listmember->save();

        //return response()->json(['success'=>'Added new records.']);

        return redirect()->back()->with('message','The influencer has been added to your list.');
      }
    

}
