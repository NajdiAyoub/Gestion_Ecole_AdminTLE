<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmploiDuTempEleve extends Model
{
    protected $table = 'emplois_du_temps_eleves';
    public $primarykey = 'id';
    protected $fillable = [
        'classes_id',
        'profs_id',
        'anneesscolaire_id',
        
  
    ];
    //
}
