<?php
  header("Content-Type: text/html;charset=utf-8");
  include("../conexion_db_cmam.php");
  /*Seleciona la base de datos a utilizar*/
  mysqli_select_db($conexion, $base_de_datos)
    or die("Ha fallado la conexion con la base de datos");

  $id_alumno = mb_strtoupper($_POST['id_alumno'],'utf-8');

  $query = ;
  $result = mysqli_query($conexion, $query);

  $row = mysqli_fetch_array($result);
  
 ?>
