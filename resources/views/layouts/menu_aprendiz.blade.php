

<div class="container">
	<div class="row">
		<div  class="col-xs-12 col-sm-12 col-md-2 col-lg-2 border5">				
			<a href="{{ route('Inicio_aprendiz') }}"> <img  class="col-xs-12 col-sm-12 col-md-12 col-lg-12 logo" src="imagenes/Logo.png" align="center">  </a>
		</div>
		<div  class="col-xs-12 col-sm-12 col-md-10 col-lg-10">	
			<header>	
				<input type="checkbox" id="btn-menu">
				<label for="btn-menu"> <img src="imagenes/list.png"> </label>
				<nav class="menu">
					<ul>
						<li> <a id="" href="{{ route('Inicio_aprendiz') }}"> Inicio </a></li> 
						<li class="submenu"><a id="perfil_apren" href="#">Perfil </a> </li>
						<li><a id="proyectos_aprendiz" href="#"> Proyectos </a></li>
						<li><a href="{{ route('deslogeo') }}"> Cerrar sesión </a></li>
					</ul>
				</nav>
			</header>
		</div>
	</div>
</div>
<!-- perfil_apren // proyectos_aprendiz -->