<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
    protected $fillable  = ['id_departamento','nombre_departamento'];
  	protected $table = 'departamento';
  	protected $primaryKey = 'id_departamento';
  	public function cityy() { 
        return $this->belongsTo('App\departamento','id_departamento');
    }
}
