<?php

	session_start();

	require_once "../model/Medios.php";

	$objMedios = new Medios();

	switch ($_GET["op"]) {

		case 'SaveOrUpdate':			
			$estatus=false;
			$Id_Medio_Transporte = $_POST["Id_Medio_Transporte"];
			if(isset($_POST["Estatus_Medio"])) {
				$estatus = true;
			} else {
				$estatus= false;
			}
			$Nombre_Medio = $_POST["Nombre_Medio"];
			$Orden_Medio = $_POST["Orden_Medio"];
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

				if(empty($_POST["Id_Medio_Transporte"])){
					if($objMedios->Registrar($Nombre_Medio, $estatus, $Orden_Medio)){
						echo "Medio Registrado";
					}else{
						echo "Medio no ha podido ser registado.";
					}
				}else{
					
					$Id_Medio_Transporte = $_POST["Id_Medio_Transporte"];
					if($objMedios->Modificar($Id_Medio_Transporte, $Nombre_Medio, $estatus, $Orden_Medio)){
						echo "Informacion del Medio ha sido actualizado";
					}else{
						echo "Informacion del Medio no ha podido ser actualizado.";
					}
				}
//			}
//			}else {
//				echo "Formato de imagen inválido";
//			}
			break;

		case "delete":			
			
			$id = $_POST["id"];
			$result = $objMedios->Eliminar($id);
			if ($result) {
				echo "Eliminado Exitosamente";
			} else {
				echo "No fue Eliminado";
			}
			break;
		
		case "list":
			$query_Tipo = $objMedios->Listar();
			$data = Array();
			print_r($data);
            $i = 1;
     		while ($reg = $query_Tipo->fetch_object()) {
     			$data[] = array(
					"0"=>'<button type="button" class="btn btn-warning" data-toggle="tooltip" title="Agregar al detalle" onclick="Agregar('.$reg->Id_Medio_Transporte.',\''.$reg->Nombre_Medio.'\')" name="optArtBusqueda[]" data-nombre="'.$reg->Nombre_Medio.'" id="'.$reg->Id_Medio_Transporte.'" value="'.$reg->Id_Medio_Transporte.'" ><i class="fa fa-check" ></i> </button>',
					"1"=>$i,
					"2" =>($reg->Id_Medio_Transporte),
					"3" =>($reg->Nombre_Medio),
					"4"=>($reg->Estatus_Medio=="1")?'<span class="badge bg-green">ACTIVO</span>':'<span class="badge bg-red">INACTIVO</span>',

					'<button class="btn btn-warning" data-toggle="tooltip" title="Editar" onclick="cargarDataMedios('.$reg->Id_Medio_Transporte.',\''.$reg->Nombre_Medio.'\',\''.$reg->Estatus_Medio.'\',\''.$reg->Orden_Medio.'\')"><i class="fa fa-pencil"></i> </button>&nbsp;'.
					'<button class="btn btn-danger" data-toggle="tooltip" title="Eliminar" onclick="eliminarMedios('.$reg->Id_Medio_Transporte.')"><i class="fa fa-trash"></i> </button>');
				$i++;
			}
			$results = array(
            "sEcho" => 1,
        	"iTotalRecords" => count($data),
        	"iTotalDisplayRecords" => count($data),
            "aaData"=>$data);
			echo json_encode($results);
            
			break;


			case "listMedioElegir":
				$query_Tipo = $objMedios->Listar();
				$data = Array();
				$i = 1;
				 while ($reg = $query_Tipo->fetch_object()) {
	
					 $data[] = array(
					    "0"=>'<button type="button" class="btn btn-warning" data-toggle="tooltip" title="Agregar al detalle" onclick="Agregar('.$reg->idarticulo.',\''.$reg->nombre.'\')" name="optArtBusqueda[]" data-nombre="'.$reg->nombre.'" id="'.$reg->idarticulo.'" value="'.$reg->idarticulo.'" ><i class="fa fa-check" ></i> </button>',
					    "1"=>$i,
						"2"=>$reg->Id_Medio_Transporte,
						"3"=>$reg->Nombre_Medio,
					
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
	