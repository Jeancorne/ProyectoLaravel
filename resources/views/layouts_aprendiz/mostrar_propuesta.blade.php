@if (!empty($consulta))
<form  enctype='multipart/form-data' id='update_propuesta'>
	<div  id='contenido'  class='row'>
		<div class='col-sm-12 col-xs-12 col-md-7 col-lg-7 propuesta_2'>
			<div id='propuesta_3'>
				<h1>Propuesta:</h1>
				<textarea id='propu_texto'  name='propuesta_text' rows='10' cols='45'>{{$consulta->propuesta}}</textarea>
			</div>
		</div>
		<div class='col-sm-12 col-xs-12 col-md-5 col-lg-5 archivo_apren'>
			<div class='btn_act_propuesta'>
				<h5>Documento actual: </h5>
				<a id='res' href='Documentos_propuestas/{{ $consulta->documento_propuesta }}'>
					<span id='down_document'  class='icon-download'></span>
				</a>						
				<h5 id='name_document'>{{ $consulta->documento_propuesta}}</h5>
				<hr>					
				<h5> Actualizar Documento: </h5>
				<label for="documento_apren">
					<span id="update_document" class="icon-cloud-upload1"></span>
					<input type="file" id="documento_apren" name="documento_apren">
				</label>
				<h5 id='name_nuevo'></h5>

			</div>
		</div>					
	</div>
	<div class='row'>
		<div class='col-sm-12 col-xs-12 col-md-12 col-lg-12 btn_actualizar_propuesta'>
			<input type='submit' class='btn success' name='actualizar_propue' value='Actualizar' id='actuali_propuesta'>
			<button type='button' class='btn success' id='cance_actu'>Cancelar</button>
		</div>
	</div>
</form>


@endif