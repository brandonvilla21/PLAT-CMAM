<!DOCTYPe HTML 5>

<?php
	//Inclusión de archivos php
	include ("../../php/conexion_db_cmam.php");
	/*Seleciona la base de datos a utilizar*/
	mysqli_select_db($conexion, $base_de_datos)
	or die("Ha fallado la conexion con la base de datos");
	$id_estado_cuenta = $_GET['mensaje'];
	$query = "SELECT
							id_estado_cuenta,tbl_estado_cuenta.id_alumno,tbl_alumno.id_alumno, nombre, apellido_paterno, apellido_materno, id_concepto_pago, id_concepto, descripcion,fecha_cargo, total, saldo_acredor, saldo_deudor
						FROM
							tbl_estado_cuenta, tbl_conceptos_pago, tbl_alumno
						WHERE
							id_estado_cuenta = $id_estado_cuenta
						AND
							id_concepto_pago = id_concepto
						AND
							tbl_estado_cuenta.id_alumno = tbl_alumno.id_alumno";

		$result = mysqli_query($conexion, $query);
		$row = mysqli_fetch_array($result);
?>

<html lang="es" >

	<head>
		<meta charset="UTF-8"/>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Colegio Militarizado Águilas de México</title>
		<script src="../../js/jquery-3.1.1.js"></script>
		<script src="../../js/js_core.js"></script>
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
				<h1>Consulta de adeudo</h1>

				<div id="div_frm_registrar">
					<div id="div_datos_adeudo">
						<h3>Pago de: <?php echo $row['descripcion'] ?></h3><hr>
						<p>Alumno: <?php echo $row['nombre']. " ". $row['apellido_paterno']. " ". $row['apellido_materno'] ?></p>
						<p>Fecha de cargo: <?php echo $row['fecha_cargo'] ?></p>
						<p>Precio <?php echo '$'.$row['total'] ?></p>
						<p>Abono	<?php echo '$'.$row['saldo_acredor'] ?></p>
						<p>Debe 	<?php echo '$'.$row['saldo_deudor'] ?></p>
					</div>
					<form >
						<input name="abono" id="abono" type="number" step="0.10" max = "<?php echo $row['saldo_deudor']?>" placeholder="0.00" class="input_frm" required>
						<input name="bnt_aceptar" id="btn_aceptar" type="button" class="btn_frm_aceptar" value="Abonar" onclick="actualizarPago(<?php echo $row['saldo_acredor']?>, <?php echo $row['id_estado_cuenta']?>)"/>
					</form>
				</div>

			</div> <!-- div_cuerpo -->

		</div> <!-- div_contenedorPrincipal -->

		<div id="div_pie_pagina">
			<!-- html/div_pie_pagina.php -->
		</div> <!-- div_pie_pagina -->

	</body>

</html>
