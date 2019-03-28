<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    protected $table = 'wish';

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
