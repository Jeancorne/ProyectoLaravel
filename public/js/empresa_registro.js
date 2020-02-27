$(document).ready(function(){
	$('#imagen_emp').on('change', function(event){
			$('#load_image').css("display","block");
			var output = document.getElementById('load_image');
			output.src = URL.createObjectURL(event.target.files[0]);
			
			var nombre = $('#imagen_emp').val();
			nombre = nombre.replace(/C:\\fakepath\\/i, '');
			$('#nombre_imagen').html(nombre)
	})

	$('#formu').on('submit', function(e) {
		e.preventDefault();	
		$.ajax({
			url: 'registrar_empresa',
			type: 'POST',
			dataType: 'json',
			data:  new FormData(this),
			contentType: false,
			cache: false,
			processData:false,			
			beforeSend: function(xhr, type){
				xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
			},	
			success: function(data){
				if (data.sin_imagen != null) {
					$('#validar_imagen').show("fast", function(){
						$('#validar_imagen').html(data.sin_imagen);
						$('#imagen_emp').css("background","red");			
						$('#validar_imagen').fadeOut(4000, function(){
							$('#imagen_emp').css("background","white");	
							$('#validar_imagen').empty();
						});
					})
				}
				if (data.imagen_mal != null) {
					$('#validar_imagen').show("fast", function(){
						$('#validar_imagen').html(data.imagen_mal);
						$('#validar_imagen').css("width", "50%");
						$('#validar_imagen').fadeOut(6000, function(){
							$('#validar_imagen').css("width", "30%");
							$('#validar_imagen').empty();
						});
					})	
				}
				if (data.imagen_max != null) {
					$('#validar_imagen').show("fast", function(){
						$('#validar_imagen').html(data.imagen_max);
						$('#validar_imagen').fadeOut(4000, function(){
							$('#validar_imagen').empty();
						});

					})	
				}


				if (data.sin_nit != null) {
					$('#validar_nit').show("fast", function(){
						$('#validar_nit').html(data.sin_nit);
						$('#mirar_nit').css("background","red");
						$('#validar_nit').fadeOut(4000, function(){
							$('#mirar_nit').css("background","white");
							$("#validar_nit").empty();
						});

					})	
				}

				if (data.nit_max != null) {
					$('#validar_nit').show("fast", function(){
						$('#validar_nit').html(data.nit_max);
						$('#mirar_nit').css("background","red");
						$('#validar_nit').fadeOut(4000, function(){
							$('#mirar_nit').css("background","white");
							$("#validar_nit").empty();
						});

					})	
				}
				if (data.nit_mal != null) {
					$('#validar_nit').show("fast", function(){
						$('#mirar_nit').css("background","red");
						$('#validar_nit').html(data.nit_mal);
						$('#validar_nit').fadeOut(4000, function(){
							$('#mirar_nit').css("background","white");
							$("#validar_nit").empty();
						});

					})	
				}

				if (data.sin_nombre != null) {
					$('#validar_nombre').show("fast", function(){
						$('#validar_nombre').html(data.sin_nombre);
						$('#nombre_empr').css("background","red");
						$('#validar_nombre').fadeOut(4000, function(){
							$('#nombre_empr').css("background","white");
							$("#validar_nombre").empty();
						});

					})	
				}

				if (data.nombre_max != null) {
					$('#validar_nombre').show("fast", function(){
						$('#validar_nombre').html(data.nombre_max);
						$('#nombre_empr').css("background","red");
						$('#validar_nombre').fadeOut(4000, function(){
							$('#nombre_empr').css("background","white");
							$("#validar_nombre").empty();
						});

					})	
				}
				if (data.nombre_mal != null) {
					$('#validar_nombre').show("fast", function(){
						$('#nombre_empr').css("background","red");
						$('#validar_nombre').html(data.nombre_mal);
						$('#validar_nombre').fadeOut(4000, function(){
							$('#nombre_empr').css("background","white");
							$("#validar_nombre").empty();
						});

					})	
				}


				if (data.sin_correo != null) {
					$('#validar_corre').show("fast", function(){
						$('#validar_corre').html(data.sin_correo);
						$('#correo_emp').css("background","red");
						$('#validar_corre').fadeOut(4000, function(){
							$('#correo_emp').css("background","white");
							$("#validar_corre").empty();
						});

					})	
				}

				if (data.correo_max != null) {
					$('#validar_corre').show("fast", function(){
						$('#validar_corre').html(data.correo_max);
						$('#correo_emp').css("background","red");
						$('#validar_corre').fadeOut(4000, function(){
							$('#correo_emp').css("background","white");
							$("#validar_corre").empty();
						});

					})	
				}
				if (data.correo_mal != null) {
					$('#validar_corre').show("fast", function(){
						$('#correo_emp').css("background","red");
						$('#validar_corre').html(data.correo_mal);
						$('#validar_corre').fadeOut(4000, function(){
							$('#correo_emp').css("background","white");
							$("#validar_corre").empty();
						});

					})	
				}

				if (data.sin_direccion != null) {
					$('#validar_direccion').show("fast", function(){
						$('#validar_direccion').html(data.sin_direccion);
						$('#direccion_empre').css("background","red");
						$('#validar_direccion').fadeOut(4000, function(){
							$('#direccion_empre').css("background","white");
							$("#validar_direccion").empty();
						});

					})	
				}

				if (data.direccion_max != null) {
					$('#validar_direccion').show("fast", function(){
						$('#validar_direccion').html(data.direccion_max);
						$('#direccion_empre').css("background","red");
						$('#validar_direccion').fadeOut(4000, function(){
							$('#direccion_empre').css("background","white");
							$("#validar_direccion").empty();
						});

					})	
				}
				if (data.direccion_mal != null) {
					$('#validar_direccion').show("fast", function(){
						$('#direccion_empre').css("background","red");
						$('#validar_direccion').html(data.direccion_mal);
						$('#validar_direccion').fadeOut(4000, function(){
							$('#direccion_empre').css("background","white");
							$("#validar_direccion").empty();
						});

					})	
				}


				if (data.sin_contra1 != null) {
					$('#validar_contrasena1').show("fast", function(){
						$('#validar_contrasena1').html(data.sin_contra1);
						$('#contra_1').css("background","red");						
						$('#validar_contrasena1').fadeOut(4000, function(){
							$('#contra_1').css("background","white");						
							$("#validar_contrasena1").empty();
						});

					})	
				}
				if (data.sin_contra2 != null) {
					$('#validar_contrasena1').show("fast", function(){
						$('#validar_contrasena1').html(data.sin_contra2);
						$('#contra_2').css("background","red");						
						$('#validar_contrasena1').fadeOut(4000, function(){
							$('#contra_2').css("background","white");						
							$("#validar_contrasena1").empty();
						});

					})	
				}
				if (data.no_coinciden != null) {
					$('#validar_contrasena1').show("fast", function(){
						$('#validar_contrasena1').html(data.no_coinciden);
						$('#contra_1').css("background","red");
						$('#contra_2').css("background","red");
						$('#validar_contrasena1').fadeOut(4000, function(){
							$('#contra_1').css("background","white");
							$('#contra_2').css("background","white");
							$("#validar_contrasena1").empty();
						});

					})	
				}				

				if (data.contra_max != null) {
					$('#validar_contrasena1').show("fast", function(){
						$('#validar_contrasena1').html(data.contra_max);
						$('#contra_1').css("background","red");
						$('#validar_contrasena1').fadeOut(4000, function(){
							$('#contra_1').css("background","white");
							$("#validar_contrasena1").empty();
						});

					})	
				}
				if (data.contra_mal != null) {
					$('#validar_contrasena1').show("fast", function(){
						$('#contra_1').css("background","red");
						$('#contra_2').css("background","red");
						$('#validar_contrasena1').html(data.contra_mal);
						$('#validar_contrasena1').fadeOut(4000, function(){
							$('#contra_1').css("background","white");
							$('#contra_2').css("background","white");
							$("#validar_contrasena1").empty();
						});

					})	
				}

				if (data.registro_ok != null) {
					swal({
						icon: 'success',				
						title: 'Registro',
						text: 'éxitoso!',
						timer: 1500
					})
					setTimeout(function(){
						var url = "index";
						$(location).attr('href',url);
					},2000);
				}


			}
		})

		
	})



})



