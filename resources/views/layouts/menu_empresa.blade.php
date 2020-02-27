<div class="container">
	<div class="row">
		<div  class="col-xs-12 col-sm-12 col-md-2 col-lg-2 border_imagen">				
			<a href="{{ route('Empresa_inicio') }}"> <img  src="imagenes/Logo.png" align="center">  </a>
		</div>
		<div  class="col-xs-12 col-sm-12 col-md-10 col-lg-10 pro ">	
			<div class="menuX">
				<header>
					<input type="checkbox" id="btn-menu">
					<label for="btn-menu"> <img src="imagenes/list.png"> </label>
					<nav class="menu">
						<ul>
							<li> <a href="{{ route('Empresa_inicio') }}"> Inicio </a></li>
							<li class="submenu"><a id="perfil_empresa" href="#">Perfil </a> </li>							
							<li><a id="publicar_proyecto" href="#"> Publicar proyectos </a></li>
							<li><a id="proyectos_page" href="#"> Proyectos </a></li>
							<li><a href="{{ route('deslogeo') }}"> Cerrar sesión </a></li>
						</ul>
					</nav>
				</header>
			</div>
		</div>
	</div>
</div>
