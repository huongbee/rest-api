<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TreatmentList extends Model
{
    protected $table = 'treatment_list';

    public function TreatmentType(){
      return $this->belongsTo('App\TreatmentType','id_treatment_type','id');
    }

    public function User(){
      return $this->belongsTo('App\User','id_user','id');
    }
}
