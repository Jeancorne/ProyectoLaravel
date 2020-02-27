<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\View;
use Redirect;
use Session;
use Illuminate\Http\RedirectResponse;
use Crypt;
use Response;
use Illuminate\Http\Request;
use App\Aprendiz;
use App\aprendiz_programa;
use App\contacto_apren;
use App\Proye_propuesta;
use App\programas;
use App\User;
use App\Proyectos;
use App\Propuestas;
//use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use File;
use Validator;
use Reglas\Validar;
use App\Rules\aprendiz_validar;

class Controller_Aprendiz extends Controller
{
   public function registro_aprendiz(){
    return view('Aprendiz');
}
public function deslogeo(){
    Session::flush();
    Auth::logout();
    return Redirect::to('index');

}


public function ver_mas_reto_aprendiz(request $request){
    if ($request->ajax()) {
        DB::beginTransaction();
        $id = $request['id'];
        $resultado = Proyectos::with('empresa')
        ->where('id',$id)
        ->first();
        DB::commit();
        return Response::json(View::make('Aprendiz.detalles_reto_aprendiz', compact('resultado'))->render());
    }
}

public function postular_reto(Request $request){
   return Response::json(View::make('Aprendiz.postular_reto',)->render());
}

public function Actualizar_propuesta_aprendiz(Request $request){
    if ($request->ajax()) {
     $propuesta = trim($request['propuesta_text']);
     $foranea = $request['foranea'];
     $documento_llegada = $request->file('documento_apren');          
     if (!empty($documento_llegada) and !empty($propuesta)) {
        $documento_nombre = $request->file('documento_apren')->getClientOriginalName();
        $documento_tipo = $request->file('documento_apren')->getClientOriginalExtension();
        $documento_size = $request->file('documento_apren')->getSize();
        $formatos_validos = array('docx', 'doc', 'dotx','docm');                

        if(in_array($documento_tipo, $formatos_validos)){
            if ($documento_size < 1000000) {
                $data['document_bien'] = "ok";
            }else{
                $data['document_max'] = "<div class='alert alert-danger'>El documento supera el peso permitido.</div>";
            }
        }else{
            $data['document_mal'] = "<div class='alert alert-danger'>El documento no tiene el formato permitido, debe ser '.doc','.docx' o 'dotx'</div>";
        }
        if (!empty($propuesta)) { 
            if (strlen($propuesta) < 8000) {
                $data['propuesta_bien'] = "ok";
            }else{
                $data['propuesta_mal'] =  "<div class='alert alert-danger' role='alert'>
                La propuesta no puede superar los 8000 caracteres.
                </div>";
            }
        }else{
            $data['propuesta_empty'] =  "<div class='alert alert-danger' role='alert'>
            Debe dar una propuesta al proyecto.
            </div>";
        }
        if (empty($data['propuesta_empty']) and empty($data['propuesta_mal']) and empty($data['document_mal']) and
            empty($data['document_max'])) {
            try {
                DB::beginTransaction();              
                $sacar_documento = Propuestas::where('id',$foranea)
                ->get('documento_propuesta')                       
                ->first()->ToArray();                 
                $update =  Propuestas::where('id',$foranea)
                ->update(['propuesta' => $propuesta, 'documento_propuesta' => $documento_nombre]);
                if ($update) {
                 $destino_archivo = public_path('/Documentos_propuestas');
                 $documento_llegada->move($destino_archivo, $documento_nombre);             
                 $imagen_app = public_path('/Documentos_propuestas/'.$sacar_documento['documento_propuesta']);
                 if (File::exists($imagen_app)) {
                    unlink($imagen_app);
                }
                if ($update) {
                    $data['actualizado'] = "
                    <div class='alert alert-success'>
                    Actualizado correctamente</div>
                    ";
                }

            }                         

            DB::commit();
        } catch (Exception $e) {

        }
    }
}

if (!empty($propuesta) and empty($documento_llegada)) {
    if (!empty($propuesta)) { 
        if (strlen($propuesta) < 8000) {
            $data['propuesta_bien'] = "ok";
        }else{
            $data['propuesta_mal'] =  "<div class='alert alert-danger' role='alert'>
            La propuesta no puede superar los 8000 caracteres.
            </div>";
        }
    }else{
        $data['propuesta_empty'] =  "<div class='alert alert-danger' role='alert'>
        Debe dar una propuesta al proyecto.
        </div>";
    }    
}

if (empty($data['propuesta_empty']) and empty($data['propuesta_mal'])) {
    if (!empty($data['propuesta_bien'])) {
        DB::beginTransaction();
        $update =  Propuestas::where('id',$foranea)
        ->update(['propuesta' => $propuesta]);
        if ($update) {
            $data['actualizado'] = "
            <div class='alert alert-success'>
            Actualizado correctamente</div>
            ";
        }
        DB::commit();
    }
}
return Response::json($data);


}


}

public function Propuesta_aprendices(Request $request){
    if ($request->ajax()) {
        DB::beginTransaction();
        $foranea = $request['foranea'];
        $propuesta = $request['propuesta'];

        $consulta = Propuestas::where('id',$foranea)
        ->first();

        return Response::json([
            'dataa' => View::make('layouts_aprendiz.mostrar_propuesta', compact('consulta'))->render()
        ]);
            //return Response::json(View::make('layouts_aprendiz.mostrar_propuesta', compact('consulta'))->render());
        DB::commit();
    }
}

public function Integrantes_reto(Request $request){
    if ($request->ajax()) {
        DB::beginTransaction();
        $documento1 = $request['identidad1'];
        $documento2 = $request['identidad2'];
        $documento3 = $request['identidad3'];
        if (!empty($documento1) and empty($documento2) and empty($documento3)) {
            $documento1 = $request['identidad1'];
            $datos_uno = Aprendiz::where('documento_apre',$documento1)
            ->first();

            return Response::json([
                'data' => View::make('layouts_aprendiz.mostrar_integrantes', compact('datos_uno'))->render()
            ]);              
        }
        if (!empty($documento1) and !empty($documento2) and empty($documento3)) {
            $documento1 = $request['identidad1'];
            $documento2 = $request['identidad2'];
            $datos_dos = Aprendiz::where('documento_apre',$documento1)
            ->first();
            $datos_dos_dos = Aprendiz::where('documento_apre',$documento2)
            ->first();
            return Response::json([
                'data' => View::make('layouts_aprendiz.mostrar_integrantes', compact('datos_dos','datos_dos_dos'))->render()
            ]);               
        }
        if (!empty($documento1) and !empty($documento2) and !empty($documento3)) {
            $documento1 = $request['identidad1'];
            $documento2 = $request['identidad2'];
            $datos_tres = Aprendiz::where('documento_apre',$documento1)
            ->first();
            $datos_tres_tres = Aprendiz::where('documento_apre',$documento2)
            ->first();
            $datos_tres_tres_tres = Aprendiz::where('documento_apre',$documento3)
            ->first();
            return Response::json([
                'data' => View::make('layouts_aprendiz.mostrar_integrantes', compact('datos_tres','datos_tres_tres','datos_tres_tres_tres'))->render()
            ]);   
        }
        DB::commit();
    }
}

public function perfil_aprendiz(request $request){
    try {
        DB::beginTransaction();
        $user_id = Auth::user()->id;
        $datos = User::with('aprendiz')
        ->where('users.id',$user_id)
        ->first();
        $documento = $datos->aprendiz->documento_apre;
        $propuestas = Propuestas::where('documento_1',$documento)
        ->orWhere('documento_2',$documento)
        ->orWhere('documento_3',$documento)
        ->first();
        
        DB::commit();
    } catch (Exception $e) {

    }

    return Response::json(View::make('layouts_aprendiz.perfil_aprendiz', compact('datos','propuestas'))->render());        
}

public function Aplicar_reto(Request $request){
    if ($request->ajax()) {            
        try {
            DB::beginTransaction();
            $id_foranea = $request['id_foranea'];            
            $patron = '/[0-9][^\D\s\W]$/';
            $documento_uno = trim($request['primer_documento']);
            $documento_dos = trim($request['segundo_documento']);
            $documento_tres = trim($request['tercero_documento']);
            $propuesta = trim($request['propuesta']);
            if (!empty($request['documento_aprendiz'])) {
               $documento_llegada = $request->file('documento_aprendiz');
               $documento_size = trim($_FILES['documento_aprendiz']['size']);
               $nombre_documento = time().'.'.$documento_llegada->getClientOriginalExtension(); 
               $formatos_validos = array('docx', 'doc', 'dotx','docm');
               $extension_documento = strtolower(pathinfo($nombre_documento, PATHINFO_EXTENSION));
               if(in_array($extension_documento, $formatos_validos)){
                if ($documento_size < 9000000) {
                    $data['document_bien'] = "ok";
                }else{
                    $data['document_max'] = "<div class='alert alert-danger'>El documento supera el peso permitido.</div>";
                }
            }else{
                $data['document_mal'] = "<div class='alert alert-danger'>El documento no tiene el formato permitido, debe ser '.doc','.docx' o 'dotx'</div>";
            }
        }else{
            $data['document_empty'] = "<div class='alert alert-danger'>No hay documento</div>";
        }
        if (!empty($documento_uno)) {
            if (strlen($documento_uno) < 40) {
             if (preg_match($patron,$documento_uno)) {
                $consulta = Aprendiz::select('documento_apre')->where('documento_apre',$documento_uno)->get()->ToArray();
                if (count($consulta) > 0) {
                    $consulta = Propuestas::where('documento_1',$documento_uno)
                    ->orWhere('documento_2', $documento_uno)
                    ->orWhere('documento_3', $documento_uno)                  
                    ->get()
                    ->ToArray();
                    if (count($consulta) < 1) {
                     $data['documento_uno_ok'] =  "ok";
                 }else{
                    $data['documento1_existe'] =  "<div class='alert alert-danger' role='alert'>
                    El aprendiz con el documento " .$documento_uno. " ya aplicó a un proyecto.
                    </div>";
                }
            }else{
               $data['documento1_existe'] =  "<div class='alert alert-danger' role='alert'>
               El aprendiz con el documento " .$documento_uno. " no existe.
               </div>";
           }

       }else{
          $data['documento1_mal'] =  "<div class='alert alert-danger' role='alert'>
          El primer documento no es correcto.
          </div>";
      }
  }else{
    $data['documento1_mal'] =  "<div class='alert alert-danger' role='alert'>
    El primer documento no es correcto.
    </div>";
}
}else{
    $data['documento1_empty'] =  "<div class='alert alert-danger' role='alert'>
    El primer documento no existe
    </div>";
}


if (!empty($documento_dos)) {
    if (strlen($documento_dos) < 40) {
        if (preg_match($patron, $documento_dos)) {
            $consulta = Aprendiz::select('documento_apre')->where('documento_apre',$documento_dos)->get()->ToArray();
            if (count($consulta) > 0) {
                $consulta = Propuestas::where('documento_1',$documento_dos)
                ->orWhere('documento_2', $documento_dos)
                ->orWhere('documento_3', $documento_dos)                  
                ->get()
                ->ToArray();
                if (count($consulta) < 1) {
                 $data['documento_dos_ok'] =  "ok";
             }else{
                $data['documento2_existe'] =  "<div class='alert alert-danger' role='alert'>
                El aprendiz con el documento " .$documento_dos. " ya aplicó a un proyecto.
                </div>";
            }

        }else{
            $data['documento2_no_existe'] =  "<div class='alert alert-danger' role='alert'>
            La segunda persona no esta registrada.
            </div>";
        }

    }else{
        $data['documento2_mal'] =  "<div class='alert alert-danger' role='alert'>
        El segundo documento no es correcto.
        </div>";
    }

}else{
    $data['documento2_mal'] =  "<div class='alert alert-danger' role='alert'>
    El segundo documento no es correcto.
    </div>";
}
}


if (!empty($documento_tres)) {
    if (strlen($documento_tres) < 40) {
        if (preg_match($patron, $documento_tres)) {
         $consulta = Aprendiz::select('documento_apre')->where('documento_apre',$documento_tres)->get()->ToArray();
         if (count($consulta) > 0) {
            $consulta = Propuestas::where('documento_1',$documento_tres)
            ->orWhere('documento_2', $documento_tres)
            ->orWhere('documento_3', $documento_tres)                  
            ->get()
            ->ToArray();
            if (count($consulta) < 1) {
             $data['documento_tres_ok'] =  "ok";
         }else{
            $data['documento3_existe'] =  "<div class='alert alert-danger' role='alert'>
            El aprendiz con el documento " .$documento_tres. " ya aplicó a un proyecto.
            </div>";
        }
    }else{
        $data['documento3_no_existe'] =  "<div class='alert alert-danger' role='alert'>
        La tercera persona no esta registrada.
        </div>";
    }
}else{
    $data['documento3_mal'] =  "<div class='alert alert-danger' role='alert'>
    El tercer documento no es correcto.
    </div>";
}
}else{
    $data['documento3_mal'] =  "<div class='alert alert-danger' role='alert'>
    El documento no puede superar los 40 caracteres.
    </div>";
}
}

if (!empty($propuesta)) {       
    if (strlen($propuesta)< 8000) {         
        $data['propuesta_bien'] = "ok";       
    }else{
        $data['propuesta_mal'] =  "<div class='alert alert-danger' role='alert'>
        La propuesta no puede superar los 8000 caracteres.
        </div>";
    }
}else{
    $data['propuesta_empty'] =  "<div class='alert alert-danger' role='alert'>
    Debe dar una propuesta al proyecto.
    </div>";
}

if (empty($data['document_empty']) and empty($data['document_mal']) and empty($data['document_max']) and
    empty($data['documento1_empty']) and empty($data['documento1_mal']) and empty($data['documento1_existe']) and
    empty($data['documento2_mal']) and empty($data['documento2_no_existe']) and empty($data['documento2_existe']) and
    empty($data['documento3_mal']) and empty($data['documento3_no_existe']) and empty($data['documento3_existe']) and
    empty($data['propuesta_empty']) and empty($data['propuesta_mal'])) {


    if (!empty($data['document_bien']) and !empty($data['documento_uno_ok']) and !empty($data['propuesta_bien'])) {
        $propuesta_datos = ['documento_1' => $documento_uno, 'documento_propuesta' => $nombre_documento, 'propuesta' => $propuesta];
        $query = Propuestas::create($propuesta_datos)->id;
        $intermedia_datos = ['id_proyecto' => $id_foranea, 'id_propuesta' => $query];
        $query2 = Proye_propuesta::create($intermedia_datos);
        if ($query and $query2) {
           $destino_archivo = public_path('/Documentos_propuestas');
           $documento_llegada->move($destino_archivo, $nombre_documento);
           $data['correcto'] = "<div  id='probando_1' class='alert alert-success'>
           Su postulación ha sido correcta</div>";
       }
   }

   if (!empty($data['document_bien']) and !empty($data['documento_uno_ok']) and !empty($data['documento_dos_ok']) and !empty($data['propuesta_bien'])) {

    $propuesta_datos = ['documento_1' => $documento_uno, 'documento_2' => $documento_dos ,'documento_propuesta' => $nombre_documento, 'propuesta' => $propuesta];
    $query = Propuestas::create($propuesta_datos)->id;
    $intermedia_datos = ['id_proyecto' => $id_foranea, 'id_propuesta' => $query];
    $query2 = Proye_propuesta::create($intermedia_datos);
    if ($query and $query2) {
       $destino_archivo = public_path('/Documentos_propuestas');
       $documento_llegada->move($destino_archivo, $nombre_documento);
       $data['correcto'] = "<div  id='probando_1' class='alert alert-success'>
       Su postulación ha sido correcta</div>";
   }
}

if (!empty($data['document_bien']) and !empty($data['documento_uno_ok']) and !empty($data['documento_tres_ok']) and !empty($data['documento_dos_ok']) and !empty($data['propuesta_bien'])) {

    $propuesta_datos = ['documento_1' => $documento_uno, 'documento_2' => $documento_dos, 'documento_3'=> $documento_tres ,'documento_propuesta' => $nombre_documento, 'propuesta' => $propuesta];
    $query = Propuestas::create($propuesta_datos)->id;
    $intermedia_datos = ['id_proyecto' => $id_foranea, 'id_propuesta' => $query];
    $query2 = Proye_propuesta::create($intermedia_datos);
    if ($query and $query2) {
       $destino_archivo = public_path('/Documentos_propuestas');
       $documento_llegada->move($destino_archivo, $nombre_documento);
       $data['correcto'] = "<div  id='probando_1' class='alert alert-success'>
       Su postulación ha sido correcta</div>";
   }
}

}

DB::commit();

} catch (Exception $e) {

}
return Response::json($data);
}
}
public function login_aprendiz(request $request){
    $data[] = "";
    if ($request['email'] != null) {
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];
        $mirar = Auth::attempt($credentials);
        if ($mirar) {

            $datos = User::with('aprendiz')
            ->where('email',$request['email'])
            ->get('name')->ToArray();

            if ($datos[0]['name'] == "Aprendiz") {
                $data['ok'] = "bien";          
            }
        }else{
            $data['error'] = "<div class='alert alert-info' role='alert'>
            Correo o contraseña incorrecta.
            </div>";
        }
    }else{
       $data['campos_vacios'] = "<div class='alert alert-info' role='alert'>
       Los campos no deben estar vacíos.
       </div>";
   }
   return json_encode($data);
}    
public function register(request $request)
{
   $aprendiz = [];
   $datos = [];
   $programa_datos = [];
   $aprendiz_programa = [];
   $tabla_user = [];
   $datos_user = ["email"];
   $datos_aprendiz = ["documento_apre","nombre_apre","apellido_apre"];
   $datos_contacto = ["tel_fijo","cel_apren","depart_aprendiz","ciudad_apren","documento_apre"];
   $datos_programa = ["numero_ficha","programa_formacion","centro_formacion","direccion_formacion"];
   $datos_intermedia = ["documento_apre"];        
   $mensaje[] = "";
   try {
    DB::beginTransaction(); 
    $password=$request->input('password2');           
    $password2=$request->input('password2');
            //$tabla_user['password'] = bcrypt($password);
    foreach($request->all() as $key => $value){
        if(in_array( $key, $datos_aprendiz )){
            $aprendiz[$key] = $value;
        }
        if (in_array($key, $datos_contacto)) {
            $datos[$key] = $value;
        }
        if (in_array($key, $datos_programa)) {
            $programa_datos[$key] = $value;
        }
        if (in_array($key, $datos_intermedia)) {
            $aprendiz_programa[$key] = $value;
        }
        if (in_array($key, $datos_user)) {
            $tabla_user[$key] = $value;
        }
    }
    if (!empty($aprendiz['documento_apre']) and  !empty($aprendiz['nombre_apre']) and !empty($aprendiz['apellido_apre']) and 
       !empty($datos['tel_fijo']) and !empty($datos['cel_apren']) and 
       !empty($datos['depart_aprendiz']) and 
       !empty($datos['ciudad_apren'])  and
       !empty($programa_datos['numero_ficha']) and
       !empty($programa_datos['programa_formacion']) and
       !empty($programa_datos['centro_formacion']) and
       !empty($programa_datos['direccion_formacion']) and !empty($tabla_user['email']) and $password ) {
        $patron_documento = '/[0-9][^\D]$/';
    if (strlen($aprendiz['documento_apre'])< 40) {
        if (preg_match($patron_documento,$aprendiz['documento_apre'] )) {
            $documento_apre = "ok";
        }else{
            $mensaje['documento_mal'] = "<div class='alert alert-warning'> El documento no puede tener caracteres especiales</div>";
        }
    }else{
       $mensaje['documento_max'] = "<div class='alert alert-warning'>El documento no puede superar los 40 números.</div>";

   }
   $patron_nombre = '/[a-zA-Záéíóúñ][^\d\W]$/';
   if (strlen($aprendiz['nombre_apre']) < 50) {
    if (preg_match($patron_nombre, $aprendiz['nombre_apre'])) {
        $nombre_apre = "ok";
    }else{
        $mensaje['nombre_mal'] = "<div class='alert alert-warning'> El nombre no puede tener caracteres especiales</div>";
    }
}else{
    $mensaje['nombre_max'] = "<div class='alert alert-warning'> El nombre no puede superar los 50 caracteres</div>";
}
$patron_contra = '/[a-zA-Z0-9][^\W\s]$/';
if (strlen($password)< 35) {
    if (preg_match($patron_contra, $password )) {
        if ($password == $password2) {
            $contrasena_apre = "ok";
        }else{
            $mensaje['no_coinciden'] = "<div class='alert alert-warning'>Las contraseñas no coinciden</div>";
        }
    }else{
        $mensaje['contra_mal'] = "<div class='alert alert-warning'>Las contraseña  no puede contener caracteres especiales</div>";
    }
}else{
    $mensaje['contra_max'] = "<div class='alert alert-warning'>Las contraseña no debe superar los 35 caracteres</div>";
}
$patron_fijo = '/[0-9]{6}[^\D]$/';
if (strlen($datos['tel_fijo']) < 8) {
    if (preg_match($patron_fijo, $datos['tel_fijo'])) {
        $tel_fijo = "ok";
    }else{
        $mensaje['fijo_mal'] = "<div class='alert alert-warning'> El teléfono no puede tener caracteres especiales y debe tener 7 dígitos</div>";
    }
}else{
    $mensaje['fijo_max'] = "<div class='alert alert-warning'> El teléfono fijo no puede superar los 7 dígitos</div>";
}
$patron_celular = '/[0-9]{9}[^\D]$/';
if (strlen($datos['cel_apren']) < 11) {
    if (preg_match($patron_celular, $datos['cel_apren'])) {
        $cel_apren = "ok";
    }else{
        $mensaje['celular_mal'] = "<div class='alert alert-warning'> El celular no puede tener caracteres especiales y debe tener 10 dígitos</div>";
    }
}else{
    $mensaje['celular_max'] = "<div class='alert alert-warning'> 
    El teléfono fijo no puede superar los 7 dígitos</div>";
}

if ($datos['depart_aprendiz'] != "Departamento") {
    $depart_aprendiz = "ok";
}else{
    $mensaje['sin_departamento'] = "<div class='alert alert-warning'>Debe elegir su Departamento</div>";
}

if ($datos['ciudad_apren'] != "Ciudad") {
    $ciudad_apren = "ok";
}else{
    $mensaje['sin_ciudad'] = "<div class='alert alert-warning'>Debe elegir su Departamento</div>";
}

if (strlen($tabla_user['email']) < 50) {
    if (filter_var($tabla_user['email'],FILTER_VALIDATE_EMAIL)) {
        $correo_apren = "ok";
    }else{
        $mensaje['correo_mal'] = "<div class='alert alert-warning'> El correo no es valido</div>";
    }
}else{
    $mensaje['correo_max'] = "<div class='alert alert-warning'> El correo no puede superar los 50 caracteres</div>";
}
$patron_ficha = '/[0-9]{6}[^\D]$/';
if (strlen($programa_datos['numero_ficha']) < 8) {
    if (preg_match($patron_ficha, $programa_datos['numero_ficha'])) {
        $numero_ficha = "ok";
    }else{
        $mensaje['ficha_mal'] = "<div class='alert alert-warning'> El ficha no puede tener caracteres especiales y debe tener 7 dígitos</div>";
    }
}else{
    $mensaje['ficha_max'] = "<div class='alert alert-warning'> La ficha no puede superar los 7 dígitos</div>";
}
if (strlen($programa_datos['programa_formacion']) < 70) {
    if (preg_match($patron_nombre, $programa_datos['programa_formacion'])) {
        $programa_formacion = "ok";
    }else{
        $mensaje['programa_mal'] = "<div class='alert alert-warning'> El programa de formación no debe contener caracteres especiales</div>";
    }
}else{
    $mensaje['programa_max'] = "<div class='alert alert-warning'> El programa de formación no puede superar los 70 caracteres</div>";
}
if (strlen($programa_datos['centro_formacion']) < 15) {
    if (preg_match($patron_nombre, $programa_datos['centro_formacion'])) {
        $centro_formacion = "ok";
    }else{
        $mensaje['centro_mal'] = "<div class='alert alert-warning'>El centro de formación no debe contener caracteres especiales</div>";
    }
}else{
    $mensaje['centro_max'] = "<div class='alert alert-warning'>El centro de formación no puede superar los 15 caracteres</div>";
}
$patron_direccion = '/[a-zA-Z0-9áéíóúñ][^\W]$/';
if (strlen($programa_datos['direccion_formacion']) < 15) {
    if (preg_match($patron_direccion, $programa_datos['direccion_formacion'])) {
        $direccion_formacion = "ok";
    }else{
        $mensaje['direccion_mal'] = "<div class='alert alert-warning'> La dirección de formación no debe contener caracteres especiales</div>";
    }
}else{
    $mensaje['direccion_max'] = "<div class='alert alert-warning'>La dirección de formación no puede superar los 15 caracteres</div>";
}


if (!empty($documento_apre) and  !empty($nombre_apre) and   !empty($contrasena_apre) and 
    !empty($tel_fijo) and  !empty($cel_apren) and  !empty($depart_aprendiz) and  !empty($ciudad_apren) and 
    !empty($correo_apren) and  !empty($numero_ficha) and  !empty($programa_formacion) and 
    !empty($centro_formacion) and  !empty($direccion_formacion) ) {
    $tabla_user['password'] = bcrypt($password);
$tabla_user['name'] = "Aprendiz";
$id = User::create($tabla_user)->id;
$aprendiz['id_user'] = $id;
$aprendiz_bd = Aprendiz::create($aprendiz);
$contacto = contacto_apren::create($datos);
$id = programas::create($programa_datos)->id;
$aprendiz_programa['id'] = $id;       
$intermedia = Aprendiz_Programa::create($aprendiz_programa);
if ($aprendiz_bd and $contacto and $aprendiz_programa and $intermedia) {
    $mensaje['registrado'] = "<div class='alert alert-success'>Registrado correctamente.</div>"; 
}
}
}else{
    $mensaje['faltan_datos'] = "<div class='alert alert-danger'>Los campos no deben estar vacíos.</div>";
}
DB::commit();
} catch (Exception $e) {

}
return Response::json($mensaje);
}
}