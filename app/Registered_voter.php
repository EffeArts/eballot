<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registered_voter extends Model
{
    //
    protected $fillable = [
        'user_id', 'fname', 'lname', 'regno', 'gender', 'class' , 'status',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function candidate()
    {
    	return $this->belongsTo('App\candidate');
    }
}
