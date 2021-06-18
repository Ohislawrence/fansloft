<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListName extends Model
{
    use HasFactory;
     protected $fillable = [
    	'user_id',
        'listname',
    ];

    public function listmember(){
            return $this->hasMany('App\Models\ListMember','list_id');
        }

    
}
