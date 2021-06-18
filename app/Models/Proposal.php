<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Proposal extends Model
{
    use HasFactory;

    protected $fillable = [
    'campaign_id',
    'user_id',
    'status',
    'bid',
    'proposal',
    'duration',
    'proposalfile',
    'actualpay',
    'powfile',
    'link',
    'numberofclicks',
    'numberofviews',
    'numberoflikes',
    'mediaengagement',
    'retweets',
    'impressions',
    'is_complete',
    'owner',
    'platform',
            	];

    public function campaign(){
            return $this->belongsTo('App\Models\Campaign');
        }

    public function user(){
            return $this->belongsTo('App\Models\User');
        }

    public function message(){
        return $this->hasMany('App\Models\Message');
    }

    public function transaction(){
        return $this->hasMany('App\Models\Transaction');
    }


}
