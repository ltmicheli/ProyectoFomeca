const DECIMALES = 2;
$(document).ready(function() {
///////////Preguntar al cerrar al pagina////////////////////
window.onbeforeunload =  function(e) {
	return "¿Seguro que quiere salir?";
}
//////////////////////FUNCIONES JQUERY VALIDATE/////////////////////////////
	function validaCuit(cuit){
		if (typeof (cuit) == 'undefined')
			return true;

		cuit = cuit.toString().replace(/[-_]/g, "");

		if (cuit == '')
			return true; //actua el required

		if( cuit.length != 11)
			return false;

		else{
			var mult = [5, 4, 3, 2, 7, 6, 5, 4, 3, 2];
			var total = 0;

			for( var i = 0; i < mult.length; i++){
				total += parseInt(cuit[i]) * mult[i];
			}

			var mod = total = total % 11;
			var digito = mod == 0 ? 0 : mod == 1 ? 9 : 11 - mod;
		}

		return digito == parseInt(cuit[10]);
	}

	function validaSubsidioLinea1y2(subsidio){
		if (typeof (subsidio) == 'undefined')
			return true;

		if (subsidio == ''){
			return true; //actua el required
		}
		subsidioNum = parseFloat(subsidio);
		if (subsidioNum <= 0 || subsidioNum > 500000)
			return false;
		else{
			return true;
		}
	}

	function validaGastosCapital(gastos){
		if (typeof (gastos) == 'undefined')
			return true;
		if (gastos == '')
		 	return true; //actua el required
		var subsidio = parseFloat($('#gastosSubsidioResumenGeneral').val());
		var toleranciaMayor = subsidio * 0.82;
		var toleranciaMenor = subsidio * 0.78;
		if(gastos < toleranciaMenor || gastos > toleranciaMayor){
			return false;
		}else {return true;}
	}

	function validaGastosCorrientes(gastos){
		if (typeof (gastos) == 'undefined')
			return true;
		if (gastos == '')
		 	return true; //actua el required
		var subsidio = parseFloat($('#gastosSubsidioResumenGeneral').val());
		var toleranciaMayor = subsidio * 0.22;
		var toleranciaMenor = subsidio * 0.18;
		if(gastos < toleranciaMenor || gastos > toleranciaMayor){
			return false;
		}else{ return true;}
	}

	function validaResumenGastosCapital(gastos){
		if (typeof (gastos) == 'undefined')
			return true;
		if (gastos == '')
		 	return true; //actua el required
		var gastoTotal = parseFloat($('#gastosCapitalResumenGeneral').val());
		if (gastos > gastoTotal || gastos < 0) {
			return false;
		}else {
			return true;
		}

	}

	function validaResumenGastosCorrientes(gastos){
		if (typeof (gastos) == 'undefined')
			return true;
		if (gastos == '')
		 	return true; //actua el required
		var gastoTotal = parseFloat($('#gastosCorrientesResumenGeneral').val());
		if (gastos > gastoTotal) {
			return false;
		}else {
			return true;
		}
	}

	function validaContraparte(contraparte){
		if (typeof (contraparte) == 'undefined')
			return true;
		if (contraparte == '')
		 	return true; //actua el required
		var porcentaje = getContraParte();
		var proyecto = parseFloat($('#proyectoResumen').val());
		var contraparteMinima = proyecto * porcentaje; //obtengo el valor de la contraparte, cargada en el paso 2
		if (contraparte < contraparteMinima || contraparte >= proyecto) {
			return false;
		}else {
			return true;
		}
	}

	function validaProyectoResumen(proyecto){
	if (typeof (proyecto) == 'undefined')
		return true;
	if (proyecto == '')
		return true; //actua el required
	if (proyecto <= 0){
		return false;
	}
	return true;
	}

	function validaResumenContraparte(gastos){
		if (typeof (gastos) == 'undefined')
			return true;
		if (gastos == '')
		 	return true; //actua el required
		var gastoTotal = parseFloat($('#gastosContraparteResumenGeneral').val());
		if (gastos > gastoTotal || gastos < 0) {
			return false;
		}else {
			return true;
		}
	}
	///////////////////////////AGREGAR LOS METODOS JQUERY VALIDATE/////////////////////////////////

	$.validator.addMethod("cuit", validaCuit, 'CUIT/CUIT Invalido');
	$.validator.addMethod("validemail", function( value, element ) {
		return this.optional(element) || /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test( value );
	},	'Ingrese un email valido.'
	);
	$.validator.addMethod("proyecto", validaProyectoResumen, 'Monto no válido');
	$.validator.addMethod("contraparte", validaContraparte, 'Monto no válido');
	$.validator.addMethod("subsidio", validaSubsidioLinea1y2, 'Monto no válido');
	$.validator.addMethod("gastosCapital", validaGastosCapital, 'Monto no válido');
	$.validator.addMethod("gastosCorrientes", validaGastosCorrientes, 'Monto no válido');
	$.validator.addMethod("validaResumenGastosCapital", validaResumenGastosCapital, 'Monto no válido');
	$.validator.addMethod("validaResumenGastosCorrientes", validaResumenGastosCorrientes, 'Monto no válido');
	$.validator.addMethod("resumenContraparte", validaResumenContraparte, 'Monto no válido');




	$("#cuit").keydown(function() {
		$(this).valid();
	});
	$("#gastosSubsidioResumenGeneral").keydown(function() {

		$(this).valid();
	});
	$("#gastosCapitalResumenGeneral").keydown(function() {
		$(this).valid();
	});
	$("#gastosCorrientesResumenGeneral").keydown(function() {
		$(this).valid();
	});
	$("#totalGastosAdecuacionEdilicia").keydown(function() {
		$(this).valid();
	});
	$("#totalGastosEquipamientoTecnologico").keydown(function() {
		$(this).valid();
	});
	$("#totalGastosRrhhNoPermanentes").keydown(function() {
		$(this).valid();
	});
	$("#totalGastosViaticos").keydown(function() {
		$(this).valid();
	});
	$("#totalRrhhPermanentesContraparteResumen").keydown(function() {
		$(this).valid();
	});
	$("#serviciosContraparteResumen").keydown(function() {
		$(this).valid();
	});
	$("#otrosContraparteResumen").keydown(function() {
		$(this).valid();
	});
	$("#proyectoResumen").keydown(function() {
		$(this).valid();
	});
	$("#gastosContraparteResumenGeneral").keydown(function() {
		$(this).valid();
	});
	/*$("#email").keydown(function() {
		$(this).valid();
	});*/

});
/////////////////////////JQUERY STEP/////////////////////////

