<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JournalSymtom extends Model
{
    protected $table = 'journal_symtom';

    public function JournalMedication(){
      return $this->hasMany('App\JournalMedication','id_journal_symptom','id');
    }

    public function JournalSymtomCatelogy(){
      return $this->belongsTo('App\JournalSymtomCatelogy','id_symtom_catelogy','id');
    }
    public function JournalSymptomLevel(){
      return $this->belongsTo('App\JournalSymptomLevel','id_symtom_level','id');
    }
}
