<?php
$html = "";
/* if ($_POST["regionelegida"] == 1) {
    $html = '
	<option value="1">Buenos Aires</option>
    <option value="2">Cordoba</option>
    <option value="3">Rosario</option>
    <option value="4">Salta</option>
	';
}
if ($_POST["regionelegida"] == 2) {
    $html = '
	<option value="1">Madrid</option>
    <option value="2">Barcelona</option>
    <option value="3">Sevilla</option>
    <option value="4">Bilbao</option>
	';
}
if ($_POST["regionelegida"] == 3) {
    $html = '
	<option value="1">CDMX</option>
    <option value="2">Monterrey</option>
    <option value="3">Guadalajara</option>
    <option value="4">Tijuana</option>
	';
} */

require "../model/Conexion.php";
global $conexion;
$seleccion = $_POST["zonaelegida"];


$result = $conexion->query(
    "SELECT Id_Bases_Aeronaval, Id_Region, Nombre_Base FROM bases_aeronaval WHERE Id_Zona = $seleccion"
);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $html .= '<option value="' . $row['Id_Bases_Aeronaval'] . '">' . $row['Nombre_Base'] . '</option>';
    }
}

echo $html;
