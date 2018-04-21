<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = "role_user";
    public function Users(){
    	return $this->belongsTo('App\Users','user_id','id');
    }
    public function Role(){
    	return $this->belongsTo('App\Role','role_id','id');
    }
}
