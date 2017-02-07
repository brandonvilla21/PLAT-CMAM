<?php
	header("Content-Type: text/html;charset=utf-8");
  include("../conexion_db_cmam.php");

  /*Seleciona la base de datos a utilizar*/
  mysqli_select_db($conexion, $base_de_datos)
    or die("Ha fallado la conexion con la base de datos");
  /*Variables que obtienen los datos del formulario*/
  $id_estado_cuenta = $_POST['id_estado_cuenta'];
  $abono      = $_POST['abono'];


  /*Sentencia SQL*/
  $query =
  "UPDATE
    `tbl_estado_cuenta`
   SET
    saldo_acredor = saldo_acredor + $abono, saldo_deudor = saldo_deudor - $abono
   WHERE
    id_estado_cuenta = $id_estado_cuenta";

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
