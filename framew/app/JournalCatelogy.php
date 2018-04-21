<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JournalCatelogy extends Model
{
    protected $table = 'journal_catelogy';
    
    public function JournalPersonal(){
      return $this->hasMany('App\JournalPersonal','id_catelogy','id');
    }
}
