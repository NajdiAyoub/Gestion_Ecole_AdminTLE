<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    protected $table = 'controles';
    public $primarykey = 'id';
    protected $fillable = [
        'libelle', 
        'profs_id',
        'classes_id',
        'matieres_id',
        'semestres_id',
 
    ];       //
}
