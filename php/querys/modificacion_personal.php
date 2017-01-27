<?php
	header("Content-Type: text/html;charset=utf-8");
	include("../conexion_db_cmam.php");
	/*Seleciona la base de datos a utilizar*/
	mysqli_select_db($conexion, $base_de_datos)
		or die("Ha fallado la conexion con la base de datos");

	/*Variables que obtienen los datos del formulario*/
  $id_personal      = mb_strtoupper($_REQUEST['id_personal'],'utf-8');
  $id_cargo         = mb_strtoupper($_REQUEST['id_cargo'],'utf-8');
  $nombre           = mb_strtoupper($_REQUEST['nombre'],'utf-8');
  $apellido_paterno = mb_strtoupper($_REQUEST['apellido_paterno'],'utf-8');
  $apellido_materno = mb_strtoupper($_REQUEST['apellido_materno'],'utf-8');
	$numero_telefono 	= $_REQUEST['numero_telefono'];
	$numero_celular 	= $_REQUEST['numero_celular'];
	$correo					 	= $_REQUEST['correo'];
	$foto 						= $_REQUEST['foto'];
	/*Sentencia SQL*/
	$query =
	"UPDATE tbl_personal SET id_cargo = '$id_cargo',
		nombre = '$nombre',
		apellido_paterno = '$apellido_paterno',
		apellido_materno = '$apellido_materno',
		foto = '$foto',
		numero_telefono = '$numero_telefono',
		numero_celular = '$numero_celular',
		correo = '$correo'
    WHERE id_personal = '$id_personal'";




	//Se ejecuta el query:
	$resultado = mysqli_query($conexion, $query)

	//Si falla (or die), redirecciona a la pagina de fallo.
	or die (header('Location: ../../html/pag/personal_registro_incorrecto.php'));
  //
	// //Si no falla, redirecciona a la pagina de registro correcto.
	header('Location: ../../html/pag/personal_registro_correcto.php');


?>
