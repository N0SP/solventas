<?php

session_start();

require_once "../model/Equipos.php";

$objEquipos = new Equipos();

switch ($_GET["op"]) {

	case 'SaveOrUpdate':
		$Id_Equipo_Aeronaval = isset($_POST['Id_Equipo_Aeronaval']) ? mysqli_real_escape_string($conexion, $_POST['Id_Equipo_Aeronaval']) : false;
		//	$Id_Equipo_Aeronaval = $_POST["Id_Equipo_Aeronaval"];
		$Id_Provincia_Aeronaval = $_POST["cboProvincia"];
		$Id_Region_Aeronaval = $_POST["cboRegion"];
		$Id_Zona_Aeronaval = $_POST["cboZona"];
		$Id_Base_Aeronaval = $_POST["cboBase"];
		$Nombre = $_POST["Nombre"];
		$Marquilla = $_POST["Marquilla"];
		$Matricula = $_POST["Matricula"];
		$Matricula_Institucional = $_POST["Matricula_Institucional"];
		$Fojas = $_POST["Fojas"];
		$Archivador = $_POST["Archivador"];
		$Id_Medio_Transporte = $_POST["cboMedio"];
		$Id_Marca_Vehiculo = $_POST["cboMarca"];
		$Id_Modelo = $_POST["cboModelo"];
		$No_De_Chasis = $_POST["No_De_Chasis"];
		$Id_Color = $_POST["Id_Color"];
		$Numero_De_Motores = $_POST["Numero_De_Motores"];
		$Numero = $_POST["Numero"];
		$No_Carpetilla = $_POST["No_Carpetilla"];
		$No_Expediente = $_POST["No_Expediente"];
		$No_Resolucion = $_POST["No_Resolucion"];
		$Asignado_a = $_POST["Asignado_a"];
		$Fecha_Ult_Asignacion = $_POST["Fecha_Ult_Asignacion"];
		$Fecha_De_Entrega = $_POST["Fecha_De_Entrega"];
		$Fecha_Devolucion = $_POST["Fecha_Devolucion"];
		$Valor_Seguro = $_POST["Valor_Seguro"];
		$Id_Estado = $_POST["cboEstado"];
		$imagen = $_FILES["imagenArt"]["tmp_name"];
		$ruta = $_FILES["imagenArt"]["name"];
		if ($_FILES['imagenArt']['type'] == "image/jpg" || $_FILES['imagenArt']['type'] == "image/jpeg" || $_FILES['imagenArt']['type'] == "image/png" || $_FILES['imagenArt']['name'] == "") {

			if (move_uploaded_file($imagen, "../Files/Articulo/" . $ruta)) {

				if (empty($_POST["Id_Equipo_Aeronaval"])) {

					if ($objEquipos->Registrar(
						$Id_Provincia_Aeronaval,
						$Id_Region_Aeronaval,
						$Id_Zona_Aeronaval,
						$Id_Base_Aeronaval,
						$Nombre,
						$Marquilla,
						$Matricula,
						$Matricula_Institucional,
						$Fojas,
						$Archivador,
						$Id_Medio_Transporte,
						$Id_Marca_Vehiculo,
						$Id_Modelo,
						$No_De_Chasis,
						$Id_Color,
						$Numero_De_Motores,
						$Numero,
						$No_Carpetilla,
						$No_Expediente,
						$No_Resolucion,
						$Asignado_a,
						$Fecha_Ult_Asignacion,
						$Fecha_De_Entrega,
						$Fecha_Devolucion,
						$Valor_Seguro,
						$Id_Estado,
						"Files/Articulo/" . $ruta
					)) {
						echo "Equipo Registrado";
					} else {
						echo "Equipo no ha podido ser registado.";
					}
				} else {

					$Id_Equipo_Aeronaval = $_POST["Id_Equipo_Aeronaval"];
					if ($objEquipos->Modificar(
						$Id_Equipo_Aeronaval,
						$Id_Provincia_Aeronaval,
						$Id_Region_Aeronaval,
						$Id_Zona_Aeronaval,
						$Id_Base_Aeronaval,
						$Nombre,
						$Marquilla,
						$Matricula,
						$Matricula_Institucional,
						$Fojas,
						$Archivador,
						$Id_Medio_Transporte,
						$Id_Marca_Vehiculo,
						$Id_Modelo,
						$No_De_Chasis,
						$Id_Color,
						$Numero_De_Motores,
						$Numero,
						$No_Carpetilla,
						$No_Expediente,
						$No_Resolucion,
						$Asignado_a,
						$Fecha_Ult_Asignacion,
						$Fecha_De_Entrega,
						$Fecha_Devolucion,
						$Valor_Seguro,
						$Id_Estado,
						"Files/Articulo/" . $ruta
					)) {
						echo "Informacion del Equipo ha sido actualizada";
					} else {
						echo "Informacion del Equipo no ha podido ser actualizada.";
					}
				}
			} else {
				$ruta_img = $_POST["txtRutaImgArt"];
				if (empty($_POST["Id_Equipo_Aeronaval"])) {

					if ($objEquipos->Registrar(
						$Id_Equipo_Aeronaval,
						$Id_Provincia_Aeronaval,
						$Id_Region_Aeronaval,
						$Id_Zona_Aeronaval,
						$Id_Base_Aeronaval,
						$Nombre,
						$Marquilla,
						$Matricula,
						$Matricula_Institucional,
						$Fojas,
						$Archivador,
						$Id_Medio_Transporte,
						$Id_Marca_Vehiculo,
						$Id_Modelo,
						$No_De_Chasis,
						$Id_Color,
						$Numero_De_Motores,
						$Numero,
						$No_Carpetilla,
						$No_Expediente,
						$No_Resolucion,
						$Asignado_a,
						$Fecha_Ult_Asignacion,
						$Fecha_De_Entrega,
						$Fecha_Devolucion,
						$Valor_Seguro,
						$Id_Estado,
						$ruta_img
					)) {
						echo "Equipo Registrado";
					} else {
						echo "Equipo no ha podido ser registrado.";
					}
				} else {

					$Id_Equipo_Aeronaval = $_POST["Id_Equipo_Aeronaval"];
					if ($objEquipos->Modificar(
						$Id_Equipo_Aeronaval,
						$Id_Provincia_Aeronaval,
						$Id_Region_Aeronaval,
						$Id_Zona_Aeronaval,
						$Id_Base_Aeronaval,
						$Nombre,
						$Marquilla,
						$Matricula,
						$Matricula_Institucional,
						$Fojas,
						$Archivador,
						$Id_Medio_Transporte,
						$Id_Marca_Vehiculo,
						$Id_Modelo,
						$No_De_Chasis,
						$Id_Color,
						$Numero_De_Motores,
						$Numero,
						$No_Carpetilla,
						$No_Expediente,
						$No_Resolucion,
						$Asignado_a,
						$Fecha_Ult_Asignacion,
						$Fecha_De_Entrega,
						$Fecha_Devolucion,
						$Valor_Seguro,
						$Id_Estado,
						$ruta_img
					)) {
						echo "Informacion del Equipo ha sido actualizada";
					} else {
						echo "Informacion del Equipo no ha podido ser actualizada.";
					}
				}
			}
		} else {
			echo "Formato de imagen inválido";
		}
		break;

	case "delete":

		$id = $_POST["id"];
		$result = $objEquipos->Eliminar($id);
		if ($result) {
			echo "Eliminado Exitosamente";
		} else {
			echo "No fue Eliminado";
		}
		break;

	case "list":
		$query_Tipo = $objEquipos->Listar();
		$data = array();
		$i = 1;
		while ($reg = $query_Tipo->fetch_object()) {

			$data[] = array(
				$reg->Id_Equipo_Aeronaval,
				"1" => $reg->Provincia,
				"2" => $reg->Region,
				"3" => $reg->Zona,
				"4" => $reg->Base,
				"5" => $reg->Nombre,
				"6" => $reg->Marquilla,
				"7" => $reg->Matricula,
				"8" => $reg->Matricula_Institucional,
				"9" => $reg->Fojas,
				"10" => $reg->Archivador,
				"11" => $reg->Medio,
				"12" => $reg->Marca,
				"13" => $reg->Modelo,
				"14" => $reg->No_De_Chasis,
				"15" => $reg->Id_Color,
				"16" => $reg->Numero_De_Motores,
				"17" => $reg->Numero,
				"18" => $reg->No_Carpetilla,
				"19" => $reg->No_Expediente,
				"20" => $reg->No_Resolucion,
				"21" => $reg->Asignado_a,
				"22" => $reg->Fecha_Ult_Asignacion,
				"23" => $reg->Fecha_De_Entrega,
				"24" => $reg->Fecha_Devolucion,
				"25" => $reg->Valor_Seguro,
				"26" => $reg->Id_Estado,
				"27" => '<img width=100px height=100px src="./' . $reg->Foto . '" />',
				'<button class="btn btn-warning" data-toggle="tooltip" title="Editar" onclick="cargarDataEquipos(' . $reg->Id_Equipo_Aeronaval . ',\'' . $reg->Id_Provincia_Aeronaval . '\',
				 \'' . $reg->Id_Region_Aeronaval . '\', \'' . $reg->Id_Zona_Aeronaval . '\', \'' . $reg->Id_Base_Aeronaval . '\', \'' . $reg->Nombre . '\',\'' . $reg->Marquilla . '\',
				 \'' . $reg->Matricula . '\',\'' . $reg->Matricula_Institucional . '\',\'' . $reg->Fojas . '\',\'' . $reg->Archivador . '\', \'' . $reg->Id_Medio_Transporte . '\',
				 \'' . $reg->Id_Marca_Vehiculo . '\', \'' . $reg->Id_Modelo . '\', \'' . $reg->No_De_Chasis . '\' , \'' . $reg->Id_Color . '\' , \'' . $reg->Numero_De_Motores . '\', \'' . $reg->Numero . '\',  \'' . $reg->No_Carpetilla . '\', 
				 \'' . $reg->No_Expediente . '\',  \'' . $reg->No_Resolucion . '\', \'' . $reg->Asignado_a . '\', \'' . $reg->Fecha_Ult_Asignacion . '\', \'' . $reg->Fecha_De_Entrega . '\', \'' . $reg->Fecha_Devolucion . '\', \'' . $reg->Valor_Seguro . '\', 
				 \'' . $reg->Id_Estado . '\', \'' . $reg->Foto . '\')"><i class="fa fa-pencil"></i> </button>&nbsp;' .
					'<button class="btn btn-danger" data-toggle="tooltip" title="Eliminar" onclick="eliminarEquipos(' . $reg->Id_Equipo_Aeronaval . ')"><i class="fa fa-trash"></i> </button>'
			);
			$i++;
		}
		$results = array(
			"sEcho" => 1,
			"iTotalRecords" => count($data),
			"iTotalDisplayRecords" => count($data),
			"aaData" => $data
		);
		echo json_encode($results);

		break;

	case "listTipo_Region":

		$query_tipo_Region = $objEquipos->VerTipo_Region();
		while ($reg = $query_tipo_Region->fetch_object()) {
			echo '<option value=' . $reg->Id_Region_Aeronaval . '>' . $reg->Nombre_Region . '</option>';
		}

		break;

	case "listTipo_Provincia":
		$query_tipo_Provincia = $objEquipos->VerTipo_Provincia();
		while ($reg = $query_tipo_Provincia->fetch_object()) {
			echo '<option value=' . $reg->Id_Provincia_Aeronaval . '>' . $reg->Nombre_Provincia . '</option>';
		}

		break;

	case "listTipo_Zona":
		$query_tipo_Zona = $objEquipos->VerTipo_Zona();
		while ($reg = $query_tipo_Zona->fetch_object()) {
			echo '<option value=' . $reg->Id_Zona_Aeronaval . '>' . $reg->Nombre_Zona . '</option>';
		}
		break;

	case "listTipo_Base":
		$query_tipo_Base = $objEquipos->VerTipo_Base();
		while ($reg = $query_tipo_Base->fetch_object()) {
			echo '<option value=' . $reg->Id_Bases_Aeronaval . '>' . $reg->Nombre_Base . '</option>';
		}
		break;

	case "listTipo_Medio":
		$query_tipo_Medio = $objEquipos->VerTipo_Medio();
		while ($reg = $query_tipo_Medio->fetch_object()) {
			echo '<option value=' . $reg->Id_Medio_Transporte . '>' . $reg->Nombre_Medio . '</option>';
		}
		break;
	case "listTipo_Marca":
		$query_tipo_Marca = $objEquipos->VerTipo_Marca();
		while ($reg = $query_tipo_Marca->fetch_object()) {
			echo '<option value=' . $reg->Id_Marcas_Aeronaval . '>' . $reg->Nombre_Marca . '</option>';
		}
		break;

	case "listTipo_Modelo":
		$query_tipo_Modelo = $objEquipos->VerTipo_Modelo();
		while ($reg = $query_tipo_Modelo->fetch_object()) {
			echo '<option value=' . $reg->Id_Modelo_Aeronaval . '>' . $reg->Nombre_Modelo . '</option>';
		}
		break;

	case "listTipo_Estado":
		$query_tipo_Estado = $objEquipos->VerTipo_Estado();
		while ($reg = $query_tipo_Estado->fetch_object()) {
			echo '<option value=' . $reg->Id_Estado . '>' . $reg->Nombre_Estado . '</option>';
		}
		break;
}
