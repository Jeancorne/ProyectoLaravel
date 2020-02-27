<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable  = ['nit_empresa','nombre_empresa','imagen_empresa','id'];
	protected $table = 'empresa';

	 protected $primaryKey='nit_empresa';

	 public function contactoEmpresa() {
	 	return $this->belongsTo(Contacto_empresa::class, 'id', 'nit_empresa');
	 }

	 public function proyectos() {
	 	return $this->hasMany(Proyectos::class, 'nit_empresa', 'nit_empresa');
	 }
	
}
