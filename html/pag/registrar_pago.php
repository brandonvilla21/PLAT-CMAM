<!DOCTYPE html>
<?php
	//Inclusión de archivos php
	include ("../../php/conexion_db_cmam.php");
?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Colegio Militarizado Águilas de México</title>
    <script src="../../js/jquery-3.1.1.js"></script>
		<script src="../../js/js_core.js"></script>
		<script src="../../js/validar_clave.js"></script>
		<link rel="stylesheet" href="../../css/estilo_principal.css">
		<link rel="icon" type="image/png" href="../../img/logo_cmam_100x100.png" />
  </head>
  <body onload="precargarPagina()">
    <div id="div_cabecera">
  	<!-- ../div_cebecera.php -->
  	</div><!-- div_cabecera -->

  	<div id="div_menu_navegacion">
  	<!-- ../div_menu_navegacion.php -->
  	</div> <!-- div_menu_navegacion -->

    <div id="div_contenedor_principal">
      <div id="div_cuerpo">
        <!--Lo escencial de la pagina: -->
        <h1>Registrar pago</h1>
        <div id="div_frm_registrar">

          <label class="label_frm">Número de control del alumno:</label>
          <input name="id_alumno" id="id_alumno_pago" type="text" class="input_frm" maxlength="9" required>
          <input name="bnt_buscar_alumno" id="btn_buscar_alumno" type="button" class="btn_frm_aceptar" value="Buscar alumno" onclick="getIdPersonal()"/>

					<!--Aqui contendra la informacion del alumno-->
					<div id="div_datos_alumno">
						<h4 id="h4__datosAlumno"></h4>
						<span id="span__lineaAlumno"></span>
						<div id="div_informacion_alumno">
							<div id="div_datos_personales">
								<p id = "a__id_alumno"></p>
								<p id = "a__nombre_alumno"></p>
								<p id = "a__ciudad_alumno"></p>
								<p id = "a__direccion_alumno"></p>
							</div>
							<div id="div_foto_alumno">
								<img id="img__foto_alumno" >
							</div>
						</sdiv><!--div_informacion_alumno-->
					</div><!--div_datos_alumno-->

					<!--Aqui contendra la seccion para seleccionar el pago-->
					<div id="div_pago">
						<span id="span__lineaPago"></span>
						<div id="div_seleccionar_pago">
							<label class="label_frm">Seleccionar concepto de pago:</label>
							<select class="input_frm" name="pago" id="id_concepto_pago" style="width: 200px;">
								<option value="1">Inscripcion</option>
								<option value="2">Reinscripcion</option>
								<option value="3">Uniforme</option>
							</select>
							<input name="bnt_aceptar" id="btn_aceptar" type="button" class="btn_frm_aceptar" value="Aceptar" onclick="getDatosPago()"/>
						</div>

						<!--Aqui van los datos del pago-->
						<div id="div_datos_pago">
							<h4>Datos del pago:</h4>
							<p id="descripcion__pago"></p>
							<p id="precio__pago"></p>
							<div id="div_abono">
								<label id="label__abonar"class="label_frm">Cantidad a abonar: </label>
								<input name="id_saldo_acredor" id="id_saldo_acredor" type="text" class="input_frm" required>
								<input name="bnt_abono" id="btn_abono" type="button" class="btn_frm_aceptar" value="Aceptar" onclick=""/>
							</div>

						</div>
					</div>

        </div><!--div_frm_registrar-->
      </div><!--div_cuerpo-->
    </div><!--div_contenedor_principal-->
    <div id="div_resultado">

    </div>
    <div id="div_pie_pagina">
				<!-- html/div_pie_pagina.php -->
		</div> <!-- div_pie_pagina -->

  </body>
</html>
