
<?php 
require_once('ingreso-detalle.php');
$where = "";
$sql = "SELECT * FROM detalle_ingreso $where";
$resultado = $conexion->query($sql);

?>
<!-- Conexion a la DB y los datos de la tabla -->
<form method="post" id="insert_form">
<div class="table-responsive" id="tblPrueba2" style="overflow-x: visible;">
<span id="error"></span>
<table id="item_Table" class="table table-striped table-bordered table-condensed table-hover" cellspacing="0" cellpadding="0" width="100%" style="width: 99%;margin: auto;">
<tr>
  <th>Medios</th>
  <th>Serie</th>
  <th>Descripcion</th>
  <th>Marca</th>
  <th>Modelo</th>
  <th>Tipo</th>
  <th>Color</th>
  <th>Año</th>
  <th>Placa</th>
  <th>Stock Ingreso</th>
  <th>Precio</th>  
  <th>Opción</th>
</tr>

<!--<tbody>
  <?php /*
  while($row = $resultado->fetch_array(MYSQLI_ASSOC)){ ?>
  <tr>
    <td><?php echo $row["Id_Medio"]; ?></td>
    <td><?php echo $row["serie"]; ?></td>
    <td><?php echo $row["descripcion"]; ?></td>
    <td><?php echo $row["Id_Marca"]; ?></td>
    <td><?php echo $row["Id_Modelo"]; ?></td>
    <td><?php echo $row["Tipo_Bien"]; ?></td>
    <td><?php echo $row["Color"]; ?></td>
    <td><?php echo $row["Año"]; ?></td>
    <td><?php echo $row["Placa"]; ?></td>
    <td><?php echo $row["stock_ingreso"]; ?></td>
    <td><?php echo $row["precio_compra"]; ?></td>
    <td><button type="button" name="remove" id="#remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td>
  </tr>
  <?php
  }*/
  ?>
</tbody>-->
</table> 
</div>
</div>
 </form>

          