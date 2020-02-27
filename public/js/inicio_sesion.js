$(document).ready(function(){
	
	$('#nosotros').on('click', function(){
		panel_nosotros();
	})

	$('#pro').on('click', function(){
		panel_proyectos();
	})

	function panel_proyectos(){
		$.ajax({
			type: 'get',
			url: 'Vista_proyectos',		
			beforeSend: function(xhr, type){
				xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
			},
			success: function(data){
				$('#reemplazado').html(data);

				$('#departamento_proyecto').on('change', function(){
					var departamento = $(this).val();
					sacar_ciudad(departamento);
				})

				$('#filtrar').on('click', function(){
					var categoria = $('#categoria').val();
					var departamento = $('#departamento_proyecto').val();
					var city_proyecto = $('#city_proyecto').val();
					show_retos(categoria, departamento, city_proyecto);
				})



			}
		})	
	}


	function panel_nosotros(){
		iniciar_nosotros = "";
		$.ajax({
			url: "Nosotros",
			beforeSend: function(xhr, type){
				xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
			},		
			success: function(data){
				$('#reemplazado').html(data);
			}
		})
	}


	function show_retos(categoria, departamento,city_proyecto, page){
		$.ajax({
			type: 'get',
			url: 'Filtrar_proyectos',
			data: {departamento:departamento,categoria:categoria, city_proyecto:city_proyecto,page:page},
			beforeSend: function(xhr, type){
				xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
			},
			success: function(data){
				$('#demo').html(data);

				$('.pagination a').on('click', function(e){
					e.preventDefault();
					var page = $(this).attr('href').split('page=')[1];
					show_retos(categoria, departamento, city_proyecto, page);
				})

				$('.uno').on('click', function(){
					var id = $(this).attr('name');
					ver_mas_reto(categoria, departamento, city_proyecto, page, id);
				})


			}
		})
	}

	function ver_mas_reto(categoria, departamento,city_proyecto, page, id){
		$.ajax({
			type: 'get',
			url: 'Filtro_ver_mas',
			data: {id:id},
			dataType:'json',
			beforeSend: function(xhr, type){
				xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
			},
			success: function(data){
				$('#demo').html(data);
				$('#btn_volver').on('click', function(){
					show_retos(categoria, departamento,city_proyecto, page);
				})

			}
		})
	}


	function sacar_ciudad(departamento){
		var departamento = departamento;
		$.ajax({
			url: 'ciudades',
			method: 'post',
			beforeSend: function(xhr, type){
				xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
			},				
			data:{departamento:departamento},
			success: function(data){
				$('#city_proyecto').html(data);
			}

		})
	}






	//Inicio sesión de la empresa
	//Inicio sesión de la empresa
	$('#inicio_empresa').on('submit', function(e){
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: 'login_empresa',
			data: new FormData(this),
			dataType: 'json',
			contentType: false,
			cache: false,
			processData:false,		
			beforeSend: function(xhr, type){
				xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
			},
			success: function(data){
				
				if (data.error_empre != null) {
					swal("Incorrecto!", "Correo o contraseña mal","error")
					
				}
				if (data.campo_empty != null) {
					swal("Incorrecto!", "Correo o contraseña mal","error")	
				}
				if (data.ok != null ) {
					swal("Conectado!", "Correctamente","success")
					setTimeout(function(){
						var url = "/Empresa_inicio";
						$(location).attr('href',url);
					},1000);
				}
			}
		})
	})





	//Inicio sesión del aprendiz
	//Inicio sesión del aprendiz
	$('#inicio_aprendiz').on('submit', function(e){
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: 'login_aprendiz',
			data: new FormData(this),
			dataType: 'json',
			contentType: false,
			cache: false,
			processData:false,		
			beforeSend: function(xhr, type){
				xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
			},
			success: function(data){

				if (data.sin_email != null) {
					$('#alerta_sesion').show("fast", function(){
						$('#alerta_sesion').html(data.sin_email);
						$('#alerta_sesion').fadeOut(3000, function(){
							$('#alerta_sesion').empty();
						})
					})
				}
				if (data.error != null) {
					$('#alerta_sesion').show("fast", function(){
						$('#alerta_sesion').html(data.error);
						$('#alerta_sesion').fadeOut(3000, function(){
							$('#alerta_sesion').empty();
						})
					})
				}
				if (data.campos_vacios != null) {
					$('#alerta_sesion').show("fast", function(){
						$('#alerta_sesion').html(data.campos_vacios);
						$('#alerta_sesion').fadeOut(3000, function(){
							$('#alerta_sesion').empty();
						})
					})
				}
				
				if (data.ok != null ) {

					swal("Conectado!", "Correctamente","success")
					setTimeout(function(){
						var url = "/Inicio_aprendiz";
						$(location).attr('href',url);
					},1000);
				}
			}
		})
	})

})

