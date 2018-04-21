<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YourCancer extends Model
{
    protected $table = 'your_cancer';

    public function User(){
      return $this->belongsTo('App\User','id_user','id');
    }
}
