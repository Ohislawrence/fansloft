<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
		'wallet_id',
        'amount',
        'comfirmed',
        'type',
        'currency',
        'ref',
        'desc',
        'commission',
        'user_id',
	];

    public function wallet(){
        return $this->belongsTo('App\Models\Wallet');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function proposal(){
        return $this->belongsTo('App\Models\Proposal','user_id');
    }
}