$('#formulario')
        .steps({
            headerTag: 'h2',
            bodyTag: 'fieldset',
            transitionEffect: "slideLeft",
            // Triggered when clicking the Previous/Next buttons
            onStepChanging: function(e, currentIndex, newIndex) {

                // Permitir siempre la acción anterior incluso si el formulario actual no es válido!
                if (newIndex < currentIndex) {
                    return true;
                }
                var form = $(this);
                //Necesario en algunos casos si el usuario regresó (limpiar)

                if (currentIndex < newIndex)
                {
                    // To remove error styles
                    $(".body:eq(" + newIndex + ") label.error", form).remove();
                    $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                }
                form.validate().settings.ignore = ":disabled,:hidden";

                if(currentIndex == 1){
                  if ($('#formulario').valid()) {
                    if((parseFloat($('#gastosCapitalResumenGeneral').val()) + parseFloat($('#gastosCorrientesResumenGeneral').val())) != parseFloat($('#gastosSubsidioResumenGeneral').val())){
											var newDiv = $(document.createElement('div'));
											newDiv.html('<p>La suma entre los campos GASTOS DE CAPITAL y GASTOS CORRIENTES no es igual al campo TOTAL GASTOS SUBSIDIO.</p>'+ '<br />' +'<p>Verifique lo solicitado y podra continuar.<p>');

											newDiv.dialog({
												modal: true,
									      width: 750,
												heigth: 200,
									      show: 'fold',
									      hide: 'scale',
												title: 'Error',
												responsive: true,
												resizable: false,
												buttons: {
													Cerrar: function() {
														$(this).dialog("close");
													}
												}
											});
                      return false;
                    }else {
											$('#minimoARespaldarPresupuestos').val( parseFloat($('#gastosSubsidioResumenGeneral').val()) * 0.60);
                      $('#totalesGastosContraparteResumen').val("$" + $('#gastosContraparteResumenGeneral').val());
                      return form.valid();
                    }
                  }else {
                    return form.valid();
                  }
                }else if(currentIndex == 2){
                  if(parseFloat($('#totalGastosAdecuacionEdilicia').val()) + parseFloat($('#totalGastosEquipamientoTecnologico').val()) != parseFloat($('#gastosCapitalResumenGeneral').val()) || parseFloat($('#totalGastosRrhhNoPermanentes').val()) + parseFloat($('#totalGastosViaticos').val()) != parseFloat($('#gastosCorrientesResumenGeneral').val())){
										var gastosCapital = $('#gastosCapitalResumenGeneral').val();
										var gastosCorrientes = $('#gastosCorrientesResumenGeneral'). val();
										newDiv = $(document.createElement('div'));
										newDiv.html('<p>La suma de gastos de capital debe ser igual a ' + '$' + gastosCapital +'</p><br />' + '<p>La suma de gastos corrientes debe ser igual a ' + '$' + gastosCorrientes + '</p>');
										newDiv.dialog({
											modal: true,
											width: 400,
											heigth: 150,
											show: 'fold',
											title: 'Error',
											hide: 'scale',
											responsive: true,
											dialogClass: 'modal-dialog',
											buttons: {
												Cerrar: function() {
													$(this).dialog("close");
												}
											}
										});
										return false;
                  }else {
                    return form.valid();
                  }
                }else if(currentIndex == 3){

                  var adecuTransmision = calcularDesembolsoAdecuTransmision();
                  var adecuProduccion = calcularDesembolsoAdecuProduccion();
                  var adecuInfra = calcularDesembolsoAdecuInfra();
                  var totalAdecuacion = adecuTransmision + adecuProduccion + adecuInfra;
                  if(totalAdecuacion != parseFloat($('#totalGastosAdecuacionEdilicia').val())){
                    if (totalAdecuacion == NaN || totalAdecuacion == undefined) {
                      totalAdecuacion = 0;
                    }
										newDiv = $(document.createElement('div'));
										newDiv.html('<p>Gastos de adecuación edilicia declarado en solapa 3: ' + '$' + parseFloat($('#totalGastosAdecuacionEdilicia').val()) + '</p><br />' + '<p>Gastos descriptos en esta solapa: ' + '$' + totalAdecuacion + '</p>');
										newDiv.dialog({
											modal: true,
											width: 450,
											heigth: 150,
											show: 'fold',
											hide: 'scale',
											title: 'Error',
											responsive: true,
											dialogClass: 'modal-dialog',
											buttons: {
												Cerrar: function() {
													$(this).dialog("close");
												}
											}
										});
                    return false;
                  }else {
                    return form.valid();
                  }
                }else if(currentIndex == 4){

                  var equipProduccion = calcularDesembolsoEquipProduccion();
                  var equipTransmision = calcularDesembolsoEquipTransmision();
                  var equipInfra = calcularDesembolsoEquipInfra();
                  var totalEquipamiento = equipProduccion + equipTransmision + equipInfra;
                  if(totalEquipamiento != parseFloat($('#totalGastosEquipamientoTecnologico').val())){
                    if (totalEquipamiento == NaN || totalEquipamiento == undefined) {
                      totalEquipamiento = 0;
                    }
										newDiv = $(document.createElement('div'));
										newDiv.html('<p>Gastos de equipamiento tecnológico declarado en solapa 3: ' + '$' + parseFloat($('#totalGastosEquipamientoTecnologico').val()) + '</p><br />' + '<p>Gastos descriptos en esta solapa: ' + '$' + totalEquipamiento + '</p>');
										newDiv.dialog({
											modal: true,
											width: 480,
											heigth: 150,
											show: 'fold',
											hide: 'scale',
											title: 'Error',
											responsive: true,
											dialogClass: 'modal-dialog',
											buttons: {
												Cerrar: function() {
													$(this).dialog("close");
												}
											}
										});
                    return false;
                  }else {
                    return form.valid();
                  }
                }else if(currentIndex == 5){

                  var rrhhNoPermanentes = calcularDesembolsoRrhhNoPermanentes();
                  var viaticos = calcularDesembolsoViaticosPersonal();
                  if(rrhhNoPermanentes != parseFloat($('#totalGastosRrhhNoPermanentes').val()) || viaticos != parseFloat($('#totalGastosViaticos').val())){
										newDiv = $(document.createElement('div'));
										newDiv.html('<p>Gastos de <strong>recursos humanos no permanentes</strong> declarado en solapa 3: ' + '$' + $('#totalGastosRrhhNoPermanentes').val() + '</p><br />' + '<p>Gastos de <strong>recursos humanos no permantes</strong> descriptos en esta solapa: ' + '$' + rrhhNoPermanentes + '</p><br /><br />' + '<p>Gastos de <strong>viáticos del personal y traslado de equipamiento y/o materiales</strong> declarado en solapa 3: ' + '$' + $('#totalGastosViaticos').val() + '</p><br />' + '<p>Gastos de <strong>viáticos del personal y traslado de equipamiento y/o materiales</strong> descriptos en esta solapa: ' + '$' + viaticos + '</p>');
										newDiv.dialog({
											modal: true,
											width: 780,
											heigth: 150,
											show: 'fold',
											hide: 'scale',
											title: 'Error',
											responsive: true,
											dialogClass: 'modal-dialog',
											buttons: {
												Cerrar: function() {
													$(this).dialog("close");
												}
											}
										});
                    return false;
                  }else {
                    return form.valid();
                  }
                }else if(currentIndex == 6){
                  if(parseFloat($('#totalRrhhPermanentesContraparteResumen').val()) + parseFloat($('#serviciosContraparteResumen').val()) + parseFloat($('#otrosContraparteResumen').val()) != parseFloat($('#gastosContraparteResumenGeneral').val())){
										newDiv = $(document.createElement('div'));
										newDiv.html('<p><strong>Total gastos contraparte</strong> no coincide con la contraparte declarada en la pestaña "2.Resumen General"</p>');
										newDiv.dialog({
											modal: true,
											width: 450,
											heigth: 150,
											show: 'fold',
											hide: 'scale',
											title: 'Error',
											responsive: true,
											dialogClass: 'modal-dialog',
											buttons: {
												Cerrar: function() {
													$(this).dialog("close");
												}
											}
										});
                    return false;
                  }else {
                    return form.valid();
                  }
                }else if(currentIndex == 7){
                  if(parseFloat($('#totalRrhhPermanentesContraparteDetalle').val().substr(1)) + parseFloat($('#totalServicioContraparteDetalle').val().substr(1)) + parseFloat($('#totalOtrasErogacionesContraparteDetalle').val().substr(1)) != parseFloat($('#gastosContraparteResumenGeneral').val())){
										newDiv = $(document.createElement('div'));
										newDiv.html('<p>Gastos de <strong>recursos humanos permanentes</strong> declarados en la solapa 7: ' + '$' + $('#totalRrhhPermanentesContraparteResumen').val() + '</p>' + '<p>Gastos de <strong>recursos humanos permanentes</strong> declarados en esta solapa: ' + $('#totalRrhhPermanentesContraparteDetalle').val() + '</p><br /><br />' + '<p>Gastos de <strong>servicios</strong> declarados en la solapa 7: ' + '$' + $('#serviciosContraparteResumen').val() + '</p>' + '<p>Gastos de <strong>servicios</strong> declarados en esta solapa: ' + $('#totalServicioContraparteDetalle').val() + '</p><br />' + '<p>Gastos de <strong>otras erogaciones</strong> declarados en la solapa 7: ' + '$' + $('#otrosContraparteResumen').val() + '</p>' + '<p>Gastos de <strong>otras erogaciones</strong> declarados en esta solapa: ' + $('#totalOtrasErogacionesContraparteDetalle').val() + '</p>');
										newDiv.dialog({
											modal: true,
											width: 575,
											heigth: 150,
											show: 'fold',
											hide: 'scale',
											title: 'Error',
											responsive: true,
											dialogClass: 'modal-dialog',
											buttons: {
												Cerrar: function() {
													$(this).dialog("close");
												}
											}
										});
                    return false;
                  }else {
                    return form.valid();
                  }
                }else {
                  return form.valid();
                }

            },
            onFinishing: function(e, currentIndex) {
							var form = $(this);
							if (parseFloat($('#minimoARespaldarPresupuestos').val()) <= parseFloat($('#totalRespaldadoPresupuestos').val()) && parseFloat($('#totalRespaldadoPresupuestos').val()) <=  parseFloat($('#gastosSubsidioResumenGeneral').val())) {
								form.validate().settings.ignore = ":disabled";
		            return form.valid();
							}else {
								newDiv = $(document.createElement('div'));
								newDiv.html('<p>El monto total respaldado tiene que superar al monto mínimo a respaldar y no sobrepasar el monto del subsidio pedido.</p>');
								newDiv.dialog({
									modal: true,
									width: 500,
									heigth: 150,
									show: 'fold',
									hide: 'scale',
									title: 'Error',
									responsive: true,
									buttons: {
										Cerrar: function() {
											$(this).dialog("close");
										}
									}
								});
								return false;
							}
            },
            onFinished: function(e, currentIndex) {
                	var $form = $(this);
                  var post_url = 'lineaUno/guardar';
                  var request_method = 'POST';
									//sacar atributo disabled temporalmente para mandar por ajax
									var disabled = $form.find(':input:disabled').removeAttr('disabled');
                  var form_data = $form.serialize();
                  $.ajax({
                    url : post_url,
										async: false,
                    type: request_method,
                    contentType: "application/x-www-form-urlencoded",
                    data : form_data,
										dataType: "json",
                    success: function(data){
                      if(data.status !== 'error'){
												window.onbeforeunload = null;
												newDiv = $(document.createElement('div'));
												newDiv.html("<p><strong>Todos los datos fueron cargados correctamente</strong><br/>Descargue el pdf y adjuntelo al trámite en TAD</p>");
												newDiv.dialog({
													modal: true,
													width: 400,
													heigth: 150,
													title: 'Formulario finalizado',
													show: 'fold',
													hide: 'scale',
													responsive: true,
													buttons: {
														Cerrar: function() {
															$(this).dialog("close");
															//location.reload();
														}
													}
												});
												newDiv.closest('.ui-dialog').children('.ui-dialog-titlebar').addClass("titulo-success");
												//$form.submit();
												return true;
											}else {
												newDiv = $(document.createElement('div'));
												newDiv.html(data.data);
												newDiv.dialog({
													modal: true,
													width: 600,
													heigth: 150,
													show: 'fold',
													hide: 'scale',
													title: 'Error',
													responsive: true,
													dialogClass: 'modal-dialog',
													buttons: {
														Cerrar: function() {
															$(this).dialog("close");
														}
													}
												});
												return false;
											}
                    },
                    error: function(data){
                      console.log(data.data);
                    }
                  });
									disabled.attr('disabled','disabled');
            },
            labels: {
              cancel: "Cancelar",
              finish: "Terminar",
              next: "Siguiente",
              previous: "Anterior",
              loading: "Cargando"
            }
        })////////////////////AGREGO LAS REGLAS PARA EL JQUERY VALIDATE/////////////////////
        .validate({
          rules:
             {
               cuit: {
                 required: true,
                 cuit: "cuit",
                 number: true,
               },
               razonSocial: {
                 required: true,
								 maxlength: 80
               },
               nombreFantasia: {
                 required: true,
								 maxlength: 80
               },
               proyectoResumen:{
                 required: true,
                 number: true,
                 proyecto: true,
								 maxlength: 15
               },
               gastosContraparteResumenGeneral:{
                 required: true,
                 number: true,
                 contraparte: true,
								 maxlength: 15
               },
               gastosSubsidioResumenGeneral:{
                 required: true,
                 number: true,
                 subsidio: true,
								 maxlength: 15
               },
               gastosCapitalResumenGeneral: {
                 required: true,
                 number: true,
                 gastosCapital: true,
								 maxlength: 15
               },
               gastosCorrientesResumenGeneral: {
                 required: true,
                 number: true,
                 gastosCorrientes: true,
								 maxlength: 15
               },
               totalGastosAdecuacionEdilicia: {
                 required: true,
                 number: true,
                 validaResumenGastosCapital: true,
								 maxlength: 15
               },
               totalGastosEquipamientoTecnologico: {
                 required: true,
                 number: true,
                 validaResumenGastosCapital: true,
								 maxlength: 15
               },
               totalGastosRrhhNoPermanentes: {
                 required: true,
                 number: true,
                 validaResumenGastosCorrientes: true,
								 maxlength: 15
               },
               totalGastosViaticos: {
                 required: true,
                 number: true,
                 validaResumenGastosCorrientes: true,
								 maxlength: 15
               },
               totalRrhhPermanentesContraparteResumen: {
                 required: true,
                 number: true,
								 resumenContraparte : true,
								 maxlength: 15
               },
               serviciosContraparteResumen: {
                 required: true,
                 number: true,
								 resumenContraparte : true,
								 maxlength: 15
               },
               otrosContraparteResumen: {
                 required: true,
                 number: true,
								 resumenContraparte : true,
								 maxlength: 15
               }
             },
             messages: {
               proyectoResumen: {
                 required: "Requerido",
								 maxlength: "Excedido"
               },
               gastosContraparteResumenGeneral: {
                 required: "Requerido",
								 maxlength: "Excedido"
               },
               gastosSubsidioResumenGeneral: {
                 required: "Requerido",
								 maxlength: "Excedido"
               },
               gastosCapitalResumenGeneral:{
                 required: "Requerido",
								 maxlength: "Excedido"
               },
               gastosCorrientesResumenGeneral: {
                 required: "Requerido",
								 maxlength: "Excedido"
               },
               totalGastosAdecuacionEdilicia: {
                 required: "Requerido",
								 maxlength: "Excedido"
               },
               totalGastosEquipamientoTecnologico: {
                 required: "Requerido",
								 maxlength: "Excedido"
               },
               totalGastosRrhhNoPermanentes: {
                 required: "Requerido",
								 maxlength: "Excedido"
               },
               totalGastosViaticos: {
                 required: "Requerido",
								 maxlength: "Excedido"
               },
               totalRrhhPermanentesContraparteResumen: {
                 required: "Requerido",
								 maxlength: "Excedido"
               },
               serviciosContraparteResumen: {
                 required: "Requerido",
								 maxlength: "Excedido"
               },
               otrosContraparteResumen: {
                 required: "Requerido",
								 maxlength: "Excedido"
               }
             }

    });

