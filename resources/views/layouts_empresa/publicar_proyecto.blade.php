<div class="row">
	<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
		<ol class="breadcrumb">
			<li class="active">Publicar Proyectos</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-12 col-sm-12 col-xs-12 col-lg-12 total4">
		<h1> Publicar Reto</h1>
		<form id="publicar_reto">
			<div class="row">
				<div class="col-12 col-sm-12 col-xs-6 col-lg-6 datos_fila_proyecto">
					<div><input type="text" class="custom-select mr-sm-2" REQUIRED name="nombre_reto" placeholder="Nombre reto">
						<div id="alerta_informacion">							
						</div>
					</div>
					<div>
						<span class="icon-question-circle-o icono_fecha"></span><input  type="datepicker" class="custom-select mr-sm-2"  placeholder="Fecha de proyecto" REQUIRED data-provide="datepicker" name="fecha_proyecto">
						<div id="info_ocultar">Esto hace referencia a la fecha final, en que los aprendices pueden postular sus propuestas. Esta fecha se puede modificar en perfil.</div>	
						<div id="alerta_fecha">
						</div>							
					</div>
					<div>
						<select name="categoria_proye" REQUIRED class="custom-select mr-sm-2" id="categoria_proyecto">
							<option selected>Categoria</option>
							<option>  Agricultura </option>
							<option>Cliente/Mercadeo</option>
							<option>Computacion/Software</option>
							<option>Mecatronica</option>
							<option>Medio Ambiente</option>
							<option>Operadores/procesos</option>
							<option>Productos</option>
							<option>Recursos humanos/Social/Cultural</option>
						</select>

					</div>
					<div id="alerta_categoria">
					</div>
					<div>
						<select class="custom-select mr-sm-2 opciones" REQUIRED id="departamento_proyecto" name="depart_aprendiz" REQUIRED>
							<option selected >Departamento</option>
							<option value="Amazonas">Amazonas</option>
							<option value="Antioquia">Antioquia</option>
							<option value="Arauca">Arauca</option>
							<option value="Bogota D.C">Bogota D.C</option>
							<option value="Bolivar">Bolivar</option>
							<option value="Boyaca">Boyaca</option>
							<option value="Caldas">Caldas</option>
							<option value="Caqueta">Caqueta</option>
							<option value="Casanare">Casanare</option>
							<option value="Cauca">Cauca</option>
							<option value="Cesar">Cesar</option>
							<option value="Choco">Choco</option>							
							<option value="Cordoba">Cordoba</option>
							<option value="Cundinamarca">Cundinamarca</option>
							<option value="Guainia">Guainia</option>
							<option value="Guajira">Guajira</option>
							<option value="Guaviare">Guaviare</option>
							<option value="Huila">Huila</option>
							<option value="Magdalena">Magdalena</option>
							<option value="Meta">Meta</option>
							<option value="Nariño">Nariño</option>
							<option value="Norte de Santander">Norte de Santander</option>
							<option value="Putumayo">Putumayo</option>
							<option value="Quindio">Quindio</option>
							<option value="Risaralda">Risaralda</option>
							<option value="San Andres y Providencia">San Andres y Providencia</option>
							<option value="Santander">Santander</option>
							<option value="Sucre">Sucre</option>
							<option value="Tolima">Tolima</option>
							<option value="Valle">Valle</option>
							<option value="Vaupes">Vaupes</option>
							<option value="Vichada">Vichada</option>
						</select>
					</div>
					<div id="departamento_proye">
					</div>
					<div>
						<select class="custom-select mr-sm-2 opciones" REQUIRED id="city_proyecto"  name="ciudad_apren" REQUIRED>
							<option selected >Ciudad</option>		
						</select>							
					</div>
					<div id="ciudad_pr">								
					</div>
				</div>
				<div class="col-12 col-sm-12 col-xs-6 col-lg-6 imagen_fila">
					<h1>Descripción:</h1>
					<div>
						<textarea class="form-control" REQUIRED placeholder="Descripción" name="descrip_proyecto" rows="7"></textarea>
					</div>
					<div id="alert_descripcion"> 
					</div>
				</div>						
				<div id="cent">
					<button type="submit" name="btn_actualizar" id="btn_publicar" class="btn success publicar_reto"> Publicar </button>
				</div>
			</div>
		</form>
	</div>	
</div>