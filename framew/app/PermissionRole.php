<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    protected $table = "permission_role";
    public function Permission(){
    	return $this->belongsTo('App\Permission','permission_id','id');
    }
    public function Role(){
    	return $this->belongsTo('App\Role','role_id','id');
    }
}
