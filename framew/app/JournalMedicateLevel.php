<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JournalMedicateLevel extends Model
{
    protected $table = "journal_medicate_level";

    public function JournalMedication(){
    	return $this->hasMany('App\JournalMedication','id_journal_medicate_level','id');
    }
}