//Inicializando contadores para indices de tablas en function addRow
var contadorAdecuacionTransmision = 1;
var contadorAdecuacionProduccion = 1;
var contadorAdecuacionInfra = 1;
var contadorEquipamientoProduccion = 1;
var contadorEquipamientoTransmision = 1;
var contadorEquipamientoInfra = 1;
var contadorRrhhNoPermanentes = 1;
var contadorViaticosPersonal = 1;
var contadorRrhhPermanentesContraparte = 1;
var contadorServiciosContraparte = 1;
var contadorOtrasErogacionesContraparte = 1;
var contadorPresupuestos = 1;

function addRow (id){
            // Obtenemos el numero de filas (td) que tiene la primera columna
            // (tr) del id "tabla"
            switch (id) {
              case "agregarAdecuacionTransmision":
                var nuevaFilaAdecuacionTransmision="<tr id='row_adecuacion_transmision_"+ contadorAdecuacionTransmision +"'>";
                // añadimos las columnas
                nuevaFilaAdecuacionTransmision+="<td><input class='form-control' name='adecuacionTransmision["+ contadorAdecuacionTransmision +"][desc]' maxlength='58'></input></td>";
                nuevaFilaAdecuacionTransmision+="<td><input class='form-control' name='adecuacionTransmision["+ contadorAdecuacionTransmision +"][tiem]' maxlength='6'></input></td>";
                nuevaFilaAdecuacionTransmision+="<td><input type='number' value='' class='form-control' name='adecuacionTransmision["+ contadorAdecuacionTransmision +"][dese]' id='desembolsoAdecuTransmision_"+ contadorAdecuacionTransmision++ +"' onKeyUp='calcularDesembolsoAdecuTransmision()' maxlength='15'></input></td>";
                // Añadimos una columna con el numero total de columnas.
                // Añadimos uno al total, ya que cuando cargamos los valores para la
                // columna, todavia no esta añadida
                nuevaFilaAdecuacionTransmision+="</tr>";
                $("#tablaAdecuacionTransmision").append(nuevaFilaAdecuacionTransmision);
                break;

              case "agregarAdecuacionProduccion":
                var nuevaFilaAdecuacionProduccion="<tr id='row_adecuacion_produccion_"+ contadorAdecuacionProduccion +"'>";
                // añadimos las columnas
                nuevaFilaAdecuacionProduccion+="<td><input class='form-control' name='adecuacionProduccion["+ contadorAdecuacionProduccion +"][desc]' maxlength='58'></input></td>";
                nuevaFilaAdecuacionProduccion+="<td><input class='form-control' name='adecuacionProduccion["+ contadorAdecuacionProduccion +"][tiem]' maxlength='6'></input></td>";
                nuevaFilaAdecuacionProduccion+="<td><input type='number' value='' class='form-control' name='adecuacionProduccion["+ contadorAdecuacionProduccion +"][dese]' id='desembolsoAdecuProduccion_"+ contadorAdecuacionProduccion++ +"' onKeyUp='calcularDesembolsoAdecuProduccion()' maxlength='15'></input></td>";
                // Añadimos una columna con el numero total de columnas.
                // Añadimos uno al total, ya que cuando cargamos los valores para la
                // columna, todavia no esta añadida
                nuevaFilaAdecuacionProduccion+="</tr>";
                $("#tablaAdecuacionProduccion").append(nuevaFilaAdecuacionProduccion);
                break;

              case "agregarAdecuacionInfraestructura":
                var nuevaFilaAdecuacioInfra="<tr id='row_adecuacion_infra_"+ contadorAdecuacionInfra +"'>";
                // añadimos las columnas
                nuevaFilaAdecuacioInfra+="<td><input class='form-control' name='adecuacionInfra["+ contadorAdecuacionInfra +"][desc]' maxlength='58'></input></td>";
                nuevaFilaAdecuacioInfra+="<td><input class='form-control' name='adecuacionInfra["+ contadorAdecuacionInfra +"][tiem]' maxlength='6'></input></td>";
                nuevaFilaAdecuacioInfra+="<td><input type='number' value='' class='form-control' name='adecuacionInfra["+ contadorAdecuacionInfra +"][dese]' id='desembolsoAdecuInfra_"+ contadorAdecuacionInfra++ +"' onKeyUp='calcularDesembolsoAdecuInfra()' maxlength='15'></input></td>";
                // Añadimos una columna con el numero total de columnas.
                // Añadimos uno al total, ya que cuando cargamos los valores para la
                // columna, todavia no esta añadida
                nuevaFilaAdecuacioInfra+="</tr>";
                $("#tablaAdecuacionInfraestructura").append(nuevaFilaAdecuacioInfra);
                break;


              //////////////Equipamiento tecnologico///////////////////


              case "agregarEquipamientoProduccion":
                var nuevaFilaEquipamientoProduccion="<tr id='row_equipamiento_produccion_"+ contadorEquipamientoProduccion +"'>";
                // añadimos las columnas
                nuevaFilaEquipamientoProduccion+="<td><input class='form-control' name='equipamientoProduccion["+ contadorEquipamientoProduccion +"][desc]' maxlength='27'></input></td>";//descripcion
                nuevaFilaEquipamientoProduccion+="<td><input type='number' class='form-control' name='equipamientoProduccion["+ contadorEquipamientoProduccion +"][cant]' id='cantidadEquipamientoProduccion_"+ contadorEquipamientoProduccion +"' value='0' onkeyup='calcularDesembolsoEquipProduccion()' maxlength='6'></input></td>";//cantidad
                nuevaFilaEquipamientoProduccion+="<td><input class='form-control' name='equipamientoProduccion["+ contadorEquipamientoProduccion +"][fina]' maxlength='22'></input></td>";//finalidad
                nuevaFilaEquipamientoProduccion+="<td><input type='number' class='form-control' name='equipamientoProduccion["+ contadorEquipamientoProduccion +"][prec]' id='precioEquipamientoProduccion_"+ contadorEquipamientoProduccion +"' value='0' onkeyup='calcularDesembolsoEquipProduccion()' maxlength='10'></input></td>";//precio
                nuevaFilaEquipamientoProduccion+="<td><input disabled type='number' class='form-control' name='equipamientoProduccion["+ contadorEquipamientoProduccion +"][dese]' id='desembolsoEquipamientoProduccion_"+ contadorEquipamientoProduccion +"' value='0' maxlength='15'></input></td>";//desembolso
                // Añadimos una columna con el numero total de columnas.
                // Añadimos uno al total, ya que cuando cargamos los valores para la
                // columna, todavia no esta añadida
                nuevaFilaEquipamientoProduccion+="</tr>";
                $("#tablaEquipamientoProduccion").append(nuevaFilaEquipamientoProduccion);
                //Aumentamos el valor de contadorEquipamiento
                contadorEquipamientoProduccion++;
                break;
              case "agregarEquipamientoTransmision":
                var nuevaFilaEquipamientoTransmision="<tr id='row_equipamiento_transmision_"+ contadorEquipamientoTransmision +"'>";
                // añadimos las columnas
                nuevaFilaEquipamientoTransmision+="<td><input class='form-control' name='equipamientoTransmision["+ contadorEquipamientoTransmision +"][desc]' maxlength='27'></input></td>";//descripcion
                nuevaFilaEquipamientoTransmision+="<td><input type='number' class='form-control' name='equipamientoTransmision["+ contadorEquipamientoTransmision +"][cant]' id='cantidadEquipamientoTransmision_"+ contadorEquipamientoTransmision +"' value='0' onkeyup='calcularDesembolsoEquipTransmision()' maxlength='6'></input></td>";//cantidad
                nuevaFilaEquipamientoTransmision+="<td><input class='form-control' name='equipamientoTransmision["+ contadorEquipamientoTransmision +"][fina]' maxlength='22'></input></td>";//finalidad
                nuevaFilaEquipamientoTransmision+="<td><input type='number' class='form-control' name='equipamientoTransmision["+ contadorEquipamientoTransmision +"][prec]' id='precioEquipamientoTransmision_"+ contadorEquipamientoTransmision +"' value='0' onkeyup='calcularDesembolsoEquipTransmision()' maxlength='10'></input></td>";//precio
                nuevaFilaEquipamientoTransmision+="<td><input disabled type='number' class='form-control' name='equipamientoTransmision["+ contadorEquipamientoTransmision +"][dese]' id='desembolsoEquipamientoTransmision_"+ contadorEquipamientoTransmision +"' value='0' maxlength='15'></input></td>";//desembolso
                // Añadimos una columna con el numero total de columnas.
                // Añadimos uno al total, ya que cuando cargamos los valores para la
                // columna, todavia no esta añadida
                nuevaFilaEquipamientoTransmision+="</tr>";
                $("#tablaEquipamientoTransmision").append(nuevaFilaEquipamientoTransmision);
                //Aumentamos el valor de contadorEquipamiento
                contadorEquipamientoTransmision++;
                break;
              case "agregarEquipamientoInfraestructura":
                var nuevaFilaEquipamientoInfra="<tr id='row_equipamiento_infra_"+ contadorEquipamientoInfra +"'>";
                // añadimos las columnas
                nuevaFilaEquipamientoInfra+="<td><input class='form-control' name='equipamientoInfra["+ contadorEquipamientoInfra +"][desc]' maxlength='27'></input></td>";//descripcion
                nuevaFilaEquipamientoInfra+="<td><input type='number' class='form-control' name='equipamientoInfra["+ contadorEquipamientoInfra +"][cant]' id='cantidadEquipamientoInfra_"+ contadorEquipamientoInfra +"' value='0' onkeyup='calcularDesembolsoEquipInfra()' maxlength='6'></input></td>";//cantidad
                nuevaFilaEquipamientoInfra+="<td><input class='form-control' name='equipamientoInfra["+ contadorEquipamientoInfra +"][fina]' maxlength='22'></input></td>";//finalidad
                nuevaFilaEquipamientoInfra+="<td><input type='number' class='form-control' name='equipamientoInfra["+ contadorEquipamientoInfra +"][prec]' id='precioEquipamientoInfra_"+ contadorEquipamientoInfra +"' value='0' onkeyup='calcularDesembolsoEquipInfra()' maxlength='10'></input></td>";//precio
                nuevaFilaEquipamientoInfra+="<td><input disabled type='number' class='form-control' name='equipamientoInfra["+ contadorEquipamientoInfra +"][dese]' id='desembolsoEquipamientoInfra_"+ contadorEquipamientoInfra +"' value='0' maxlength='15'></input></td>";//desembolso
                // Añadimos una columna con el numero total de columnas.
                // Añadimos uno al total, ya que cuando cargamos los valores para la
                // columna, todavia no esta añadida
                nuevaFilaEquipamientoInfra+="</tr>";
                $("#tablaEquipamientoInfraestructura").append(nuevaFilaEquipamientoInfra);
                //Aumentamos el valor de contadorEquipamiento
                contadorEquipamientoInfra++;
                break;


              //////////////CORRIENTES///////////


              case "agregarRrhhNoPermanentes":
                var nuevaFilaRrhhNoPermanentes="<tr id='row_rrhh_no_permanentes_"+ contadorRrhhNoPermanentes +"'>";
                // añadimos las columnas
                nuevaFilaRrhhNoPermanentes+="<td><input class='form-control' name='rrhhNoPermanentes["+ contadorRrhhNoPermanentes +"][func]' maxlength='34'></input></td>";//funcion
                nuevaFilaRrhhNoPermanentes+="<td><input type='number' class='form-control' name='rrhhNoPermanentes["+ contadorRrhhNoPermanentes +"][hono]' id='honorariosRrhhNoPermanentes_"+ contadorRrhhNoPermanentes +"' value='' onkeyup='calcularDesembolsoRrhhNoPermanentes()' maxlength='10'></input></td>";//honorarios
                nuevaFilaRrhhNoPermanentes+="<td><input type='number' class='form-control' name='rrhhNoPermanentes["+ contadorRrhhNoPermanentes +"][cant]' id='cantidadRrhhNoPermanentes_"+ contadorRrhhNoPermanentes +"' value='' onkeyup='calcularDesembolsoRrhhNoPermanentes()' maxlength='5'></input></td>";//cantidad de meses
                nuevaFilaRrhhNoPermanentes+="<td><input disabled type='number' class='form-control' name='rrhhNoPermanentes["+ contadorRrhhNoPermanentes +"][dese]' id='desembolsoRrhhNoPermanentes_"+ contadorRrhhNoPermanentes +"' value='0' maxlength='15'></input></td>";//desembolso
                // Añadimos una columna con el numero total de columnas.
                // Añadimos uno al total, ya que cuando cargamos los valores para la
                // columna, todavia no esta añadida
                nuevaFilaRrhhNoPermanentes+="</tr>";
                $("#tablaRrhhNoPermanentes").append(nuevaFilaRrhhNoPermanentes);
                //Aumentamos el contador
                contadorRrhhNoPermanentes++;
                break;

              case "agregarRrhhViaticosPersonal":
                var nuevaFilaViaticosPersonal="<tr id='row_viaticos_personal_"+ contadorViaticosPersonal +"'>";
                // añadimos las columnas
                nuevaFilaViaticosPersonal+="<td><input class='form-control' name='viaticosPersonal["+ contadorViaticosPersonal +"][desc]' maxlength='60'></input></td>";//descripcion
                nuevaFilaViaticosPersonal+="<td><input type='number' value='' class='form-control' name='viaticosPersonal["+ contadorViaticosPersonal +"][dese]' id='desembolsoViaticosPersonal_"+ contadorViaticosPersonal++ +"' onkeyup='calcularDesembolsoViaticosPersonal()' maxlength='15'></input></td>";//desembolso
                // Añadimos una columna con el numero total de columnas.
                // Añadimos uno al total, ya que cuando cargamos los valores para la
                // columna, todavia no esta añadida
                nuevaFilaViaticosPersonal+="</tr>";
                $("#tablaRrhhViaticosPersonal").append(nuevaFilaViaticosPersonal);
                break;


                //////////////////CONTRAPARTE//////////////////


              case "agregarRrhhPermanentesContraparte":
                var nuevaFilaRrhhPermanentesContraparte="<tr id='row_rrhh_permanentes_contraparte_"+ contadorRrhhPermanentesContraparte +"'>";
                // añadimos las columnas
                nuevaFilaRrhhPermanentesContraparte+="<td><input class='form-control' name='rrhhPermanentesContraparte["+ contadorRrhhPermanentesContraparte +"][rubro]' maxlength='60'></input></td>";
                nuevaFilaRrhhPermanentesContraparte+="<td><input type='number' value='' class='form-control' name='rrhhPermanentesContraparte["+ contadorRrhhPermanentesContraparte +"][dese]' id='desembolsorrhhPermanentesContraparte_"+ contadorRrhhPermanentesContraparte++ +"' onKeyUp='calcularDesembolsoContraparteRrhhPermanentes()' maxlength='15'></input></td>";
                // Añadimos una columna con el numero total de columnas.
                // Añadimos uno al total, ya que cuando cargamos los valores para la
                // columna, todavia no esta añadida
                nuevaFilaRrhhPermanentesContraparte+="</tr>";
                $("#tablaRrhhPermanentesContraparte").append(nuevaFilaRrhhPermanentesContraparte);
                break;

              case "agregarServiciosContraparte":
                var nuevaFilaServiciosContraparte="<tr id='row_servicios_contraparte_"+ contadorServiciosContraparte +"'>";
                // añadimos las columnas
                nuevaFilaServiciosContraparte+="<td><input class='form-control' name='serviciosContraparte["+ contadorServiciosContraparte +"][rubro]' maxlength='60'></input></td>";
                nuevaFilaServiciosContraparte+="<td><input type='number' value='' class='form-control' name='serviciosContraparte["+ contadorServiciosContraparte +"][dese]' id='desembolsoServiciosContraparte_"+ contadorServiciosContraparte++ +"' onKeyUp='calcularDesembolsoContraparteServicios()' maxlength='15'></input></td>";
                // Añadimos una columna con el numero total de columnas.
                // Añadimos uno al total, ya que cuando cargamos los valores para la
                // columna, todavia no esta añadida
                nuevaFilaServiciosContraparte+="</tr>";
                $("#tablaServiciosContraparte").append(nuevaFilaServiciosContraparte);
                break;

              case "agregarOtrasErogacionesContraparte":
                var nuevaFilaOtrasErogacionesContraparte="<tr id='row_otras_erogaciones_contraparte_"+ contadorOtrasErogacionesContraparte +"'>";
                // añadimos las columnas
                nuevaFilaOtrasErogacionesContraparte+="<td><input class='form-control' name='otrasErogacionesContraparte["+ contadorOtrasErogacionesContraparte +"][rubro]' maxlength='60'></input></td>";
                nuevaFilaOtrasErogacionesContraparte+="<td><input type='number' value='' class='form-control' name='otrasErogacionesContraparte["+ contadorOtrasErogacionesContraparte +"][dese]' id='desembolsoOtrasErogacionesContraparte_"+ contadorOtrasErogacionesContraparte++ +"' onKeyUp='calcularDesembolsoContraparteOtrasErogaciones()' maxlength='15'></input></td>";
                // Añadimos una columna con el numero total de columnas.
                // Añadimos uno al total, ya que cuando cargamos los valores para la
                // columna, todavia no esta añadida
                nuevaFilaOtrasErogacionesContraparte+="</tr>";
                $("#tablaOtrasErogacionesContraparte").append(nuevaFilaOtrasErogacionesContraparte);
                break;


								////////////////////PRESUPUESTOS////////////////////////////


								case "agregarPresupuestos":
									var nuevaFilaPresupuestos="<tr id='row_presupuestos_"+ contadorPresupuestos +"'>";
									// añadimos las columnas
									nuevaFilaPresupuestos+="<td><input class='form-control' name='presupuestos["+ contadorPresupuestos +"][info]' maxlength='60'></input></td>";
									nuevaFilaPresupuestos+="<td><input type='number' value='' class='form-control' name='presupuestos["+ contadorPresupuestos +"][dese]' id='desembolsoPresupuestos_"+ contadorPresupuestos++ +"' onKeyUp='calcularDesembolsoPresupuestos()' maxlength='15'></input></td>";
									// Añadimos una columna con el numero total de columnas.
									// Añadimos uno al total, ya que cuando cargamos los valores para la
									// columna, todavia no esta añadida
									nuevaFilaPresupuestos+="</tr>";
									$("#tablaPresupuestos").append(nuevaFilaPresupuestos);
									break;

						  default:

            }

        }

  function deleteRow (id) {
    switch (id) {
      case "eliminarAdecuacionTransmision":
        if(contadorAdecuacionTransmision > 0){
          $("#row_adecuacion_transmision_"+ --contadorAdecuacionTransmision).remove();
          calcularDesembolsoAdecuTransmision();
        }
        break;

      case "eliminarAdecuacionProduccion":
        if(contadorAdecuacionProduccion > 0){
          $("#row_adecuacion_produccion_"+ --contadorAdecuacionProduccion).remove();
          calcularDesembolsoAdecuProduccion();
        }
        break;

      case "eliminarAdecuacionInfraestructura":
        if(contadorAdecuacionInfra > 0){
          $("#row_adecuacion_infra_"+ --contadorAdecuacionInfra).remove();
          calcularDesembolsoAdecuInfra();
        }
        break;


        ////////////////EQUIPAMIENTO TECNOLOGICO////////////////////


      case "eliminarEquipamientoProduccion":
        if(contadorEquipamientoProduccion > 0){
          $("#row_equipamiento_produccion_"+ --contadorEquipamientoProduccion).remove();
          calcularDesembolsoEquipProduccion();
        }
        break;

      case "eliminarEquipamientoTransmision":
        if(contadorEquipamientoTransmision > 0){
          $("#row_equipamiento_transmision_"+ --contadorEquipamientoTransmision).remove();
          calcularDesembolsoEquipTransmision();
        }
        break;

      case "eliminarEquipamientoInfraestructura":
        if(contadorEquipamientoInfra > 0){
          $("#row_equipamiento_infra_"+ --contadorEquipamientoInfra).remove();
          calcularDesembolsoEquipInfra();
        }
        break;


        /////////////////////CORRIENTES/////////////////


      case "eliminarRrhhNoPermanentes":
        if(contadorRrhhNoPermanentes > 0){
          $("#row_rrhh_no_permanentes_"+ --contadorRrhhNoPermanentes).remove();
          calcularDesembolsoRrhhNoPermanentes();
        }
        break;

      case "eliminarRrhhViaticosPersonal":
        if(contadorViaticosPersonal > 0){
          $("#row_viaticos_personal_"+ --contadorViaticosPersonal).remove();
          calcularDesembolsoViaticosPersonal();
        }
        break;


      //////////////////////CONTRAPARTE//////////////


      case "eliminarRrhhPermanentesContraparte":
        if(contadorRrhhPermanentesContraparte > 0){
          $("#row_rrhh_permanentes_contraparte_"+ --contadorRrhhPermanentesContraparte).remove();
          calcularDesembolsoContraparteRrhhPermanentes();
        }
        break;

      case "eliminarServiciosContraparte":
        if(contadorServiciosContraparte > 0){
          $("#row_servicios_contraparte_"+ --contadorServiciosContraparte).remove();
          calcularDesembolsoContraparteServicios();
        }
        break;

      case "eliminarOtrasErogacionesContraparte":
        if(contadorOtrasErogacionesContraparte > 0){
          $("#row_otras_erogaciones_contraparte_"+ --contadorOtrasErogacionesContraparte).remove();
          calcularDesembolsoContraparteOtrasErogaciones();
        }
        break;


				/////////////////////PRESUPUESTOS//////////////////////


			case "eliminarPresupuestos":
        if(contadorPresupuestos > 0){
          $("#row_presupuestos_"+ --contadorPresupuestos).remove();
          calcularDesembolsoPresupuestos();
        }
        break;

      default:
    }
  }


