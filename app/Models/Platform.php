<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
        use HasFactory;
	protected $fillable = [
		'user_id',
        'platform',
        'handle',
        'link',
        'followers',
        'members',
        'monthly_views',
        'is_verify',
        'category',
        'subscribers',
        'startdate',
        'analytics'
        ];


        //users has many platform
        public function user(){
    return $this->belongsTo('App\Models\User');
        }

        public function platformservice(){
    return $this->hasMany('App\Models\PlatformService');
        }


        

}
