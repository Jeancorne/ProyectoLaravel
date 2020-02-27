$(document).ready(function(){



	$('#perfil_apren').on('click', function(){
		$.ajax({
			type: 'get',
			url: 'Perfil_aprendiz',
			beforeSend: function(xhr, type){
				xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
			},
			success: function(data){
				$('.proye').html(data);

				$('#cancelar_actualizado').on("click", function(){
					$('.segundo_panel').hide();
					$('.tercer_panel').hide();
				})


				$('#actu_propuesta').on('click', function(){
					var propuesta = $('#propuesta_texto').val();
					var foranea = $('#ocultar00').val();				
					$.ajax({
						url:"/Propuesta_aprendices",
						method:"POST",
						dataType: "JSON",							
						data:{propuesta:propuesta,foranea:foranea},
						beforeSend: function(xhr, type){
							xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
						},
						success: function(data){
							
							if (data.dataa != null) {
								$('.segundo_panel').hide();
								$('.tercer_panel').show();
								$('.tercer_panel').html(data.dataa);
							}

							$('#cance_actu').on('click', function(){
								$('.tercer_panel').hide();
							})

							$('#documento_apren').on('change', function(){
								var name = $('#documento_apren').val();
								name = name.replace(/C:\\fakepath\\/i, '');
								$('#name_nuevo').html(name)
							})



							$('#update_propuesta').on('submit', function(e){
								e.preventDefault();
								var datos = new FormData(this);
								datos.append('foranea',foranea)
								$.ajax({
									method: 'POST',
									url:'Actualizar_propuesta_aprendiz',
									dataType: 'JSON',
									data: datos,
									contentType: false,									
									processData:false,
									beforeSend: function(xhr, type){
										xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
									},
									success: function(data){
										if (data.document_mal != null) {
											$('#validar_documento').show("fast", function(){
												$('#validar_documento').html(data.document_mal);
												$('#validar_documento').fadeOut(4000, function(){
													$('#validar_documento').empty();											
												})

											})
										}
										if (data.document_max != null) {
											$('#validar_documento').show("fast", function(){
												$('#validar_documento').html(data.document_max);
												$('#validar_documento').fadeOut(4000, function(){
													$('#validar_documento').empty();											
												})

											})
										}

										if (data.propuesta_empty != null) {
											$('#validar_propuesta').show("fast", function(){
												$('#validar_propuesta').html(data.propuesta_empty);
												$('#validar_propuesta').fadeOut(4000, function(){
													$('#validar_propuesta').empty();											
												})

											})
										}
										if (data.propuesta_mal != null) {
											$('#validar_propuesta').show("fast", function(){
												$('#validar_propuesta').html(data.propuesta_mal);
												$('#validar_propuesta').fadeOut(4000, function(){
													$('#validar_propuesta').empty();											
												})

											})
										}
										if (data.actualizado != null) {
											$('#validar_documento').show("fast", function(){
												swal("Registrado!", "Correctamente!", "success");
												$('#validar_documento').html(data.actualizado);
												setTimeout(function(){																										
													var url = "Inicio_aprendiz";
													$(location).attr('href',url);
												},2000)

											})
										}













									}

								})

							})	

							
						}
					})
				})

				$('#actu_integrantes').on('click', function(){
					var identidad1 = $('#ocultar1').val();
					var identidad2 = $('#ocultar2').val();
					var identidad3 = $('#ocultar3').val();
					$.ajax({
						url:"Integrantes_reto",
						method:"POST",
						dataType: "JSON",						
						data:{identidad1:identidad1, identidad2:identidad2, identidad3:identidad3},
						beforeSend: function(xhr, type){
							xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
						},
						success: function(data){
							if (data.data != null) {
								$('.tercer_panel').hide();
								$('.segundo_panel').show();
								$('.segundo_panel').html(data.data);
													
							}					
						}
					})


				})


			}
		})
	})


	$('#proyectos_aprendiz').on('click', function(){
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
			url: 'ver_mas_reto_aprendiz',
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

				$('#postular_reto').on('click', function(){
					var ide = $(this).attr('name');
					postular_reto(categoria, departamento,city_proyecto, page, id,ide);
				})

			}
		})
	}
	function postular_reto(categoria, departamento,city_proyecto, page, id,ide){
		$.ajax({
			type: 'get',
			url: 'postular_reto',
			data: {ide:ide},
			dataType:'json',
			beforeSend: function(xhr, type){
				xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
			},
			success: function(data){
				$('#demo').html(data);

				$('#imagen_empre').on('change', function(){
					var nombre = $('#imagen_empre').val();
					nombre = nombre.replace(/C:\\fakepath\\/i, '');
					$('#name_archivo').html(nombre);
					
				})//#59321C

				$('#name_archivo').on('change', function(){
					var name_archivo = $('#name_archivo').val();
					alert(name_archivo);
				})


				$('#cancelar_aplicar').on('click', function(){
					ver_mas_reto(categoria, departamento,city_proyecto, page, id);
				})

				$('#formu').on('submit', function(e){
					e.preventDefault();
					var formData = new FormData(this);		
					formData.append('id_foranea',id)
					$.ajax({
						url: 'Aplicar_reto',
						type: 'POST',
						dataType: 'json',
						data:  formData,
						contentType: false,
						cache: false,
						processData:false,			
						beforeSend: function(xhr, type){
							xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
						},
						success: function(data){
							if (data.correcto != null) {
								swal("Registrado!", "Correctamente!", "success");	
								$('#validar_repetido').show("fast", function(){
									$('#validar_repetido').html(data.correcto);
									swal("Registrado!", "Correctamente!", "success");	
									setTimeout(function(){																										
										var url = "Inicio_aprendiz";
										$(location).attr('href',url);
									},1500)
								})
							}
							if (data.documento1_mal != null) {
								$('#documento1_validar').show("fast", function(){
									$('#documento1_validar').html(data.documento1_mal);	
									$('#primer_documento').css("background","red");
									$('#documento1_validar').fadeOut(4000, function(){
										$('#documento1_validar').empty();
										$('#primer_documento').css("background","white");
									})
								});					
							}
							if (data.documento1_existe != null) {
								$('#documento1_validar').show("fast", function(){
									$('#documento1_validar').html(data.documento1_existe);	
									$('#primer_documento').css("background","red");
									$('#documento1_validar').fadeOut(4000, function(){
										$('#documento1_validar').empty();
										$('#primer_documento').css("background","white");
									})
								});					
							}					
							if (data.documento1_repetido != null) {
								$('#validar_repetido').show("fast", function(){
									$('#validar_repetido').html(data.documento1_repetido);
									$('#validar_repetido').fadeOut(4000, function(){
										$('#documento1_validar').empty();
									});

								})
							}
							if (data.documento1_empty != null) {
								$('#documento1_validar').show("fast", function(){
									$('#documento1_validar').html(data.documento1_empty);	
									$('#primer_documento').css("background","red");
									$('#documento1_validar').fadeOut(4000, function(){
										$('#documento1_validar').empty();
										$('#primer_documento').css("background","white");
									})
								});	
							}
							if (data.documento2_mal != null) {
								$('#documento2_validar').show("fast", function(){						
									$('#documento2_validar').html(data.documento2_mal);
									$('#segundo_documento').css("background","red");
									$('#documento2_validar').fadeOut(4000, function(){
										$('#documento2_validar').empty();
										$('#segundo_documento').css("background","white");
									})
								});						
							}
							if (data.documento2_existe != null) {
								$('#documento2_validar').show("fast", function(){						
									$('#documento2_validar').html(data.documento2_existe);
									$('#segundo_documento').css("background","red");
									$('#documento2_validar').fadeOut(4000, function(){
										$('#documento2_validar').empty();
										$('#segundo_documento').css("background","white");
									})
								});						
							}

							if (data.documento2_no_existe != null) {
								$('#documento2_validar').show("fast", function(){						
									$('#documento2_validar').html(data.documento2_no_existe);
									$('#segundo_documento').css("background","red");
									$('#documento2_validar').fadeOut(4000, function(){
										$('#documento2_validar').empty();
										$('#segundo_documento').css("background","white");
									})
								});						
							}
							if (data.documento3_mal != null) {
								$('#documento3_validar').show("fast", function(){
									$('#documento3_validar').html(data.documento3_mal);
									$('#tercero_documento').css("background","red");
									$('#documento3_validar').fadeOut(4000, function(){
										$('#tercero_documento').css("background","white");
									})
								});					
							}
							if (data.documento3_existe != null) {
								$('#documento3_validar').show("fast", function(){
									$('#documento3_validar').html(data.documento3_existe);
									$('#tercero_documento').css("background","red");
									$('#documento3_validar').fadeOut(4000, function(){
										$('#tercero_documento').css("background","white");
									})
								});					
							}
							if (data.documento3_no_existe != null) {
								$('#documento3_validar').show("fast", function(){
									$('#documento3_validar').html(data.documento3_no_existe);
									$('#tercero_documento').css("background","red");
									$('#documento3_validar').fadeOut(4000, function(){
										$('#tercero_documento').css("background","white");
									})
								});					
							}
							if (data.document_empty != null) {
								$('#validar_document').show("fast", function(){
									$('#validar_document').html(data.document_empty);
									$('#name_archivo').css("color","red");
									$('#validar_document').fadeOut(4000, function(){
										$('#validar_document').empty();
										$('#name_archivo').css("color","black");
									})
								});					
							}
							if (data.document_mal != null) {
								$('#validar_document').show("fast", function(){
									$('#validar_document').html(data.document_mal);
									$('#name_archivo').css("color","red");
									$('#validar_document').fadeOut(4000, function(){
										$('#validar_document').empty();								
										$('#name_archivo').css("color","black");

									})
								});					
							}
							if (data.document_max != null) {
								$('#validar_document').show("fast", function(){
									$('#validar_document').html(data.document_max);
									$('#name_archivo').css("color","red");
									$('#validar_document').fadeOut(4000, function(){
										$('#validar_document').empty();
										$('#name_archivo').css("color","black");
									})
								});					
							}
							if (data.propuesta_empty != null) {
								$('#validar_propuesta').show("fast", function(){
									$('#validar_propuesta').html(data.propuesta_empty);
									$('.propu').css("background","red");
									$('#validar_propuesta').fadeOut(4000, function(){
										$('#validar_propuesta').empty();
										$('.propu').css("background","white");
									})
								});					
							}
						}
						
					})
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


