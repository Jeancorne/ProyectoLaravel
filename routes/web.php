<?php


//INDEX //INDEX //INDEX //INDEX //INDEX 
Route::get('index', function () {
	 return view('index');
})->name('index')->middleware('limitar')->middleware('guest');


Route::get('/Vista_proyectos','controller_index@Vista_proyectos')->name('Vista_proyectos')->middleware('guest');

Route::get('/Filtrar_proyectos','controller_index@Filtrar_proyectos')->name('Vista_proyectos')->middleware('guest');

Route::get('/Filtro_ver_mas','controller_index@Filtro_ver_mas')->name('Filtro_ver_mas')->middleware('guest');

Route::get('/Nosotros','controller_index@Nosotros')->name('Nosotros')->middleware('guest');

//INDEX //INDEX //INDEX //INDEX //INDEX 
//INDEX //INDEX //INDEX //INDEX //INDEX 

Route::get('Registrar_Aprendiz', 'Controller_Aprendiz@registro_aprendiz')->name('registro_aprendiz')->middleware('guest');

Route::post('register', 'Controller_Aprendiz@register')->name('register')->middleware('guest');

Route::post('/login_aprendiz', [
    'uses' => 'Controller_Aprendiz@login_aprendiz',
  	'as' => 'login_aprendiz',
]);



Route::get('/deslogeo', [
 'uses' => 'Controller_Aprendiz@deslogeo',
  'as' => 'deslogeo'
]);

Route::get('/Inicio_aprendiz', function () {
	return view('Aprendiz/index_aprendiz');
})->name('Inicio_aprendiz')->middleware('auth')->middleware('limitar');


Route::get('/ver_mas_reto_aprendiz','Controller_Aprendiz@ver_mas_reto_aprendiz')->name('ver_mas_reto_aprendiz')->middleware('auth')->middleware('limitar');

Route::get('/postular_reto','Controller_Aprendiz@postular_reto')->name('postular_reto')->middleware('auth')->middleware('limitar');

Route::get('Perfil_aprendiz','Controller_Aprendiz@Perfil_aprendiz')->name('Perfil_aprendiz')->middleware('auth')->middleware('limitar');

Route::post('Aplicar_reto','Controller_Aprendiz@Aplicar_reto')->name('Aplicar_reto')->middleware('auth')->middleware('limitar');

Route::post('/Integrantes_reto','Controller_Aprendiz@Integrantes_reto')->name('Integrantes_reto')->middleware('auth')->middleware('limitar');

Route::post('/Propuesta_aprendices','Controller_Aprendiz@Propuesta_aprendices')->name('Propuesta_aprendices')->middleware('auth')->middleware('limitar');

Route::post('/Actualizar_propuesta_aprendiz','Controller_Aprendiz@Actualizar_propuesta_aprendiz')->name('Actualizar_propuesta_aprendiz')->middleware('auth')->middleware('limitar');


//Empresa//Empresa//Empresa//Empresa
//Empresa//Empresa//Empresa//Empresa
//Empresa//Empresa//Empresa//Empresa
//Empresa//Empresa//Empresa//Empresa


Route::get('/Empresa_registro','Controller_Empresa@vista_registro')->name('vista_registro');

Route::post('/registrar_empresa','Controller_Empresa@registrar_empresa')->name('registrar_empresa');

Route::post('/login_empresa', [
    'uses' => 'Controller_Empresa@login_empresa',
  	'as' => 'login_empresa', 
]);


Route::get('/Empresa_inicio', function () {
	return view('Empresa/Empresa_inicio');
})->name('Empresa_inicio')->middleware('auth')->middleware('limitar');


Route::get('/perfil_empresa','Controller_Empresa@perfil_empresa')
->name('perfil_empresa')->middleware('auth')->middleware('limitar');

Route::get('/publicar_proyectos','Controller_Empresa@publicar_proyectos')->name('publicar_proyectos')->middleware('auth')->middleware('limitar');

Route::post('/ciudades','Controller_Empresa@ciudades')->name('ciudades');

Route::post('/publicar_proyecto','Controller_Empresa@publicar_proyecto')->name('publicar_proyecto')->middleware('auth')->middleware('limitar');


Route::get('/page_proyectos','Controller_Empresa@page_proyectos')->name('page_proyectos')->middleware('auth')->middleware('limitar');

Route::get('/retos_filtrados','Controller_Empresa@retos_filtrados')->name('retos_filtrados')->middleware('auth')->middleware('limitar');

Route::get('/ver_mas_reto','Controller_Empresa@ver_mas_reto')->name('ver_mas_reto')->middleware('auth')->middleware('limitar');
Route::post('/Click_detalle_reto','Controller_Empresa@Click_detalle_reto')->name('Click_detalle_reto')->middleware('auth')->middleware('limitar');
Route::post('/Actualizar_mi_reto','Controller_Empresa@Actualizar_mi_reto')->name('Actualizar_mi_reto')->middleware('auth')->middleware('limitar');
Route::post('/Click_grupos_reto','Controller_Empresa@Click_grupos_reto')->name('Click_grupos_reto')->middleware('auth')->middleware('limitar');
Route::post('/Click_aprendiz_reto','Controller_Empresa@Click_aprendiz_reto')->name('Click_aprendiz_reto')->middleware('auth')->middleware('limitar');
Route::post('/Update_empresa','Controller_Empresa@Update_empresa')->name('Update_empresa')->middleware('auth')->middleware('limitar');




