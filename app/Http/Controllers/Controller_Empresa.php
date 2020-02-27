<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Redirector;
use Redirect;
use Session;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Crypt;
use Response;
use File;
use App\User;
use App\Empresa;
use App\Contacto_empresa;
use App\city;
use App\Propuestas;
use App\Proye_propuesta;
use App\departamento;
use App\Proyectos;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class Controller_Empresa extends Controller
{
	public function vista_registro(){
		return view('Empresa/registro_empresa');
	}
    public function page_proyectos(){
        return view('layouts_empresa/pagina_proyectos');
    }
    public function ver_mas_reto(request $request){
        if ($request->ajax()) {
            $id = $request['id'];
            $resultado = Proyectos::with('empresa')
            ->where('id',$id)
            ->first();
            return Response::json(View::make('layouts_empresa.detalles_reto', compact('resultado'))->render());
        }
    }

    public function Update_empresa(Request $request){

        $correo =  Auth::user()->email;

        $direccion_empresa = trim($request['direccion_empresa']);
        $nombre_empresa = trim($request['nombre_empresa']);
        $contra_empresa1 = trim($request['contra_empresa1']);
        $contra_empresa2 = trim($request['contra_empresa2']);
        $imagen_empresa = $request->file('imagen_empresa');
        
        $formatos_validos = array('jpeg', 'jpg', 'png');  
        if (!empty($imagen_empresa)) {
            $imagen_nombre = $request->file('imagen_empresa')->getClientOriginalName();
            $imagen_tipo = $request->file('imagen_empresa')->getClientOriginalExtension();
            $imagen_size = $request->file('imagen_empresa')->getSize();

             if(in_array($imagen_tipo, $formatos_validos)){
                if ($imagen_size < 1000000) {
                    $data['imagen_empresa_ok'] = "ok";
                }else{
                    $data['imagen_max'] = "<div class='alert alert-danger'>La imagen supera el peso permitido.</div>";
                }
            }else{
                $data['imagen_mal'] = "<div class='alert alert-danger'>La imagen no tiene el formato permitido, debe ser 'jpeg','jpg' o 'npg'</div>";
            }
        }



        if (!empty($direccion_empresa)) {
            if (strlen($direccion_empresa) < 40){
                $data['direccion_bien'] = $direccion_empresa;
            }else{
                $data['direccion_max'] =  "<div class='alert alert-danger' role='alert'>
                La direccion no puede superar los 40 caracteres.
                </div>";
            }
        }
        $patron = '/^[a-zA-Z,]*$/';
        if (!empty($nombre_empresa)) {
            if (strlen($nombre_empresa) < 70){
                if (preg_match($patron,$nombre_empresa)) {
                    $data['nombre_bien'] = $nombre_empresa;
                }else{
                    $data['nombre_num'] =  "<div class='alert alert-danger' role='alert'>
                    El nombre no puede contener caracteres especiales
                    </div>";
                }

            }else{
                $data['nombre_max'] =  "<div class='alert alert-danger' role='alert'>
                El nombre no puede superar los 70 caracteres.
                </div>";
            }
        }

        if ($contra_empresa1 == $contra_empresa2) {
            if (!empty($contra_empresa1)) {
                if (strlen($contra_empresa1) < 35){
                    $data['contra_bien'] = "ok";
                }else{
                    $data['contrasena_max'] =  "<div class='alert alert-danger' role='alert'>
                    La contraseña no puede superar los 35 caracteres.
                    </div>";
                }
            }
        }else{
            $data['contrasena_no_coinciden'] = "
            <div class='alert alert-danger' role='alert'>
            Las contraseñas no coinciden.
            </div>
            ";
        }

        try {
            if (empty($data['direccion_max']) and empty($data['imagen_mal']) and empty($data['imagen_max']) and empty($data['nombre_max']) and empty($data['nombre_num']) and empty($data['contrasena_no_coinciden']) and  empty($data['contrasena_max'])) {
                
            $correo =  Auth::user()->email;

            if (!empty($data['imagen_empresa_ok'])) {
                DB::beginTransaction();
                $imagen_nombre = $request->file('imagen_empresa')->getClientOriginalName();
                $queryy = User::with('empresa')
                ->where('email',$correo)
                ->first();
                $imagen_anterior = $queryy->empresa->imagen_empresa;
                $query = DB::table('users')->where('users.email',$correo)  
                ->join('empresa','users.id','=','empresa.id')
                ->join('contacto_empresa','contacto_empresa.nit_empresa','=','contacto_empresa.nit_empresa')
                ->update(['imagen_empresa' => $imagen_nombre]);
                if ($query) {
                    $destino_archivo = public_path('/images');
                    $imagen_empresa->move($destino_archivo, $imagen_nombre);

                    $imagen_app = public_path('/images/'.$imagen_anterior);
                    if (File::exists($imagen_app)) {
                        unlink($imagen_app);
                    }
                    $data['actualizada_ok'] = "";
                }
                DB::commit();
            }


            if (!empty($data['direccion_bien'])) {
               
                DB::beginTransaction();
                $query = DB::table('users')->where('users.email',$correo)  
                ->join('empresa','users.id','=','empresa.id')
                ->join('contacto_empresa','contacto_empresa.nit_empresa','=','contacto_empresa.nit_empresa')
                ->update(['direccion_empresa' => $direccion_empresa]);
                if ($query) {
                    $data['actualizada_ok'] = "";
                }
                DB::commit();

            }

            if (!empty($data['nombre_bien'])) {
                
                DB::beginTransaction();
                $query = DB::table('users')->where('users.email',$correo)  
                ->join('empresa','users.id','=','empresa.id')
                ->join('contacto_empresa','contacto_empresa.nit_empresa','=','contacto_empresa.nit_empresa')
                ->update(['nombre_empresa' => $nombre_empresa]);
                if ($query) {
                    $data['actualizada_ok'] = "";
                }
                DB::commit();

            }

            if (!empty($data['contra_bien'])) {
                
                DB::beginTransaction();
                $query = DB::table('users')->where('users.email',$correo)  
                ->join('empresa','users.id','=','empresa.id')
                ->join('contacto_empresa','contacto_empresa.nit_empresa','=','contacto_empresa.nit_empresa')
                ->update(['password' => bcrypt($contra_empresa1)]);
                if ($query) {
                    $data['actualizada_ok'] = "";
                }
                DB::commit();

            }

            }

            
        } catch (Exception $e) {
            
        }

    return json_encode($data);


    }


    public function pagination(request $request){
        if ($request->ajax()) {
            $categoria = $request['categoria'];
            $departamento = $request['departamento'];
            $ciudad = $request['city_proyecto'];
            $resultado = Proyectos::where('categoria_proye',$categoria)
            ->where('ciudad_proye',$ciudad)
            ->where('depart_proyecto',$departamento)
            ->paginate(3);
            return Response::json(View::make('layouts_empresa.page_retos_filtrados', compact('resultado'))->render());
        }
    }
    public function retos_filtrados(Request $request){
        $categoria = $request['categoria'];
        $departamento = $request['departamento'];
        $ciudad = $request['city_proyecto'];      
        $resultado = Proyectos::where('categoria_proye',$categoria)
        ->where('ciudad_proye',$ciudad)
        ->where('depart_proyecto',$departamento)
        ->paginate(6);
        
        return Response::json(View::make('layouts_empresa.page_retos_filtrados', compact('resultado'))->render());
    }


    public function ciudades(request $request){
    $departamento = $request['departamento'];
       $datos = DB::table('city')
        ->select(['nombre_city'])
        ->join('departamento', 'city.id_departamento', '=', 'departamento.id_departamento')            
        ->where('nombre_departamento', $departamento)
        ->get();
        return view('layouts_empresa/ciudades',)->with('datos',$datos);
    }

    public function Click_detalle_reto(Request $request){
        if ($request->ajax()) {
            $id_proye = $request['id_proye'];
            $proyectos = Proyectos::where('id',$id_proye)            
            ->first();
            return Response::json([
                'vista' => View::make('layouts_empresa.Click_detalle_reto', compact('proyectos'))->render()
            ]);
        }
    }

    public function Click_aprendiz_reto(request $request){
        if ($request->ajax()) {
            DB::beginTransaction();
            $foranea = $request['id_propuesta'];
            $sacar_documentos = Propuestas::where('id',$foranea)
            ->first()->ToArray();
            $documento_1 = $sacar_documentos['documento_1'];
            $documento_2 = $sacar_documentos['documento_2'];
            $documento_3 = $sacar_documentos['documento_3'];
            $datos = DB::table('aprendiz')
            ->select(['aprendiz.documento_apre','nombre_apre','apellido_apre','tel_fijo','cel_apren','depart_aprendiz','ciudad_apren','numero_ficha','programa_formacion','centro_formacion','direccion_formacion','email'])
            ->join('aprendiz_programa','aprendiz_programa.documento_apre','=','aprendiz.documento_apre')
            ->join('programas','aprendiz_programa.id','=','programas.id')
            ->join('contacto_apren','contacto_apren.documento_apre','=','aprendiz.documento_apre')
            ->join('users','users.id','=','aprendiz.id_user')
            ->where('aprendiz.documento_apre',$documento_1)
            ->orWhere('aprendiz.documento_apre',$documento_2)
            ->orWhere('aprendiz.documento_apre',$documento_3)
            ->get()->ToArray();
            
            $datos2 = Propuestas::where('id',$foranea)
            ->first();
            DB::commit();

            return Response::json([
                'aprendices' => View::make('layouts_empresa.Aprendices_detalles', compact('datos','datos2'))->render()
            ]); 
        }
    }

    public function Click_grupos_reto(Request $request){
        if ($request->ajax()) {
            $id = $request['id'];
            DB::beginTransaction();
            $query = DB::table('proyectos')
            ->select(['propuestas.id','documento_1','documento_2','documento_3','documento_propuesta','propuesta'])
            ->join('proye_propuesta','proyectos.id','=','proye_propuesta.id_proyecto')
            ->join('propuestas','proye_propuesta.id_propuesta','=','propuestas.id')
            ->where('proyectos.id',$id)
            ->paginate(1);
            DB::commit();
            return Response::json([
                'vista' => View::make('layouts_empresa.Aprendiz_ligado_reto', compact('query'))->render()
            ]);            
        }
    }

    public function Actualizar_mi_reto(Request $request){
        if ($request->ajax()) {
            $nombre_proyecto = trim($request['name_proye']);
            $fecha_proye = trim($request['fecha_proye']);
            $categoria_proy = trim($request['categoria_proye']);
            $descripcion_proyecto = trim($request['descripcion_proyecto']);
            $foranea = trim($request['foranea']);            
            $patron = '/^[a-zA-Z,]*$/';
            if (!empty($nombre_proyecto)) {
                if (strlen($nombre_proyecto) < 60){
                    if (preg_match($patron, $nombre_proyecto)) {
                        $data['nombre_bien'] = "ok";
                    }else{
                        $data['nombre_numeros'] =  "<div class='alert alert-danger' role='alert'>
                        El nombre no puede contener caracteres especiales.
                        </div>";
                    }           
                }else{
                    $data['nombre_max'] =  "<div class='alert alert-danger' role='alert'>
                    El nombre no puede superar los 60 caracteres.
                    </div>";
                }
            }
            if (!empty($categoria_proy)) {
                if ($categoria_proy != "Categoria") {
                    $data["categoria_bien"] = "ok";
                }
            }            
            if (!empty($fecha_proye)) {
                if ($fecha_proye != "Fecha de proyecto") {
                    $data["fecha_bien"] = "ok";
                }
            }            
            if (!empty($descripcion_proyecto)) {
                if (strlen($descripcion_proyecto) < 8000){
                    $data['descripcion_bien'] = "ok";
                }else{
                    $data['descripcion_max'] =  "<div class='alert alert-danger' role='alert'>
                    La descripción no puede superar los 8000 caracteres.
                    </div>";
                }
            }else{
                $data['sin_descripcion'] =  "<div class='alert alert-danger' role='alert'>
                    La descripción no puede estar vacía.
                    </div>";
            }

            if (empty($data['nombre_max']) and empty($data['nombre_numeros']) and empty($data['sin_descripcion']) and 
                empty($data['descripcion_max'])) {
                if (!empty($data['fecha_bien']) ) {
                    DB::beginTransaction();
                    $fecha_proyecto = explode("/", $fecha_proye);
                    $fecha_bien = $fecha_proyecto[2]."-".$fecha_proyecto[0]."-".$fecha_proyecto[1];
                    $update =  Proyectos::where('id',$foranea)
                    ->update(['descripcion_proye' => $fecha_bien]);
                    if ($update) {
                        $data['actualizado_ok'] = "<div class='alert alert-success' role='alert'>
                        Actualizado correctamente
                        </div>";
                    }
                    DB::commit();
                }
            }

            if (empty($data['nombre_max']) and empty($data['nombre_numeros']) and empty($data['sin_descripcion']) and 
                empty($data['descripcion_max']) ) {
                if (!empty($data['nombre_bien'])) {
                    DB::beginTransaction();
                    $update =  Proyectos::where('id',$foranea)
                    ->update(['nombre_proye' => $nombre_proyecto]);
                    if ($update) {
                        $data['actualizado_ok'] = "<div class='alert alert-success' role='alert'>
                        Actualizado correctamente
                        </div>";
                    }
                    DB::commit();


                }
                
            }

            if (empty($data['nombre_max']) and empty($data['nombre_numeros']) and empty($data['sin_descripcion']) and 
                empty($data['descripcion_max'])) {
                if (!empty($data['categoria_bien']) ) {
                    DB::beginTransaction();
                    $update =  Proyectos::where('id',$foranea)
                    ->update(['categoria_proye' => $categoria_proy]);
                    if ($update) {
                        $data['actualizado_ok'] = "<div class='alert alert-success' role='alert'>
                        Actualizado correctamente
                        </div>";
                    }
                    DB::commit();
                }
            }

            if (empty($data['nombre_max']) and empty($data['nombre_numeros']) and empty($data['sin_descripcion']) and 
                empty($data['descripcion_max'])) {
                if (!empty($data['descripcion_bien']) ) {
                    DB::beginTransaction();
                    $update =  Proyectos::where('id',$foranea)
                    ->update(['descripcion_proye' => $descripcion_proyecto]);
                    if ($update) {
                        $data['actualizado_ok'] = "<div class='alert alert-success' role='alert'>
                        Actualizado correctamente
                        </div>";
                    }
                    DB::commit();
                }
            }



        return Response::json($data);
        }
    }

    public function perfil_empresa(request $request){
        $user_id = Auth::user()->id;
        $datos = DB::table('users')
        ->select(['email','empresa.nit_empresa','nombre_empresa','imagen_empresa','direccion_empresa'])
        ->join('empresa', 'users.id', '=', 'empresa.id')
        ->join('contacto_empresa','empresa.nit_empresa','=','contacto_empresa.nit_empresa')              
        ->where('users.id', $user_id)
        ->first();

        
        $datos2 = DB::table('users')
        ->select(['proyectos.id','depart_proyecto','nombre_proye','ciudad_proye','categoria_proye','descripcion_proye','fecha_proyecto'])
        ->join('empresa', 'users.id', '=', 'empresa.id')
        ->join('contacto_empresa','empresa.nit_empresa','=','contacto_empresa.nit_empresa')  
        ->join('proyectos','empresa.nit_empresa','=','proyectos.nit_empresa')     
        ->where('users.id', $user_id)
        ->get()->ToArray();
         return view('layouts_empresa/panel_perfil_empresa',)->with('datos',$datos)->with('datos2',$datos2);
    }

     public function publicar_proyectos(request $request){
        
         return view('layouts_empresa/publicar_proyecto',);
    }
     public function login_empresa(request $request){
        $data[] = "";
        if ($request['email'] != null) {
            $credentials = [
                'email' => $request['email'],
                'password' => $request['password'],
            ];
            $mirar = Auth::attempt($credentials);            
            if ($mirar) {
                $datos = User::with('empresa')
                ->where('email',$request['email'])
                ->get('name')->ToArray();               
                if ($datos[0]['name'] == "Empresa") {
                    $data['ok'] = "bien";      
                }
            }else{
                $data['error_empre'] = "";
            }
        }else{
             $data['campo_empty'] = "";
        }
      return json_encode($data);
    }

    public function publicar_proyecto(request $request){
        try {
            $nombre_reto = trim($request['nombre_reto']);
            $fecha_proyecto = trim($request['fecha_proyecto']);
            $categoria_proye = trim($request['categoria_proye']);
            $depart_aprendiz = trim($request['depart_aprendiz']);
            $ciudad_apren = trim($request['ciudad_apren']);
            $descrip_proyecto = trim($request['descrip_proyecto']);
            $patron_nombre = '/[a-zA-Z][^\d\W]$/';
            $data = [];
            if (!empty($nombre_reto)) {
                if (strlen($nombre_reto) < 60){
                    if (preg_match($patron_nombre, $nombre_reto)) {
                         $nombre_ok = "w";
                    }else{
                        $data['nombre_equivocado'] =  "<div class='alert alert-danger' role='alert'>
                         El nombre no puede contener caracteres especiales.
                        </div>";
                    }                   
                }else{
                    $data['nombre_caracteres_mal'] =  "<div class='alert alert-danger' role='alert'>
                    El nombre no puede superar los 60 caracteres.
                    </div>";
                }
            }else{
                $data['nombre_vacio_mal'] =  "<div class='alert alert-danger' role='alert'>
                El nombre esta vacio.
                </div>";
            }


            if (!empty($fecha_proyecto)) {
                if ($fecha_proyecto != "Fecha de proyecto") {                    
                     $fecha_ok = "w";
                }else{
                    $data["fecha_vacio_mal"] = "<div class='alert alert-danger' role='alert'>
                    La fecha esta vacia.
                    </div>";
                }                
            }else{
                $data["fecha_vacio_mal"] = "<div class='alert alert-danger' role='alert'>
                La fecha esta vacia.
                </div>";

            }
            $patron_categoria = '/[a-zA-Z\/][^\d\W]$/';
            if (!empty($categoria_proye)) {
                if ($categoria_proye != "Categoria") {
                    if (preg_match($patron_categoria, $categoria_proye )) {
                         $categoria_ok = "w"; 
                    }else{
                        $data["categoria_error"] = "<div class='alert alert-danger' role='alert'>
                     La categoría no debe tener caracteres especiales.
                    </div>"; 
                    }
                }else{
                    $data["categoria_vacia"] = "<div class='alert alert-danger' role='alert'>
                    La categoría esta vacía.
                    </div>";
                }
            }else{
                $data["categoria_vacia"] = "<div class='alert alert-danger' role='alert'>
                La categoría esta vacía.
                </div>";
            }


            if (!empty($depart_aprendiz)) {
                if ($depart_aprendiz != "Departamento") {
                     $departamento_ok = "w";
                }else{
                    $data["departamento_vacio"] = "<div class='alert alert-danger' role='alert'>
                    El departamento esta vacío.
                    </div>";
                }
            }else{
                $data["departamento_vacio"] = "<div class='alert alert-danger' role='alert'>
                El departamento esta vacío.
                </div>";
            }

            if (!empty($ciudad_apren)) {
                if ($ciudad_apren != "Ciudad") {   
                    $ciudad_ok = "w";
                }else{
                    $data["ciudad_vacia"] = "<div class='alert alert-danger' role='alert'>
                    Elige ciudad.
                    </div>";
                }
            }else{
                $data["ciudad_vacia"] = "<div class='alert alert-danger' role='alert'>
                Elige ciudad.
                </div>";
            }
            if (!empty($descrip_proyecto)) {
                if (strlen($descrip_proyecto) < 8000){
                    if (preg_match($patron_nombre, $descrip_proyecto)) {
                            $descripcion_ok = "w";
                    }else{
                        $data['descripcion_error'] =  "<div class='alert alert-danger' role='alert'>
                        La descripción no puede tener caracteres especiales.
                        </div>";
                    }
                }else{
                    $data['descripcion_caracteres_mal'] =  "<div class='alert alert-danger' role='alert'>
                    La descripción no puede superar los 8000 caracteres.
                    </div>";
                }
            }else{
                $data['descripcion_vacio_mal'] =  "<div class='alert alert-danger' role='alert'>
                La descripción esta vacia.
                </div>";
            }


            if (!empty($nombre_ok) and !empty($fecha_ok) and !empty($categoria_ok) and !empty($departamento_ok) and
                !empty($ciudad_ok) and !empty($descripcion_ok)) {
                $user_id = Auth::user()->id;               
                $users = DB::table('users')
                ->join('empresa', 'users.id', '=', 'empresa.id')
                ->select('nit_empresa')
                ->where('users.id',$user_id)
                ->first();
                $fecha_proyecto = explode("/", $fecha_proyecto);
                $tabla_proyectos = ['depart_proyecto' => $depart_aprendiz, 'nombre_proye' => $nombre_reto, 
                'ciudad_proye' => $ciudad_apren, 'categoria_proye' => $categoria_proye, 'descripcion_proye' => $descrip_proyecto,
                 'fecha_proyecto' => $fecha_proyecto[2]."-".$fecha_proyecto[0]."-".$fecha_proyecto[1], 
                 'nit_empresa' => $users->nit_empresa];

                $empresaBD = Proyectos::create($tabla_proyectos);
                if ($empresaBD) {
                    $data['ingresado_ok'] = "ok";
                }

            }
            
        } catch (Exception $e) {
            
        }
       
        
        return json_encode($data);
        
    }


	public function registrar_empresa(request $request){
               try {
                 $nit_empresa = trim($request['nit_empresa']);
                 $nombre_empresa = trim($request['nombre_empresa']);
                 $email = trim($request['email']);
                 $direccion_empresa = trim($request['direccion_empresa']);
                 $password = trim($request['password']);
                 $password2 = trim($request['password2']);
                 $imagen_file = trim($_FILES['imagen_empresa']['size']);             
                 $num_50 = 50;
                 $num_70 = 70;
                 $num_40 = 40;
                 $num_35 = 35;
                 $patron = '/[0-9][^\D]$/';
                 $patron_nombre = '/[a-zA-Z][^\d\W]$/';  
                 $patron_direccion = '/[a-zA-Z0-9\w#.]$/';
                 $patron_direccion = '/[a-zA-Z0-9\w#.]$/';
                 $patron_contrasena = '/[a-zA-Z0-9][^\W\s]$/';
                 if ($request['imagen_empresa'] != null) {
                        $imagen_llegada = $request->file('imagen_empresa');
                        $imagen = time().'.'.$imagen_llegada->getClientOriginalExtension(); 
                        $formatos_validos = array('jpeg', 'jpg', 'png');
                        $name_minusculo = strtolower(pathinfo($imagen, PATHINFO_EXTENSION));
                        if(in_array($name_minusculo, $formatos_validos)){
                                if ($imagen_file < 9000000) {
                                        $data['imagen_bien'] = "ok";
                                }else{
                                        $data['imagen_max'] = "<div class='alert alert-danger'>La imagen supera el peso permitido.</div>";
                                }
                        }else{
                                $data['imagen_mal'] = "<div class='alert alert-danger'>La imagen no tiene el formato permitido, debe ser 'jpeg','jpg' o 'npg'</div>";
                        }
                }else{
                        $data['sin_imagen'] = "<div class='alert alert-danger'>No hay imagen</div>";
                }

                if (!empty($nit_empresa)) {
                        if (strlen($nit_empresa) < $num_50) {
                                if (preg_match($patron, $nit_empresa)) {
                                        $data['nit_bien'] = "ok";
                                        $nit_empresa_ok= $nit_empresa;
                                }else{
                                        $data['nit_mal'] = "<div class='alert alert-danger'>El nit no debe contener caracteres especiales</div>";
                                }

                        }else{
                                $data['nit_max'] = "<div class='alert alert-danger'>El nit no debe superar los 50 caracteres</div>";
                        }

                }else{
                        $data['sin_nit'] = "<div class='alert alert-danger'>Nit vacio</div>";
                }

                if (!empty($nombre_empresa)) {
                        if (strlen($nombre_empresa) < $num_70) {
                                if (preg_match($patron_nombre, $nombre_empresa)) {
                                        $data['nombre_bien'] = "ok";
                                        $nombre_empresa_ok= $nombre_empresa;
                                }else{
                                        $data['nombre_mal'] = "<div class='alert alert-danger'>El nombre no debe contener caracteres especiales</div>";
                                }                       
                        }else{
                                $data['nombre_max'] = "<div class='alert alert-danger'>El nombre no debe superar los 70 caracteres</div>";
                        }               
                }else{
                 $data['sin_nombre'] = "<div class='alert alert-danger'>Nombre empresarial vacio</div>";
         }

         if (!empty($email)) {
                if (strlen($email) < $num_35) {
                        if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
                                $data['correo_bien'] = "ok";
                                $email_ok= $email;
                        }else{
                                $data['correo_mal'] = "<div class='alert alert-danger'>El correo no es válido.</div>";
                        }               
                }else{
                        $data['correo_max'] = "<div class='alert alert-danger'>El correo no debe superar los 35 caracteres</div>";
                }               
        }else{
                $data['sin_correo'] = "<div class='alert alert-danger'>El correo esta vacío</div>";
        }
        if (!empty($direccion_empresa)) {
                if (strlen($direccion_empresa) < $num_40) {
                        if (preg_match($patron_direccion, $direccion_empresa)) {
                                $data['direccion_bien'] = "ok";
                                $direccion_empresa_ok= $direccion_empresa;
                        }else{
                                $data['direccion_mal'] = "<div class='alert alert-danger'>La dirección esta mala</div>";
                        }                       
                }else{
                        $data['direccion_max'] = "<div class='alert alert-danger'>La dirección no debe superar los 40 caracteres</div>";
                }               
        }else{
                $data['sin_direccion'] = "<div class='alert alert-danger'>La dirección esta vacía</div>";
        }
        if (!empty($password)) {
                if (!empty($password2)) {
                        if ($password == $password2) {
                                if (strlen($password) < $num_40) {
                                        if (preg_match($patron_contrasena, $password) && preg_match($patron_contrasena,$password2)) {
                                                $data['contra_bien'] = "ok";
                                                $password_ok= $password;
                                        }else{
                                                $data['contra_mal'] = "<div class='alert alert-danger'>La contraseña esta mala, no puede contener caracteres especiales</div>";
                                        }                       
                                }else{
                                        $data['contra_max'] = "<div class='alert alert-danger'>La contraseña no debe superar los 40 caracteres</div>";
                                }
                        }else{
                                $data['no_coinciden'] = "<div class='alert alert-danger'>Las contraseñas no coinciden</div>";
                        }
                }else{
                        $data['sin_contra2'] = "<div class='alert alert-danger'>La contraseña esta vacía</div>";
                }

        }else{
                $data['sin_contra1'] = "<div class='alert alert-danger'>La contraseña esta vacía</div>";
        }


        if (empty($data['sin_imagen']) && empty($data['imagen_mal']) && empty($data['imagen_max']) && 
                empty($data['sin_nit'])  && empty($data['nit_max'])  && empty($data['nit_mal'])  && 
                empty($data['sin_nombre'])  && empty($data['nombre_max'])  && empty($data['nombre_mal'])  && 
                empty($data['sin_correo'])  && empty($data['correo_max'])  && empty($data['correo_mal'])  && 
                empty($data['sin_direccion'])  && empty($data['direccion_max'])  && empty($data['direccion_mal'])  &&
                empty($data['sin_contra1'])  && empty($data['sin_contra2'])  && empty($data['no_coinciden'])  &&
                empty($data['contra_max'])  && empty($data['contra_mal'])) {

                if (!empty($data['imagen_bien']) && !empty($data['nit_bien']) && !empty($data['nombre_bien']) && 
                        !empty($data['correo_bien']) && !empty($data['direccion_bien']) && !empty($data['contra_bien'])) {

                   
                        $empresa = ['nit_empresa' => $nit_empresa_ok, 'nombre_empresa' => $nombre_empresa_ok, 'imagen_empresa' => $imagen];
                $contact_empresa = ['direccion_empresa' => $direccion_empresa_ok, 'nit_empresa' => $nit_empresa_ok ];
                $users = ['email' => $email_ok, 'password' =>bcrypt($password_ok), 'name' => 'Empresa'];

                $destinationPath = public_path('/images');
                $imagen_llegada->move($destinationPath, $imagen);
                $id = User::create($users)->id;
                $empresa['id'] = $id;
                $empresa_bd = Empresa::create($empresa);
                $contacto_empresa_bd = Contacto_empresa::create($contact_empresa);
                if ($empresa_bd and $contacto_empresa_bd) {
                        $data['registro_ok'] = "bien";  

                }else{
                       $data['registro_mal'] = "mal";  
               }
               
       }

}



} catch (Exception $e) {

}



return json_encode($data);
}



}
