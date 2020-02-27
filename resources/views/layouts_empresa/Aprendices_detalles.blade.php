



	<div id='poner_propuesta' class="row">
		<div class='col-12 col-sm-9 col-xs-9 col-lg-9 ventan'>
			<h1><input type='button' id="cancelar_vermas" value='Cancelar'  class='btn success cancelar_campo'>
				Propuesta:
			</h1>
			<textarea class='form-control' readonly rows='5'>{{ $datos2->propuesta }}</textarea>
		</div>
		<div class='col-12 col-sm-3 col-xs-3 col-lg-3 docu_venta'>
			<h4> Documento: </h4>
			<hr>
			<a id='enlace_archivo' href='Documentos_propuestas/{{ $datos2->documento_propuesta }}'>
				<span class='icon-download'></span><a>
					<br>
					<p>{{ $datos2->documento_propuesta }} </p>
				</div>


			</div>
			<h1> Información:</h1>
			<div class="poner">
				@foreach($datos as $row)
				<div class='aprendices_en_reto'>
					<p>
						<strong>Documento: </strong>
						{{ $row->documento_apre }}
					</p>
					<p>
						<strong>Nombre: </strong>
						{{ $row->nombre_apre }}
					</p>
					<p>
						<strong>Apellido:</strong>
						{{ $row->apellido_apre }}
					</p>
					<p>
						<strong>Telefojo:</strong>
						{{ $row->tel_fijo }}
					</p>
					<p>
						<strong>Celular:</strong>
						{{ $row->cel_apren }}
					</p>
					<p>
						<strong>Departamento:</strong>
						{{ $row->depart_aprendiz }}
					</p>
					<p>
						<strong>Ciudad:</strong>
						{{ $row->ciudad_apren }}
					</p>
					<p>
						<strong>Correo:</strong>
						{{ $row->email }}
					</p>
					<p>
						<strong>Numero ficha:</strong>
						{{ $row->numero_ficha }}
					</p>
					<p>
						<strong>Programa formacion:</strong>
						{{ $row->programa_formacion }}
					</p>
					<p>
						<strong>Centro formacion:</strong>
						{{ $row->centro_formacion }}
					</p>
					<p>
						<strong>Direccion formacion:</strong>
						{{ $row->direccion_formacion }}
					</p>
				</div>
				@endforeach
		</div>




