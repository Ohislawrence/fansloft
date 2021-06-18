<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Newsletter;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    public function redirectTo() 
    {
    $role = Auth::user()->role; 
    switch ($role) {
    case 'admin':
      return '/admin';
      break;
    case 'brand':
      return '/brand/dashboard';
      break; 
      case 'creator':
      return '/creator/dashboard';
      break;
    default:
      return '/'; 
    break;
     }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'role' => ['required', 'string', 'max:255'],
            'bio' => ['string', 'max:255'],
            'gender' => ['string', 'max:255'],
            'bod' => ['string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'maincategory' => ['required', 'string', 'max:255'],
            'brandname' => ['required', 'string', 'max:15', 'unique:users'],
            'mobilenumber' => ['required', 'numeric', 'min:10', 'unique:users'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'bio' => $data['bio'],
            'gender' => $data['gender'],
            'country' => $data['country'],
            'mobilenumber' => $data['mobilenumber'],
            'maincategory' => $data['maincategory'],
            'bod' => $data['bod'],
            'brandname' => str_replace(' ', '', $data['brandname']),
        ]);


    $email_data = array(
        'name' => $data['name'],
        'email' => $data['email'],
        'brandname' => str_replace(' ', '', $data['brandname']),
        'role' => $data['role'],
    );

    $id = $user->id;


    if ($email_data['role'] == 'brand')
    {
        $user = User::find($id);
        $plan = app('rinvex.subscriptions.plan')->find(3);

        $user->newSubscription('trial', $plan);

        Mail::to($email_data['email'])->send(new WelcomeMail($email_data));
        
    }elseif ($email_data['role'] == 'creator')
    {
        Mail::to($email_data['email'])->send(new WelcomeMail($email_data));
        if ( ! Newsletter::isSubscribed($email_data['email']) ) 
        {
        Newsletter::subscribe($email_data['email'], ['FNAME'=>$data['brandname'],'LNAME'=>''], 'subscribers');
      }
    
    }

    return $user;
    }
}
