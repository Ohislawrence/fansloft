<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
		'user_id',
        'balance',
        'pending_balance',
        'balance2',
        'currency',
        'desc',
	];



	public function transaction(){
        return $this->hasMany('App\Models\Transaction');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
