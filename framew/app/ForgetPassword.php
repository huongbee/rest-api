<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForgetPassword extends Model
{
    protected $table = "forget_password";
    public function User(){
    	return $this->belongsTo('App\User','id_user','id');
    }
}
