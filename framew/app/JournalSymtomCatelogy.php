<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JournalSymtomCatelogy extends Model
{
    protected $table = 'journal_symtom_catelogy';

    public function JournalSymtom(){
      return $this->hasMany('App\JournalSymtom','id_symtom_catelogy','id');
    }
}
