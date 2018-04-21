<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CancerDetailDiagnosis extends Model
{
    protected $table = "cancer_detail_diagnosis";

    public function User(){
    	return $this->belongsTo('App\User','id_user','id');
    }

    public function CancerType(){
    	return $this->belongsTo('App\CancerType','id_cancer_type','id');
    }
}
