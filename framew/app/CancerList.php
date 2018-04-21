<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CancerList extends Model
{
    protected $table = 'cancer_list';
    
    public function CancerType(){
      return $this->belongsTo('App\CancerType','id_cancer_type','id');
    }

    public function User(){
      return $this->belongsTo('App\User','id_user','id');
    }
}
