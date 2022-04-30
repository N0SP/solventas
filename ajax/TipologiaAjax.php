<?php

	session_start();

	require_once "../model/Tipologia.php";

	$objTipologia = new Tipologia();

	switch ($_GET["op"]) {

		case 'SaveOrUpdate':			
			$estatus=false;
			$Id_Tipologia_Aeronaval = $_POST["Id_Tipologia_Aeronaval"];
			if(isset($_POST["Estatus_Tipologia"])) {
				$estatus = true;
			} else {
				$estatus= false;
			}
			$Descripcion_Tipologia = $_POST["Descripcion_Tipologia"];
			$Abreviatura_Tipologia = $_POST["Abreviatura_Tipologia"];
			$Orden_Tipologia = $_POST["Orden_Tipologia"];
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

//if($objTipologia->Validar($Nombre_Tipologia)){
//	echo "No existe";
//} else  {
//	echo "Región ya existe";
//	break;
//}

				if(empty($_POST["Id_Tipologia_Aeronaval"])){
					if($objTipologia->Registrar($Descripcion_Tipologia, $Abreviatura_Tipologia, $estatus, $Orden_Tipologia)){
						echo "Tipologia Registrada";
					}else{
						echo "Tipologia no ha podido ser registada.";
					}
				}else{
					
					$Id_Tipologia_Aeronaval = $_POST["Id_Tipologia_Aeronaval"];
					if($objTipologia->Modificar($Id_Tipologia_Aeronaval, $Descripcion_Tipologia, $Abreviatura_Tipologia, $estatus, $Orden_Tipologia)){
						echo "Informacion de la Tipología ha sido actualizada";
					}else{
						echo "Informacion de la Tipología no ha podido ser actualizada.";
					}
				}
//			}
//			}else {
//				echo "Formato de imagen inválido";
//			}
			break;

		case "delete":			
			
			$id = $_POST["id"];
			$result = $objTipologia->Eliminar($id);
			if ($result) {
				echo "Eliminada Exitosamente";
			} else {
				echo "No fue Eliminada";
			}
			break;
		
		case "list":
			$query_Tipo = $objTipologia->Listar();
			$data = Array();
            $i = 1;
     		while ($reg = $query_Tipo->fetch_object()) {
     			$data[] = array($reg->Id_Tipologia_Aeronaval,
					"1"=>$reg->Descripcion_Tipologia,
					"2"=>$reg->Abreviatura_Tipologia,
		//			"3"=>$reg->Estatus_Tipologia,
					"3"=>($reg->Estatus_Tipologia=="1")?'<span class="badge bg-green">ACTIVO</span>':'<span class="badge bg-red">INACTIVO</span>',
					"4"=>$reg->Orden_Tipologia,

					'<button class="btn btn-warning" data-toggle="tooltip" title="Editar" onclick="cargarDataTipologia('.$reg->Id_Tipologia_Aeronaval.',\''.$reg->Descripcion_Tipologia.'\',\''.$reg->Abreviatura_Tipologia.'\',\''.$reg->Estatus_Tipologia.'\',\''.$reg->Orden_Tipologia.'\')"><i class="fa fa-pencil"></i> </button>&nbsp;'.
					'<button class="btn btn-danger" data-toggle="tooltip" title="Eliminar" onclick="eliminarTipologia('.$reg->Id_Tipologia_Aeronaval.')"><i class="fa fa-trash"></i> </button>');
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
	