<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
    	'message',
        'proposal_id',
    	'to_user',
        'from_user',
        'topic',
        'reply',
        'is_read',
        'trash',
        'marked',
        'file',
    ];


    public function proposal(){
        return $this->hasMany('App\Models\Proposal');
    }

    public function sender(){
        return $this->belongsTo('App\Models\User','from_user');
    }

    public function receiver(){
        return $this->belongsTo('App\Models\User','to_user');
    }
    
}
