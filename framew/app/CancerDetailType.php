<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CancerDetailType extends Model
{
  protected $table = 'cancer_detail_type';
  
  public function CancerType(){
    return $this->belongsTo('App\CancerType','id_cancer_type','id');
  }
}
