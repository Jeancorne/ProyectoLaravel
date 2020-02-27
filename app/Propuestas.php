<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propuestas extends Model
{
    protected $fillable  = ['documento_1','documento_2','documento_3','documento_propuesta','propuesta'];
 	protected $table = 'propuestas';
 	
 	 public function proye_propuestas()
    {
    	return $this->belongsTo(Proye_propuesta::class,'id','id_proyecto');
    }


}




