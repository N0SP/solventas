<?php
	require "Conexion.php";

	class Modelos{
	
		
		public function __construct(){
		}

		public function Registrar($Nombre_Modelo, $estatus, $Orden_Modelo, $Id_Medio, $Id_Marca){
			global $conexion;
			$sql = "INSERT INTO modelos_aeronaval(Nombre_Modelo, Estatus_Modelo, Orden_Modelo, Id_Medio, Id_Marca)
						VALUES('$Nombre_Modelo', $estatus, $Orden_Modelo, $Id_Medio, $Id_Marca)";
			$query = $conexion->query($sql);
			return $query;
		}
		
		public function Modificar($Id_Modelo_Aeronaval, $Nombre_Modelo, $Estatus_Modelo, $Orden_Modelo, $Id_Medio, $Id_Marca){
			global $conexion;
			$sql = "UPDATE modelos_aeronaval set Nombre_Modelo = '$Nombre_Modelo', Estatus_Modelo = $Estatus_Modelo, Orden_Modelo = $Orden_Modelo,
						Id_Medio = $Id_Medio, Id_Marca = $Id_Marca WHERE Id_Modelo_Aeronaval = $Id_Modelo_Aeronaval";
			$query = $conexion->query($sql);
			return $query;
		}
		
		public function Eliminar($Id_Modelo_Aeronaval){
			global $conexion;
			$sql = "UPDATE modelos_aeronaval set Estatus_Modelo = 0 WHERE Id_Modelo_Aeronaval = $Id_Modelo_Aeronaval";
			$query = $conexion->query($sql);
			return $query;
		}

		public function Listar(){
			global $conexion;
			$sql = "SELECT m.Id_Modelo_Aeronaval, m.Nombre_Modelo, m.Estatus_Modelo, m.Id_Marca, m.Id_Medio, t.Nombre_Medio as Medio, z.Nombre_Marca as Marca, m.Orden_Modelo  
			FROM modelos_aeronaval m
			JOIN
			medios_Transporte t
				ON m.Id_Medio = t.Id_Medio_Transporte
			JOIN
			marcas_aeronaval z
				ON m.Id_Marca = z.Id_Marcas_Aeronaval";
			 
			$query = $conexion->query($sql);
			return $query;
		}


		public function Validar($Nombre_Modelo, $Id_Modelo_Aeronaval){
			global $conexion;
			$sql = "SELECT * From modelos_aeronaval WHERE nombre_modelo = '$Nombre_Modelo' AND  Id_Modelo_Aeronaval  <> '$Id_Modelo_Aeronaval'";
			$query = $conexion->query($sql);
			return $query;
		}

		public function VerTipo_Medio(){
			global $conexion;
			$sql = "select * from medios_transporte where Estatus_Medio='1'";
			$query = $conexion->query($sql);
			return $query;
		} 

		public function VerTipo_Marca(){
			global $conexion;
			$sql = "select * from marcas_aeronaval where Estatus_Marca='1'";
			$query = $conexion->query($sql);
			return $query;
		}


	}
