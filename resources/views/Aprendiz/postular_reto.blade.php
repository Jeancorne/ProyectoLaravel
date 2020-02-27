<div id='aplicadook'>
	<div class='contenidoaplicar'> 
		<form   enctype='multipart/form-data' id='formu'>
			<div class='selectores'>
				<div class='row'>
					<div class='col-sm-12 col-xs-12 col-md-12 col-lg-12'>
						<h1> APLICAR A RETO</h1>
						<span class='icon-users'> <input type='text' id='primer_documento' name='primer_documento' placeholder='Primer documento' />
						</span>				
						<span class='icon-users'>
							<input type='text' name='segundo_documento' placeholder='Segundo documento' />					
						</span>
						<span class='icon-users'> 
							<input type='text' name='tercero_documento'   placeholder='Tercer documento'  />	
						</span>
					</div>
				</div>
				<div class='row'>
					<div class='col-sm-12 col-xs-7 col-md-7 col-lg-7 parte1'>
						<textarea placeholder='Propuesta'  name='propuesta' class='propu' rows='5' cols='50'></textarea>
						<div id='remplazar'></div>
					</div>
					<div class='col-sm-12 col-xs-5 col-md-5 col-lg-5 parte2'>
						<h5>Documento:</h5>
						<label for='imagen_empre'>
							<span id='img_document' class='icon-cloud-upload1'></span>
							<input type='file' id='imagen_empre' name='documento_aprendiz'>
						</label>
						<div id='name_archivo'></div>
					</div>
				</div>
			</div>
			<div class='botones_reto'>
				<input type='submit' id='aplicar_reto2'  value='Aplicar'
				class='btn success appli' name="">				
				<button type='button' name='cancelar_aplicar' id='cancelar_aplicar' class='btn success appli'> Cancelar </button>
			</div>	
		</form>
	</div>
</div>
<div class="fixed-bottom">
	<div id='documento1_validar'>				
	</div>
	<div id='documento2_validar'>
	</div>
	<div id='documento3_validar'>				
	</div>
	<div id='validar_propuesta'>				
	</div>
	<div id="validar_repetido">
	</div>
	<div id="validar_document">
	</div>			
</div>