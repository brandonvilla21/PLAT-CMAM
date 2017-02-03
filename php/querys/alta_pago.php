<?php
  header("Content-Type: text/html;charset=utf-8");
  include("../conexion_db_cmam.php");
  /*Seleciona la base de datos a utilizar*/
  mysqli_select_db($conexion, $base_de_datos)
    or die("Ha fallado la conexion con la base de datos");

    $id_alumno = mb_strtoupper($_POST['id_alumno'],'utf-8');
    $id_concepto = $_POST['id_concepto_pago'];

    $query = "SELECT
              id_alumno,
              nombre,
              apellido_paterno,
              apellido_materno,
              calle,
              colonia,
              ciudad,
              foto,
              descripcion,
              precio
            FROM
              tbl_alumno,  tbl_conceptos_pago
            WHERE
              id_alumno = '$id_alumno'
            AND
              id_concepto = $id_concepto";

    $result = mysqli_query($conexion, $query);

    /*Almacena los datos en variables*/
    $row = mysqli_fetch_array($result);

    $id_alumno        = $row['id_alumno'];
    $nombre           = $row['nombre'];
    $apellido_paterno = $row['apellido_paterno'];
    $apellido_materno = $row['apellido_materno'];
    $calle	  		    =	$row['calle'];
    $colonia          = $row['colonia'];
    $ciudad           = $row['ciudad'];
    $foto 			      = $row['foto'];
    $descripcion 			= $row['descripcion'];
    $precio      			= $row['precio'];
    date_default_timezone_set('America/Mexico_City')
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
   <h2 id="encontrado_h2">Datos generales del alumno</h2><hr>
     <div id="div_encontrado">
       <table class="tbl_lista_verde_simple" >
 			  <tr>
 			    <th style="width: 40em;">No. de control:</th>
 			    <th style="width: 400em;">Alumno:</th>
 			    <th style="width: 35em;">Ciudad: </th>
 			  </tr>
 			  <tr>
 			  	<td><?php echo $id_alumno?></td>
 			    <td><?php echo $nombre. " " . $apellido_paterno . " " .  " " . $apellido_materno ?></td>
 			    <td><?php echo $ciudad ?></td>
 			  </tr>
 			</table>
     </div>

     <div id="div_registro_pago">
       <label>Datos del pago:</label><br><hr>
       <label>PAGO:  <?php echo $descripcion ?></label><br>
       <label>FECHA: <?php echo date("d/m/Y") ?></label><br>
       <label>MONTO: <?php echo "$".$precio ?></label><br>
       <label>Abono:</label>
       <input name="saldo_acredor" id="saldo_acredor" type="number" step="0.01" max = "<?php echo $precio ?>" placeholder="0.00" class="input_frm" required>
       <input name="bnt_aceptar" id="btn_aceptar" type="button" class="btn_frm_aceptar" value="Aceptar" onclick="altaPago('<?php echo $id_alumno?>', <?php echo $id_concepto?>, '<?php echo date("Y/m/d")?>', <?php echo $precio?>)"/>
      </div>
</div>

<?php } else { ?>
  <div id="div_no_encontrado">
    <h2>No se encontro al alumno</h2>
  </div>
<?php  }?>
