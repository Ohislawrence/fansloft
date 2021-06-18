<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\country;
use App\Models\Niche;
use App\Models\Transaction;
use Auth;
use Image;
use App\Charts\UserChart;
use Carbon\Carbon;
use Carbon\CarbonPeriod;



class DashboardController extends Controller
{
    public function __construct() {
    $this->middleware('role:admin');
  }
  public function index() {
  	$allusers = User::all();
  	$profits = Transaction::where('comfirmed', '1')->get();
  	//$ff = User::find(4)->created_at; 


  	//chartdata
  	$NoOfUser = User::whereDate('created_at','=', Carbon::today()->toDateString())->count();
  $NoOfUser1 = User::whereDate('created_at','=', Carbon::today()->subDays(1)->toDateString())->count();
  $NoOfUser2 = User::whereDate('created_at','=', Carbon::today()->subDays(2)->toDateString())->count();
  $NoOfUser3 = User::whereDate('created_at','=', Carbon::today()->subDays(3)->toDateString())->count();
  $NoOfUser4 = User::whereDate('created_at','=', Carbon::today()->subDays(4)->toDateString())->count();
  $NoOfUser5 = User::whereDate('created_at','=', Carbon::today()->subDays(5)->toDateString())->count();
  $NoOfUser6 = User::whereDate('created_at','=', Carbon::today()->subDays(6)->toDateString())->count();

//dd($NoOfUser, $NoOfUser1, Carbon::today()->subDays(36)->toDateString(), date_format($ff,'Y-m-d'), Carbon::today()->toDateString() );

  	//charts
  	$usersChart = new UserChart;
    $usersChart->labels([Carbon::today()->subDays(6)->format('l'),
    					Carbon::today()->subDays(5)->format('l'),
    					Carbon::today()->subDays(4)->format('l'),
    					Carbon::today()->subDays(3)->format('l'),
    					Carbon::today()->subDays(2)->format('l'),
    					Carbon::today()->subDays(1)->format('l'),
              Carbon::today()->format('l')
    					]);
    $usersChart->dataset('User Registration', 'bar', [$NoOfUser6,$NoOfUser5,$NoOfUser4, $NoOfUser3, $NoOfUser2,$NoOfUser1,$NoOfUser]);


    return view('admin.dashboard',['allusers' => $allusers , 'profits' => $profits,'usersChart' => $usersChart ]);
  }
}
