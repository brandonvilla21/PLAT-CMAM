<?php
	header("Content-Type: text/html;charset=utf-8");
	include("../conexion_db_cmam.php");
	/*Seleciona la base de datos a utilizar*/
	mysqli_select_db($conexion, $base_de_datos)
		or die("Ha fallado la conexion con la base de datos");

	$id_personal = mb_strtoupper($_POST['id_personal'],'utf-8');
	//$myQuery = "SELECT * FROM tbl_alumno WHERE id_alumno='".$id_alumno."'";
  $query = "SELECT id_personal, nombre, apellido_paterno, apellido_materno, numero_telefono, numero_celular, correo, foto, descripcion
            FROM tbl_personal, tbl_cargo
            WHERE id_personal = $id_personal and tbl_personal.id_cargo = tbl_cargo.id_cargo";
	$result = mysqli_query($conexion, $query);

  /*Almacena los datos en variables*/
	while($row = mysqli_fetch_array($result)) {
	    $id_personal      = $row['id_personal'];
	    $nombre           = $row['nombre'];
	    $apellido_paterno = $row['apellido_paterno'];
	    $apellido_materno = $row['apellido_materno'];
      $cargo            = $row['descripcion'];
			$numero_telefono	= $row['numero_telefono'];
			$numero_celular		=	$row['numero_celular'];
			$correo						=	$row['correo'];
			$foto							=	$row['foto'];
	}
?>

<div id="div_frm_registrar">
		<?php
	    /*
	    * Con ese metodo se identifica si se encontro o no
	    * al alumno.
	    * isset() Regresa TRUE si la variable es definida
	    *         Regresa FALSE si la variable es indefinida
	    */
	    if (isset($nombre)) {
	    ?>
			<h2 id="encontrado_h2">Datos de <?php echo strtolower($cargo) ?></h2><hr>
	      <div id="div_encontrado">
					<div id="datos_personales">
						<p class="dato_personal_nombre"><?php echo $nombre . " " . $apellido_paterno . " " . $apellido_materno ?></p>
						<p class="dato_personal">Cargo: <?php echo $cargo ?></p>
						<p class="dato_personal">Numero de telefono: <?php echo $numero_telefono ?></p>
						<p class="dato_personal">Numero de celular: <?php echo $numero_celular ?></p>
						<p class="dato_personal">Correo: <?php echo $correo ?></p>
					</div>
					<div id="div_foto">
						<?php
					    if ($foto != "NULL.jpg") {
								$image_path = "../../img/foto/".$foto;
					    ?>
							<img src="<?php echo $image_path?>">
							<?php } else { ?>
								<img src="../../img/default_image.png">
								<p class="dato_personal">No tiene asociada una foto.</p>
							<?php  }?>
					</div>
			</div>

	    <?php } else { ?>
					<div id="div_no_encontrado">
						<h2>No se encontró al personal</h2>
					</div>
	    <?php  }?>
</div>
