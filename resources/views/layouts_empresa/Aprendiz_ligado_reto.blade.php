
<div class="ocultar_panel_aprendiz">
	<div class="row">
		<div class="col-12 col-sm-12 col-xs-6 col-lg-6 paginacion_grupos">
			@if(!empty($query))
			{{ $query->links() }}
			@else
			<h1>No hay retos</h1>
			@endif
		</div>
		<div class="col-12 col-sm-12 col-xs-6 col-lg-6"><h1><input type="button" id="Ocultar" class="btn success" value="Ocultar">
		 </h1></div>
	</div>
</div>
<table id="tabla_resultados" class="table">
	<thead class="head_table">
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Aprendiz 1</th>
			<th scope="col">Aprendiz 2</th>
			<th scope="col">Aprendiz 3</th>
			<th scope="col">Propuesta</th>
			<th scope="col">Ver</th>							
		</tr>
	</thead>
	<tbody class="aprendices_ligados">
		@if(!empty($query))
		@foreach($query as $row)
		<tr>
			<th scope='row'>{{ $row->id }}</th>
			<td>{{ $row->documento_1 }}</td>
			<td>{{ $row->documento_2 }}</td>
			<td>{{ $row->documento_3 }}</td>
			<td>{{ $row->propuesta }}</td>
			<td><input type='button' value='Aprendices'  class='btn success aprendic' name="{{ $row->id }}"></td>
		</tr>
		@endforeach
		@else
		<div>
			No hay retos
		</div>
		@endif
	</tbody>
</table>









