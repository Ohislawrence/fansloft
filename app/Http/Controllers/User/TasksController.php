<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Campaign;
use App\Models\proposal;
use App\Models\User;
use Image;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class TasksController extends Controller
{
    public function __construct() {
    $this->middleware('role:creator');
  }

  public function show()
    {
        $proposal = Proposal::where('status', 'approved');
    	$task = Proposal::where('status', 'approved')->where('user_id', Auth::user()->id)->orderby('id', 'desc')->paginate(9);



        $today = Carbon::now()->format(' m/d/Y');

    	 		
    	return view('user.taskview',['task'=> $task, 'today' => $today]);
    }

    public function update($id)
    {
    	$task = Proposal::findorfail($id);
    	 //Proposal::where('user_id', Auth::user()->id)->orderby('id', 'desc')->get();
        if($task->user_id == auth()->id()){
    	return view('user.taskupdate',['task'=> $task]);
        }else{
        return view('noaccess');
        }
    }

    public function updateNow($id, Request $request)
    {
    
    	$task = Proposal::findorfail($id);
    if ($request->has('updatedate')) {
    	 if($request->hasFile('powfile'))
    	{
    	$powfile = $request->file('powfile');
            $filename = time() . '.' . $powfile->getClientOriginalExtension();
            Image::make($powfile)->save( public_path('uploads/proveofwork/' . $filename ) );
        $task->powfile = $filename;
        }
    	
    	//$uid = Auth::user()->id;
		//$User = User::findorfail($uid); ->resize(300, 300)
    
		$task->numberofclicks = $request->input('numberofclicks');
		$task->numberofviews = $request->input('numberofviews');
		$task->numberoflikes = $request->input('numberoflikes');
        $task->retweets = $request->input('retweets');
		$task->impressions = $request->input('impressions');
		$task->link = $request->input('link');
		

		$task->save();
	}

		if ($request->has('taskdone')) {
    	$task->is_complete = '1';
        $task->status = 'completed';
    	$task->save();
		}

    	return redirect()->action('App\Http\Controllers\User\TasksController@update',$id)->with('message','Your task has been updated!');
    }
}
