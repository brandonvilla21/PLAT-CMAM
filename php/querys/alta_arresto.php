<?php
	header("Content-Type: text/html;charset=utf-8");
	include("../conexion_db_cmam.php");
	include("functions_alumno.php");

	/*Seleciona la base de datos a utilizar*/
	mysqli_select_db($conexion, $base_de_datos)
	or die("Ha fallado la conexion con la base de datos");

	/*Variables que obtienen los datos del formulario*/
	$id_alumno 		= mb_strtoupper($_REQUEST['id_alumno'],'utf-8');
	$motivo			= $_REQUEST['motivo'];
	$fecha			= date("Y-m-d");
	$horas			= $_REQUEST['horas'];
	$puntos			= $_REQUEST['puntos'];
	$estado 		= "DEBIDO";
	

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
	$status = mysqli_sqlstate($conexion);

	if($status == '00000'){
		//Se realizan funciones de functions_alumno.php:
		$horas = getHorasArresto($id_alumno, $conexion) + $horas;
		$puntos = getPuntosDemerito($id_alumno, $conexion) + $puntos;
		//Actualizacion en tbl_alumno:
		$query = "UPDATE tbl_alumno SET horas_arresto = '$horas', puntos_demerito = '$puntos' WHERE id_alumno = '$id_alumno' ";
		mysqli_query($conexion, $query);

		$status = mysqli_sqlstate($conexion);

		if($status == '00000'){
			$mensaje = "Se cargó el arresto exitosamente.";
			header('Location: ../../html/pag/operacion_exitosa.php?mensaje='.$mensaje);
		}
		else {
			$error = "Error al conectar con la tabla de alumnos.";
			header('Location: ../../html/pag/operacion_fallida.php?error='.$error."&status=".$status);
		}


	}
	else{
		$error = "Error al conectar con la tabla de arrestos";
		header('Location: ../../html/pag/operacion_fallida.php?error='.$error."&status=".$status);
	}

















	
		
	$status = mysqli_sqlstate ($conexion);


	

	$error = '<br>' . "Todo bien :)";

	//Código de status: 00000: La ultima consulta fué realizada con exito.
	if($status == '00000'){
		//header('Location: ../../html/pag/operacion_correcta.php');
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
	echo $error;




?>
