<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmploiDuTempProf extends Model
{
    
    protected $table = 'emploisdutempsprofs';
    public $primarykey = 'id';
    protected $fillable = [
        'classes_id',
        'profs_id',
        'anneesscolaire_id',
        
  
    ];
    //
}
