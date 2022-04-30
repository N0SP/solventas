<?php

	session_start();

	require_once "../model/Regiones.php";

	$objRegiones = new Regiones();

	switch ($_GET["op"]) {

		case 'SaveOrUpdate':			
			$estatus=false;
			$Id_Region_Aeronaval = $_POST["Id_Region_Aeronaval"];
			if(isset($_POST["Estatus_Region"])) {
				$estatus = true;
			} else {
				$estatus= false;
			}
			$Nombre_Region = $_POST["Nombre_Region"];
//			$Estatus_Region = $_POST["Estatus_Region"];
			$Orden_Region = $_POST["Orden_Region"];
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
//if($objRegiones->Validar($Nombre_Region)){
//	echo "No existe";
//} else  {
//	echo "Región ya existe";
//	break;
//}

				if(empty($_POST["Id_Region_Aeronaval"])){
					if($objRegiones->Registrar($Nombre_Region, $estatus, $Orden_Region)){
						echo "Región Registrada";
					}else{
						echo "Región no ha podido ser registada.";
					}
				}else{
					
					$Id_Region_Aeronaval = $_POST["Id_Region_Aeronaval"];
					if($objRegiones->Modificar($Id_Region_Aeronaval, $Nombre_Region, $estatus, $Orden_Region)){
						echo "Informacion de la Región ha sido actualizada";
					}else{
						echo "Informacion de la Región no ha podido ser actualizada.";
					}
				}
//			}
//			}else {
//				echo "Formato de imagen inválido";
//			}
			break;

		case "delete":			
			
			$id = $_POST["id"];
			$result = $objRegiones->Eliminar($id);
			if ($result) {
				echo "Eliminada Exitosamente";
			} else {
				echo "No fue Eliminada";
			}
			break;
		
		case "list":
			$query_Tipo = $objRegiones->Listar();
			$data = Array();
            $i = 1;
     		while ($reg = $query_Tipo->fetch_object()) {
     			$data[] = array($reg->Id_Region_Aeronaval,
					"1"=>$reg->Nombre_Region,
				//	"2"=>$reg->Estatus_Region,
					"2"=>($reg->Estatus_Region=="1")?'<span class="badge bg-green">ACTIVO</span>':'<span class="badge bg-red">INACTIVO</span>',
					"3"=>$reg->Orden_Region,
					'<button class="btn btn-warning" data-toggle="tooltip" title="Editar" onclick="cargarDataRegiones('.$reg->Id_Region_Aeronaval.',\''.$reg->Nombre_Region.'\',\''.$reg->Estatus_Region.'\',\''.$reg->Orden_Region.'\')"><i class="fa fa-pencil"></i> </button>&nbsp;'.
					'<button class="btn btn-danger" data-toggle="tooltip" title="Eliminar" onclick="eliminarRegiones('.$reg->Id_Region_Aeronaval.')"><i class="fa fa-trash"></i> </button>');
				$i++;
			}
			$results = array(
            "sEcho" => 1,
        	"iTotalRecords" => count($data),
        	"iTotalDisplayRecords" => count($data),
            "aaData"=>$data);
			echo json_encode($results);
            
			break;

	}
	