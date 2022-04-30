<?php

	session_start();

	require_once "../model/Marcas.php";

	$objMarcas = new Marcas();

	switch ($_GET["op"]) {

		case 'SaveOrUpdate':			
			$estatus=false;
			$Id_Marcas_Aeronaval = $_POST["Id_Marcas_Aeronaval"];
			if(isset($_POST["Estatus_Marca"])) {
				$estatus = true;
			} else {
				$estatus= false;
			}
			$Nombre_Marca = $_POST["Nombre_Marca"];
			$cboMedio = $_POST["cboMedio"];
			$Orden_Marca = $_POST["Orden_Marca"];
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

				if(empty($_POST["Id_Marcas_Aeronaval"])){
				
					if($objMarcas->Registrar($Nombre_Marca, $estatus, $Orden_Marca, $cboMedio)){
						echo "Marca Registrada";
					}else{
						echo "Marca no ha podido ser registada.";
					}
				}else{
					
					$Id_Marcas_Aeronaval = $_POST["Id_Marcas_Aeronaval"];
					if($objMarcas->Modificar($Id_Marcas_Aeronaval, $Nombre_Marca, $estatus, $Orden_Marca, $cboMedio)){
						echo "Informacion de la Marca ha sido actualizada";
					}else{
						echo "Informacion de la Marca no ha podido ser actualizada.";
					}
				}
//			}
//			}else {
//				echo "Formato de imagen inválido";
//			}
			break;

		case "delete":			
			$id = $_POST["id"];
			$result = $objMarcas->Eliminar($id);
			if ($result) {
				echo "Eliminada Exitosamente";
			} else {
				echo "No fue Eliminada";
			}
			break;
		
		case "list":
			$query_Tipo = $objMarcas->Listar();
			$data = Array();
            $i = 1;
     		while ($reg = $query_Tipo->fetch_object()) {
     			$data[] = array($reg->Id_Marcas_Aeronaval,
					"1"=>$reg->Nombre_Marca,
			//		"2"=>$reg->Estatus_Marca,
					"2"=>($reg->Estatus_Marca=="1")?'<span class="badge bg-green">ACTIVO</span>':'<span class="badge bg-red">INACTIVO</span>',
					"3"=>$reg->Orden_Marca,
					"4"=>$reg->Medio,

					'<button class="btn btn-warning" data-toggle="tooltip" title="Editar" onclick="cargarDataMarcas('.$reg->Id_Marcas_Aeronaval.',\''.$reg->Nombre_Marca.'\',\''.$reg->Estatus_Marca.'\',\''.$reg->Orden_Marca.'\',\''.$reg->Id_Medio.'\')"><i class="fa fa-pencil"></i> </button>&nbsp;'.
					'<button class="btn btn-danger" data-toggle="tooltip" title="Eliminar" onclick="eliminarMarcas('.$reg->Id_Marcas_Aeronaval.')"><i class="fa fa-trash"></i> </button>');
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
	
		        $query_tipo_Medio = $objMarcas->VerTipo_Medio();
		        while ($reg = $query_tipo_Medio->fetch_object()) {
		            echo '<option value=' . $reg->Id_Medio_Transporte . '>' . $reg->Nombre_Medio . '</option>';
		        }

		    break;
	}
	