//////////////////AYUDAS AL LADO DEL TOTAL/////////////
	$("#gastosSubsidioResumenGeneral").change( function(){
		$("#ayudaTotalesResumenGeneral").html("<small>Debe ser $" + $("#gastosSubsidioResumenGeneral").val() +"</small>");
	})

	$("#gastosCapitalResumenGeneral").change( function(){
		$("#ayudaTotalGastosCapitalSubsidio").html("<small>Debe ser $" + $("#gastosCapitalResumenGeneral").val() +"</small>");
	})
	$("#gastosCorrientesResumenGeneral").change( function(){
		$("#ayudaTotalGastosCorrientesSubsidio").html("<small>Debe ser $" + $("#gastosCorrientesResumenGeneral").val() +"</small>");
	})

	$("#totalGastosAdecuacionEdilicia").change( function(){
		$("#ayudaTotalAdecuacionEdilicia").html("<small>Debe ser $" + $("#totalGastosAdecuacionEdilicia").val() +"</small>");
	})

	$("#totalGastosEquipamientoTecnologico").change( function(){
		$("#ayudaTotalEquipamientoTecnologico").html("<small>Debe ser $" + $("#totalGastosEquipamientoTecnologico").val() +"</small>");
	})

	$("#totalGastosRrhhNoPermanentes").change( function(){
		$("#ayudaTotalesGastosCorrientesRrhhNoPermanentes").html("<small>Debe ser $" + $("#totalGastosRrhhNoPermanentes").val() +"</small>");
	})
	$("#totalGastosViaticos").change( function(){
		$("#ayudaTotalesGastosCorrientesViaticos").html("<small>Debe ser $" + $("#totalGastosViaticos").val() +"</small>");
	})
	$("#gastosCorrientesResumenGeneral").change( function(){
		$("#ayudaTotalesGastosCorrientes").html("<small>Debe ser $" + $("#gastosCorrientesResumenGeneral").val() +"</small>");
	})

	$("#gastosContraparteResumenGeneral").change( function(){
		$("#ayudaTotalesGastosContraparteResumen").html("<small>Debe ser $" + $("#gastosContraparteResumenGeneral").val() +"</small>");
	})

	$("#totalRrhhPermanentesContraparteResumen").change( function(){
		$("#ayudaTotalesGastosContraparteRrhhPermanentes").html("<small>Debe ser $" + $("#totalRrhhPermanentesContraparteResumen").val() +"</small>");
	})
	$("#serviciosContraparteResumen").change( function(){
		$("#ayudaTotalesGastosContraparteServicios").html("<small>Debe ser $" + $("#serviciosContraparteResumen").val() +"</small>");
	})
	$("#otrosContraparteResumen").change( function(){
		$("#ayudaTotalesGastosContraparteOtros").html("<small>Debe ser $" + $("#otrosContraparteResumen").val() +"</small>");
	})
	$("#gastosContraparteResumenGeneral").change( function(){
		$("#ayudaTotalesGastosContraparteDetalle").html("<small>Debe ser $" + $("#gastosContraparteResumenGeneral").val() +"</small>");
	})

