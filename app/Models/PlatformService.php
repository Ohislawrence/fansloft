<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatformService extends Model
{
    use HasFactory;
    protected $fillable = [
    'platform_id',
    'service',
    'description',
    'duration',
    'frequency',
    'price'
        ];


        public function platform(){
    return $this->hasMany('App\Models\Platform');
        }

        public function user(){
    return $this->hasMany('App\Models\User');
        }

}
