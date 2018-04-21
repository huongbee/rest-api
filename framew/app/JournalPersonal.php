<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JournalPersonal extends Model
{
    protected $table = 'journal_personal';
    
    public function JournalCatelogy(){
      return $this->belongsTo('App\JournalCatelogy','id_catelogy','id');
    }
    public function User(){
      return $this->belongsTo('App\User','id_user','id');
    }
    

    public function JournalMedication(){
    	return $this->hasMany('App\JournalMedication','id_journal_personal','id');
    }
}
