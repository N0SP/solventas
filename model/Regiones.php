<?php
	require "Conexion.php";

	class Regiones{
	
		
		public function __construct(){
		}

		public function Registrar($Nombre_Region, $Estatus_Region, $Orden_Region){
			global $conexion;
			$sql = "INSERT INTO regiones_aeronaval(Nombre_Region, Estatus_Region, Orden_Region)
						VALUES('$Nombre_Region', $Estatus_Region, $Orden_Region)";
			$query = $conexion->query($sql);
			return $query;
		}
		
		public function Modificar($Id_Region_Aeronaval, $Nombre_Region, $Estatus_Region, $Orden_Region){
			global $conexion;
			$sql = "UPDATE regiones_aeronaval set Nombre_Region = '$Nombre_Region', Estatus_Region = $Estatus_Region, Orden_Region = $Orden_Region
						WHERE Id_Region_Aeronaval = $Id_Region_Aeronaval";
			$query = $conexion->query($sql);
			return $query;
		}
		
		public function Eliminar($Id_Region_Aeronaval){
			global $conexion;
			$sql = "UPDATE regiones_aeronaval set Estatus_Region = 0 WHERE Id_Region_Aeronaval = $Id_Region_Aeronaval";
			$query = $conexion->query($sql);
			return $query;
		}

		public function Listar(){
			global $conexion;
			$sql = "select * from regiones_aeronaval";
			$query = $conexion->query($sql);
			return $query;
		}

		public function Validar($Nombre_Region){
			global $conexion;
			$sql = "SELECT * From regiones_aeronaval WHERE nombre_region = '$Nombre_Region' AND  Id_Region_Aeronaval  <> 'Id_Region_Aeronaval'";
			$query = $conexion->query($sql);
			return $query;
		}

		public function VerTipo_Region(){
			global $conexion;
			$sql = "select Nombre_Region from regiones_aeronaval where Estatus_Region='1'";
			$query = $conexion->query($sql);
			return $query;
		}
	}
