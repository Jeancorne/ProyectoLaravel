<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    protected $fillable  = ['id_city','nombre_city','id_departamento'];
  	protected $table = 'city';
  	protected $primaryKey = 'id_city';
  	 


}
