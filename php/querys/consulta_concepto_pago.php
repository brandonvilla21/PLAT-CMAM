<?php
  header("Content-Type: text/html;charset=utf-8");
  include("../conexion_db_cmam.php");
  /*Seleciona la base de datos a utilizar*/
  mysqli_select_db($conexion, $base_de_datos)
    or die("Ha fallado la conexion con la base de datos");
  // $id_concepto_pago = $_GET['id_concepto_pago'];
  $id_concepto_pago = 2;//$_GET['id_concepto_pago'];


  $query = "SELECT * FROM tbl_conceptos_pago WHERE id_concepto = $id_concepto_pago";

  $result = mysqli_query($conexion, $query);

  $row = mysqli_fetch_array($result);

  $id_concepto = $row['id_concepto'];
  $descripcion = $row['descripcion'];
  $precio      = $row['precio'];

  /*Almacena en un arreglo toda la informacion obtenida de la consulta*/
  $datos = array (
    "id_concepto" => $id_concepto,
    "descripcion" => $descripcion,
    "precio"      => $precio
  );

  /*Genera un JSON con los datos obtenidos del arreglo*/
  $json =  json_encode($datos);

  /*Imprime todo el JSON para que pueda ser obtenido desde la funcion en Javascript*/
  echo $json;

 ?>
