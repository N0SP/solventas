<?php
$html = "";


require "../model/Conexion.php";
global $conexion;
$seleccion = $_POST["marcaelegida"];


$result = $conexion->query(
    "SELECT Id_Modelo_Aeronaval, Id_Marca, Nombre_Modelo FROM modelos_aeronaval WHERE Id_Marca = $seleccion"
);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $html .= '<option value="' . $row['Id_Modelo_Aeronaval'] . '">' . $row['Nombre_Modelo'] . '</option>';
    }
}

echo $html;
