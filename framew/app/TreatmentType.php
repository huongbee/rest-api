<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TreatmentType extends Model
{
    protected $table = 'treatment_type';

    public function TreatmentDetail(){
      return $this->hasMany('App\TreatmentDetail','id_treatment_type','id');
    }

    public function TreatmentList(){
      return $this->hasMany('App\TreatmentList','id_treatment_type','id');
    }
}
