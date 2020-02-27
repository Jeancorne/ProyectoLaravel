<!DOCTYPE html>
<html>
<head>
	<title>SenaProject</title>
	<meta charset="utf-8">	
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	 <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  	crossorigin="anonymous"></script>
	<link rel="stylesheet" href="iconos/style.css">	
	<link rel="stylesheet" type="text/css" href="css/estilos_empresa_registro.css">	
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript" src="js/empresa_registro.js"></script>
</head>
<body>

	<div class="row">
		<div class="col-12 col-sm-12 col-xs-12 col-md-12 col-lg-12 color1"></div>	
	</div>
	<div class="fixed-bottom">		
			<div id="validar_nit"></div>
			<div id="validar_nombre"></div>
			<div id="validar_corre"></div>
			<div id="validar_direccion"></div>
			<div id="validar_contrasena1"></div>
			<div id="validar_imagen"></div>
		</div>
	<div class="container">

		<div class="row">
			<div class="col-12 col-sm-12 col-xs-12 col-md-12 col-lg-12 logo">
				<a href="{{ route('index') }}">
					<img src="imagenes/logo.png"> </a>
				</div>	
			</div>
			<div class="row">
				<div class="col-12 col-sm-12 col-xs-12 col-md-12 col-lg-12 total2">	
					<form id="formu"  enctype="multipart/form-data"> 
					<h2> Registro Empresa</h2>
					<div class="row" id="centra">
						<div class="col-12 col-sm-12 col-xs-12 col-md-6 col-lg-6 izquierda">					
							<div class="espacio"><span class="icon-drivers-license-o  icon" id="unico"></span><input type="text" name="nit_empresa" id="mirar_nit" placeholder="Ingrese NIT"></div>
							<div class="espacio"><span class="icon-location_city icon"></span><input type="text" name="nombre_empresa" id="nombre_empr" placeholder="Nombre de la empresa"></div>
							<div class="espacio"><span class="icon-mail icon"></span><input type="email" id="correo_emp" name="email" placeholder="Correo de la empresa"></div>
						</div>
						<div class="col-12 col-sm-12 col-xs-12 col-md-6 col-lg-6 derecha">
							<div class="espacio"><span class="icon-compass icon"></span><input type="text" name="direccion_empresa" id="direccion_empre" placeholder="Dirección de la empresa"></div>
							<div class="espacio"><span class="icon-key-stroke icon"></span><input type="password" name="password" id="contra_1" placeholder="Contraseña"></div>
							<div class="espacio"><span class="icon-key-stroke icon"></span><input type="password" name="password2" id="contra_2" placeholder="Repetir Contraseña"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-7 col-sm-7 col-xs-7 col-md-7 col-lg-7 imagen_preload">

							<img id="load_image" src="">
							<p id="nombre_imagen"></p>
						</div>
						<div class="col-5 col-sm-5 col-xs-5 col-md-5 col-lg-5 imagenes">
							<p>Imagen Empresa:</p>
							<div id="imagen_empresa">
								<label for="imagen_emp">
									<span class="icon-cloud-upload" id="imagen_subida" ></span>
									<input type="file" id="imagen_emp"  name="imagen_empresa">
								</label>
							</div>
						</div>
					</div>
					<button type="submit" id="btn_registrarempresa" class="btn success uno"> Registro </button>	
					</form>
					<a href="{{ route('index') }}">
						<button class="btn success uno"> Cancelar </button> </a>							
					</div>									
					<div id="cargando">
					</div>	
					<div class="imt">
					</div>
					<div class="imt2">
					</div>
					<div class="imt3">
					</div>
				</div>
			</div>
			<div class="row" id="footer">				
				<div class="col-6 col-sm-6 col-xs-4 col-md-6 col-lg-6 color2"></div>	
				<div class="col-6 col-sm-6 col-xs-6 col-md-6 col-lg-6 color3 "></div>
			</div>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		</body>
		</html>