<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contacto_apren extends Model
{
	 protected $table = 'contacto_apren';
     protected $fillable = ['tel_fijo','cel_apren','depart_aprendiz','ciudad_apren','documento_apre'];

    

}
