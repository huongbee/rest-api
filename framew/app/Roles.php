<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;

class Roles extends EntrustRole
{
   	protected $table = "roles";
    public function RoleUser(){
    	return $this->hasMany('App\RoleUser','role_id','id');
    }
}
