<?php
	require "Conexion.php";

	class Zonas{
	
		
		public function __construct(){
		}

		public function Registrar($Nombre_Zona, $estatus, $Orden_Zona, $cboRegion){
			global $conexion;
//			print_r($cboRegion);
			$sql = "INSERT INTO zonas_aeronaval(Nombre_Zona, Estatus_Zona, Orden_Zona, Id_Region)
						VALUES('$Nombre_Zona', $estatus, $Orden_Zona, $cboRegion)";
			$query = $conexion->query($sql);
			return $query;
		}
		
		public function Modificar($Id_Zona_Aeronaval, $Nombre_Zona, $estatus, $Orden_Zona, $Id_Region){
			global $conexion;
			$sql = "UPDATE zonas_aeronaval set Nombre_Zona = '$Nombre_Zona', Estatus_Zona = $estatus, Orden_Zona = $Orden_Zona,
						Id_Region = $Id_Region WHERE Id_Zona_Aeronaval = $Id_Zona_Aeronaval";
			$query = $conexion->query($sql);
			return $query;
		}
		
		public function Eliminar($Id_Zona_Aeronaval){
			global $conexion;
			$sql = "UPDATE zonas_aeronaval set Estatus_Zona = 0 WHERE Id_Zona_Aeronaval = $Id_Zona_Aeronaval";
			$query = $conexion->query($sql);
			return $query;
		}

		public function Listar(){
			global $conexion;
			$sql = "Select a.Id_Zona_Aeronaval, a.Nombre_Zona, a.Estatus_Zona, a.Orden_Zona, a.Id_Region, r.Nombre_Region as Region
			        from zonas_aeronaval a inner join regiones_aeronaval r on a.Id_Region=r.Id_Region_Aeronaval";
			$query = $conexion->query($sql);
			return $query;
		}

		public function Validar($Nombre_Zona, $Id_Zona_Aeronaval){
			global $conexion;
			$sql = "SELECT * From zonas_aeronaval WHERE nombre_zona = '$Nombre_Zona' AND  Id_Zona_Aeronaval  <> '$Id_Zona_Aeronaval'";
			$query = $conexion->query($sql);
			return $query;
		}

		public function VerTipo_Region(){
			global $conexion;
			$sql = "select * from regiones_aeronaval where Estatus_Region='1'";
			$query = $conexion->query($sql);
			return $query;
		}

	}
