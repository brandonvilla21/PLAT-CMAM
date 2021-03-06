<!DOCTYPE HTML 5>

<?php
	//Inclusión de archivos php
	include ("../../php/conexion_db_cmam.php");
?>

<html lang="es" >


	<head>
		<meta charset="UTF-8"/>
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

    <div id="div_contenedor_principal" >



      <div id="div_cuerpo">
        <!-- Lo escencial de la pagina: -->
        <h1>Registrar personal:</h1>
        <!-- DATOS DE NUEVO INGRESO ----------------------------------------------------->
        <div id="div_frm_registrar">
          <label class="label_frm">Datos de nuevo ingreso: </label>
          <hr />
          <br/>
          <form  class= "frm_registrar" enctype="multipart/form-data" method="post" action="../../php/querys/alta_personal.php" name="frm_registrar_alumno">
            <div id="div_contenedor_formulario">
              <div  id="div_labels">
                  <label class="label_frm">Número de control: </label>
									<label class="label_frm">Contraseña: </label>
									<label class="label_frm">Confirmar Contraseña: </label>
                  <label class="label_frm">Nombre: </label>
                  <label class="label_frm">Apellido paterno: </label>
                  <label class="label_frm">Apellido materno: </label>
                  <label class="label_frm" >Cargo: </label>
									<label class="label_frm" >Numero de telefono: </label>
									<label class="label_frm" >Numero de celular: </label>
									<label class="label_frm" >Correo: </label>

              </div>
              <div id="div_boxes">
                  <input id="id_personal" class="input_frm"  type="text"  maxlength="10" name="id_personal" required>
									<input id="contrasena" class="input_frm"  type="password"  maxlength="30" name="contrasena" required>
									<input id="confirmar_contrasena" class="input_frm"  type="password"  maxlength="30" name="confirmar_contrasena" required>
                  <input id="nombre" class="input_frm"  type="text"  maxlength="50" name="nombre" required>
									<input id="apellido_paterno" class="input_frm"  type="text"  maxlength="30" name="apellido_paterno" required>
                  <input id="apellido_materno" class="input_frm"  type="text"  maxlength="30" name="apellido_materno" required>
                  <select id="id_cargo" class="input_frm" name="id_cargo" style="width: 150px;">
                    <option value="0">Comandante</option>
                    <option value="1">Docente</option>
                    <option value="2">Coordinador</option>
                    <option value="3">Secretaria</option>
                  </select>
									<input id="numero_telefono" class="input_frm"  type="text"  maxlength="30" name="numero_telefono" required>
									<input id="numero_celular" class="input_frm"  type="text"  maxlength="30" name="numero_celular" required>
									<input id="correo" class="input_frm_correo"  type="text"  maxlength="30" name="correo" required>


              </div>
            </div>
						<br />
		        <div id="div_foto_etiquetas">
		          <label class="label_frm">Foto:</label><br/><hr />
		        </div>
		        <div class="galeria">
		          <div>
		          	<img class="image" src=""><br/>
		            <label class="label_frm">Seleccionar nueva foto (MAX: 500 kbs): </label>
		            <input id="foto" name="foto" size="30" type="file" accept=".png, .jpeg, .jpg" onchange="cargarImagen(this)"/>
		          </div>
		        </div>
		        <hr/>
            <div id="div_btn_frm_aceptar">
              <input class="btn_frm_aceptar" type="submit" name="btn_login" value="Registrar" onclick="return validarPassword()">
            </div>
          </form>
        </div> <!--div_frm_registrar-->
    	</div> <!-- div_cuerpo-->
		</div> <!-- div_contenedorPrincipal -->


		<div id="div_pie_pagina">
				<!-- html/div_pie_pagina.php -->
		</div> <!-- div_pie_pagina -->




	</body>

</html>
