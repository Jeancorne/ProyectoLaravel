<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class aprendiz_programa extends Model
{

  protected $fillable  = ['documento_apre','id'];
  protected $table = 'aprendiz_programa';


  public function programa_intermedia(){
		return $this->belongsTo(programas::class,'id', 'id');
	}
	


}
