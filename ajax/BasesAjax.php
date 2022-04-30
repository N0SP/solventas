<?php

	session_start();

	require_once "../model/Bases.php";

	$objBases = new Bases();

	switch ($_GET["op"]) {

		case 'SaveOrUpdate':			
			$estatus=false;
			$Id_Bases_Aeronaval = $_POST["Id_Bases_Aeronaval"];
			if(isset($_POST["Estatus_Base"])) {
				$estatus = true;
			} else {
				$estatus= false;
			}
			$Nombre_Base = $_POST["Nombre_Base"];
			$Id_Region = $_POST["cboRegion"];
			$Id_Provincia = $_POST["cboProvincia"];
			$Id_Tipologia = $_POST["cboTipologia"];
			$Id_Zona = $_POST["cboZona"];
			$Orden_Base = $_POST["Orden_Base"];
//			$cboRegion = $_POST["cboRegion"];
//			$descripcion = $_POST["txtDescripcion"];
//			$imagen = $_FILES["imagenArt"]["tmp_name"];
//			$ruta = $_FILES["imagenArt"]["name"];

//			if ($_FILES['imagenArt']['type'] == "image/jpg" || $_FILES['imagenArt']['type'] == "image/jpeg" || $_FILES['imagenArt']['type'] == "image/png" || $_FILES['imagenArt']['name'] == "")
//			{
//
//			if(move_uploaded_file($imagen, "../Files/Articulo/".$ruta)){

//				if(empty($_POST["txtIdArticulo"])){
					
//					if($objArticulo->Registrar($idcategoria, $idunidad_medida, $nombre, $descripcion, "Files/Articulo/".$ruta)){
//						echo "Articulo Registrado";
//					}else{
//						echo "Articulo no ha podido ser registado.";
//					}
//				}else{
					
//					$idarticulo = $_POST["txtIdArticulo"];
//					if($objArticulo->Modificar($idarticulo, $idcategoria, $idunidad_medida, $nombre, $descripcion, "Files/Articulo/".$ruta)){
//						echo "Informacion del Articulo ha sido actualizada";
//					}else{
//						echo "Informacion del Articulo no ha podido ser actualizada.";
//					}
//				}
//			} else {
//				$ruta_img = $_POST["txtRutaImgArt"];

//if($objProvincias->Validar($Nombre_Provincia, $Id_Provincia_Aeronaval)){
//	echo "Provincia Validada";
//} else  {
//	echo "Provincia ya existe";
//	break;
//}

				if(empty($_POST["Id_Bases_Aeronaval"])){
				
					if($objBases->Registrar($Nombre_Base, $estatus, $Orden_Base, $Id_Region, $Id_Provincia, $Id_Zona, $Id_Tipologia)){
						echo "Base Registrada";
					}else{
						echo "Base no ha podido ser registada.";
					}
				}else{
					
					$Id_Bases_Aeronaval = $_POST["Id_Bases_Aeronaval"];
					if($objBases->Modificar($Id_Bases_Aeronaval, $Nombre_Base, $estatus, $Orden_Base, $Id_Region, $Id_Provincia, $Id_Zona, $Id_Tipologia)){
						echo "Informacion de la Base ha sido actualizada";
					}else{
						echo "Informacion de la Base no ha podido ser actualizada.";
					}
				}
//			}
//			}else {
//				echo "Formato de imagen inválido";
//			}
			break;

		case "delete":			
			$id = $_POST["id"];
			$result = $objBases->Eliminar($id);
			if ($result) {
				echo "Eliminada Exitosamente";
			} else {
				echo "No fue Eliminada";
			}
			break;
		
		case "list":
			$query_Tipo = $objBases->Listar();
		//	print_r($query_Tipo);
			$data = Array();
            $i = 1;
     		while ($reg = $query_Tipo->fetch_object()) {
     			$data[] = array($reg->Id_Bases_Aeronaval,
					"1"=>$reg->Nombre_Base,
					"2"=>$reg->Tipologia,
					"3"=>$reg->Region,
					"4"=>$reg->Provincia,
					"5"=>$reg->Zona,
		//			"6"=>$reg->Estatus_Base,
	            	"6"=>($reg->Estatus_Base=="1")?'<span class="badge bg-green">ACTIVO</span>':'<span class="badge bg-red">INACTIVO</span>',
					"7"=>$reg->Orden_Base,
				
					'<button class="btn btn-warning" data-toggle="tooltip" title="Editar" onclick="cargarDataBases('.$reg->Id_Bases_Aeronaval.',\''.$reg->Nombre_Base.'\',\''.$reg->Id_Tipologia.'\',\''.$reg->Id_Region.'\',\''.$reg->Id_Provincia.'\',\''.$reg->Id_Zona.'\',\''.$reg->Estatus_Base.'\',\''.$reg->Orden_Base.'\')"><i class="fa fa-pencil"></i> </button>&nbsp;'.
					'<button class="btn btn-danger" data-toggle="tooltip" title="Eliminar" onclick="eliminarBases('.$reg->Id_Bases_Aeronaval.')"><i class="fa fa-trash"></i> </button>');
				$i++;
			}
			$results = array(
            "sEcho" => 1,
        	"iTotalRecords" => count($data),
        	"iTotalDisplayRecords" => count($data),
            "aaData"=>$data);
			echo json_encode($results);
     
			break;

			case "listTipo_Region":
	
		        $query_tipo_Region = $objBases->VerTipo_Region();
		        while ($reg = $query_tipo_Region->fetch_object()) {
		            echo '<option value=' . $reg->Id_Region_Aeronaval . '>' . $reg->Nombre_Region . '</option>';
		        }

		    break;

			case "listTipo_Provincia":
						$query_tipo_Provincia = $objBases->VerTipo_Provincia();
						while ($reg = $query_tipo_Provincia->fetch_object()) {
							echo '<option value=' . $reg->Id_Provincia_Aeronaval . '>' . $reg->Nombre_Provincia . '</option>';
						}
		
			break;

			case "listTipo_Zona":
				$query_tipo_Zona = $objBases->VerTipo_Zona();
				while ($reg = $query_tipo_Zona->fetch_object()) {
					echo '<option value=' . $reg->Id_Zona_Aeronaval . '>' . $reg->Nombre_Zona . '</option>';
				}
			break;

			case "listTipo_Tipologia":
					$query_tipo_Tipologia = $objBases->VerTipo_Tipologia();
					while ($reg = $query_tipo_Tipologia->fetch_object()) {
						echo '<option value=' . $reg->Id_Tipologia_Aeronaval . '>' . $reg->Descripcion_Tipologia . '</option>';
					}
			break;	

			case "listTipo_Base":
				$query_tipo_Base = $objBases->VerTipo_Base();
				while ($reg = $query_tipo_Base->fetch_object()) {
					echo '<option value=' . $reg->Id_Base_Aeronaval . '>' . $reg->Nombre_Base . '</option>';
				}
		break;	

	}
	