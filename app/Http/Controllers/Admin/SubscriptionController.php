<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class SubscriptionController extends Controller
{
    public function __construct() {
    $this->middleware('role:admin');
    }

    public function index()
    {
    	$monthly = app('rinvex.subscriptions.plan')->get();
    	return view('admin.subscription.subscription',compact('monthly'));
    }


    public function createplan()
    {
    		
    
    return view('admin.subscription.createplan');
    }


    public function createplanpost(Request $request)
    {
    	$monthly = app('rinvex.subscriptions.plan')->create([
		    'name' => $request->input('name'),
		    'description' => $request->input('description'),
		    'price' => $request->input('price'),
		    'signup_fee' => $request->input('signup_fee'),
		    'invoice_period' => $request->input('invoice_period'),
		    'invoice_interval' => 'month',
		    'trial_period' => $request->input('trial_period'),
		    'trial_interval' => 'day',
		    'sort_order' => $request->input('sort_order'),
		    'currency' => $request->input('currency'),
		    'is_active' => $request->input('is_active'),
		]);

	return redirect()->action('App\Http\Controllers\Admin\SubscriptionController@createplan')->with('message','Subscription created successfully!');

    }

    public function editplanview($id,Request $request)
    {
    	$plan = app('rinvex.subscriptions.plan')->find($id);
    	return view('admin.subscription.editplan', compact('plan'));
    }


    public function editplan($id,Request $request)
    {
    	$monthly = app('rinvex.subscriptions.plan')->find($id);
    	$monthly->update([
		    'name' => $request->input('name'),
		    'description' => $request->input('description'),
		    'price' => $request->input('price'),
		    'signup_fee' => $request->input('signup_fee'),
		    'invoice_period' => $request->input('invoice_period'),
		    'invoice_interval' => 'month',
		    'trial_period' => $request->input('trial_period'),
		    'trial_interval' => 'day',
		    'sort_order' => $request->input('sort_order'),
		    'currency' => $request->input('currency'),
		    'is_active' => $request->input('is_active'),
		]);

	return redirect()->action('App\Http\Controllers\Admin\SubscriptionController@editplan', $id)->with('message','Subscription plan updated successfully!');


    }





}
