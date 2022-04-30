<?php

	session_start();

	require_once "../model/Zonas.php";

	$objZonas = new Zonas();

	switch ($_GET["op"]) {

		case 'SaveOrUpdate':			
			$estatus=false;
			$Id_Zona_Aeronaval = $_POST["Id_Zona_Aeronaval"];
			if(isset($_POST["Estatus_Zona"])) {
				$estatus = true;
			} else {
				$estatus= false;
			}
			$Nombre_Zona = $_POST["Nombre_Zona"];
			$Id_Region = $_POST["cboRegion"];
			$Orden_Zona = $_POST["Orden_Zona"];
			$cboRegion = $_POST["cboRegion"];
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

				if(empty($_POST["Id_Zona_Aeronaval"])){
				
					if($objZonas->Registrar($Nombre_Zona, $estatus, $Orden_Zona, $cboRegion)){
						echo "Zona Registrada";
					}else{
						echo "Zona no ha podido ser registada.";
					}
				}else{
					
					$Id_Zona_Aeronaval = $_POST["Id_Zona_Aeronaval"];
					if($objZonas->Modificar($Id_Zona_Aeronaval, $Nombre_Zona, $estatus, $Orden_Zona, $Id_Region)){
						echo "Informacion de la Zona ha sido actualizada";
					}else{
						echo "Informacion de la Zona no ha podido ser actualizada.";
					}
				}
//			}
//			}else {
//				echo "Formato de imagen inválido";
//			}
			break;

		case "delete":			
			$id = $_POST["id"];
			$result = $objZonas->Eliminar($id);
			if ($result) {
				echo "Eliminada Exitosamente";
			} else {
				echo "No fue Eliminada";
			}
			break;
		
		case "list":
			$query_Tipo = $objZonas->Listar();
			$data = Array();
            $i = 1;
     		while ($reg = $query_Tipo->fetch_object()) {
     			$data[] = array($reg->Id_Zona_Aeronaval,
					"1"=>$reg->Nombre_Zona,
			//		"2"=>$reg->Estatus_Zona,
					"2"=>($reg->Estatus_Zona=="1")?'<span class="badge bg-green">ACTIVO</span>':'<span class="badge bg-red">INACTIVO</span>',
					"3"=>$reg->Region,
					"4"=>$reg->Orden_Zona,
					"5"=>$reg->Id_Region,

					'<button class="btn btn-warning" data-toggle="tooltip" title="Editar" onclick="cargarDataZonas('.$reg->Id_Zona_Aeronaval.',\''.$reg->Nombre_Zona.'\',\''.$reg->Estatus_Zona.'\',\''.$reg->Orden_Zona.'\',\''.$reg->Id_Region.'\')"><i class="fa fa-pencil"></i> </button>&nbsp;'.
					'<button class="btn btn-danger" data-toggle="tooltip" title="Eliminar" onclick="eliminarZonas('.$reg->Id_Zona_Aeronaval.')"><i class="fa fa-trash"></i> </button>');
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
		//        require_once "../model/Provincias.php";  //Ya se llama al inicio, no es necesario aqui

		//        $objTipo_Region = new Provincias();      /Se utiliza el mismo objeto ya creado

		        $query_tipo_Region = $objZonas->VerTipo_Region();
		        while ($reg = $query_tipo_Region->fetch_object()) {
		            echo '<option value=' . $reg->Id_Region_Aeronaval . '>' . $reg->Nombre_Region . '</option>';
		        }

		    break;
	}
	