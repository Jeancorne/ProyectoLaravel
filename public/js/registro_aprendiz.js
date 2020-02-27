$(document).ready(function(){

	$('#departamento').on('change', function(){
		var departamento = $(this).val();
		sacar_ciudad(departamento);
	})

	

	$('#form_register').on('submit', function(e){		
		e.preventDefault();
		$.ajax({
			type: 'post',
			url: 'register',
			data: new FormData(this),
			dataType: 'json',
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function(xhr, type){
				xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
			},			
			success: function(data){
				if (data.faltan_datos != null) {
						$('.faltan_datos').show("fast", function(){
							$('.faltan_datos').html(data.faltan_datos);
							$('.faltan_datos').fadeOut(4000, function(){
							$('.faltan_datos').empty();
						})
						})		
				}
				if (data.registrado != null) {
					$('.faltan_datos').show("fast", function(){
						$('.faltan_datos').html(data.registrado);
						$('.faltan_datos').fadeOut(4000, function(){
							$('.faltan_datos').empty();
							swal({
								icon: 'success',				
								title: 'Registro',
								text: 'éxitoso!',
								timer: 1500
							})
							setTimeout(function(){
								var url = "index";
								$(location).attr('href',url);
							},1000);


						})
					})
				}
				if (data.documento_max != null) {
					$('.msg').show("fast", function(){
						$('#validar_documento').show("fast", function(){
							$('#validar_documento').html(data.documento_max);
							$('#validar_documento').fadeOut(4000, function(){
							$('#validar_documento').empty();
							$('.msg').css("display","none");
						})
						})
					})					
				}
				if (data.documento_mal != null) {
					$('.msg').show("fast", function(){
						$('#validar_documento').show("fast", function(){
							$('#validar_documento').html(data.documento_mal);
							$('#validar_documento').fadeOut(4000, function(){
							$('#validar_documento').empty();
							$('.msg').css("display","none");
						})
						})
					})	
				}

				if (data.nombre_max != null) {
					$('.msg').show("fast", function(){
						$('#validar_nombre').show("fast", function(){
							$('#validar_nombre').html(data.nombre_max);
							$('#validar_nombre').fadeOut(4000, function(){
							$('#validar_nombre').empty();
							$('.msg').css("display","none");
						})
						})
					})	
				}

				if (data.contra_max != null) {
					$('.msg').show("fast", function(){
						$('#validar_contrasena').show("fast", function(){
							$('#validar_contrasena').html(data.contra_max);
							$('#validar_contrasena').fadeOut(4000, function(){
							$('#validar_contrasena').empty();
							$('.msg').css("display","none");
						})
						})
					})	
				}
				if (data.contra_mal != null) {
					$('.msg').show("fast", function(){
						$('#validar_contrasena').show("fast", function(){
							$('#validar_contrasena').html(data.contra_mal);
							$('#validar_contrasena').fadeOut(4000, function(){
							$('#validar_contrasena').empty();
							$('.msg').css("display","none");
						})
						})
					})	
				}
				if (data.no_coinciden != null) {
					$('.msg').show("fast", function(){
						$('#validar_contrasena').show("fast", function(){
							$('#validar_contrasena').html(data.no_coinciden);
							$('#validar_contrasena').fadeOut(4000, function(){
							$('#validar_contrasena').empty();
							$('.msg').css("display","none");
						})
						})
					})	
				}
				if (data.fijo_max != null) {
					$('.msg').show("fast", function(){
						$('#validar_telefono').show("fast", function(){
							$('#validar_telefono').html(data.fijo_max);
							$('#validar_telefono').fadeOut(4000, function(){
							$('#validar_telefono').empty();
							$('.msg').css("display","none");
						})
						})
					})	
				}
				if (data.fijo_mal != null) {
					$('.msg').show("fast", function(){
						$('#validar_telefono').show("fast", function(){
							$('#validar_telefono').html(data.fijo_mal);
							$('#validar_telefono').fadeOut(4000, function(){
							$('#validar_telefono').empty();
							$('.msg').css("display","none");
						})
						})
					})	
				}
				if (data.celular_max != null) {
					$('.msg').show("fast", function(){
						$('#validar_celular').show("fast", function(){
							$('#validar_celular').html(data.celular_max);
							$('#validar_celular').fadeOut(4000, function(){
							$('#validar_celular').empty();
							$('.msg').css("display","none");
						})
						})
					})	
				}
				if (data.celular_mal != null) {
					$('.msg').show("fast", function(){
						$('#validar_celular').show("fast", function(){
							$('#validar_celular').html(data.celular_mal);
							$('#validar_celular').fadeOut(4000, function(){
							$('#validar_celular').empty();
							$('.msg').css("display","none");
						})
						})
					})	
				}
				if (data.sin_departamento != null) {
					$('.msg').show("fast", function(){
						$('#validar_departamento').show("fast", function(){
							$('#validar_departamento').html(data.sin_departamento);
							$('#validar_departamento').fadeOut(4000, function(){
							$('#validar_departamento').empty();
							$('.msg').css("display","none");
						})
						})
					})	
				}
				if (data.sin_ciudad != null) {
					$('.msg').show("fast", function(){
						$('#validar_ciudad').show("fast", function(){
							$('#validar_ciudad').html(data.sin_ciudad);
							$('#validar_ciudad').fadeOut(4000, function(){
							$('#validar_ciudad').empty();
							$('.msg').css("display","none");
						})
						})
					})	
				}
				if (data.correo_max != null) {
					$('.msg').show("fast", function(){
						$('#validar_correo').show("fast", function(){
							$('#validar_correo').html(data.correo_max);
							$('#validar_correo').fadeOut(4000, function(){
							$('#validar_correo').empty();
							$('.msg').css("display","none");
						})
						})
					})	
				}
				if (data.correo_mal != null) {
					$('.msg').show("fast", function(){
						$('#validar_correo').show("fast", function(){
							$('#validar_correo').html(data.correo_mal);
							$('#validar_correo').fadeOut(4000, function(){
							$('#validar_correo').empty();
							$('.msg').css("display","none");
						})
						})
					})	
				}
				if (data.ficha_max != null) {
					$('.msg').show("fast", function(){
						$('#validar_ficha').show("fast", function(){
							$('#validar_ficha').html(data.ficha_max);
							$('#validar_ficha').fadeOut(4000, function(){
							$('#validar_ficha').empty();
							$('.msg').css("display","none");
						})
						})
					})	
				}
				if (data.ficha_mal != null) {

					$('.msg').show("fast", function(){
						$('#validar_ficha').show("fast", function(){
							$('#validar_ficha').html(data.ficha_mal);
							$('#validar_ficha').fadeOut(4000, function(){
							$('#validar_ficha').empty();
							$('.msg').css("display","none");
						})
						})
					})	

					
				}
				if (data.programa_max != null) {
					$('.msg').show("fast", function(){
						$('#validar_programa').show("fast", function(){
							$('#validar_programa').html(data.programa_max);
							$('#validar_programa').fadeOut(4000, function(){
							$('#validar_programa').empty();
							$('.msg').css("display","none");
						})
						})
					})	
				}
				if (data.programa_mal != null) {
					$('.msg').show("fast", function(){
						$('#validar_programa').show("fast", function(){
							$('#validar_programa').html(data.programa_mal);
							$('#validar_programa').fadeOut(4000, function(){
							$('#validar_programa').empty();
							$('.msg').css("display","none");
						})
						})
					})	
				}
				if (data.centro_max != null) {
					$('.msg').show("fast", function(){
						$('#validar_centro').show("fast", function(){
							$('#validar_centro').html(data.centro_max);
							$('#validar_centro').fadeOut(4000, function(){
							$('#validar_centro').empty();
							$('.msg').css("display","none");
						})
						})
					})	
				}
				if (data.centro_mal != null) {
					$('.msg').show("fast", function(){
						$('#validar_centro').show("fast", function(){
							$('#validar_centro').html(data.centro_mal);
							$('#validar_centro').fadeOut(4000, function(){
							$('#validar_centro').empty();
							$('.msg').css("display","none");
						})
						})
					})	
				}
				if (data.direccion_max != null) {
					$('.msg').show("fast", function(){
						$('#validar_direccion').show("fast", function(){
							$('#validar_direccion').html(data.direccion_max);
							$('#validar_direccion').fadeOut(4000, function(){
							$('#validar_direccion').empty();
							$('.msg').css("display","none");
						})
						})
					})	
				}
				if (data.direccion_mal != null) {
					$('.msg').show("fast", function(){
						$('#validar_direccion').show("fast", function(){
							$('#validar_direccion').html(data.direccion_mal);
							$('#validar_direccion').fadeOut(4000, function(){
							$('#validar_direccion').empty();
							$('.msg').css("display","none");
						})
						})
					})	
				}
			}
		})
	})


})



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


