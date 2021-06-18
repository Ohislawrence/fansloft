<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Campaign extends Model
{
            use HasFactory;

    	protected $fillable = [
    		'user_id',
            'campaign_name',
            'budget',
            'niche',
            'desc',
            'frequency',
            'link',
            'amount',
            'topic',
            'ads_text',
            'media',
            'service',
            'hashtag',
            'qualification',
            'cta',
            'details',
            'isproduct',
            'tags',
            'quotes',
            'gender',
            'age',
            'country',
            'minfollowers',
            'interests',
           'duration',
           'status',
        ];

        public function user(){
            return $this->belongsTo('App\Models\User');
        }

        public function proposal(){
            return $this->hasMany('App\Models\Proposal');
        }

        public function niche(){
            return $this->hasMany('App\Models\Niche');
        }

}
