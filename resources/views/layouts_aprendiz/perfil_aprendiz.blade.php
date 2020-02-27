<div class="container">
<div class="row">
	<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
		<ol class="breadcrumb">
				<li class="active">Perfil</li>
		</ol>
	</div>
</div>
<div id="Cpanel" class="row">
	@if(!empty($propuestas))
		<div class='col-sm-12 col-xs-12 col-md-12 col-lg-12 mis_retos'>
		<div id='panel' class='row'>
		<div class='col-sm-12 col-xs-12 col-md-5 col-lg-5 integrantes' >
			<div id='panel_reto' class='panel_reto'>
				<table id='table_reto' class='table'>
					<h1>Integrantes</h1>
					<thead>
						<tr>
							<th scope='col'>Aprendiz 1</th>
							<th scope='col'>Aprendiz 2</th>
							<th scope='col'>Aprendiz 3</th>										
						</tr>
					</thead>
					<tfoot> <tr class='formulaire'>
						<input id='ocultar00' value="{{ $propuestas->id }}" readonly /> 
						<input id='ocultar1' value="{{ $propuestas->documento_1 }}" readonly /> 
						<td><p id='probando_1documento'>{{ $propuestas->documento_1 }}</p></td>	
						<input id='ocultar2' value="{{ $propuestas->documento_2 }}" readonly /> 
						<td><p>{{ $propuestas->documento_2 }} </p></td>
						<input id='ocultar3' value="{{ $propuestas->documento_3 }}" readonly /> 
						<td><p>{{ $propuestas->documento_3	 }}</p></td>
					</tr>		
				</tfoot>
			</table>
			</div>
		</div>
		<div class='col-sm-12 col-xs-12 col-md-5 col-lg-5 propuesta_integrantes'>
			<div id='propuesta'>
				<h1>Propuesta:</h1>
				<textarea readonly id='propuesta_texto' rows='5' cols='40'>{{ $propuestas->propuesta }}</textarea>
			</div>
		</div>
		<div class='col-sm-12 col-xs-12 col-md-2 col-lg-2 opciones_integrantes'>
		<h1 id='h1_actualizar'> Acciones </h1>		
			<button type='submit' id='actu_integrantes' class='btn success updat'>Integrantes</button>
			<button type='submit' id='actu_propuesta' class='btn success updat'>Propuesta</button>
			<button type='submit' id='cancelar_actualizado' class='btn success updat'>Cancelar</button>
		</div>
	</div>
</div>
@endif

</div>
<div class="row">
	<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 segundo_panel">

		
	</div>
	<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 tercer_panel">
		
	</div>
</div>
<div class="row">
	<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 total3">
		
		<div class="information">
			<p>Información</p>
		</div>
		<div class="row">
			<div class="col-12 col-sm-12 col-xs-6 col-lg-6 fila1">
				<div id="info_1">
					<p id='documento_aprendiz'> <strong>Documento:</strong> 
						{{ $datos->aprendiz->documento_apre}}
						
					</p>
					<p> <strong>Nombre Completo:</strong>
						{{ $datos->aprendiz->nombre_apre}}
					</p>
					<p> <strong>Apellido Completo:</strong>	
						{{ $datos->aprendiz->apellido_apre}}
					</p>
					<p> <strong>Teléfono fijo:</strong>
						{{ $datos->aprendiz->aprendiz_contacto->tel_fijo}}
					</p>
					<p> <strong>Celular:</strong>
						{{ $datos->aprendiz->aprendiz_contacto->cel_apren}}
					</p>
					<p> <strong>Correo:</strong>
						{{ $datos->email}}
					</p>
				</div>							
			</div>
			<div class="col-12 col-sm-12 col-xs-6 col-lg-6 fila2">
				<div id="info_2">
					<p> <strong>Departamento: </strong>
						{{ $datos->aprendiz->aprendiz_contacto->depart_aprendiz}}
					</p> 
					<p> <strong>Ciudad: </strong>
						{{ $datos->aprendiz->aprendiz_contacto->ciudad_apren}}
					</p> 
					<p> <strong>Programa formación:</strong> 
						{{ $datos->aprendiz->aprendiz_intermedia->programa_intermedia->programa_formacion}}
					</p>
					<p><strong>Número ficha: </strong>
						{{ $datos->aprendiz->aprendiz_intermedia->programa_intermedia->numero_ficha}}
					</p>
					<p> <strong>Centro de formación: </strong>
						{{ $datos->aprendiz->aprendiz_intermedia->programa_intermedia->centro_formacion}}
					</p>
					<p><strong> Dirección de formación: </strong>
						{{ $datos->aprendiz->aprendiz_intermedia->programa_intermedia->direccion_formacion}}
					</p>
				</div>							
			</div>
		</div>
		<div class="row">						
			<div class="col-12 col-sm-12 col-xs-6 col-lg-6 informacion_1">
				<div class="campos_izquierda" ><span class="icon-user  icon2"></span><input type="text"  placeholder="Ingrese Nombre" id="nombre_apre" required></div>
				<div class="campos_izquierda" ><span class="icon-user icon2"></span><input type="text"  placeholder="Apellido"  id="apellido_apre"></div>
				<div class="campos_izquierda" ><span class="icon-telephone icon2"></span><input type="text"  id="tel_fijo" placeholder="Teléfono Fijo"></div>
				<div class="campos_izquierda" ><span class="icon-cell-phone icon2"></span><input type="text"  id="cel_apren"  placeholder="Teléfono Celular"></div>
				<div class="campos_izquierda" ><span class="icon-tree icon2"></span><input type="text" id="centro_formacion" placeholder="Centro de Formación"></div>
			</div>						
			<div class="col-12 col-sm-12 col-xs-6 col-lg-6 informacion_2">
				<div class="campos_derecha"><span class="icon-compass icon2"></span><input type="text"  id="direccion_formacion" placeholder="Dirección de formación" ></div>
				<div class="campos_derecha"><span class="icon-mail icon2"></span><input type="email"  id="correo_apren" placeholder="Correo" ></div>
				<div class="campos_derecha"><span class="icon-key-stroke icon2"></span><input type="password"  id="contrasena_apre"  placeholder="Contraseña"></div>
				<div class="campos_derecha"><span class="icon-key-stroke icon2"></span><input type="password"  id="contrasena_apre2" placeholder="Repetir Contraseña" ></div>
			</div>
		</div>	
			<div class="btn_perfil">
				<button type="submit" id="btn_actualizar" class="btn success uno"> Actualizar </button>
				<a href="inicio_aprendiz.php">
					<button  id="registry"class="btn success uno"> Cancelar </button></a>
			</div>
			<div id="nombre_validado">
			</div>
			<div id="apellido_validado">
			</div>
			<div id="direccion_validado">
			</div>
			<div id="correo_validado">
			</div>
			<div id="fijo_validado">
			</div>
			<div id="celular_validado">
			</div>
			<div id="centro_validado">
			</div>
			<div id="contra_validado">
			</div>	

		</div>
	</div>
	<div class="fixed-bottom">
		<div id='validar_propuesta'>
		</div>
		<div id='validar_documento'>
		</div>						
	</div>

</div>