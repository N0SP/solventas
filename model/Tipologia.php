<?php
	require "Conexion.php";

	class Tipologia{
	
		
		public function __construct(){
		}

		public function Registrar($Descripcion_Tipologia, $Abreviatura_Tipologia, $Estatus_Tipologia, $Orden_Tipologia){
			global $conexion;
			$sql = "INSERT INTO tipologia_aeronaval(Descripcion_Tipologia, Abreviatura_Tipologia, Estatus_Tipologia, Orden_Tipologia)
						VALUES('$Descripcion_Tipologia', '$Abreviatura_Tipologia', $Estatus_Tipologia, $Orden_Tipologia)";
			$query = $conexion->query($sql);
			return $query;
		}
		
		public function Modificar($Id_Tipologia_Aeronaval, $Descripcion_Tipologia, $Abreviatura_Tipologia, $Estatus_Tipologia, $Orden_Tipologia){
			global $conexion;
			$sql = "UPDATE tipologia_aeronaval set Descripcion_Tipologia = '$Descripcion_Tipologia', Abreviatura_Tipologia = '$Abreviatura_Tipologia', Estatus_Tipologia = $Estatus_Tipologia, Orden_Tipologia = $Orden_Tipologia
						WHERE Id_Tipologia_Aeronaval = $Id_Tipologia_Aeronaval";
			$query = $conexion->query($sql);
			return $query;
		}
		
		public function Eliminar($Id_Tipologia_Aeronaval){
			global $conexion;
			$sql = "UPDATE tipologia_aeronaval set Estatus_Tipologia = 0 WHERE Id_Tipologia_Aeronaval = $Id_Tipologia_Aeronaval";
			$query = $conexion->query($sql);
			return $query;
		}

		public function Listar(){
			global $conexion;
			$sql = "select * from tipologia_aeronaval";
			$query = $conexion->query($sql);
			return $query;
		}

		public function Validar($Nombre_Tipologia){
			global $conexion;
			$sql = "SELECT * From tipologia_aeronaval WHERE Descripcion_Tipologia = '$Descripcion_Tipologia' AND  Id_Tipologia_Aeronaval  <> 'Id_Tipologia_Aeronaval'";
			$query = $conexion->query($sql);
			return $query;
		}

		public function VerTipo_Tipologia(){
			global $conexion;
			$sql = "select Descripcion_Tipologia from tipologia_aeronaval where Estatus_Tipologia='1'";
			$query = $conexion->query($sql);
			return $query;
		}
	}
