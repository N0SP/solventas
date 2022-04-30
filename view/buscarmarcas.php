<?php
$html = "";


require "../model/Conexion.php";
global $conexion;
$seleccion = $_POST["medioelegido"];


$result = $conexion->query(
    //  "SELECT Id_Provincia_Aeronaval, Id_Region, Nombre_Provincia FROM provincias_aeronaval WHERE Id_Region = ' . $seleccion . '");
    "SELECT Id_Marcas_Aeronaval, Id_Medio, Nombre_Marca FROM marcas_aeronaval WHERE Id_Medio = $seleccion"
);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $html .= '<option value="' . $row['Id_Marcas_Aeronaval'] . '">' . $row['Nombre_Marca'] . '</option>';
    }
}

echo $html;
