<div id="vermas">
		<div id="contenido_reto" class="contenido"> 
			<div id="imagen_muestra">
				<img src="images/{{ $resultado->empresa->imagen_empresa }}">
			</div>
			<div id="opciones">
				<span class="icon-account_balance  icon2"></span><strong>Nombre de la empresa:</strong> 
				<p id="echo_empresa">{{ $resultado->empresa->nombre_empresa }} </p>
				<span class="icon-file-text-o  icon2"></span> <strong>Nombre del proyecto:</strong> 
				<p id="echo_proyecto"> {{ $resultado->nombre_proye }} </p>
			</div>
			<p id="desc">
				<span class="icon-calendar  icon2"></span><strong> Postulaciones hasta el:</strong>
				{{ $resultado->fecha_proyecto }} 
			</p>
			<p id="desc">
				<span class="icon-audio-description  icon2"></span><strong> Descripción del proyecto:</strong>
					
			</p>			
			<div id="areatexto">
				<textarea readonly="readonly" name="comentarios" rows="5" cols="50">
					{{ $resultado->descripcion_proye }}  
			</textarea>
		</div>

		<div class="boton_aplicar1">
			<div id="btn_cancelar">					
					<button type="button" id="btn_volver" name="" class="btn success uno">
					Volver </button>
			</div>
		</div>
	</div>
</div>