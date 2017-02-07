<?php
  header("Content-Type: text/html;charset=utf-8");
  include("../conexion_db_cmam.php");
  include("functions_alumno.php");

  /*Seleciona la base de datos a utilizar*/
  mysqli_select_db($conexion, $base_de_datos)
    or die("Ha fallado la conexion con la base de datos");

  $id_alumno = mb_strtoupper($_POST['id_alumno'],'utf-8');

  /*Falta nombre*/
  $query = "SELECT
              id_estado_cuenta, tbl_estado_cuenta.id_alumno, nombre, apellido_paterno, apellido_materno, id_concepto_pago, fecha_cargo, total, saldo_acredor, saldo_deudor, descripcion, id_concepto
            FROM
              tbl_alumno, tbl_conceptos_pago, tbl_estado_cuenta
            WHERE
              tbl_estado_cuenta.id_alumno = '$id_alumno'
            AND
              id_concepto_pago = id_concepto
            AND
              tbl_alumno.id_alumno = '$id_alumno'
            ORDER BY
              fecha_cargo DESC";


  $result = mysqli_query($conexion, $query);

  $row = mysqli_fetch_array($result);
  $nombre           = $row['nombre'];
  $apellido_paterno = $row['apellido_paterno'];
  $apellido_materno = $row['apellido_materno'];
  $alumno = $nombre . " " . $apellido_paterno . " " . $apellido_materno;
?>
      <div id="div_frm_registrar">
        <?php
    	    /*
    	    * Con ese metodo se identifica si se encontro o no
    	    * al alumno.
    	    * isset() Regresa TRUE si la variable es definida
    	    *         Regresa FALSE si la variable es indefinida
    	    */
    	    if (isset($row['nombre'])) {
  	    ?>
        <h2 id="encontrado_h2">Estado de cuenta</h2><hr>
  	    <div id="div_alumno_encontrado">
          <p>Alumno: <?php echo $alumno ?></p>
          <table class="tbl_lista_verde_simple" >
    				<tr>
    				    <th style="width: 30em;">Concepto</th>
    				    <th style="width: 100em;">Precio</th>
    				    <th style="width: 40em;">Abono</th>
    				    <th style="width: 20em;">Debe</th>
    				    <th style="width: 20em;">Estado</th>
    			  	</tr>
    			  	<?php
    			  		$result = getEstadoCuenta($id_alumno, $conexion, $query);
    				  	imprimirEstadoCuenta($result);

    		  		?>
    			</table>
        </div>
  <?php } else { ?>
			<div id="div_no_encontrado">
				<h2>No se encontro al alumno</h2>
			</div>
  <?php  }?>
      </div>
