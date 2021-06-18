<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Cmgmyr\Messenger\Traits\Messagable;
use Rinvex\Subscriptions\Traits\HasSubscriptions;



class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use Notifiable;
    use Messagable;
    use HasSubscriptions;
    
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'email',
        'role',
        'mobilenumber',
        'country',
        'state',
        'Address',
        'maincategory',
        'morecategory',
        'gender',
        'brandname',
        'bio',
        'avatar',
        'bod',
        'acc_number',
        'acc_name',
        'acc_bank',
        'url',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    


    public function proposal(){
            return $this->hasMany('App\Models\Proposal');
        }

        public function niche(){
            return $this->hasMany('App\Models\Niche');
        }

        public function platform(){
    return $this->hasMany('App\Models\Platform');
        }

        public function transaction(){
    return $this->hasMany('App\Models\Transaction');
        }

        public function service(){
    return $this->hasMany('App\Models\Service');
        }

        public function campaign(){
    return $this->hasMany('App\Models\Campaign');
        }
        public function wallet(){
    return $this->hasMany('App\Models\Wallet');
        }
        public function message(){
    return $this->hasMany('App\Models\Message');
        }

        public function post(){
    return $this->hasMany('App\Models\Post');
        }

        public function listname(){
    return $this->hasMany('App\Models\ListName');
        }

        public function listmembers(){
    return $this->hasMany('App\Models\ListMember');
        }



}
