<?php
	header("Content-Type: text/html;charset=utf-8");
  include("../conexion_db_cmam.php");

  /*Seleciona la base de datos a utilizar*/
  mysqli_select_db($conexion, $base_de_datos)
    or die("Ha fallado la conexion con la base de datos");
  /*Variables que obtienen los datos del formulario*/
  $id_alumno          = mb_strtoupper($_POST['id_alumno'],'utf-8');
  $id_concepto_pago   = $_POST['id_concepto'];
  $fecha_cargo        = $_POST['fecha_cargo'];
  $total              = $_POST['total'];
  $descuento          = $_POST['descuento'];
  $saldo_acredor      = floatval($_POST['saldo_acredor']);
	$saldo_deudor       = floatval($_POST['saldo_deudor']);

  /*Sentencia SQL*/
  $query =
  "INSERT INTO `tbl_estado_cuenta`
  (
		`id_estado_cuenta`,
    `id_alumno`,
    `id_concepto_pago`,
    `fecha_cargo`,
    `total`,
    `descuento`,
    `saldo_acredor`,
		`saldo_deudor`
  )
  VALUES
  (
		0,
    '$id_alumno',
    '$id_concepto_pago',
    '$fecha_cargo',
    '$total',
    '$descuento',
    '$saldo_acredor',
		'$saldo_deudor'
  ) ";
  $respuesta;

  /*Se ejecuta el query*/
	if(mysqli_query($conexion, $query)) {
    $array = array('respuesta' => true);
    $json = json_encode($array);
    echo $json;
  } else {
		echo mysqli_error($conexion);

    $array = array('respuesta' => false);
    $json = json_encode($array);
    echo $json;
  }

?>
