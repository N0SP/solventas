<?php
	require "Conexion.php";

	class Medios{
	
		
		public function __construct(){
		}

		public function Registrar($Nombre_Medio, $Estatus_Medio, $Orden_Medio){
			global $conexion;
			$sql = "INSERT INTO medios_transporte(Nombre_Medio, Estatus_Medio, Orden_Medio)
						VALUES('$Nombre_Medio', $Estatus_Medio, $Orden_Medio)";
			$query = $conexion->query($sql);
			return $query;
		}
		
		public function Modificar($Id_Medio_Transporte, $Nombre_Medio, $Estatus_Medio, $Orden_Medio){
			global $conexion;
			$sql = "UPDATE medios_transporte set Nombre_Medio = '$Nombre_Medio', Estatus_Medio = $Estatus_Medio, Orden_Medio = $Orden_Medio
						WHERE Id_Medio_Transporte = $Id_Medio_Transporte";
			$query = $conexion->query($sql);
			return $query;
		}
		
		public function Eliminar($Id_Medio_Transporte){
			global $conexion;
			$sql = "UPDATE medios_transporte set Estatus_Medio = 0 WHERE Id_Medio_Transporte = $Id_Medio_Transporte";
			$query = $conexion->query($sql);
			return $query;
		}

		public function Listar(){
			global $conexion;
			$sql = "select * from medios_transporte";
			$query = $conexion->query($sql);
			return $query;
		}

		public function Validar($Nombre_Medio){
			global $conexion;
			$sql = "SELECT * From medios_transporte WHERE Nombre_Medio = '$Nombre_Medio' AND  Id_Medio_Transporte  <> 'Id_Medio_Transporte'";
			$query = $conexion->query($sql);
			return $query;
		}

	}
