<?php
class Pdf_modelo extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    /* Devuelve la lista de alumnos que se encuentran en la tabla tblalumno */
    public function obtenerListaPost()
    {
      // $post = new StdClass;
      // //////////////1.DATOS///////////////
      // $post->razonSocial = $_POST['razonSocial'];
      // $post->nombreFantasia = $_POST['nombreFantasia'];
      // $post->cuit = $_POST['cuit'];
      // $post->tipoPersona = $_POST['tipoPersona'];
      // if ($post->tipoPersona == 'organizaciones') {
      //   $post->tipoPersona = 'Organización sin fines de lucro';
      // }else {
      //   $post->tipoPersona = 'Pueblo originario';
      // }
      // /////////////2.RESUMEN GENERAL//////////////////
      // $post->proyectoResumen = $_POST['proyectoResumen'];
      // $post->gastosContraparteResumenGeneral = $_POST['gastosContraparteResumenGeneral'];
      // $post->gastosSubsidioResumenGeneral = $_POST['gastosSubsidioResumenGeneral'];
      // $post->gastosCapitalResumenGeneral = $_POST['gastosCapitalResumenGeneral'];
      // $post->gastosCorrientesResumenGeneral = $_POST['gastosCorrientesResumenGeneral'];
      // $post->totalesResumenGeneral = $_POST['totalesResumenGeneral'];
      // /////////////3.CAPITAL Y CORRIENTE///////////////
      // $post->totalGastosAdecuacionEdilicia = $_POST['totalGastosAdecuacionEdilicia'];
      // $post->totalGastosEquipamientoTecnologico = $_POST['totalGastosEquipamientoTecnologico'];
      // $post->totalGastosCapitalSubsidio = $_POST['totalGastosCapitalSubsidio'];
      // $post->totalGastosRrhhNoPermanentes = $_POST['totalGastosRrhhNoPermanentes'];
      // $post->totalGastosViaticos = $_POST['totalGastosViaticos'];
      // $post->totalGastosCorrientesSubsidio = $_POST['totalGastosCorrientesSubsidio'];
      // ////////4.Adecuacion edilicia///////////
      // $headerAdecuacion = array("Descripción de plan de obra", "Tiempo (dias)", "Desembolso (en pesos)");
      // $post->adecuacionTransmision = $_POST['adecuacionTransmision'];//tabla
      // $post->totalAdecuacionTransmision = $_POST['totalAdecuacionTransmision'];
      // $post->adecuacionProduccion = $_POST['adecuacionProduccion'];//tabla
      // $post->totalAdecuacionProduccion = $_POST['totalAdecuacionProduccion'];
      // $post->adecuacionInfra = $_POST['adecuacionInfra'];//TABLA
      // $post->totalAdecuacionInfraestructura = $_POST['totalAdecuacionInfraestructura'];
      // ///////5.Equipamiento tecnologico/////////
      // $headerEquipamiento = array("Descripción equipamiento", "Cantidad", "Finalidad" , "Precio unitario", "Desembolso(en pesos)");
      // $post->equipamientoProduccion = $_POST['equipamientoProduccion'];//tabla
      // $post->totalEquipamientoProduccion = $_POST['totalEquipamientoProduccion'];
      // $post->equipamientoTransmision = $_POST['equipamientoTransmision'];//tabla
      // $post->totalEquipamientoTransmision = $_POST['totalEquipamientoTransmision'];
      // $post->equipamientoInfra = $_POST['equipamientoInfra'];//TABLA
      // $post->totalEquipamientoInfra = $_POST['totalEquipamientoInfra'];
      // /////////6.Gastos corrientes///////////////
      // $headerNoPermanentes = array("Función", "Honorarios(en pesos)", "Tiempo(en meses)", "Desembolso(en pesos)");
      // $post->rrhhNoPermanentes = $_POST['rrhhNoPermanentes'];//tabla
      // $post->totalRrhhNoPermanentes = $_POST['totalRrhhNoPermanentes'];
      // $headerViaticos = array("Descripción", "Desembolso(en pesos)");
      // $post->viaticosPersonal = $_POST['viaticosPersonal'];//tabla
      // $post->totalViaticosPersonal = $_POST['totalViaticosPersonal'];
      // //////////7.Resumen contraparte///////////////
      // $post->totalRrhhPermanentesContraparteResumen = $_POST['totalRrhhPermanentesContraparteResumen'];
      // $post->serviciosContraparteResumen = $_POST['serviciosContraparteResumen'];
      // $post->otrosContraparteResumen = $_POST['otrosContraparteResumen'];
      // $post->totalContraparteResumen = $_POST['totalContraparteResumen'];
      // ///////////8.Detalle contraparte /////////////
      // $headerContraparte = array("Rubro", "Desembolso(en pesos)");
      // $post->rrhhPermanentesContraparte = $_POST['rrhhPermanentesContraparte'];//tabla
      // $post->totalRrhhPermanentesContraparteDetalle = $_POST['totalRrhhPermanentesContraparteDetalle'];
      // $post->serviciosContraparte = $_POST['serviciosContraparte'];//tabla
      // $post->totalServicioContraparteDetalle = $_POST['totalServicioContraparteDetalle'];
      // $post->otrasErogacionesContraparte = $_POST['otrasErogacionesContraparte'];//TABLA
      // $post->totalOtrasErogacionesContraparteDetalle = $_POST['totalOtrasErogacionesContraparteDetalle'];
      // $post->totalFinalContraparte = $_POST['totalFinalContraparte'];
      // //////////9.presupuestos/////////////////
      // $headerPresupuestos = array("Datos de la empresa", "Desembolso(en pesos)");
      // $post->presupuestos = $_POST['presupuestos'];//tabla
      // $post->minimoARespaldarPresupuestos = $_POST['minimoARespaldarPresupuestos'];
      // $post->totalRespaldadoPresupuestos = $_POST['totalRespaldadoPresupuestos'];
      //
      // return $post;
    }
}
