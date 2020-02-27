<?php

namespace App\Http\Controllers;
use Response;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Proyectos;
class controller_index extends Controller
{
    public function Vista_proyectos(){
    	return view('layouts_empresa/pagina_proyectos');
    }


    public function Filtrar_proyectos(Request $request){
        $categoria = $request['categoria'];
        $departamento = $request['departamento'];
        $ciudad = $request['city_proyecto'];      
        $resultado = Proyectos::where('categoria_proye',$categoria)
        ->where('ciudad_proye',$ciudad)
        ->where('depart_proyecto',$departamento)
        ->paginate(6);
        
        return Response::json(View::make('layouts_empresa.page_retos_filtrados', compact('resultado'))->render());
    }


    public function Filtro_ver_mas(Request $request){
    	if ($request->ajax()) {
            $id = $request['id'];
            $resultado = Proyectos::with('empresa')
            ->where('id',$id)
            ->first();
            return Response::json(View::make('layouts_empresa.detalles_reto', compact('resultado'))->render());
        }
    }


    public function Nosotros(){
    	return view('layouts/page_nosotros');
    }

}
