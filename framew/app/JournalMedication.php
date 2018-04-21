<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JournalMedication extends Model
{
    protected $table = 'journal_medication';
    
    public function JournalSymptom(){
      return $this->belongsTo('App\JournalSymtom','id_journal_symptom','id');
    }

    public function JournalMedicateLevel(){
    	return $this->belongsTo('App\JournalMedicateLevel','id_journal_medicate_level','id');
    }
}
