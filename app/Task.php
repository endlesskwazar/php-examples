<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = ['title', 'due_date', 'owner_id', 'executor_id'];

    public function owner(){
        return $this->belongsTo('App\User', 'owner_id');
    }

    public function executor(){
        return $this->belongsTo('App\User', 'executor_id');
    }
}
