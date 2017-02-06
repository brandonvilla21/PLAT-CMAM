<!DOCTYPE html>
<html>
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
        <!-- Lo escencial de la pagina: -->
				<h1>Consultar estado de cuenta</h1>
        <br>
				<span> Busque al alumno al cual consultar su estado de cuenta. </span>

				<div id="div_frm_buscar">

					<form name="frm_consultar_alumno" >

						<label class="label_frm">Número de control:</label>
						<input name="id_alumno" id="id_alumno" type="text" class="input_frm" maxlength="9" required>
						<input name="bnt_buscar_alumno" id="btn_buscar_alumno" type="button" class="btn_frm_aceptar" value="Buscar alumno" onclick="consultaPagos()"/>

					</form>

				</div>

        <div id="div_resultado">

        </div>

      </div><!--div_cuerpo-->
    </div><!--div_contenedor_principal-->
  </body>
</html>
