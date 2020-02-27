<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    protected $fillable  = ['depart_proyecto','nombre_proye','ciudad_proye','categoria_proye','descripcion_proye','fecha_proyecto','nit_empresa'];

    protected $table = 'proyectos';

    public function empresa()
    {
    	return $this->belongsTo(Empresa::class, 'nit_empresa', 'nit_empresa');
    }

    public function proye_propuestas()
    {
    	return $this->belongsTo(Proye_propuesta::class,'id','id_proyecto');
    }

    public function propuestas() {
        return $this->belongsToMany(Propuestas::class, 'proye_propuesta', 'id_proyecto', 'id_propuesta');
    }






}








