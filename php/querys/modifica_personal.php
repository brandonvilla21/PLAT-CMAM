<?php
          include("../conexion_db_cmam.php");
          $id_personal = mb_strtoupper($_POST['id_personal'],'utf-8');
          $query = "SELECT id_personal, id_cargo, nombre, apellido_paterno, apellido_materno, foto,
                           numero_telefono, numero_celular, correo
          FROM tbl_personal
          WHERE id_personal = '$id_personal'";
          $result = mysqli_query($conexion, $query);

          /*Almacena los datos en variables*/
        	while($row = mysqli_fetch_array($result)) {
              $id_personal 						= $row['id_personal'];
              $cargo                  = $row['id_cargo'];
        	    $nombre                 = $row['nombre'];
        	    $apellido_paterno       = $row['apellido_paterno'];
            	$apellido_materno				= $row['apellido_materno'];
            	$foto  									= $row['foto'];
            	$numero_telefono  			= $row['numero_telefono'];
            	$numero_celular  		  	= $row['numero_celular'];
            	$correo    		        	= $row['correo'];
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
			<h2 id="encontrado_h2" class="label_frm">Datos del personal</h2><hr>
      <form  method="post" action="../../php/querys/modificacion_personal.php" name="frm_registrar_personal">
        <div id="div_contenedor_formulario">
          <div  id="div_labels">
              <label class="label_frm">Número de control: </label>
              <label class="label_frm">Nombre: </label>
              <label class="label_frm">Apellido paterno: </label>
              <label class="label_frm">Apellido materno: </label>
              <label class="label_frm" >Cargo: </label>
              <label class="label_frm" >Numero de telefono: </label>
              <label class="label_frm" >Numero de celular: </label>
              <label class="label_frm" >Correo: </label>
              <label class="label_frm" >Foto: </label>

          </div>
          <div id="div_boxes">
              <input id="id_personal" class="input_frm"  type="text"  maxlength="10" name="id_personal" required readonly value="<?php echo $id_personal ?>">
              <input id="nombre" class="input_frm"  type="text"  maxlength="50" name="nombre" required value="<?php echo $nombre ?>">
              <input id="apellido_paterno" class="input_frm"  type="text"  maxlength="30" name="apellido_paterno" required value="<?php echo $apellido_paterno ?>">
              <input id="apellido_materno" class="input_frm"  type="text"  maxlength="30" name="apellido_materno" required value="<?php echo $apellido_materno ?>">
              <select id="id_cargo" class="input_frm" name="id_cargo" style="width: 150px;">
                <?php
                  $ArrayCargo = array('0' => 'Comandante',
                                      '1' => 'Docente',
                                      '2' => 'Coordinador',
                                      '3' => 'Secretaria',
                                    );
                  foreach( $ArrayCargo as $var => $x ): ?>
                  <option value="<?php echo $var ?>"<?php if($var == $cargo): ?> selected="selected"<?php endif; ?>><?php echo $x ?></option>
                <?php endforeach; ?>
              </select>
              <input id="numero_telefono" class="input_frm"  type="text"  maxlength="30" name="numero_telefono" required value="<?php echo $numero_telefono ?>">
              <input id="numero_celular" class="input_frm"  type="text"  maxlength="30" name="numero_celular" required value="<?php echo $numero_celular ?>">
              <input id="correo" class="input_frm_correo"  type="text"  maxlength="30" name="correo" required value="<?php echo $correo ?>">
              <input type="file" name="foto" class="input_file_frm" id="foto" accept=".png, .jpeg, .jpg" style="color:#FFF">


          </div>
        </div>
        <div id="div_btn_frm_aceptar">
          <input class="btn_frm_aceptar" type="submit" name="btn_login" value="Modificar">
        </div>
      </form>
	    <?php } else { ?>
					<div id="div_no_encontrado">
						<h2>No se encontró al personal buscado</h2>
					</div>
	    <?php  }?>
</div>
