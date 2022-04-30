<?php

	session_start();

	require_once "../model/Provincias.php";

	$objProvincias = new Provincias();

	switch ($_GET["op"]) {

		case 'SaveOrUpdate':			
			$estatus=false;
			$Id_Provincia_Aeronaval = $_POST["Id_Provincia_Aeronaval"];
			if(isset($_POST["Provincia_Activa"])) {
				$estatus = true;
			} else {
				$estatus= false;
			}
			$Nombre_Provincia = $_POST["Nombre_Provincia"];
			$Id_Region = $_POST["cboRegion"];
			$Orden_Provincia = $_POST["Orden_Provincia"];
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

				if(empty($_POST["Id_Provincia_Aeronaval"])){
				
					if($objProvincias->Registrar($Nombre_Provincia, $estatus, $Orden_Provincia, $cboRegion)){
						echo "Provincia Registrada";
					}else{
						echo "Provincia no ha podido ser registada.";
					}
				}else{
					
					$Id_Provincia_Aeronaval = $_POST["Id_Provincia_Aeronaval"];
					if($objProvincias->Modificar($Id_Provincia_Aeronaval, $Nombre_Provincia, $estatus, $Orden_Provincia, $Id_Region)){
						echo "Informacion de la Provincia ha sido actualizada";
					}else{
						echo "Informacion de la Provincia no ha podido ser actualizada.";
					}
				}
//			}
//			}else {
//				echo "Formato de imagen inválido";
//			}
			break;

		case "delete":			
			$id = $_POST["id"];
			$result = $objProvincias->Eliminar($id);
			if ($result) {
				echo "Eliminada Exitosamente";
			} else {
				echo "No fue Eliminada";
			}
			break;
		
		case "list":
			$query_Tipo = $objProvincias->Listar();
			$data = Array();
            $i = 1;
     		while ($reg = $query_Tipo->fetch_object()) {
     			$data[] = array($reg->Id_Provincia_Aeronaval,
					"1"=>$reg->Nombre_Provincia,
			//		"2"=>$reg->Provincia_Activa,
					"2"=>($reg->Provincia_Activa=="1")?'<span class="badge bg-green">ACTIVO</span>':'<span class="badge bg-red">INACTIVO</span>',

					"3"=>$reg->Region,
					"4"=>$reg->Orden_Provincia,
					"5"=>$reg->Id_Region,

					'<button class="btn btn-warning" data-toggle="tooltip" title="Editar" onclick="cargarDataProvincias('.$reg->Id_Provincia_Aeronaval.',\''.$reg->Nombre_Provincia.'\',\''.$reg->Provincia_Activa.'\',\''.$reg->Orden_Provincia.'\',\''.$reg->Id_Region.'\')"><i class="fa fa-pencil"></i> </button>&nbsp;'.
					'<button class="btn btn-danger" data-toggle="tooltip" title="Eliminar" onclick="eliminarProvincias('.$reg->Id_Provincia_Aeronaval.')"><i class="fa fa-trash"></i> </button>');
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

		        $query_tipo_Region = $objProvincias->VerTipo_Region();
		        while ($reg = $query_tipo_Region->fetch_object()) {
		            echo '<option value=' . $reg->Id_Region_Aeronaval . '>' . $reg->Nombre_Region . '</option>';
		        }

		    break;
	}
	