@if(!empty($datos_uno))

	<div class="row">
	<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4 integrante_1">
		<div class='panel_integrante1'>
			<h1 id='primer_integrante'> Integrante </h1>
			<p class='campo_integrante1'> <strong>Nombre y apellido: </strong>
				{{ $datos_uno->nombre_apre }} {{ $datos_uno->apellido_apre }}
			</p>
			<p class='campo_integrante1'> <strong>Documento: </strong>
				{{ $datos_uno->documento_apre }}
			</p>
			<p class='campo_integrante1'> <strong>Ficha: </strong>
				{{ $datos_uno->aprendiz_intermedia->programa_intermedia->numero_ficha }}
			</p>
			<p class='campo_integrante1'> <strong>Programa formación: </strong>
				{{ $datos_uno->aprendiz_intermedia->programa_intermedia->programa_formacion }}
			</p>
		</div>	
	</div>
	<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4 integrante_2">
		<div class='agregar_integrante'>
			<p> <strong> Documento del integrante nuevo </strong>
				<input type='text' id='documento_aprendiz2' placeholder='Documento'>
			</p>
			<div id='texto_confi2'>									
			</div>
			<button type='submit' id='btn_add_integrante2'>
				Agregar
			</button>
		</div>
	</div>
	<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4 integrante_3">
		<div class='agregar_integrante'>
			<p> <strong> Documento del integrante nuevo </strong>
				<input type='text' id='documento_aprendiz' placeholder='Documento'>
			</p>
			<div id='texto_confi3'>									
			</div>
			<button type='submit' id='btn_add_integrante3'>
				Agregar
			</button>
		</div>

	</div>
</div>

@endif


@if(!empty($datos_dos) && !empty($datos_dos_dos))
<div class="row">
	<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4 integrante_1">
		<div class='panel_integrante1'>
			<h1 id='primer_integrante'> Integrante </h1>
			<p class='campo_integrante1'> <strong>Nombre y apellido: </strong>
				{{ $datos_dos->nombre_apre }} {{ $datos_dos->apellido_apre }}
			</p>
			<p class='campo_integrante1'> <strong>Documento: </strong>
				{{ $datos_dos->documento_apre }}
			</p>
			<p class='campo_integrante1'> <strong>Ficha: </strong>
				{{ $datos_dos->aprendiz_intermedia->programa_intermedia->numero_ficha }}
			</p>
			<p class='campo_integrante1'> <strong>Programa formación: </strong>
				{{ $datos_dos->aprendiz_intermedia->programa_intermedia->programa_formacion }}
			</p>
		</div>	
	</div>
	<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4 integrante_2">
		<div class='panel_integrante2'>
			<h1 id='segundo_integrante'> Integrante </h1>
			<p class='campo_integrante2'> <strong>Nombre y apellido: </strong>
				{{ $datos_dos_dos->nombre_apre }} {{ $datos_dos_dos->apellido_apre }}
			</p>
			<p class='campo_integrante2'> <strong>Documento: </strong>
				{{ $datos_dos_dos->documento_apre }}
			</p>
			<p class='campo_integrante2'> <strong>Ficha: </strong>
				{{ $datos_dos_dos->aprendiz_intermedia->programa_intermedia->numero_ficha }}
			</p>
			<p class='campo_integrante2'> <strong>Programa formación: </strong>
				{{ $datos_dos_dos->aprendiz_intermedia->programa_intermedia->programa_formacion }}
			</p>
		</div>
	</div>
	<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4 integrante_3">
		<div class='agregar_integrante'>
			<p> <strong> Documento del integrante nuevo </strong>
				<input type='text' id='documento_aprendiz' placeholder='Documento'>
			</p>
			<div id='texto_confi3'>									
			</div>
			<button type='submit' id='btn_add_integrante3'>
				Agregar
			</button>
		</div>
	</div>
</div>

@endif

@if(!empty($datos_tres) && !empty($datos_tres_tres) && !empty($datos_tres_tres_tres))
<div class="row">
	<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4 integrante_1">
		<div class='panel_integrante1'>
			<h1 id='primer_integrante'> Integrante </h1>
			<p class='campo_integrante1'> <strong>Nombre y apellido: </strong>
				{{ $datos_tres->nombre_apre }} {{ $datos_tres->apellido_apre }}
			</p>
			<p class='campo_integrante1'> <strong>Documento: </strong>
				{{ $datos_tres->documento_apre }}
			</p>
			<p class='campo_integrante1'> <strong>Ficha: </strong>
				{{ $datos_tres->aprendiz_intermedia->programa_intermedia->numero_ficha }}
			</p>
			<p class='campo_integrante1'> <strong>Programa formación: </strong>
				{{ $datos_tres->aprendiz_intermedia->programa_intermedia->programa_formacion }}
			</p>
		</div>	
	</div>
	<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4 integrante_2">
		<div class='panel_integrante2'>

			<h1 id='segundo_integrante'> Integrante </h1>
			<p class='campo_integrante2'> <strong>Nombre y apellido: </strong>
				{{ $datos_tres_tres->nombre_apre }} {{ $datos_tres_tres->apellido_apre }}
			</p>
			<p class='campo_integrante2'> <strong>Documento: </strong>
				{{ $datos_tres_tres->documento_apre }}
			</p>
			<p class='campo_integrante2'> <strong>Ficha: </strong>
				{{ $datos_tres_tres->aprendiz_intermedia->programa_intermedia->numero_ficha }}
			</p>
			<p class='campo_integrante2'> <strong>Programa formación: </strong>
				{{ $datos_tres_tres->aprendiz_intermedia->programa_intermedia->programa_formacion }}
			</p>

		</div>
	</div>
	<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4 integrante_3">
		<div class='panel_integrante3'>
			<h1 id='tercer_integrante'> Integrante </h1>
			<p class='campo_integrante3'> <strong>Nombre y apellido: </strong>
				{{ $datos_tres_tres_tres->nombre_apre }} {{ $datos_tres_tres_tres->apellido_apre }}
			</p>
			<p class='campo_integrante3'> <strong>Documento: </strong>
				{{ $datos_tres_tres_tres->documento_apre }}
			</p>
			<p class='campo_integrante3'> <strong>Ficha: </strong>
				{{ $datos_tres_tres_tres->aprendiz_intermedia->programa_intermedia->numero_ficha }}
			</p>
			<p class='campo_integrante3'> <strong>Programa formación: </strong>
				{{ $datos_tres_tres_tres->aprendiz_intermedia->programa_intermedia->programa_formacion }}
			</p>
		</div>

	</div>
</div>

@endif
