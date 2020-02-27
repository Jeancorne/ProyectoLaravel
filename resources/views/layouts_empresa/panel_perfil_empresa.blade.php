<div class="row">
	<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
		<ol class="breadcrumb">
			<li class="active">Mi Perfil</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-12 col-sm-12 col-xs-12 col-lg-12 industria1">
		<div class="row">
			<div class="col-12 col-sm-12 col-xs-6 col-lg-6 publi">
				<h1> Mis retos publicados</h1>
			</div>
			<div class="col-12 col-sm-12 col-xs-6 col-lg-6 botones">
				<button type="submit" class="btn success btn_mostrar">Mostrar</button>
				<button type="submit" class="btn success btn_ocultar">Ocultar</button>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12 col-sm-12 col-xs-12 col-lg-12 resultado_publi">
		<table id="tabla_resultados" class="table">
			<thead class="head_table">
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Nombre</th>
					<th scope="col">Categoría</th>
					<th scope="col">Descripción</th>
					<th scope="col">Fecha Fin</th>
					<th scope="col">Ver</th>
					<th scope="col">Ver</th>
				</tr>
			</thead>
			<tbody class="resultados_tabla">
				@if(count($datos2)>0)
				@foreach($datos2 as $datos2)
				<tr>
					<th scope='row'>1</th>
					<td>{{ $datos2->id }}</td>
					<td>{{ $datos2->nombre_proye }}</td>
					<td>{{ $datos2->categoria_proye }}</td>
					<td>{{ $datos2->descripcion_proye }}</td>
					<td><input type='button' value='Detalles' class='btn success buto' name="{{ $datos2->id }}">
					</td>
					<td><input type='button' value='Grupos'  class='btn success grupos_reto' name="{{ $datos2->id }}">
					</td>							
				</tr>
				@endforeach
				@else
				<div id="aviso_regis" class="alert alert-info">No hay registros.</div>
				@endif
			</tbody>
		</table>
	</div>			
</div>
<div  class="row">
	<div class="col-12 col-sm-12 col-xs-12 col-lg-12 aprendices_reto" id="aprendices_ligados_reto">
	</div>
</div>
<div  class="row">
	<div class="col-12 col-sm-12 col-xs-12 col-lg-12 aprendiz_aplicado">
	</div>
</div>
<div id="reto_deta">
</div>	
<div class="row">
	<div id="poner_datos">
		<div class='col-12 col-sm-12 col-xs-12 col-lg-12 total3'>
			<h1> Información</h1>
			<form  enctype='multipart/form-data' id='form_empresa' >
				<div class='row'>
					<div class='col-12 col-sm-12 col-xs-12 col-lg-8 datos_fila'>
						<p><strong>Nit empresa:</strong>
							{{ $datos->nit_empresa }}
						</p>
						<p><strong>Nombre Empresa:</strong>
							{{ $datos->nombre_empresa }}
						</p> 
						<p><strong>Correo Empresa:</strong>
							{{ $datos->email }}
						</p>
						<p> <strong>Direccion Empresa:</strong>
							{{ $datos->direccion_empresa }}							
						</p>
					</div>
					<div class='col-12 col-sm-12 col-xs-12 col-lg-4 imagen_fila'>
						<p><strong>Imagen Empresa:</strong></p>
						<div class='imagen_empresa'>
							<img src="images/{{ $datos->imagen_empresa }}">
						</div>
						<div class='actualizar_imagen'>
							<input type='file' name='imagen_empresa' >
						</div>
					</div>
				</div>
				<div class='informacion_actualizar'>
					<h1> Actualizar información</h1>
					<div class='campo'><span class='icon-compass icon2'></span><input type='text' placeholder='Dirección'  name='direccion_empresa'></div>
					<div class='campo'><span class='icon-avatar icon2'></span><input 
						type='text' name='nombre_empresa' placeholder='Nombre'></div>					
						<div class='campo'><span class='icon-key-stroke icon2'></span><input type='password' 
							name='contra_empresa1'  placeholder='Contraseña'></div>
							<div class='campo'><span class='icon-key-stroke icon2'></span><input type='password' 
								name='contra_empresa2'  placeholder='Repetir Contraseña' ></div>
								<input type='submit' id='ww' name='btn_actualizar' value='Actualizar' class='btn success uno'>
								<a href='../inicio_empresa.php'>
									<button type='button' id='registry'class='btn success uno'> Cancelar </button> </a>
									<div id='alerta_direccion'>
									</div>
									<div id='alerta_nombre'>
									</div>
									<div id='alerta_contrasena'>
									</div>
									<div class='alerta_imagen'>
									</div>
									<div id='alerta_contrasena'>
									</div>									
								</div>	
							</form>	
						</div>
					</div>
				</div>