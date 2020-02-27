<?php

namespace App;
use Illuminate\Http\RedirectResponse;

use Illuminate\Database\Eloquent\Model;

class Aprendiz extends Model
{
    

	protected $fillable  = ['documento_apre','nombre_apre','apellido_apre','id_user'];
	protected $table = 'aprendiz';

	 protected $primaryKey='documento_apre';
	
	public function aprendiz_contacto(){
		 return $this->belongsTo(contacto_apren::class,'documento_apre', 'documento_apre');
	}

	public function aprendiz_intermedia(){
		 return $this->belongsTo(aprendiz_programa::class,'documento_apre', 'documento_apre');
	}




	public function userr()
	{
		return $this->hasMany('App\User','id');
	}

}