//////////////////CALCULO DE LA PRIMERA PARTE/////////////
	function getContraParte(){
	  var persona = $('#tipoPersona').val();
	  if(persona == 'organizaciones'){
	    return porcentaje = 0.1;
	  }else if (persona == 'pueblosoriginarios'){
	    return porcentaje = 0.05;
	  }
	}

	function calcularResumenGeneral (){
	  var totales;
	  var capital = parseFloat($("#gastosCapitalResumenGeneral").val());
	  var corrientes = parseFloat($("#gastosCorrientesResumenGeneral").val());
	  if ($("#gastosCapitalResumenGeneral").val() == ""){
	    capital = 0;
	  }
	  if ($("#gastosCorrientesResumenGeneral").val() == "") {
	    corrientes = 0;
	  }
	    totales = capital + corrientes;
	    $("#totalesResumenGeneral").val('$' + totales.toFixed(DECIMALES));
	    $("#h_totalesResumenGeneral").val( totales.toFixed(DECIMALES));
	}

	function calcularResumenCapitalCorriente (){
	  var totalCapital;
	  var totalCorriente;
		var adecuacion = parseFloat($("#totalGastosAdecuacionEdilicia").val());
		var equipamiento = parseFloat($("#totalGastosEquipamientoTecnologico").val());
		var rrhhNoPer = parseFloat($("#totalGastosRrhhNoPermanentes").val());
		var viaticos = parseFloat($("#totalGastosViaticos").val());
		if ($("#totalGastosAdecuacionEdilicia").val() == "") {
			adecuacion = 0;
		}
		if ($("#totalGastosEquipamientoTecnologico").val() == "") {
			equipamiento = 0;
		}
		if ($("#totalGastosRrhhNoPermanentes").val() == "") {
			rrhhNoPer = 0;
		}
		if ($("#totalGastosViaticos").val() == "") {
			viaticos = 0;
		}
	  totalCapital = adecuacion + equipamiento;
		$("#totalGastosCapitalSubsidio").val('$' + totalCapital.toFixed(DECIMALES));
	  totalCorriente = rrhhNoPer + viaticos ;
	  $("#totalGastosCorrientesSubsidio").val('$' + totalCorriente.toFixed(DECIMALES));

	}

	function calcularTotalResumenContraparte (){
	  var totales;
	  var rrhhperma = parseFloat($("#totalRrhhPermanentesContraparteResumen").val());
		var servicios = parseFloat($("#serviciosContraparteResumen").val());
		var otros = parseFloat($("#otrosContraparteResumen").val());
		if ($("#totalRrhhPermanentesContraparteResumen").val() == "") {
			rrhhperma = 0;
		}
		if ($("#serviciosContraparteResumen").val() == "") {
			servicios = 0;
		}
		if ($("#otrosContraparteResumen").val() == "") {
			otros = 0;
		}
	  totales = rrhhperma + servicios + otros;
	  $("#totalContraparteResumen").val('$' + totales.toFixed(DECIMALES));
	}


  ///////////////CALCULO DE DESEMBOLSOS ////////////////////////


  function calcularDesembolsoAdecuTransmision(){
    var total = 0;
    var valorPorRow;

    for(var i = 0; i < contadorAdecuacionTransmision; i++)
    {
      valorPorRow = $("#desembolsoAdecuTransmision_" + i).val();
      if(valorPorRow != "")
        total += parseFloat($("#desembolsoAdecuTransmision_" + i).val());
    }
    $("#totalAdecuacionTransmision").val('$' + total.toFixed(DECIMALES));
		calcularDesembolsoTotalAdecuacion();

    return total;
  }

  function calcularDesembolsoAdecuProduccion(){
    var total = 0;
    var valorPorRow;

    for(var i = 0; i < contadorAdecuacionProduccion; i++)
    {
      valorPorRow = $("#desembolsoAdecuProduccion_" + i).val();
      if(valorPorRow != "")
        total += parseFloat($("#desembolsoAdecuProduccion_" + i).val());
    }
    $("#totalAdecuacionProduccion").val('$' + total.toFixed(DECIMALES));
		calcularDesembolsoTotalAdecuacion();

    return total;
  }

  function calcularDesembolsoAdecuInfra(){
    var total = 0;
    var valorPorRow;

    for(var i = 0; i < contadorAdecuacionInfra; i++)
    {
      valorPorRow = $("#desembolsoAdecuInfra_" + i).val();
      if(valorPorRow != "")
        total += parseFloat($("#desembolsoAdecuInfra_" + i).val());
    }
    $("#totalAdecuacionInfraestructura").val('$' + total.toFixed(DECIMALES));
		calcularDesembolsoTotalAdecuacion();

    return total;
  }

	function calcularDesembolsoTotalAdecuacion(){
		var total = 0;
		total = parseFloat($('#totalAdecuacionTransmision').val().substr(1)) + parseFloat($('#totalAdecuacionProduccion').val().substr(1)) + parseFloat($('#totalAdecuacionInfraestructura').val().substr(1));
		$("#totalesAdecuacionEdilicia").val('$' + total.toFixed(DECIMALES));
	}

