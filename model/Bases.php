<?php
	require "Conexion.php";

	class Bases{
	
		
		public function __construct(){
		}

		public function Registrar($Nombre_Base, $estatus, $Orden_Base, $Id_Region, $Id_Provincia, $Id_Zona, $Id_Tipologia){
			global $conexion;
			print_r($estatus);
			$sql = "INSERT INTO bases_aeronaval(Nombre_Base, Estatus_Base, Orden_Base, Id_Region, Id_Provincia, Id_Zona, Id_Tipologia)
						VALUES('$Nombre_Base', $estatus, $Orden_Base, $Id_Region, $Id_Provincia, $Id_Zona, $Id_Tipologia)";
			$query = $conexion->query($sql);
			return $query;
		}
		
		public function Modificar($Id_Bases_Aeronaval, $Nombre_Base, $Estatus_Base, $Orden_Base, $Id_Region, $Id_Provincia, $Id_Zona, $Id_Tipologia){
			global $conexion;
			$sql = "UPDATE bases_aeronaval set Nombre_Base = '$Nombre_Base', Estatus_Base = $Estatus_Base, Orden_Base = $Orden_Base,
						Id_Region = $Id_Region, Id_Provincia = $Id_Provincia, Id_Zona = $Id_Zona, Id_Tipologia = $Id_Tipologia WHERE Id_Bases_Aeronaval = $Id_Bases_Aeronaval";
			$query = $conexion->query($sql);
			return $query;
		}
		
		public function Eliminar($Id_Bases_Aeronaval){
			global $conexion;
			$sql = "UPDATE bases_aeronaval set Estatus_Base = 0 WHERE Id_Bases_Aeronaval = $Id_Bases_Aeronaval";
			$query = $conexion->query($sql);
			return $query;
		}

		public function Listar(){
			global $conexion;
			$sql = "SELECT b.Id_Bases_Aeronaval, b.Id_Tipologia, b.Id_Region, b.Id_Provincia, b.Id_Zona, b.Nombre_Base, t.Descripcion_Tipologia as Tipologia, r.Nombre_Region as Region, p.Nombre_Provincia as Provincia, z.Nombre_Zona as Zona, b.Estatus_Base, b.Orden_Base  
			FROM bases_aeronaval b
			JOIN
			regiones_aeronaval r
				ON b.Id_Region = r.Id_Region_Aeronaval
			JOIN
			zonas_aeronaval z
				ON b.Id_Zona = z.Id_Zona_Aeronaval
			JOIN
			provincias_aeronaval p
				ON b.Id_Provincia = p.Id_Provincia_Aeronaval
			JOIN
			tipologia_aeronaval t
				ON b.Id_Tipologia = t.Id_Tipologia_Aeronaval"; 
			$query = $conexion->query($sql);
			return $query;
		}


		public function Validar($Nombre_Base, $Id_Bases_Aeronaval){
			global $conexion;
			$sql = "SELECT * From bases_aeronaval WHERE nombre_base = '$Nombre_Base' AND  Id_Bases_Aeronaval  <> '$Id_Bases_Aeronaval'";
			$query = $conexion->query($sql);
			return $query;
		}

		public function VerTipo_Region(){
			global $conexion;
			$sql = "select * from regiones_aeronaval where Estatus_Region='1'";
			$query = $conexion->query($sql);
			return $query;
		} 

		public function VerTipo_Provincia(){
			global $conexion;
			$sql = "select * from provincias_aeronaval where Provincia_Activa='1'";
			$query = $conexion->query($sql);
			return $query;
		}

		public function VerTipo_Zona(){
			global $conexion;
			$sql = "select * from zonas_aeronaval where Estatus_Zona='1'";
			$query = $conexion->query($sql);
			return $query;
		}

		public function VerTipo_Tipologia(){
			global $conexion;
			$sql = "select * from tipologia_aeronaval where Estatus_Tipologia='1'";
			$query = $conexion->query($sql);
			return $query;
		}

	}
