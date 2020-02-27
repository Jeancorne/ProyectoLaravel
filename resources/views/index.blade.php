<!DOCTYPE html>
<html>
<head>
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SenaProject</title>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  	crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="iconos/style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>    
	<script src="js/main.js"></script>
	<link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="iconos/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    <link rel="stylesheet"  href="css/estilos.css">
	<script src="js/inicio_sesion.js"></script>
	
</head>
<body>
	<div class="row">
		<div class="col-8 col-sm-8 col-xs-8 col-md-8 col-lg-8 border1"></div>	
		<div class="col-2 col-sm-2 col-xs-2 col-md-2 col-lg-2 border2"></div>	
		<div class="col-2 col-sm-2 col-xs-2 col-md-2 col-lg-2 border3"></div>	
	</div>


	

	<div class="container">
		
		<div class="row">
			<div  class="col-xs-12 col-sm-12 col-md-2 col-lg-2 border5">				
				<a href="{{ route('index') }}"> <img  class="logo" src="imagenes/Logo.png" align="center">  </a>
			</div>
			<div  class="col-xs-12 col-sm-12 col-md-10 col-lg-10">	
				<div class="menuX">
					<header>
						<input type="checkbox" id="btn-menu">
						<label for="btn-menu"> <img src="imagenes/list.png"> </label>
						<nav class="menu">
							<ul>
								<li class=""><a href="{{ route('index') }}"> Inicio</a></li>	
								<li class="submenu"><a href="#">Ingreso <i class="fa fa-caret-down"></i></a>
									<ul>
										<a href="javascript:openVentana_empresa();"><li>Empresa</li></a>
										<a href="javascript:openVentana_aprendiz();"><li>Aprendiz</li></a>
									</ul>
								</li>
								<li class="submenu"><a href="#">Registro <i class="fa fa-caret-down"></i></a>
									<ul>
										<a href="{{ route('vista_registro') }}"><li>Empresa</li></a>
										<a href="{{ route('registro_aprendiz') }}"><li>Aprendiz</li></a>
									</ul>
								</li>
								<li class=""><a href="#" id="pro"> Proyectos</a></li>						
								<li><a href="#" id="nosotros"> Nosotros</a></li>
							</ul>
						</nav>
					</header>
				</div>
			</div>
		</div>
	<div id="reemplazado">

		<div class="proye">
			<div class="row"> 
			<div class="col-sm-1 col-md-1 col-lg1 col-xl-1"></div>
			<div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10 tres">				
				<div class="slideshow">
					<ul class="slider">
						<li>
							<img src="imagenes/fondo.jpg" alt="">
							<section class="caption">
								<h1 style="color: white">PROPOSITO</h1>
								<p style="color: white" "font-size: 1px"> - Unir a empresas y aprendices por medio de la plataforma en necesidades empresariales. <br>
									- Permitir que las empresas publiquen sus necesidades y que los aprendices den ideas para la solución del mismo. <br>
									- Detectar problemas empresariales para que los aprendices den ideas y solución, esto acerca más a la unión entre las dos entidades. <br>
								</p>
							</section>
							<li>
								<img src="imagenes/fondito.jpg" alt="">
								<section class="caption">
								</section>
							</li>
						</li>
					</ul>
					<ol class="pagination">
					</ol>
					<div class="left">
						<span class="icon-chevron-left"></span>
					</div>
					<div class="right">
						<span class="icon-chevron-right"></span>
					</div>
				</div>
			</div>
			<div class="col-sm-1 col-md-1 col-lg1 col-xl-1"></div>
		
		</div>
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 cuatro">
				<h1>¿Quiénes Somos?</h1>
				<p> SenaProject es una plataforma que se dedica a difundir necesidades empresariales, para que los aprendices 
					elaboren sus proyectos en base a estas necesidades. 
				</p>
			</div>			
		</div>
		<div class="row">
			
			<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 cinco">
				<h1>MISIÓN</h1>
				<p> 
					Nuestra misión es crear un banco de proyectos sobre las necesidades de las empresas.
				</p>
			</div>				
			<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 seis">
				<h1>VISIÓN</h1>
				<p> 
					Nuestra visión es unir empresas y aprendices sobre proyectos 
				</p>
			</div>
			
		</div>
		</div>

		</div>
</div>


	<div class="row">
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ventana_empresa">
			<div class="contenedor-form">
				<div class="cerrar">
					<span> <a href="javascript:closeVentana_empresa();">Cerrar X </a></span>
				</div>
				<div class="formulario">
					<form id="inicio_empresa">
					<h2>Iniciar Sesión Empresa</h2>
						<input type="text" name="email" placeholder="Correo" required>
						<input type="password" name="password" placeholder="Contraseña" required>
						<button type="submit" class="btn success uno" id="btn_iniciar_empresa"> Iniciar Sesión</button>
					</form>
				</div>
				<div class="reset-password">
					<div id="alerta_sesion_empresa">
						
					</div>				
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ventana_aprendiz">
			<div class="contenedor-form">
				<div class="cerrar">
					<span> <a href="javascript:closeVentana_aprendiz();">Cerrar X </a></span>
				</div>
				<div class="formulario">
					<form id="inicio_aprendiz">
						<h2>Iniciar Sesión Aprendiz</h2>					
						<input type="text" name="email" placeholder="Correo" required>
						<input type="password" name="password" placeholder="Contraseña" required>
						<input type="submit" id="iniciar_sesion" class="btn success uno">
					</form>
				</div>
				<div class="reset-password">
					<div id="alerta_sesion">
						
					</div>	
				</div>				
			</div>
		</div>
	</div>

<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pie_nosotros"></div>
	</div>
</body>
</html>