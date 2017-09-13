<body>
  <div class="container">
    <form name="formulario" id="formulario" class="form-horizontal" action="<?= base_url("index.php/lineaUno/pdf") ?>" novalidate method="post">
        <h2>Datos</h2>
          <fieldset>
            <legend>Datos personales</legend>
            <div class="form-group margen-izquierdo">
                <label class="control-label col-sm-3"><big>Razón social/Comunidad</big><span class="asteriskField"> * :</span></label>
                <div class="col-sm-9">
                  <input class="form-control form-control-porcentaje" id="razonSocial" name="razonSocial" type="text" maxlength="80">
                </div>
            </div>
            <div class="form-group margen-izquierdo">
              <label class="control-label col-sm-3" ><big>Nombre de fantasía</big><span class="asteriskField"> * :</span></label>
              <div class="col-sm-9">
                <input class="form-control form-control-porcentaje" id="nombreFantasia" name="nombreFantasia" type="text" maxlength="80">
              </div>
            </div>
            <div class="form-group margen-izquierdo">
              <label class="control-label col-sm-3"><big>Cuit</big><span class="asteriskField"> * :</span></label>
              <div class="col-sm-9">
                <input class="form-control form-control-porcentaje" id="cuit" name="cuit" type="text" maxlength="11">
              </div>
            </div>
            <div class="form-group margen-izquierdo">
              <label class="control-label col-sm-3"><big>Tipo de persona</big><span class="asteriskField"> * :</span></label>
              <div class="col-sm-9">
                <select class="form-control form-control-porcentaje" id="tipoPersona" name="tipoPersona" type="text"/>
                <option id="organizaciones" value="organizaciones">Organización sin fines de lucro</option>
                <option id="pueblosoriginarios" value="pueblosoriginarios">Pueblo originario</option>
                </select>
              </div>
            </div>
          </fieldset>
          <h2>Resumen General</h2>
            <fieldset>
              <legend>Destino de los fondos</legend>
              <h3 class="text-left">A) RESUMEN DEL DESTINO DE LOS FONDOS (PLAN DE INVERSIÓN)</h3>
              <h4 class="text-left">Indicar los totales correspondientes a los gastos del proyecto y a los gastos del subsidio utilizando los siguientes cuadros:</h4>
              <br>
              <h3 class="text-left"><strong>Gastos del proyecto</strong></h3>
              <h4><strong>RECORDATORIO:</strong>El subsidio cubrirá un monto fijo de hasta NOVENTA POR CIENTO (90%) de la totalidad del proyecto para personas jurídicas sin fines de lucro y del NOVENTA Y CINCO POR CIENTO (95%) para pueblos originarios.</h4>
                <div class="form-group">
                    <label class="control-label col-sm-3 col-sm-offset-1 text-center"><h4><strong>Rubro</strong></h4></label>
                    <div class="col-sm-8">
                      <label class="control-label desembolso-style"><h4><strong>Desembolso (en pesos)</strong></h4></label>
                    </div>
                </div>
                <hr>
                <div class="form-group margen-izquierdo">
                    <label class="control-label col-sm-3 col-sm-offset-1 text-left"><strong>Total gastos subsidio</strong><span class="asteriskField"> * :</span></label>
                    <div class="col-sm-2 col-sm-offset-2">
                      <input class="form-control" id="gastosSubsidioResumenGeneral" name="gastosSubsidioResumenGeneral" type="number">
                    </div>
                    <label class="col-sm-4"><small>Tope según línea</small></label>
                </div>
                <div class="form-group margen-izquierdo">
                    <label class="control-label col-sm-3 col-sm-offset-1 text-left"><strong>Total gastos contraparte</strong><span class="asteriskField"> * :</span></label>
                    <div class="col-sm-2 col-sm-offset-2">
                      <input class="form-control" id="gastosContraparteResumenGeneral" name="gastosContraparteResumenGeneral" type="number">
                    </div>
                    <label class="col-sm-4"><small>(mínimo 5 o 10% pero sin máximo)</small></label>
                </div>
                <div class="form-group margen-izquierdo">
                    <label class="control-label col-sm-3 col-sm-offset-1 text-left"><strong>Total gastos del proyecto</strong><span class="asteriskField"> * :</span></label>
                    <div class="col-sm-2 col-sm-offset-2">
                      <input class="form-control" id="proyectoResumen" name="proyectoResumen" type="number">
                    </div>
                    <label class="col-sm-4"><small>Sin tope</small></label>
                </div>
                <br><br><hr><br><br>
                <h3 class="text-left"><strong>Gastos del subsidio</strong></h3>
                <h4><strong>RECORDATORIO:</strong>Los gastos de capital deberán totalizar el 80% del monto del subsidio y los gastos corrientes deberán totalizar el 20% del subsidio. Se prevé una tolerancia de +/- 2% para esta distribución de gastos.</h4>
                <div class="form-group">
                    <label class="control-label col-sm-3 col-sm-offset-1 text-center"><h4><strong>Rubro</strong></h4></label>
                    <div class="col-sm-8">
                      <label class="control-label desembolso-style"><h4><strong>Desembolso (en pesos)</strong></h4></label>
                    </div>
                </div>
                <hr>
                <div class="form-group margen-izquierdo">
                    <label class="control-label col-sm-3 col-sm-offset-1 text-left">Total gastos de capital<span class="asteriskField"> * :</span></label>
                    <div class="col-sm-2 col-sm-offset-2">
                      <input class="form-control" id="gastosCapitalResumenGeneral" name="gastosCapitalResumenGeneral" type="number" value="0" onkeyup="calcularResumenGeneral()">
                    </div>
                    <label class="col-sm-4"><small>Tolerancia &plusmn; 2%</small></label>
                </div>
                <div class="form-group margen-izquierdo">
                    <label class="control-label col-sm-3 col-sm-offset-1 text-left">Total gastos corrientes<span class="asteriskField"> * :</span></label>
                    <div class="col-sm-2 col-sm-offset-2">
                      <input class="form-control" id="gastosCorrientesResumenGeneral" name="gastosCorrientesResumenGeneral" type="number" value="0" onkeyup="calcularResumenGeneral()">
                    </div>
                    <label class="col-sm-4"><small>Tolerancia &plusmn; 2%</small></label>
                </div>
                <div class="form-group margen-izquierdo">
                    <label class="control-label col-sm-3 col-sm-offset-1 text-left"><strong>Total gastos del subsidio</strong><span class="asteriskField">*:</span></label>
                    <div class="col-sm-2 col-sm-offset-2">
                      <input disabled class="form-control" id="totalesResumenGeneral" value="$0" />
                    </div>
                    <input id="h_totalesResumenGeneral" type="hidden" name="totalesResumenGeneral" value="0" />
                    <label class="col-sm-4" id="ayudaTotalesResumenGeneral"></label>
                </div>
            </fieldset>

          <h2>Resumen subsidio</h2>
            <fieldset>
              <legend>Detalle de los fondos</legend>
              <h3 class="text-left">B) DESTINO DE LOS FONDOS DEL SUBSIDIO</h3>
              <h3 class="text-left">B)1. RESUMEN DEL DESTINO DE LOS FONDOS DEL SUBSIDIO</h3>
              <h4>Indicar los totales correspondientes a los gastos a solventar con los fondos del subsidio utilizando el siguiente cuadro:</h4>
              <div class="form-group">
                  <label class="control-label col-sm-6 col-sm-offset-1 text-center"><h3><strong>Gastos de capital</strong></h3></label>
              </div>
              <div class="form-group">
                  <label class="control-label col-sm-3 col-sm-offset-1 text-center"><h4><strong>Rubro</strong></h4></label>
                  <div class="col-sm-8">
                    <label class="control-label desembolso-style"><h4><strong>Desembolso (en pesos)</strong></h4></label>
                  </div>
              </div>
              <hr>
              <div class="form-group margen-izquierdo">
                  <label class="control-label col-sm-3 col-sm-offset-1 text-left">Adecuación edilicia<span class="asteriskField">*:</span></label>
                  <div class="col-sm-2 col-sm-offset-2">
                    <input class="form-control" id="totalGastosAdecuacionEdilicia" name="totalGastosAdecuacionEdilicia" type="number" value="0" onkeyup="calcularResumenCapitalCorriente()">
                  </div>
                  <label class="col-sm-4"><small></small></label>
              </div>
              <div class="form-group margen-izquierdo" >
                  <label class="control-label col-sm-3 col-sm-offset-1 text-left">Equipamiento tecnológico<span class="asteriskField">*:</span></label>
                  <div class="col-sm-2 col-sm-offset-2">
                    <input class="form-control" id="totalGastosEquipamientoTecnologico" name="totalGastosEquipamientoTecnologico" type="number" value="0" onkeyup="calcularResumenCapitalCorriente()">
                  </div>
                  <label class="col-sm-4"><small></small></label>
              </div>
              <div class="form-group margen-izquierdo">
                  <label class="control-label col-sm-3 col-sm-offset-1 text-left"><strong>Total gastos de capital subsidio</strong><span class="asteriskField">*:</span></label>
                  <div class="col-sm-2 col-sm-offset-2">
                    <input disabled class="form-control" id="totalGastosCapitalSubsidio" name="totalGastosCapitalSubsidio" value="$0"/>
                  </div>
                  <label class="col-sm-4" id="ayudaTotalGastosCapitalSubsidio"></label>
              </div>
              <div class="form-group">
                  <label class="control-label col-sm-6 col-sm-offset-1 text-center"><h3><strong>Gastos corrientes</strong></h3></label>
              </div>
              <div class="form-group margen-izquierdo">
                  <label class="control-label col-sm-3 col-sm-offset-1 text-center"><h4><strong>Rubro</strong></h4></label>
                  <div class="col-sm-8">
                    <label class="control-label desembolso-style"><h4><strong>Desembolso (en pesos)</strong></h4></label>
                  </div>
              </div>
              <hr color="black">
              <div class="form-group margen-izquierdo">
                  <label class="control-label col-sm-3 col-sm-offset-1 text-left">Recursos humanos no permanentes<span class="asteriskField">*:</span></label>
                  <div class="col-sm-2 col-sm-offset-2">
                    <input class="form-control" id="totalGastosRrhhNoPermanentes" name="totalGastosRrhhNoPermanentes" type="number" value="0" onkeyup="calcularResumenCapitalCorriente()">
                  </div>
                  <label class="col-sm-4"><small></small></label>
              </div>
              <div class="form-group margen-izquierdo">
                  <label class="control-label col-sm-3 col-sm-offset-1 text-left">Viáticos del Personal y Traslado de Equipamiento y/o Materiales<span class="asteriskField">*:</span></label>
                  <div class="col-sm-2 col-sm-offset-2">
                    <input class="form-control" id="totalGastosViaticos" name="totalGastosViaticos" type="number" value="0" onkeyup="calcularResumenCapitalCorriente()">
                  </div>
                  <label class="col-sm-4"><small></small></label>
              </div>
              <div class="form-group margen-izquierdo">
                  <label class="control-label col-sm-3 col-sm-offset-1 text-left"><strong>Total gastos corrientes subsidio</strong><span class="asteriskField">*:</span></label>
                  <div class="col-sm-2 col-sm-offset-2">
                    <input disabled class="form-control" id="totalGastosCorrientesSubsidio" name="totalGastosCorrientesSubsidio" value="$0"/>
                  </div>
                  <label class="col-sm-4" id="ayudaTotalGastosCorrientesSubsidio"></label>
              </div>
            </fieldset>

          <h2>Gastos de capital - Adecuación edilicia</h2>
            <fieldset>
              <legend>Adecuación edilicia</legend>
              <h3><strong>B) 2. DETALLE DEL DESTINO DE LOS FONDOS DEL SUBSIDIO</strong></h3>
              <h4>Indicar el destino que se dará a los fondos del subsidio diferenciando entre Gastos de Capital (Equipamiento tecnológico y Adecuación edilicia) y Gastos Corrientes (Recursos Humanos No Permanentes, Viáticos del Personal y Traslado de Equipamiento y/o Materiales).</h4>
              <h4>A tales efectos, utilizar los cuadros que se exponen a continuación.
              <h3><strong>B) 2. 1. Gastos de Capital (Equipamiento tecnológico y Adecuación edilicia)</strong></h3>
              <h4 class="text-left"><strong>B) 2.1.1. Adecuación edilicia:</strong> describir los planes de obra: el tipo de obra a realizar, sus tiempos de ejecución y los gastos estimados del desembolso (dentro del gasto estimado de desembolso debe tenerse en cuenta tanto los materiales de construcción como los honorarios correspondientes a la mano de obra necesaria). Distinguir entre Adecuación edilicia para transmisión, para producción y para infraestructura general de la emisora.</h4>
              <br>
              <h3 class="text-center"><strong>ADECUACIÓN EDILICIA</strong></h3>
              <br>
              <br>
              <div class="text-left">
                <h4><strong>ADECUACIÓN EDILICIA PARA TRANSMISIÓN</strong></h4>
              </div>
              <div class="panel panel-default">
                  <table class="table table-striped" id="tablaAdecuacionTransmision">
                    <thead>
                      <tr>
                        <th class="col-sm-9 text-center">Descripción de plan de obra</th>
                        <th class="col-sm-1 text-center">Tiempo (días)</th>
                        <th class="col-sm-2 text-center">Desembolso (en pesos)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr id="row_adecuacion_transmision_0">
                        <td><input class="form-control" name="adecuacionTransmision[0][desc]" maxlength="58"></td>
                        <td><input class="form-control" name="adecuacionTransmision[0][tiem]" maxlength="6"></td>
                        <td><input class="form-control" type="number" name="adecuacionTransmision[0][dese]" id="desembolsoAdecuTransmision_0" onkeyup="calcularDesembolsoAdecuTransmision()" maxlength="15"></td>
                      </tr>
                    </tbody>
                  </table>
              </div>
                <div class="btn-group" style="margin-top: -20px">
                  <input class="btn btn-success" style="padding: 6px 11px" type="button" id="agregarAdecuacionTransmision" value="Agregar fila" onClick="addRow(id)"/>
                  <input class="btn btn-warning" style="padding: 6px 11px" type="button" id="eliminarAdecuacionTransmision" value="Eliminar fila" onClick="deleteRow(id)"/>
                </div>
                <br>
                <br>
                <div class="form-group text-left">
                  <div class="text-left">
                    <label class="control-label col-sm-2"><big>Subtotal:</big></label>
                  </div>
                  <div class="col-sm-2">
                    <input class="form-control" disabled type="text" id="totalAdecuacionTransmision" name="totalAdecuacionTransmision" value="$0">
                  </div>
                </div>
                <br>
                <br>
                <div class="text-left">
                  <h4><strong>ADECUACIÓN EDILICIA PARA PRODUCCIÓN</strong></h4>
                </div>
                <div class="panel panel-default">
                    <table class="table table-striped" id="tablaAdecuacionProduccion">
                      <thead>
                        <tr>
                          <th class="col-sm-9 text-center">Descripción de plan de obra</th>
                          <th class="col-sm-1 text-center">Tiempo (días)</th>
                          <th class="col-sm-2 text-center">Desembolso (en pesos)</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr id="row_adecuacion_produccion_0">
                          <td><input class="form-control" name="adecuacionProduccion[0][desc]" maxlength="60"></td>
                          <td><input class="form-control" name="adecuacionProduccion[0][tiem]" maxlength="6"></td>
                          <td><input class="form-control" type="number" name="adecuacionProduccion[0][dese]" id="desembolsoAdecuProduccion_0" onkeyup="calcularDesembolsoAdecuProduccion()" maxlength="15"></td>
                        </tr>
                      </tbody>
                    </table>
                </div>
                  <div class="btn-group" style="margin-top: -20px">
                    <input class="btn btn-success" style="padding: 6px 11px" type="button" id="agregarAdecuacionProduccion" value="Agregar fila" onClick="addRow(id)"/>
                    <input class="btn btn-warning" style="padding: 6px 11px" type="button" id="eliminarAdecuacionProduccion" value="Eliminar fila" onClick="deleteRow(id)"/>
                  </div>
                  <br>
                  <br>
                  <div class="form-group text-left">
                    <div class="text-left">
                      <label class="control-label col-sm-2"><big>Subtotal:</big></label>
                    </div>
                    <div class="col-sm-2">
                      <input class="form-control" disabled type="text" id="totalAdecuacionProduccion" name="totalAdecuacionProduccion" value="$0">
                    </div>
                  </div>
                <br>
                <br>
                <div class="text-left">
                  <h4><strong>ADECUACIÓN EDILICIA PARA INFRAESTRUCTURA GENERAL</strong></h4>
                </div>
                <div class="panel panel-default">
                    <table class="table table-striped" id="tablaAdecuacionInfraestructura">
                      <thead>
                        <tr>
                          <th class="col-sm-9 text-center">Descripción de plan de obra</th>
                          <th class="col-sm-1 text-center">Tiempo (días)</th>
                          <th class="col-sm-2 text-center">Desembolso (en pesos)</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr id="row_adecuacion_infra_0">
                          <td><input class="form-control" name="adecuacionInfra[0][desc]" maxlength="60"></td>
                          <td><input class="form-control" name="adecuacionInfra[0][tiem]" maxlength="6"></td>
                          <td><input class="form-control" type="number" name="adecuacionInfra[0][dese]" id="desembolsoAdecuInfra_0" onkeyup="calcularDesembolsoAdecuInfra()" maxlength="15"></td>
                        </tr>
                      </tbody>
                    </table>
                </div>
                <div class="btn-group" style="margin-top: -20px">
                  <input class="btn btn-success" style="padding: 6px 11px" type="button" id="agregarAdecuacionInfraestructura" value="Agregar fila" onClick="addRow(id)"/>
                  <input class="btn btn-warning" style="padding: 6px 11px" type="button" id="eliminarAdecuacionInfraestructura" value="Eliminar fila" onClick="deleteRow(id)"/>
                </div>
                <br>
                <br>
                <div class="form-group text-left">
                  <div class="text-left">
                    <label class="control-label col-sm-2"><big>Subtotal:</big></label>
                  </div>
                  <div class="col-sm-2">
                    <input class="form-control" disabled type="text" id="totalAdecuacionInfraestructura" name="totalAdecuacionInfraestructura" value="$0">
                  </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-4"><strong><big>Total gastos adecuación edilicia:</big></strong></label>
                    <div class="col-sm-2">
                      <input disabled class="form-control" type="text" id="totalesAdecuacionEdilicia" value="$0" />
                    </div>
                    <label class="col-sm-4" id="ayudaTotalAdecuacionEdilicia"></label>
                </div>
            </fieldset>

          <h2>Gastos de capital - Equipamiento tecnológico</h2>
            <fieldset>
              <legend>Equipamiento tecnológico</legend>
              <h4><strong>B) 2.1.2.</strong> Equipamiento tecnológico: Describir el tipo de equipamiento a adquirir, la cantidad, la finalidad y sus importes. Distinguir <strong>entre equipamiento para producción, equipamiento para transmisión y equipamiento para infraestructura general.</strong> RECORDATORIO: En caso de tratarse de equipamiento homologado, deberán presentarse las constancias respectivas en la rendición que corresponda. </h4>
              <br>
              <h3 class="text-center"><strong>EQUIPAMIENTO TECNOLÓGICO</strong></h3>
              <br>
              <br>
              <div class="text-left">
                <h4><strong>EQUIPAMIENTO TECNOLÓGICO PARA PRODUCCIÓN</strong></h4>
              </div>
              <div class="panel panel-default">
                  <table class="table table-striped" id="tablaEquipamientoProduccion">
                    <thead>
                      <tr>
                        <th class="col-sm-4 text-center">Descripción de equipamiento</th>
                        <th class="col-sm-1 text-center">Cantidad</th>
                        <th class="col-sm-3 text-center">Finalidad</th>
                        <th class="col-sm-2 text-center">Precio unitario</th>
                        <th class="col-sm-2 text-center">Desembolso (en pesos)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr id="row_equipamiento_produccion_0">
                        <td><input class="form-control" name="equipamientoProduccion[0][desc]" maxlength="27"></td>
                        <td><input class="form-control" type="number" name="equipamientoProduccion[0][cant]" id="cantidadEquipamientoProduccion_0" value="0" onkeyup="calcularDesembolsoEquipProduccion()" maxlength="6"></td>
                        <td><input class="form-control" name="equipamientoProduccion[0][fina]" maxlength="22"></td>
                        <td><input class="form-control" type="number" name="equipamientoProduccion[0][prec]" id="precioEquipamientoProduccion_0" value="0" onkeyup="calcularDesembolsoEquipProduccion()" maxlength="10"></td>
                        <td><input disabled class="form-control" type="number" name="equipamientoProduccion[0][dese]" id="desembolsoEquipamientoProduccion_0" value="0" maxlength='15'></td>
                      </tr>
                    </tbody>
                  </table>
              </div>
              <div class="btn-group" style="margin-top: -20px">
                <input class="btn btn-success" style="padding: 6px 11px" type="button" id="agregarEquipamientoProduccion" value="Agregar fila" onClick="addRow(id)"/>
                <input class="btn btn-warning" style="padding: 6px 11px" type="button" id="eliminarEquipamientoProduccion" value="Eliminar fila" onClick="deleteRow(id)"/>
              </div>
              <br>
              <br>
              <div class="form-group text-left">
                <div class="text-left">
                  <label class="control-label col-sm-2"><big>Subtotal:</big></label>
                </div>
                <div class="col-sm-2">
                  <input class="form-control" disabled type="text" id="totalEquipamientoProduccion" name="totalEquipamientoProduccion" value="$0">
                </div>
              </div>
              <br>
              <br>
              <div class="text-left">
                <h4><strong>EQUIPAMIENTO TECNOLÓGICO PARA LA TRANSMISIÓN</strong></h4>
              </div>
              <div class="panel panel-default">
                  <table class="table table-striped" id="tablaEquipamientoTransmision">
                    <thead>
                      <tr>
                        <th class="col-sm-4 text-center">Descripción de equipamiento</th>
                        <th class="col-sm-1 text-center">Cantidad</th>
                        <th class="col-sm-3 text-center">Finalidad</th>
                        <th class="col-sm-2 text-center">Precio unitario</th>
                        <th class="col-sm-2 text-center">Desembolso (en pesos)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr id="row_equipamiento_transmision_0">
                        <td><input class="form-control" name="equipamientoTransmision[0][desc]" value="" maxlength="27"></td>
                        <td><input class="form-control" type="number" name="equipamientoTransmision[0][cant]" id="cantidadEquipamientoTransmision_0" value="0" onkeyup="calcularDesembolsoEquipTransmision()" maxlength="6"></td>
                        <td><input class="form-control" name="equipamientoTransmision[0][fina]" value="" maxlength="22"></td>
                        <td><input class="form-control" type="number" name="equipamientoTransmision[0][prec]" id="precioEquipamientoTransmision_0" value="0" onkeyup="calcularDesembolsoEquipTransmision()" maxlength="10"></td>
                        <td><input disabled class="form-control" type="number" name="equipamientoTransmision[0][dese]" id="desembolsoEquipamientoTransmision_0" value="0" maxlength='15'></td>
                      </tr>
                    </tbody>
                  </table>
              </div>
              <div class="btn-group" style="margin-top: -20px">
                <input class="btn btn-success" style="padding: 6px 11px" type="button" id="agregarEquipamientoTransmision" value="Agregar fila" onClick="addRow(id)"/>
                <input class="btn btn-warning" style="padding: 6px 11px" type="button" id="eliminarEquipamientoTransmision" value="Eliminar fila" onClick="deleteRow(id)"/>
              </div>
              <br>
              <br>
              <div class="form-group text-left">
                <div class="text-left">
                  <label class="control-label col-sm-2"><big>Subtotal:</big></label>
                </div>
                <div class="col-sm-2">
                  <input class="form-control" disabled type="text" id="totalEquipamientoTransmision" name="totalEquipamientoTransmision" value="$0">
                </div>
              </div>
              <br>
              <br>
              <div class="text-left">
                <h4><strong>EQUIPAMIENTO TECNOLÓGICO PARA INFRAESTRUCTURA GENERAL</strong></h4>
              </div>
              <div class="panel panel-default">
                  <table class="table table-striped" id="tablaEquipamientoInfraestructura">
                    <thead>
                      <tr>
                        <th class="col-sm-4 text-center">Descripción de equipamiento</th>
                        <th class="col-sm-1 text-center">Cantidad</th>
                        <th class="col-sm-3 text-center">Finalidad</th>
                        <th class="col-sm-2 text-center">Precio unitario</th>
                        <th class="col-sm-2 text-center">Desembolso (en pesos)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr id="row_equipamiento_infra_0">
                        <td><input class="form-control" name="equipamientoInfra[0][desc]" value="" maxlength="27"></td>
                        <td><input class="form-control" type="number" name="equipamientoInfra[0][cant]" id="cantidadEquipamientoInfra_0" value="0" onkeyup="calcularDesembolsoEquipInfra()" maxlength="6"></td>
                        <td><input class="form-control" name="equipamientoInfra[0][fina]" value=""maxlength="22"></td>
                        <td><input class="form-control" type="number" name="equipamientoInfra[0][prec]" id="precioEquipamientoInfra_0" value="0" onkeyup="calcularDesembolsoEquipInfra()" maxlength="10"></td>
                        <td><input disabled class="form-control" type="number" name="equipamientoInfra[0][dese]" id="desembolsoEquipamientoInfra_0" value="0" maxlength='15'></td>
                      </tr>
                    </tbody>
                  </table>
              </div>
              <div class="btn-group" style="margin-top: -20px">
                <input class="btn btn-success" style="padding: 6px 11px" type="button" id="agregarEquipamientoInfraestructura" value="Agregar fila" onClick="addRow(id)"/>
                <input class="btn btn-warning" style="padding: 6px 11px" type="button" id="eliminarEquipamientoInfraestructura" value="Eliminar fila" onClick="deleteRow(id)"/>
              </div>
              <br>
              <br>
              <div class="form-group text-left">
                <div class="text-left">
                  <label class="control-label col-sm-2"><big>Subtotal:</big></label>
                </div>
                <div class="col-sm-2">
                  <input class="form-control" disabled type="text" id="totalEquipamientoInfra" name="totalEquipamientoInfra" value="$0">
                </div>
              </div>
              <div class="form-group">
                  <label class="control-label col-sm-4"><strong><big>Total gastos equipamiento tecnológico:</big></strong></label>
                  <div class="col-sm-2">
                    <input disabled class="form-control" type="text" id="totalesEquipamientoTecnologico" value="$0" />
                  </div>
                  <label class="col-sm-4" id="ayudaTotalEquipamientoTecnologico"></label>
              </div>
            </fieldset>

          <h2>Gastos corrientes - Recursos humanos no permanentes</h2>
            <fieldset>
              <legend>Gastos corrientes</legend>
              <h3><strong>B) 2.2 Gastos Corrientes</strong></h3>
              <h3><strong>B) 2.2.1. Recursos Humanos No Permanentes</strong></h3>
              <h4>Están comprendidas en este rubro, entre otras, las erogaciones correspondientes al pago de honorarios profesionales, certificación técnica, consultoría.</h4>
              <div class="panel panel-default">
                <table class="table table-striped" id="tablaRrhhNoPermanentes">
                  <thead>
                    <tr>
                      <th class="col-sm-7 text-center">Función</th>
                      <th class="col-sm-2 text-center">Honorarios (en pesos)</th>
                      <th class="col-sm-1 text-center">Cantidad de meses</th>
                      <th class="col-sm-2 text-center">Desembolso (en pesos)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr id="row_rrhh_no_permanentes_0">
                      <td><input class="form-control" type="text" name="rrhhNoPermanentes[0][func]" value="" maxlength="34"></td>
                      <td><input class="form-control" type="number" name="rrhhNoPermanentes[0][hono]" id="honorariosRrhhNoPermanentes_0" value="" onkeyup="calcularDesembolsoRrhhNoPermanentes()" maxlength="10"></td>
                      <td><input class="form-control" type="number" name="rrhhNoPermanentes[0][cant]" id="cantidadRrhhNoPermanentes_0" value="" onkeyup="calcularDesembolsoRrhhNoPermanentes()" maxlength="5"></td>
                      <td><input disabled class="form-control" type="number" name="rrhhNoPermanentes[0][dese]" id="desembolsoRrhhNoPermanentes_0" value="0" maxlength='15'></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="btn-group" style="margin-top: -20px">
                <input class="btn btn-success" style="padding: 6px 11px" type="button" id="agregarRrhhNoPermanentes"  value="Agregar fila" onClick="addRow(id)"/>
                <input class="btn btn-warning" style="padding: 6px 11px" type="button" id="eliminarRrhhNoPermanentes"  value="Eliminar fila" onClick="deleteRow(id)"/>
              </div>
              <br>
              <br>
              <div class="form-group text-left">
                <div class="text-left">
                  <label class="control-label col-sm-2"><big>Subtotal:</big></label>
                </div>
                <div class="col-sm-2">
                  <input class="form-control" disabled type="text" id="totalRrhhNoPermanentes" name="totalRrhhNoPermanentes" value="$0">
                </div>
                <label class="col-sm-4" id="ayudaTotalesGastosCorrientesRrhhNoPermanentes"></label>
              </div>
              <br>
              <br>
              <h3><strong>B) 2.2.2 Viáticos del Personal y Traslado de Equipamiento y/o Materiales</strong></h3>
              <h4>Están comprendidas en este rubro las erogaciones correspondientes al traslado del equipamiento adquirido y del Coordinador General y/o del personal afectado a la instalación del equipamiento y/o a la adecuación edilicia.</h4>
              <div class="panel panel-default">
                  <table class="table table-striped" id="tablaRrhhViaticosPersonal">
                    <thead>
                      <tr>
                        <th class="col-sm-10 text-center">Descripción de plan de obra</th>
                        <th class="col-sm-2 text-center">Desembolso (en pesos)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr id="row_viaticos_personal_0">
                        <td><input class="form-control" type="text" name="viaticosPersonal[0][desc]" maxlength="60"></td>
                        <td><input class="form-control" type="number" name="viaticosPersonal[0][dese]" id="desembolsoViaticosPersonal_0" value="" onkeyup="calcularDesembolsoViaticosPersonal()" maxlength="15"></td>
                      </tr>
                    </tbody>
                  </table>
              </div>
              <div class="btn-group" style="margin-top: -20px">
                <input class="btn btn-success" style="padding: 6px 11px" type="button" id="agregarRrhhViaticosPersonal" value="Agregar fila" onClick="addRow(id)"/>
                <input class="btn btn-warning" style="padding: 6px 11px" type="button" id="eliminarRrhhViaticosPersonal" value="Eliminar fila" onClick="deleteRow(id)"/>
              </div>
              <br>
              <br>
              <div class="form-group text-left">
                <div class="text-left">
                  <label class="control-label col-sm-2"><big>Subtotal:</big></label>
                </div>
                <div class="col-sm-2">
                  <input class="form-control" disabled type="text" id="totalViaticosPersonal" name="totalViaticosPersonal" value="$0">
                </div>
                <label class="col-sm-4" id="ayudaTotalesGastosCorrientesViaticos"></label>
              </div>
              <div class="form-group">
                  <label class="control-label col-sm-4"><strong><big>Total gastos corrientes:</big></strong></label>
                  <div class="col-sm-2">
                    <input disabled class="form-control" type="text" id="totalesGastosCorrientes" value="$0" />
                  </div>
                  <label class="col-sm-4" id="ayudaTotalesGastosCorrientes"></label>
              </div>

            </fieldset>

          <h2>Resumen Contraparte</h2>
            <fieldset>
              <legend>Destino de la contraparte</legend>
              <h3>C) DESTINO DE LOS FONDOS CORRESPONDIENTES LA CONTRAPARTE</h3>
              <h3>C) 1. RESUMEN DEL DESTINO DE LOS FONDOS CORRESPONDIENTES A LA CONTRAPARTE</h3>
              <h4>Indicar los totales correspondientes a los gastos a solventar con los fondos de la contraparte utilizando el siguiente cuadro:</h4>
              <div class="form-group">
                  <label class="control-label col-sm-3 col-sm-offset-1 text-center"><h4><strong>Rubro</strong></h4></label>
                  <div class="col-sm-8">
                    <label class="control-label" style="width: 59%"><h4><strong>Desembolso (en pesos)</strong></h4></label>
                  </div>
              </div>
              <hr>
              <div class="form-group margen-izquierdo">
                  <label class="control-label col-sm-4 col-sm-offset-1 text-left" style="margin-left: 0px"><strong>Recursos Humanos Permanentes</strong><span class="asteriskField"> * :</span></label>
                  <div class="col-sm-2 col-sm-offset-2">
                    <input class="form-control" id="totalRrhhPermanentesContraparteResumen" name="totalRrhhPermanentesContraparteResumen" type="number" value="0" onkeyup="calcularTotalResumenContraparte()">
                  </div>
                  <label class="col-sm-4"><small></small></label>
              </div>
              <div class="form-group margen-izquierdo">
                  <label class="control-label col-sm-3 col-sm-offset-1 text-left">Servicios<span class="asteriskField"> * :</span></label>
                  <div class="col-sm-2 col-sm-offset-2">
                    <input class="form-control" id="serviciosContraparteResumen" name="serviciosContraparteResumen" type="number" value="0" onkeyup="calcularTotalResumenContraparte()">
                  </div>
                  <label class="col-sm-4"><small></small></label>
              </div>
              <div class="form-group margen-izquierdo">
                  <label class="control-label col-sm-3 col-sm-offset-1 text-left">Otros<span class="asteriskField">*:</span></label>
                  <div class="col-sm-2 col-sm-offset-2">
                    <input class="form-control" id="otrosContraparteResumen" name="otrosContraparteResumen" type="number" value="0" onkeyup="calcularTotalResumenContraparte()">
                  </div>
                  <label class="col-sm-4"><small></small></label>
              </div>
              <div class="form-group margen-izquierdo">
                  <label class="control-label col-sm-3 col-sm-offset-1 text-left"><strong>Total gastos contraparte</strong><span class="asteriskField"> * :</span></label>
                  <div class="col-sm-2 col-sm-offset-2">
                    <input class="form-control" id="totalContraparteResumen" name="totalContraparteResumen" value="$0" disabled>
                  </div>
                  <label class="col-sm-4" id="ayudaTotalesGastosContraparteResumen"></label>
              </div>

            </fieldset>

          <h2>Detalle Contraparte</h2>
            <fieldset>
              <legend>Detalle contraparte</legend>
              <h3><strong>C) 2. DETALLE DEL DESTINO DE LOS FONDOS CORRESPONDIENTES A LA CONTRAPARTE</strong></h3>
              <h4>Indicar el destino que se dará a los fondos correspondientes al porcentaje de proyecto que serán aportados por la entidad en concepto de contraparte.</h4>
              <h4>A tales efectos, utilizar los cuadros que se exponen a continuación.</h4>
              <h4>RECORDATORIO: El subsidio cubrirá un monto fijo de hasta NOVENTA POR CIENTO (90%) de la totalidad del proyecto para personas jurídicas sin fines de lucro y del noventa y cinco por ciento (95%) para pueblos originarios.</h4>
              <br>
              <h3 class="text-center"><strong>CONTRAPARTE</strong></h3>
              <br>
              <br>
              <h4><strong>Recursos Humanos Permanentes</strong></h4>
              <h4>Indicar el monto correspondiente a los honorarios de cada recurso humano permanente que se desempeñará en el proyecto.</h4>
              <div class="panel panel-default">
                  <table class="table table-striped" id="tablaRrhhPermanentesContraparte">
                    <thead>
                      <tr>
                        <th class="col-sm-9 text-center">Rubro</th>
                        <th class="col-sm-3 text-center">Desembolso (en pesos)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr id="row_rrhh_permanentes_contraparte_0">
                        <td><input class="form-control" name="rrhhPermanentesContraparte[0][rubro]" maxlength="60"></td>
                        <td><input class="form-control" type="number" name="rrhhPermanentesContraparte[0][dese]" id="desembolsorrhhPermanentesContraparte_0" value="" onkeyup="calcularDesembolsoContraparteRrhhPermanentes()" maxlength="15"/></td>
                      </tr>
                    </tbody>
                  </table>
              </div>
              <div class="btn-group" style="margin-top: -20px">
                <input class="btn btn-success" style="padding: 6px 11px" type="button" id="agregarRrhhPermanentesContraparte" value="Agregar fila" onClick="addRow(id)"/>
                <input class="btn btn-warning" style="padding: 6px 11px" type="button" id="eliminarRrhhPermanentesContraparte" value="Eliminar fila" onClick="deleteRow(id)"/>
              </div>
              <br>
              <br>
              <div class="form-group text-left">
                <div class="text-left">
                  <label class="control-label col-sm-2"><big>Subtotal:</big></label>
                </div>
                <div class="col-sm-2">
                  <input class="form-control" disabled type="text" id="totalRrhhPermanentesContraparteDetalle" name="totalRrhhPermanentesContraparteDetalle" value="$0">
                </div>
                <label class="col-sm-4" id="ayudaTotalesGastosContraparteRrhhPermanentes"></label>
              </div>
              <br>
              <br>
              <h4><strong>Servicios</strong></h4>
              <h4>Indicar el monto correspondiente a los honorarios de cada recurso humano permanente que se desempeñará en el proyecto.</h4>
              <div class="panel panel-default">
                  <table class="table table-striped" id="tablaServiciosContraparte">
                    <thead>
                      <tr>
                        <th class="col-sm-9 text-center">Rubro</th>
                        <th class="col-sm-3 text-center">Desembolso (en pesos)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr id="row_servicios_contraparte_0">
                        <td><input class="form-control" name="serviciosContraparte[0][rubro]" maxlength="60"></td>
                        <td><input class="form-control" type="number" name="serviciosContraparte[0][dese]" id="desembolsoServiciosContraparte_0" value="" onkeyup="calcularDesembolsoContraparteServicios()" maxlength="15"></td>
                      </tr>
                    </tbody>
                  </table>
              </div>
              <div class="btn-group" style="margin-top: -20px">
                <input class="btn btn-success" style="padding: 6px 11px" type="button" id="agregarServiciosContraparte" value="Agregar fila" onClick="addRow(id)"/>
                <input class="btn btn-warning" style="padding: 6px 11px" type="button" id="eliminarServiciosContraparte" value="Eliminar fila" onClick="deleteRow(id)"/>
              </div>
              <br>
              <br>
              <div class="form-group">
                  <label class="control-label col-sm-2"><big>Subtotal:</big></label>
                <div class="col-sm-2">
                  <input class="form-control" disabled type="text" id="totalServicioContraparteDetalle" name="totalServicioContraparteDetalle" value="$0"/>
                </div>
                <label class="col-sm-4" id="ayudaTotalesGastosContraparteServicios"></label>
              </div>
              <br>
              <br>
              <h4><strong>Otras erogaciones</strong></h4>
              <h4>Indicar el monto correspondiente a los honorarios de cada recurso humano permanente que se desempeñará en el proyecto.</h4>
              <div class="panel panel-default">
                  <table class="table table-striped" id="tablaOtrasErogacionesContraparte">
                    <thead>
                      <tr>
                        <th class="col-sm-9 text-center">Rubro</th>
                        <th class="col-sm-3 text-center">Desembolso (en pesos)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr id="row_otras_erogaciones_contraparte_0">
                        <td><input class="form-control" type="text" name="otrasErogacionesContraparte[0][rubro]" maxlength="60"></td>
                        <td><input class="form-control" type="number" name="otrasErogacionesContraparte[0][dese]" id="desembolsoOtrasErogacionesContraparte_0" value="" onkeyup="calcularDesembolsoContraparteOtrasErogaciones()" maxlength="15"></td>
                      </tr>
                    </tbody>
                  </table>
              </div>
              <div class="btn-group" style="margin-top: -20px">
                <input class="btn btn-success" style="padding: 6px 11px" type="button" id="agregarOtrasErogacionesContraparte" value="Agregar fila" onClick="addRow(id)"/>
                <input class="btn btn-warning" style="padding: 6px 11px" type="button" id="eliminarOtrasErogacionesContraparte" value="Eliminar fila" onClick="deleteRow(id)"/>
              </div>
              <br>
              <br>
              <div class="form-group">
                  <label class="control-label col-sm-2"><big>Subtotal:</big></label>
                <div class="col-sm-2">
                  <input class="form-control" disabled type="text" id="totalOtrasErogacionesContraparteDetalle" name="totalOtrasErogacionesContraparteDetalle" value="$0">
                </div>
                <label class="col-sm-4" id="ayudaTotalesGastosContraparteOtros"></label>
              </div>
              <br>
              <div class="form-group">
                  <label class="control-label col-sm-4"><big>Total gastos contraparte:</big></label>
                <div class="col-sm-2">
                  <input class="form-control" disabled type="text" id="totalFinalContraparte" name="totalFinalContraparte" value="$0">
                </div>
                <label class="col-sm-4" id="ayudaTotalesGastosContraparteDetalle"></label>
              </div>
            </fieldset>

            <h2>Presupuestos</h2>
              <fieldset>
                <legend>Detalle de presupuestos</legend>
                <div class="panel panel-default">
                  <table class="table table-striped" id="tablaPresupuestos">
                    <thead>
                      <tr>
                        <th class="col-sm-9 text-center">Nombre/Razón social del proveedor</th>
                        <th class="col-sm-3 text-center">Desembolso (en pesos)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr id="row_presupuestos_0">
                        <td><input class="form-control" name="presupuestos[0][info]" maxlength="60"></td>
                        <td><input class="form-control" type="number" name="presupuestos[0][dese]" id="desembolsoPresupuestos_0" value="" onkeyup="calcularDesembolsoPresupuestos()" maxlength="15"></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="btn-group" style="margin-top: -20px">
                  <input class="btn btn-success" style="padding: 6px 11px" type="button" id="agregarPresupuestos" value="Agregar fila" onClick="addRow(id)"/>
                  <input class="btn btn-warning" style="padding: 6px 11px" type="button" id="eliminarPresupuestos" value="Eliminar fila" onClick="deleteRow(id)"/>
                </div>
                <div class="form-group text-left">
                  <div>
                    <label class="control-label col-sm-3" style="text-align:left"><big>Monto mínimo a respaldar:</big></label>
                  </div>
                  <div class="col-sm-2">
                    <input class="form-control" disabled type="text" id="minimoARespaldarPresupuestos" name="minimoARespaldarPresupuestos">
                  </div>
                </div>
                <div class="form-group text-left">
                  <div>
                    <label class="control-label col-sm-3" style="text-align:left"><big>Monto total respaldado:</big></label>
                  </div>
                  <div class="col-sm-2">
                    <input class="form-control" disabled type="text" id="totalRespaldadoPresupuestos" name="totalRespaldadoPresupuestos" value="0" maxlength="15">
                  </div>
                </div>
              </fieldset>
    </form>
  </div>

  <!-- Script Section -->

    <script src="<?= base_url('js/jquery/jquery.validate.min.js') ?>"></script>
    <script src="<?= base_url('js/jquery-cookie/jquery.cookie.js') ?>"></script>
    <script src="<?= base_url('js/jquery-steps/jquery.steps.min.js') ?>"></script>
    <script src="<?= base_url('js/linea1/formulario.js') ?>"></script>
    <script src="<?= base_url('js/jquery-ui-1.12.1/jquery-ui.min.js') ?>"></script>
