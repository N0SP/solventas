<?php
require_once('./model/Conexion.php');

function medios_de_transporte($connect)
{ 
 $output = '';
 $query = "SELECT * FROM medios_transporte ORDER BY Nombre_Medio ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["Id_Medio_Transporte"].'">'.$row["Nombre_Medio"].'</option>';
 }
 return $output;
}
function marcas_aeronaval($connect)
{ 
    $output = '';
    $query = "SELECT * FROM marcas_aeronaval ORDER BY Nombre_Marca ASC";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
     $output .= '<option value="'.$row["Id_Marcas_Aeronaval"].'">'.$row["Nombre_Marca"].'</option>';
    }
    return $output;
}

function modelos_aeronaval($connect)
{ 
    $output = '';
    $query = "SELECT * FROM modelos_aeronaval ORDER BY Nombre_Modelo ASC";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
     $output .= '<option value="'.$row["Id_Modelo_Aeronaval"].'">'.$row["Nombre_Modelo"].'</option>';
    }
    return $output;
}

//insert.php;
if(isset($_POST["cboMedio"]))
{
$idingreso =$connect->insert_id;
 for($count = 0; $count < count($_POST["cboMedio"]); $count++)
 {  
  $query = "INSERT INTO detalle_ingreso 
  (idingreso, Id_Medio, serie, descripcion, Id_Marca, Id_Modelo, Tipo_Bien, Color, Año, Placa, stock_ingreso, precio_compra ) 
  VALUES (:cboMedio, :serie, :descripcion, :Id_Marca, :Id_Modelo, :Tipo_Bien, :Color, :Año, :Placa, :stock_ingreso, :precio_compra)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':idingreso'   => $idingreso,
    ':Id_Medio'  => $_POST["cboMedio"][$count], 
    ':serie' => $_POST["serie"][$count], 
    ':descripcion'  => $_POST["descripcion"][$count],
    ':Id_Marca'  => $_POST["cboMarcaIng"][$count],
    ':Id_Modelo'  => $_POST["cboModelo"][$count],
    ':Tipo_Bien'  => $_POST["Tipo_Bien"][$count],
    ':Color'  => $_POST["Color"][$count],
    ':Año'  => $_POST["Año"][$count],
    ':Placa'  => $_POST["Placa"][$count],
    ':stock_ingreso'  => $_POST["stock_ingreso"][$count],
    ':precio_compra'  => $_POST["precio_compra"][$count],
   )
  );
 }
 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo 'ok';
 }
}


?>