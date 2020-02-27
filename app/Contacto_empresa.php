<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto_empresa extends Model
{
    protected $fillable  = ['direccion_empresa','nit_empresa'];
	protected $table = 'contacto_empresa';


	 public function contactoEmpresa() {
	 	return $this->hasMany(Empresa::class, 'nit_empresa', 'nit_empresa');
	 }

}
