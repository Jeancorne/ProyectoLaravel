 
<option value="">Ciudad</option>
@foreach($datos as $datos)
<option  value="{{ $datos->nombre_city }}">{{ $datos->nombre_city  }}</option>";
@endforeach
