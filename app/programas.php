<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class programas extends Model
{
    protected $fillable  = ['numero_ficha','programa_formacion','centro_formacion','direccion_formacion'];
    protected $table = 'programas';



      public function programa_intermedia(){
		return $this->belongsToMany(aprendiz_programa::class,'id', 'id');
	}

}
