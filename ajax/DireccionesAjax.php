<?php

	session_start();

	require_once "../model/Direcciones.php";

	$objDirecciones = new Direcciones();

	switch ($_GET["op"]) {

		case 'SaveOrUpdate':			
			$estatus=false;
			$Id_Direccion_Aeronaval = $_POST["Id_Direccion_Aeronaval"];
			if(isset($_POST["Estatus_Direccion"])) {
				$estatus = true;
			} else {
				$estatus= false;
			}
			$Nombre_Direccion = $_POST["Nombre_Direccion"];
//			$Estatus_Direccion = $_POST["Estatus_Direccion"];
			$Orden_Direccion = $_POST["Orden_Direccion"];
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
//if($objDirecciones->Validar($Nombre_Direccion)){
//	echo "No existe";
//} else  {
//	echo "Región ya existe";
//	break;
//}

				if(empty($_POST["Id_Direccion_Aeronaval"])){
					if($objDirecciones->Registrar($Nombre_Direccion, $estatus, $Orden_Direccion)){
						echo "Dirección Registrada";
					}else{
						echo "Dirección no ha podido ser registada.";
					}
				}else{
					
					$Id_Direccion_Aeronaval = $_POST["Id_Direccion_Aeronaval"];
					if($objDirecciones->Modificar($Id_Direccion_Aeronaval, $Nombre_Direccion, $estatus, $Orden_Direccion)){
						echo "Informacion de la Dirección ha sido actualizada";
					}else{
						echo "Informacion de la Dirección no ha podido ser actualizada.";
					}
				}
//			}
//			}else {
//				echo "Formato de imagen inválido";
//			}
			break;

		case "delete":			
			
			$id = $_POST["id"];
			$result = $objDirecciones->Eliminar($id);
			if ($result) {
				echo "Eliminada Exitosamente";
			} else {
				echo "No fue Eliminada";
			}
			break;
		
		case "list":
			//          	$objDirecciones = new Direcciones();
			$query_Tipo = $objDirecciones->Listar();
			$data = Array();
            $i = 1;
     		while ($reg = $query_Tipo->fetch_object()) {
     			$data[] = array($reg->Id_Direccion_Aeronaval,
					"1"=>$reg->Nombre_Direccion,
				//	"2"=>$reg->Estatus_Direccion,
					"2"=>($reg->Estatus_Direccion=="1")?'<span class="badge bg-green">ACTIVO</span>':'<span class="badge bg-red">INACTIVO</span>',
					"3"=>$reg->Orden_Direccion,

					'<button class="btn btn-warning" data-toggle="tooltip" title="Editar" onclick="cargarDataDirecciones('.$reg->Id_Direccion_Aeronaval.',\''.$reg->Nombre_Direccion.'\',\''.$reg->Estatus_Direccion.'\',\''.$reg->Orden_Direccion.'\')"><i class="fa fa-pencil"></i> </button>&nbsp;'.
					'<button class="btn btn-danger" data-toggle="tooltip" title="Eliminar" onclick="eliminarDirecciones('.$reg->Id_Direccion_Aeronaval.')"><i class="fa fa-trash"></i> </button>');
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
	