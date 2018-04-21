<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    protected $table = "permissions";

    public function PermissionRole(){
    	return $this->hasMany('App\PermissionRole','permission_id','id');
    }
}
