<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CancerType extends Model
{
    protected $table = 'cancer_type';

    
    public function CancerList(){
      return $this->hasMany('App\CancerList','id_cancer_type','id');
    }

    public function CancerDetailType(){
      return $this->hasMany('App\CancerDetailType','id_cancer_type','id');
    }

    public function CancerDetailSite(){
      return $this->hasMany('App\CancerDetailSite','id_cancer_type','id');
    }
    public function CancerDetailDiagnosis(){
      return $this->hasMany('App\CancerDetailDiagnosis','id_cancer_type','id');
    }

    public function CancerDetailPathology(){
      return $this->hasMany('App\CancerDetailPathology','id_cancer_type','id');
    }
}
