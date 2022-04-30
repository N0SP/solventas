<?php
	require "Conexion.php";

	class Provincias{
	
		
		public function __construct(){
		}

		public function Registrar($Nombre_Provincia, $estatus, $Orden_Provincia, $cboRegion){
			global $conexion;
			print_r($cboRegion);
			$sql = "INSERT INTO provincias_aeronaval(Nombre_Provincia, Provincia_Activa, Orden_Provincia, Id_Region)
						VALUES('$Nombre_Provincia', $estatus, $Orden_Provincia, $cboRegion)";
			$query = $conexion->query($sql);
			return $query;
		}
		
		public function Modificar($Id_Provincia_Aeronaval, $Nombre_Provincia, $Provincia_Activa, $Orden_Provincia, $Id_Region){
			global $conexion;
			$sql = "UPDATE provincias_aeronaval set Nombre_Provincia = '$Nombre_Provincia', Provincia_Activa = $Provincia_Activa, Orden_Provincia = $Orden_Provincia,
						Id_Region = $Id_Region WHERE Id_Provincia_Aeronaval = $Id_Provincia_Aeronaval";
			$query = $conexion->query($sql);
			return $query;
		}
		
		public function Eliminar($Id_Provincia_Aeronaval){
			global $conexion;
			$sql = "UPDATE provincias_aeronaval set Provincia_Activa = 0 WHERE Id_Provincia_Aeronaval = $Id_Provincia_Aeronaval";
			$query = $conexion->query($sql);
			return $query;
		}

		public function Listar(){
			global $conexion;
			$sql = "Select a.Id_Provincia_Aeronaval, a.Nombre_Provincia, a.Provincia_Activa, a.Orden_Provincia, a.Id_Region, r.Nombre_Region as Region
			        from provincias_aeronaval a inner join regiones_aeronaval r on a.Id_Region=r.Id_Region_Aeronaval";
			$query = $conexion->query($sql);
			return $query;
		}

		public function Validar($Nombre_Provincia, $Id_Provincia_Aeronaval){
			global $conexion;
			$sql = "SELECT * From provincias_aeronaval WHERE nombre_provincia = '$Nombre_Provincia' AND  Id_Provincia_Aeronaval  <> '$Id_Provincia_Aeronaval'";
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
