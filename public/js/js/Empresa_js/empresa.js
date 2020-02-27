$(document).ready(function(){

	$('#perfil_empresa').on('click', function(){
		$.ajax({
			type: 'get',
			url: 'perfil_empresa',		
			beforeSend: function(xhr, type){
				xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
			},		
			success: function(data){
				$('.proye').html(data);
				$('.btn_mostrar').on('click', function(){
					$('.resultado_publi').show();
				})
				$('.btn_ocultar').on('click', function(){
					$('.resultado_publi').hide();
				})

				$('.grupos_reto').on('click', function(){
					var id = $(this).attr("name");				
					ver_grupos(id);
				})

				$('#form_empresa').on('submit', function(e){
					e.preventDefault();
					$.ajax({
						url:"Update_empresa",
						method: "POST",
						dataType: "JSON",						
						cache: false,						
						data: new FormData(this),
						dataType: 'json',
						contentType: false,
						cache: false,
						processData:false,
						beforeSend: function(xhr, type){
							xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
						},
						success: function(data){
							if (data.direccion_max != null) {
								$('#alerta_direccion').show("fast", function(){
									$('#alerta_direccion').html(data.direccion_max);
									$('#alerta_direccion').fadeIn(1000, function(){
										$('#direccion_empresa').css("border","1px solid red");									
										$('#alerta_direccion').fadeOut(4000, function(){
											$('#direccion_empresa').css("border", "none");
											$('#direccion_empresa').css("border-bottom", "2px solid black");
											$('#direccion_empresa').hover(function(){
												$(this).css("border-bottom","2px solid #fc7323");
											}, function(){
												$(this).css("border-bottom","2px solid black");
											});
										})
									});
								})
							}

							if (data.imagen_mal) {
								$('.alerta_imagen').show(function(){
									$('.alerta_imagen').html(data.imagen_mal);
									$('.alerta_imagen').fadeOut(1500, function(){
										$('.alerta_imagen').empty();
									})
								})
							}

							if (data.imagen_max) {
								$('.alerta_imagen').show(function(){
									$('.alerta_imagen').html(data.imagen_max);
									$('.alerta_imagen').fadeOut(1500, function(){
										$('.alerta_imagen').empty();
									})
								})
							}




							if (data.nombre_num != null) {
								$('#alerta_nombre').show("fast", function(){
									$('#alerta_nombre').html(data.nombre_num);
									$('#alerta_nombre').fadeIn(1000, function(){
										$('#nombre_empresa').css("border","1px solid red");									
										$('#alerta_nombre').fadeOut(4000, function(){
											$('#nombre_empresa').css("border", "none");
											$('#nombre_empresa').css("border-bottom", "2px solid black");
											$('#nombre_empresa').hover(function(){
												$(this).css("border-bottom","2px solid #fc7323");
											}, function(){
												$(this).css("border-bottom","2px solid black");
											});
										})
									});
								})
							}
							if (data.nombre_max != null) {
								$('#alerta_nombre').show("fast", function(){
									$('#alerta_nombre').html(data.nombre_max);
									$('#alerta_nombre').fadeIn(1000, function(){
										$('#nombre_empresa').css("border","1px solid red");									
										$('#alerta_nombre').fadeOut(4000, function(){
											$('#nombre_empresa').css("border", "none");
											$('#nombre_empresa').css("border-bottom", "2px solid black");
											$('#nombre_empresa').hover(function(){
												$(this).css("border-bottom","2px solid #fc7323");
											}, function(){
												$(this).css("border-bottom","2px solid black");
											});
										})
									});
								})
							}

							if (data.contrasena_no_coinciden != null) {
								$('#alerta_contrasena').show("fast", function(){
									$('#alerta_contrasena').html(data.contrasena_no_coinciden);
									$('#alerta_contrasena').fadeIn(1000, function(){
										$('#contra_empresa1').css("border","1px solid red");	
										$('#contra_empresa2').css("border","1px solid red");								
										$('#alerta_contrasena').fadeOut(4000, function(){
											$('#contra_empresa1').css("border", "none");
											$('#contra_empresa2').css("border", "none");

											$('#contra_empresa1').css("border-bottom", "2px solid black");
											$('#contra_empresa2').css("border-bottom", "2px solid black");

											$('#contra_empresa1').hover(function(){
												$(this).css("border-bottom","2px solid #fc7323");
											}, function(){
												$(this).css("border-bottom","2px solid black");
											});
											$('#contra_empresa2').hover(function(){
												$(this).css("border-bottom","2px solid #fc7323");
											}, function(){
												$(this).css("border-bottom","2px solid black");
											});
										})
									});
								})
							}
							if (data.contrasena_max != null) {
								$('#alerta_contrasena').show("fast", function(){
									$('#alerta_contrasena').html(data.contrasena_max);
									$('#alerta_contrasena').fadeIn(1000, function(){
										$('#contra_empresa1').css("border","1px solid red");									
										$('#alerta_contrasena').fadeOut(4000, function(){
											$('#contra_empresa1').css("border", "none");
											$('#contra_empresa1').css("border-bottom", "2px solid black");
											$('#contra_empresa1').hover(function(){
												$(this).css("border-bottom","2px solid #fc7323");
											}, function(){
												$(this).css("border-bottom","2px solid black");
											});
										})
									});
								})
							}


							if (data.actualizada_ok != null) {
								swal("Registrado!", "Correctamente","success")

								setTimeout(function(){
									var url = "/Empresa_inicio";
									$(location).attr('href',url);
								},1000);
							}



						}
					})
				})




				$('.buto').on('click', function(){
					$('.aprendices_reto').hide();
					$('#reto_deta').show();
					$('.aprendiz_aplicado').hide();
					$('.aprendiz_aplicado').css("display","none");
					var id_proye = $(this).attr("name");	
					$.ajax({
						url:"Click_detalle_reto",
						method: "POST",
						dataType: "JSON",						
						cache: false,						
						data:{id_proye:id_proye},
						beforeSend: function(xhr, type){
							xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
						},
						success: function(data){
							if (data.vista != null) {
								$('#reto_deta').html(data.vista);
							}
							$('#cancelar_actualizado').on('click', function(){
								$('#reto_deta').hide();
							})
							$('#iniciar_actualizar').on('click', function(){
								$('#categoria_pr').removeAttr('readonly');
								$('#name_proye').removeAttr('readonly');
								$('#fecha_proye').removeAttr('readonly');
								$('#descripcion_proyecto').removeAttr('readonly');
								$('#btn_actu_reto').css("display", "block");
							})

							$('#actualizar_mi_reto').on('submit', function(e){
								e.preventDefault();
								var datos = new FormData(this);
								datos.append('foranea',id_proye)
								$.ajax({
									url:"Actualizar_mi_reto",
									method:"POST",
									dataType: "JSON",
									cache: false,
									contentType: false,									
									processData:false,
									data: datos,
									beforeSend: function(xhr, type){
										xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
									},
									success: function(data){
										if (data.nombre_max != null) {
											$('#nombre_valida').fadeIn("fast", function(){
												$('#nombre_valida').html(data.nombre_max);
												$('#nombre_valida').fadeOut(4000, function(){
													$('#nombre_valida').empty();
												})												
											})
										}
										if (data.nombre_numeros != null) {
											$('#nombre_valida').fadeIn("fast", function(){
												$('#nombre_valida').html(data.nombre_numeros);
												$('#nombre_valida').fadeOut(4000, function(){
													$('#nombre_valida').empty();
												})												
											})
										}
										if (data.descripcion_max != null) {
											$('#descripcion_valida').fadeIn("fast", function(){
												$('#descripcion_valida').html(data.descripcion_max);
												$('#descripcion_valida').fadeOut(4000, function(){
													$('#descripcion_valida').empty();
												})												
											})
										}
										if (data.sin_descripcion != null) {
											$('#descripcion_valida').fadeIn("fast", function(){
												$('#descripcion_valida').html(data.sin_descripcion);
												$('#descripcion_valida').fadeOut(4000, function(){
													$('#descripcion_valida').empty();
												})												
											})
										}
										if (data.actualizado_ok != null) {
											swal("Registrado!", "Correctamente","success")
											$('#descripcion_valida').html(data.actualizado_ok);
											setTimeout(function(){
												var url = "/Empresa_inicio";
												$(location).attr('href',url);
											},1000);

										}

									}
								})
							})
						}
					})
				})
			}
		})
	})

	function ver_grupos(id, page){
		$.ajax({
			url:"Click_grupos_reto",
			method: "POST",
			dataType: "JSON",						
			cache: false,						
			data:{id:id,page:page},
			beforeSend: function(xhr, type){
				xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
			},
			success: function(data){
				if (data.vista != null) {
					$('#aprendices_ligados_reto').html(data.vista);
					$('#aprendices_ligados_reto').css("display", "block");
				}
				$('#Ocultar').on('click', function(){
					$('#aprendices_ligados_reto').hide();
				})
				$('.paginacion_grupos ul a').on('click', function(e){
					e.preventDefault();
					var page = $(this).attr('href').split('page=')[1];				
					ver_grupos(id, page);
				})
				$('.aprendic').on('click', function(){
					var id_propuesta = $(this).attr("name");
					$.ajax({
						url:"Click_aprendiz_reto",
						method: "POST",
						dataType: "JSON",
						cache: false,
						data:{id_propuesta:id_propuesta},
						beforeSend: function(xhr, type){
							xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
						},
						success: function(data){
							if (data.aprendices != null) {
								$('.aprendiz_aplicado').css('display','block');
								$('.aprendiz_aplicado').html(data.aprendices);
												
							}

							$('#cancelar_vermas').on('click', function(){
								$('.aprendiz_aplicado').css('display','none');
							})
							
						}
					})
				})

			}
		})
	}


	$('#proyectos_page').on('click', function(){
		$.ajax({
			type: 'get',
			url: 'page_proyectos',		
			beforeSend: function(xhr, type){
				xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
			},
			success: function(data){
				$('.proye').html(data);

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
	})


	function show_retos(categoria, departamento,city_proyecto, page){
		$.ajax({
			type: 'get',
			url: 'retos_filtrados',
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
			url: 'ver_mas_reto',
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


	$('#publicar_proyecto').on('click', function(){
		
		$.ajax({
			type: 'get',
			url: 'publicar_proyectos',		
			beforeSend: function(xhr, type){
				xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
			},		
			success: function(data){
				$('.proye').html(data);
			}
		}).done(function(data){
			$('.icono_fecha').mouseenter(function(){
				$('#info_ocultar').css("display","block");
			})
			$('.icono_fecha').mouseleave(function(){
				$('#info_ocultar').css("display","none");
			})
			$('#departamento_proyecto').on('change', function(){
				var departamento = $(this).val();
				sacar_ciudad(departamento);
			})
			
			$('#publicar_reto').on('submit', function(e){
				e.preventDefault();
				$.ajax({
					type: 'post',
					url: 'publicar_proyecto',
					data: new FormData(this),
					dataType: 'json',
					contentType: false,
					cache: false,
					processData:false,
					beforeSend: function(xhr, type){
						xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
					},
					success: function(data){

						if (data.nombre_vacio_mal != null) {

							$('#alerta_informacion').show("slow", function(){
								$('#alerta_informacion').html(data.nombre_vacio_mal);
								$('#alerta_informacion').fadeOut(5000,function(){
									$('#alerta_informacion').empty();

								});
							})
						}

						if (data.nombre_caracteres_mal != null) {
							$('#alerta_informacion').show("slow", function(){
								$('#alerta_informacion').html(data.nombre_caracteres_mal);
								$('#alerta_informacion').fadeOut(5000,function(){
									$('#alerta_informacion').empty();
								});
							})
						}
						
						if (data.nombre_equivocado != null) {
							$('#alerta_informacion').show("slow", function(){
								$('#alerta_informacion').html(data.nombre_equivocado);
								$('#alerta_informacion').fadeOut(5000,function(){
									$('#alerta_informacion').empty();
								});
							})
						}
						if (data.fecha_vacio_mal != null) {
							$('#alerta_fecha').show("slow", function(){
								$('#alerta_fecha').html(data.fecha_vacio_mal);
								$('#alerta_fecha').fadeOut(5000,function(){
									$('#alerta_fecha').empty();
								});
							})
						}
						if (data.categoria_vacia != null) {
							$('#alerta_categoria').show("slow", function(){
								$('#alerta_categoria').html(data.categoria_vacia);
								$('#alerta_categoria').fadeOut(5000,function(){
									$('#alerta_categoria').empty();
								});
							})
						}
						if (data.categoria_error != null) {
							$('#alerta_categoria').show("slow", function(){
								$('#alerta_categoria').html(data.categoria_error);
								$('#alerta_categoria').fadeOut(5000,function(){
									$('#alerta_categoria').empty();
								});
							})
						}
						if (data.departamento_vacio != null) {
							$('#departamento_proye').show("slow", function(){
								$('#departamento_proye').html(data.departamento_vacio);
								$('#departamento_proye').fadeOut(5000,function(){
									$('#departamento_proye').empty();
								});
							})
						}
						if (data.ciudad_vacia != null) {
							$('#ciudad_pr').show("slow", function(){
								$('#ciudad_pr').html(data.ciudad_vacia);
								$('#ciudad_pr').fadeOut(5000,function(){
									$('#ciudad_pr').empty();
								});
							})
						}
						if (data.descripcion_vacio_mal != null) {
							$('#alert_descripcion').show("slow", function(){
								$('#alert_descripcion').html(data.descripcion_vacio_mal);
								$('#alert_descripcion').fadeOut(5000,function(){
									$('#alert_descripcion').empty();
								});
							})
						}
						if (data.descripcion_caracteres_mal != null) {
							$('#alert_descripcion').show("slow", function(){
								$('#alert_descripcion').html(data.descripcion_caracteres_mal);
								$('#alert_descripcion').fadeOut(5000,function(){
									$('#alert_descripcion').empty();
								});
							})
						}
						if (data.descripcion_error != null) {
							$('#alert_descripcion').show("slow", function(){
								$('#alert_descripcion').html(data.descripcion_error);

								$('#alert_descripcion').fadeOut(5000,function(){
									$('#alert_descripcion').empty();
								});
							})
						}

						if (data.ingresado_ok != null) {
							swal("Registrado!", "Correctamente","success")

							setTimeout(function(){
								var url = "/Empresa_inicio";
								$(location).attr('href',url);
							},1000);

						}
					}
				})
			})


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


