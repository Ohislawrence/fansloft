<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Notification;
use App\Notifications\messageNotification;
use Auth;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  


    public function notify()
    {
        return view('user.notification');
    }


    public function destroy($id)
    {
    	
    	Auth::user()->notifications()->where('id', $id)->delete();
    	return redirect()->action('App\Http\Controllers\NotificationController@notify')->with('message','Notification has been deleted');
    }
}
