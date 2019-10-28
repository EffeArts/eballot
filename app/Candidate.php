<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    //
    protected $fillable = [
        'user_id', 'position_id' , 'regno', 'votes','avatar',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function position()
    {
    	return $this->belongsTo('App\Position');
    }

    public function voter()
    {
        return $this->hasOne('App\Registered_voter');
    } 
}

