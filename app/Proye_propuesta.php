<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proye_propuesta extends Model
{
    protected $fillable  = ['id_propuesta','id_proyecto'];
 	protected $table = 'proye_propuesta';

 	public function proyectos() { 
        return $this->belongsTo(Proyectos::class);
    }
    

    public function propuestas() { 
        return $this->belongsTo(Propuestas::class,'id_propuesta','id');
    }


}