////////////////CALCULAR DESEMBOLSO EQUIPAMIENTO TECNOLOGICO////////////////////////////////

  function calcularDesembolsoEquipProduccion(){
    var total = 0;
    var valorPorRow;
		var cantidad;
		var precio;
    for(var i = 0; i < contadorEquipamientoProduccion; i++)
    {
			cantidad = parseInt($("#cantidadEquipamientoProduccion_" + i).val());
			precio = parseFloat($("#precioEquipamientoProduccion_" + i).val());
			if($("#cantidadEquipamientoProduccion_" + i).val() == ""){
				cantidad = 0;
			}
			if($("#precioEquipamientoProduccion_" + i).val() == ""){
				precio = 0;
			}
      valorPorRow = cantidad * precio;
        $("#desembolsoEquipamientoProduccion_" + i).val(valorPorRow.toFixed(DECIMALES));
        total += parseFloat($("#desembolsoEquipamientoProduccion_" + i).val());
    }

    $("#totalEquipamientoProduccion").val('$' + total.toFixed(DECIMALES));
		calcularDesembolsoTotalEquipamiento();

		return total;
  }

  function calcularDesembolsoEquipTransmision() {
    var total = 0;
    var valorPorRow;
		var cantidad;
		var precio;

    for(var i = 0; i < contadorEquipamientoTransmision; i++)
    {
			cantidad = parseInt($("#cantidadEquipamientoTransmision_" + i).val());
			precio = parseFloat($("#precioEquipamientoTransmision_" + i).val());
			if($("#cantidadEquipamientoTransmision_" + i).val() == ""){
				cantidad = 0;
			}
			if($("#precioEquipamientoTransmision_" + i).val() == ""){
				precio = 0;
			}
      valorPorRow = cantidad * precio;
        $("#desembolsoEquipamientoTransmision_" + i).val(valorPorRow.toFixed(DECIMALES));
        total += parseFloat($("#desembolsoEquipamientoTransmision_" + i).val());
    }

    $("#totalEquipamientoTransmision").val('$' + total.toFixed(DECIMALES));
		calcularDesembolsoTotalEquipamiento();

		return total;
  }

  function calcularDesembolsoEquipInfra() {
    var total = 0;
    var valorPorRow;
		var cantidad;
		var precio;

    for(var i = 0; i < contadorEquipamientoInfra; i++)
    {
			cantidad = parseInt($("#cantidadEquipamientoInfra_" + i).val());
			precio = parseFloat($("#precioEquipamientoInfra_" + i).val());
			if($("#cantidadEquipamientoInfra_" + i).val() == ""){
				cantidad = 0;
			}
			if($("#precioEquipamientoInfra_" + i).val() == ""){
				precio = 0;
			}
			valorPorRow = cantidad * precio;
        $("#desembolsoEquipamientoInfra_" + i).val(valorPorRow.toFixed(DECIMALES));
        total += parseFloat($("#desembolsoEquipamientoInfra_" + i).val());
    }
    $("#totalEquipamientoInfra").val('$' + total.toFixed(DECIMALES));
		calcularDesembolsoTotalEquipamiento();

		return total;
  }

	function calcularDesembolsoTotalEquipamiento(){
		var total = 0;
		total = parseFloat($('#totalEquipamientoProduccion').val().substr(1)) + parseFloat($('#totalEquipamientoTransmision').val().substr(1)) + parseFloat($('#totalEquipamientoInfra').val().substr(1));
		$("#totalesEquipamientoTecnologico").val('$' + total.toFixed(DECIMALES));
	}

  ///////////////////////////////////////////////CALCULAR DESEMBOLSO GASTOS CORRIENTE //////////////////////////////////////////////


  function calcularDesembolsoRrhhNoPermanentes() {
    var total = 0;
    var valorPorRow;
		var honorarios;
		var cantidad;

    for(var i = 0; i < contadorRrhhNoPermanentes; i++)
    {
			honorarios = parseInt($("#honorariosRrhhNoPermanentes_" + i).val());
			cantidad = parseFloat($("#cantidadRrhhNoPermanentes_" + i).val());
			if($("#honorariosRrhhNoPermanentes_" + i).val() == ""){
				honorarios = 0;
			}
			if($("#cantidadRrhhNoPermanentes_" + i).val() == ""){
				cantidad = 0;
			}
      valorPorRow = honorarios * cantidad;
        $("#desembolsoRrhhNoPermanentes_" + i).val(valorPorRow.toFixed(DECIMALES));
        total += parseFloat($("#desembolsoRrhhNoPermanentes_" + i).val());
    }

    $("#totalRrhhNoPermanentes").val('$' + total.toFixed(2));
		calcularDesembolsoTotalGastosCorrientes();

		return total;
  }

  function calcularDesembolsoViaticosPersonal(){
    var total = 0;
    var valorPorRow;

    for(var i = 0; i < contadorViaticosPersonal; i++)
    {
      valorPorRow = $("#desembolsoViaticosPersonal_" + i).val();
			if(valorPorRow != ""){
				total += parseFloat($("#desembolsoViaticosPersonal_" + i).val());
			}
    }
    $("#totalViaticosPersonal").val('$' + total.toFixed(2));
		calcularDesembolsoTotalGastosCorrientes();

		return total;
  }

	function calcularDesembolsoTotalGastosCorrientes(){
		var total = 0;
		total = parseFloat($('#totalRrhhNoPermanentes').val().substr(1)) + parseFloat($('#totalViaticosPersonal').val().substr(1));
		$("#totalesGastosCorrientes").val('$' + total.toFixed(DECIMALES));
	}


  ///////////////////////////////////////CALCULAR DESEMBOLSO CONTRAPARTE DETALLE /////////////////////////////////////////////


  function calcularDesembolsoContraparteRrhhPermanentes(){
    var total = 0;
    var valorPorRow;

    for(var i = 0; i < contadorRrhhPermanentesContraparte; i++)
    {
      valorPorRow = $("#desembolsorrhhPermanentesContraparte_" + i).val();
      if(valorPorRow != "")
        total += parseFloat($("#desembolsorrhhPermanentesContraparte_" + i).val());
    }
    $("#totalRrhhPermanentesContraparteDetalle").val('$' + total.toFixed(DECIMALES));
		calcularTotalGastosContraparte();
  }

  function calcularDesembolsoContraparteServicios(){
    var total = 0;
    var valorPorRow;

    for(var i = 0; i < contadorServiciosContraparte; i++)
    {
      valorPorRow = $("#desembolsoServiciosContraparte_" + i).val();
      if(valorPorRow != "")
        total += parseFloat($("#desembolsoServiciosContraparte_" + i).val());
    }
    $("#totalServicioContraparteDetalle").val('$' + total.toFixed(DECIMALES));
		calcularTotalGastosContraparte();
  }

  function calcularDesembolsoContraparteOtrasErogaciones(){
    var total = 0;
    var valorPorRow;

    for(var i = 0; i < contadorOtrasErogacionesContraparte; i++)
    {
      valorPorRow = $("#desembolsoOtrasErogacionesContraparte_" + i).val();
      if(valorPorRow != "")
        total += parseFloat($("#desembolsoOtrasErogacionesContraparte_" + i).val());
    }
    $("#totalOtrasErogacionesContraparteDetalle").val('$' + total.toFixed(2));
		calcularTotalGastosContraparte();
  }

	function calcularTotalGastosContraparte(){
		var total = 0;
		total = parseFloat($('#totalRrhhPermanentesContraparteDetalle').val().substr(1)) + parseFloat($('#totalServicioContraparteDetalle').val().substr(1)) + parseFloat($('#totalOtrasErogacionesContraparteDetalle').val().substr(1));
		$("#totalFinalContraparte").val('$' + total.toFixed(DECIMALES));
	}

	////////////////////////////CALCULAR DESEMBOLSO PRESUPUESTOS////////////////////////////////////



	function calcularDesembolsoPresupuestos(){
		var total = 0;
		var valorPorRow;

		for(var i = 0; i < contadorPresupuestos; i++)
		{
			valorPorRow = $("#desembolsoPresupuestos_" + i).val();
			if(valorPorRow != "")
				total += parseFloat($("#desembolsoPresupuestos_" + i).val());
		}
		$("#totalRespaldadoPresupuestos").val(total.toFixed(DECIMALES));
	}
