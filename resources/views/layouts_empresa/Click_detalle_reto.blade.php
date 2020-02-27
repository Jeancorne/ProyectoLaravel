
<form id="actualizar_mi_reto" >
	<div id="actualizar_reto" class="row">
		<div class='col-12 col-sm-12 col-xs-5 col-lg-5 detalles_reto1'>
			<input class='form-control' id='ocultar_id_proyecto' readonly type='text' value='{{ $proyectos->id }}'>
			<div class='nombre'><p><strong> Nombre del proyecto: </strong>{{ $proyectos->nombre_proye }} </p>
				<input class='form-control' id="name_proye" readonly type='text' name='name_proye' value='' placeholder='Nombre del proyecto'  name=''>
			</div>
			<div class='cate'> <p><strong>Categoría: </strong>{{ $proyectos->categoria_proye }} </p>
				<select name='categoria_proye' id="categoria_pr" readonly class='form-control'>
					<option  selected>Categoria</option>
					<option> Agricultura </option>
					<option>Cliente/Mercadeo</option>
					<option>Computacion/Software</option>
					<option>Mecatronica</option>
					<option>Medio Ambiente</option>
					<option>Operadores/procesos</option>
					<option>Productos</option>
					<option>Recursos humanos/Social/Cultural</option>
				</select>
			</div>
			<div class='fecha'><p><strong>Fecha proyecto: </strong> {{ $proyectos->fecha_proyecto }} </p>
				<input type='datepicker' data-readonly id="fecha_proye" placeholder='Fecha de proyecto' data-provide='datepicker' name='fecha_proye'>
			</div>
			
			<div id='nombre_valida'>
			</div>
			<div id='categoria_valida'>
			</div>
			<div id='fecha_valida'>
			</div>
		</div>
		<div class='col-12 col-sm-12 col-xs-5 col-lg-5 detalles_reto2'>
			<h1>Descripcion:</h1>
			<textarea class='form-control' name='descripcion_proyecto' id="descripcion_proyecto" placeholder='Descripción' rows='5' readonly>{{ $proyectos->descripcion_proye }}</textarea>
			<div id='descripcion_valida'>
			</div>	
		</div>	
		<div class='col-12 col-sm-12 col-xs-2 col-lg-2 detalles_reto3'>
			<div id='botones_actualizado'>	
				<button type='button' id='iniciar_actualizar' name='update_reto' class='btn success update_reto'> Actualizar </button>
				<button type='button' id='cancelar_actualizado'  class='btn success cancelar_reto'> Cancelar </button>
				<button type='submit' id='btn_actu_reto' name='aceptar_update' class='btn success aceptar_actualizado'> Aceptar </button>
			</div>	
		</div>
	</div>
</form>

