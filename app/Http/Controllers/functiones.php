<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class functiones extends Controller
{
    
    public function rules()
    {
        return [
            'documento_apre' => 'required',
           
        ];
    }

}
