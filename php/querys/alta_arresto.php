<?php
	header("Content-Type: text/html;charset=utf-8");
	include("../conexion_db_cmam.php");

	/*Seleciona la base de datos a utilizar*/
	mysqli_select_db($conexion, $base_de_datos)
	or die("Ha fallado la conexion con la base de datos");

	

	/*Variables que obtienen los datos del formulario*/
	$id_alumno 		= mb_strtoupper($_REQUEST['label_id_alumno'],'utf-8');
	$motivo			= $_REQUEST['motivo'];
	$fecha			= date("Y-m-d");
	$horas			= $_REQUEST['horas'];
	$puntos			= $_REQUEST['puntos'];
	$estado 		= "DEBIDO";
	

	echo $id_alumno .'<br>';
	echo $motivo .'<br>';
	echo $fecha .'<br>';
	echo $horas .'<br>';
	echo $puntos .'<br>';
	echo $estado.'<br>';

	
	$query =
	"INSERT INTO `tbl_arresto`
	(
		`id_alumno`,
		`motivo`,
		`fecha`,
		`horas`, 
		`puntos`, 
		`estado`
	) VALUES (
		'$id_alumno',
		'$motivo',
		'$fecha',
		$horas,
		$puntos,
		'$estado')";

	//Se ejecuta la Query
	mysqli_query($conexion, $query);


	//Se verifica el estado de la última consulta:
	$status = mysqli_sqlstate ($conexion);

	//********** Falta sumar los puntos de demerito y las horas en la tbl_alumno

	echo $status;


	
	//Código de status: 00000: La ultima consulta fué realizada con exito.
	if($status == '00000'){
		header('Location: ../../html/pag/operacion_correcta.php');
	} 

	/* Código de status: Cuando el codigo es 23000, eprobable que 
	 * se esté duplicando un campo llave al ejecutar la query.
	 */
	else if($status == '23000'){
		$error = "Es posible que la clave que intenta ingresar ya esté registrada.";
		//header('Location: ../../html/pag/alumno_registro_incorrecto.php?error='.$error."&status=".$status);
	} 
	else {
		$error = "Indefinido.";
		//header('Location: ../../html/pag/alumno_registro_incorrecto.php?error='.$error."&status=".$status);
	}

	//Más información acerca de los códigos de staus en:
	//http://php.net/manual/es/mysqli.sqlstate.php


?>
