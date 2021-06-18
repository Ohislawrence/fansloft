<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListMember extends Model
{
    use HasFactory;

    protected $fillable = [
    	'user_id',
        'list_id',
    ];

    public function platform(){
            return $this->hasMany('App\Models\Platform','id','user_id');
        }

    public function listname(){
            return $this->belongsTo('App\Models\ListName','id','user_id');
        }

    public function user(){
            return $this->belongsTo('App\Models\User');
        }

}
