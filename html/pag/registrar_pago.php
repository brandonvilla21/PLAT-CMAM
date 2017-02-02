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
				<br>
				<label class="label_frm">Número de control del alumno:</label>
				<input name="id_alumno" id="id_alumno_pago" type="text" class="input_frm" maxlength="9" required>
				<br>
				<label class="label_frm">Seleccionar concepto de pago:</label>
				<select class="input_frm" name="pago" id="id_concepto_pago" style="width: 203px;">
					<option value="1">Inscripcion</option>
					<option value="2">Reinscripcion</option>
					<option value="3">Uniforme</option>
				</select>
				<input name="bnt_aceptar" id="btn_aceptar" type="button" class="btn_frm_aceptar" value="Aceptar" onclick="getAlumno()"/>

        <div id="div_resultado">

        </div><!--div_resultado-->
      </div><!--div_cuerpo-->
    </div><!--div_contenedor_principal-->
    <div id="div_resultado">

    </div>
    <div id="div_pie_pagina">
				<!-- html/div_pie_pagina.php -->
		</div> <!-- div_pie_pagina -->

  </body>
</html>
