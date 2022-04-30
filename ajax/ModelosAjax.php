<?php

	session_start();

	require_once "../model/Modelos.php";

	$objModelos = new Modelos();

	switch ($_GET["op"]) {

		case 'SaveOrUpdate':			
			$estatus=false;
			$Id_Modelo_Aeronaval = $_POST["Id_Modelo_Aeronaval"];
			if(isset($_POST["Estatus_Modelo"])) {
				$estatus = true;
			} else {
				$estatus= false;
			}
			$Nombre_Modelo = $_POST["Nombre_Modelo"];
			$Id_Medio = $_POST["cboMedio"];
			$Id_Marca = $_POST["cboMarca"];
			$Orden_Modelo = $_POST["Orden_Modelo"];
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

				if(empty($_POST["Id_Modelo_Aeronaval"])){
				
					if($objModelos->Registrar($Nombre_Modelo, $estatus, $Orden_Modelo, $Id_Medio, $Id_Marca)){
						echo "Base Registrada";
					}else{
						echo "Base no ha podido ser registada.";
					}
				}else{
					
					$Id_Modelo_Aeronaval = $_POST["Id_Modelo_Aeronaval"];
					if($objModelos->Modificar($Id_Modelo_Aeronaval, $Nombre_Modelo, $estatus, $Orden_Modelo, $Id_Medio, $Id_Marca)){
						echo "Informacion del Modelo ha sido actualizado";
					}else{
						echo "Informacion del Modelo no ha podido ser actualizado.";
					}
				}
//			}
//			}else {
//				echo "Formato de imagen inválido";
//			}
			break;

		case "delete":			
			$id = $_POST["id"];
			$result = $objModelos->Eliminar($id);
			if ($result) {
				echo "Eliminado Exitosamente";
			} else {
				echo "No fue Eliminado";
			}
			break;
		
		case "list":
			$query_Tipo = $objModelos->Listar();
			$data = Array();
            $i = 1;
     		while ($reg = $query_Tipo->fetch_object()) {
     			$data[] = array($reg->Id_Modelo_Aeronaval,
					"1"=>$reg->Nombre_Modelo,
				//	"2"=>$reg->Estatus_Modelo,
					"2"=>($reg->Estatus_Modelo=="1")?'<span class="badge bg-green">ACTIVO</span>':'<span class="badge bg-red">INACTIVO</span>',
					"3"=>$reg->Medio,
					"4"=>$reg->Marca,
					"5"=>$reg->Orden_Modelo,
				
					'<button class="btn btn-warning" data-toggle="tooltip" title="Editar" onclick="cargarDataModelos('.$reg->Id_Modelo_Aeronaval.',\''.$reg->Nombre_Modelo.'\',\''.$reg->Estatus_Modelo.'\',\''.$reg->Id_Medio.'\',\''.$reg->Id_Marca.'\',\''.$reg->Orden_Modelo.'\')"><i class="fa fa-pencil"></i> </button>&nbsp;'.
					'<button class="btn btn-danger" data-toggle="tooltip" title="Eliminar" onclick="eliminarModelos('.$reg->Id_Modelo_Aeronaval.')"><i class="fa fa-trash"></i> </button>');
				$i++;
			}
			$results = array(
            "sEcho" => 1,
        	"iTotalRecords" => count($data),
        	"iTotalDisplayRecords" => count($data),
            "aaData"=>$data);
			echo json_encode($results);
     
			break;

			case "listTipo_Medio":
	
		        $query_tipo_Medio = $objModelos->VerTipo_Medio();
		        while ($reg = $query_tipo_Medio->fetch_object()) {
		            echo '<option value=' . $reg->Id_Medio_Transporte . '>' . $reg->Nombre_Medio . '</option>';
		        }

		    break;

			case "listTipo_Marca":
						$query_tipo_Marca = $objModelos->VerTipo_Marca();
						while ($reg = $query_tipo_Marca->fetch_object()) {
							echo '<option value=' . $reg->Id_Marcas_Aeronaval . '>' . $reg->Nombre_Marca . '</option>';
						}
		
			break;

	}
	