<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registro Aprendiz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  	crossorigin="anonymous"></script>
    <link rel="stylesheet" href="iconos/style.css">
    <link rel="stylesheet" href="iconos/iconos2/style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet"  href="css/estilos_aprendiz.css">

</head>
<body>
		<div class="row">
			<div class="col-12 col-sm-12 col-xs-12 col-md-12 col-lg-12 color1"></div>	
		</div>
		<div class="msg">
			<div class="fixed-bottom msg">		
				<div id="validar_nombre"></div>
				<div id="validar_apellido"></div>
				<div id="validar_documento"></div>
				<div id="validar_departamento"></div>
				<div id="validar_ciudad"></div>
				<div id="validar_telefono"></div>
				<div id="validar_celular"></div>						
			</div>
			<div class="fixed-derecho msg">			
				<div id="validar_ficha"></div>
				<div id="validar_programa"></div>
				<div id="validar_centro"></div>
				<div id="validar_direccion"></div>
				<div id="validar_correo"></div>
				<div id="validar_contrasena"></div>			
			</div>
		</div>
		<div class="container">
			<div class="row">					
				<div class="col-12 col-sm-12 col-xs-12 col-md-12 col-lg-12 logo">
					<a href="index">
						<img src="imagenes/logo.png"> </a>
					</div>
				</div>
				<div class="row">
					<div id="proba">
					</div>					
					<div class="col-12 col-sm-12 col-xs-12 col-md-12 col-lg-12 total2">	
						<form id="form_register"  >					
							<h2> Registro Aprendiz</h2>							
							<div class="row" id="centra">
								<div class="col-12 col-sm-12 col-xs-12 col-md-6 col-lg-6 izquierda">
									<div class="espacio"><span class="icon-user2  icon2"></span><input type="text" placeholder="Ingrese Nombre" name="nombre_apre"></div>
									<div class="espacio"><span class="icon-user2 icon2"></span><input type="text" name="apellido_apre" placeholder="Apellido"  ></div>
									<div class="espacio"><span class="icon-profile icon2"></span><input type="text" name="documento_apre" placeholder="Documento"  >	</div>
									<div class="espacio"><span class="icon-earth icon2"></span>						
										<select class="custom-select mr-sm-2 opciones" id="departamento" name="depart_aprendiz" >
											<option selected value="Departamento">Departamento</option>
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
									<div class="espacio"><span class="icon-earth icon2"></span>						
										<select class="custom-select mr-sm-2 opciones" id="city_proyecto"  name="ciudad_apren" >
											<option value="Ciudad">Ciudad</option>
										</select>
									</div>
									<div class="espacio"><span class="icon-phone icon2"></span><input type="text"  name="tel_fijo" placeholder="Teléfono Fijo"></div>
									<div class="espacio"><span class="icon-handheld icon2"></span><input type="text"  name="cel_apren"  placeholder="Teléfono Celular"></div>
								</div>
								<div class="col-12 col-sm-12 col-xs-12 col-md-6 col-lg-6 derecha">
									<div class="espacio"><span class="icon-number icon2"></span><input type="text"   name="numero_ficha" placeholder="Número Ficha" ></div>
									<div class="espacio"><span class="icon-medal icon2"></span><input type="text"  name="programa_formacion" placeholder="Programa formación" ></div>
									<div class="espacio"><span class="icon-device_hub icon2"></span><input type="text"  name="centro_formacion" placeholder="Centro de Formación" ></div>
									<div class="espacio"><span class="icon-direction icon2"></span><input type="text"  name="direccion_formacion" placeholder="Dirección de formación" ></div>
									<div class="espacio"><span class="icon-email icon2"></span><input type="email"  name="email" placeholder="Correo" ></div>
									<div class="espacio"><span class="icon-password icon2"></span><input type="password"  name="password"  placeholder="Contraseña"></div>
									<div class="espacio"><span class="icon-password icon2"></span><input type="password"  name="password2"  placeholder="Repetir Contraseña"></div>
								</div>
								
							</div>
							<div class="butones">
								<input type="submit" id="botonregistro"  class="btn success uno">									
							<a href="index">
							<button type="button"  class="btn success uno"> Cancelar </button> </a>
							</div>
							<div class="faltan_datos">								
							</div>
							</form>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-6 col-sm-6 col-xs-6 col-md-6 col-lg-6 color2"></div>	
					<div class="col-6 col-sm-6 col-xs-6 col-md-6 col-lg-6 color3"></div>	
				</div>
				<script src = "https://unpkg.com/sweetalert/dist/sweetalert.min.js"> </script> 
				<script type="text/javascript" src="js/registro_aprendiz.js"></script>
			</body>
</html>