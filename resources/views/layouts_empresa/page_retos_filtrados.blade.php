
@if(count($resultado)>0)
@foreach($resultado as $row)
<div id="elementos" class="product-item" category="">
	<p id="tituproye">{{ $row->nombre_proye }}</p>
	<hr>
	<p id="descripcion">{{ $row->descripcion_proye }}
	</p>
	<p id="categoria"> 
		<strong>Categoria</strong>
		{{ $row->categoria_proye }}	
	</p>
	<p>
		<strong> Fecha Cierre: </strong>
		{{ $row->fecha_proyecto }}
	</p>
	<p> 
		<strong> Departamento: </strong>
		{{ $row->depart_proyecto }}
	</p>
	<p> 
		<strong> Ciudad: </strong>
		{{ $row->ciudad_proye }}
	</p>
	<hr>
	<input type="button" value="Ver más"  class="btn success uno" name="{{ $row->id }}">
	<div class="imagenreto">
		<img src="images/{{ $row->empresa->imagen_empresa }}">
		<br>
		<div class="nombre1">{{ $row->nombre_proye }}
		</div>
	</div>
</div>
@endforeach
<div  class="paginado">
{{ $resultado->links() }}
</div>
@else
<div class='alert alert-danger' role='alert'>
	No hay retos
</div>

@endif





