<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TreatmentDetail extends Model
{
    protected $table = 'treatment_detail';

    public function TreatmentType(){
      return $this->belongsTo('App\TreatmentType','id_treatment_type','id');
    }
}
