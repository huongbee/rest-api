<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CancerDetail extends Model
{
  protected $table = 'cancer_detai';
  
  public function CancerType(){
    return $this->belongsTo('App\CancerType','id_cancer_type','id');
  }
}
