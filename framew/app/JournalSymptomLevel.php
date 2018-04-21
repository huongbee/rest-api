<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JournalSymptomLevel extends Model
{
    protected $table = "journal_symptom_level";

    public function JournalSymtom(){
    	return $this->hasMany('App\JournalSymtom','id_symptom_level','id');
    }
}
