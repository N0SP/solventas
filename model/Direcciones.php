<?php
	require "Conexion.php";

	class Direcciones{

		public function __construct(){
		}

		public function Registrar($Nombre_Direccion, $Estatus_Direccion, $Orden_Direccion){
			global $conexion;
			$sql = "INSERT INTO Direcciones_aeronaval(Nombre_Direccion, Estatus_Direccion, Orden_Direccion)
						VALUES('$Nombre_Direccion', $Estatus_Direccion, $Orden_Direccion)";
			$query = $conexion->query($sql);
			return $query;
		}
		
		public function Modificar($Id_Direccion_Aeronaval, $Nombre_Direccion, $Estatus_Direccion, $Orden_Direccion){
			global $conexion;
			$sql = "UPDATE Direcciones_aeronaval set Nombre_Direccion = '$Nombre_Direccion', Estatus_Direccion = $Estatus_Direccion, Orden_Direccion = $Orden_Direccion
						WHERE Id_Direccion_Aeronaval = $Id_Direccion_Aeronaval";
			$query = $conexion->query($sql);
			return $query;
		}
		
		public function Eliminar($Id_Direccion_Aeronaval){
			global $conexion;
			$sql = "UPDATE Direcciones_aeronaval set Estatus_Direccion = 0 WHERE Id_Direccion_Aeronaval = $Id_Direccion_Aeronaval";
			$query = $conexion->query($sql);
			return $query;
		}

		public function Listar(){
			global $conexion;
			$sql = "select * from direcciones_aeronaval order by orden_direccion ASC";
			$query = $conexion->query($sql);
			return $query;
		}

		public function Validar($Nombre_Direccion){
			global $conexion;
			$sql = "SELECT * From Direcciones_aeronaval WHERE nombre_Direccion = '$Nombre_Direccion' AND  Id_Direccion_Aeronaval  <> 'Id_Direccion_Aeronaval'";
			$query = $conexion->query($sql);
			return $query;
		}

		public function VerTipo_Direccion(){
			global $conexion;
			$sql = "select Nombre_Direccion from Direcciones_aeronaval where Estatus_Direccion='1'";
			$query = $conexion->query($sql);
			return $query;
		}
	}
