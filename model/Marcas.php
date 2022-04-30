<?php
	require "Conexion.php";

	class Marcas{
	
		
		public function __construct(){
		}

		public function Registrar($Nombre_Marca, $estatus, $Orden_Marca, $cboMedio){
			global $conexion;
			$sql = "INSERT INTO marcas_aeronaval(Nombre_Marca, Estatus_Marca, Orden_Marca, Id_Medio)
						VALUES('$Nombre_Marca', $estatus, $Orden_Marca, $cboMedio)";
			$query = $conexion->query($sql);
			return $query;
		}
		
		public function Modificar($Id_Marcas_Aeronaval, $Nombre_Marca, $Estatus_Marca, $Orden_Marca, $Id_Medio){
			global $conexion;
			$sql = "UPDATE marcas_aeronaval set Nombre_Marca = '$Nombre_Marca', Estatus_Marca = $Estatus_Marca, Orden_Marca = $Orden_Marca,
						Id_Medio = $Id_Medio WHERE Id_Marcas_Aeronaval = $Id_Marcas_Aeronaval";
			$query = $conexion->query($sql);
			return $query;
		}
		
		public function Eliminar($Id_Marcas_Aeronaval){
			global $conexion;
			$sql = "UPDATE marcas_aeronaval set Estatus_Marca = 0 WHERE Id_Marcas_Aeronaval = $Id_Marcas_Aeronaval";
			$query = $conexion->query($sql);
			return $query;
		}

		public function Listar(){
			global $conexion;
			$sql = "Select a.Id_Marcas_Aeronaval, a.Nombre_Marca, a.Estatus_Marca, a.Orden_Marca, a.Id_Medio, m.Nombre_Medio as Medio
			        from marcas_aeronaval a inner join medios_transporte m on a.Id_Medio=m.Id_Medio_Transporte";
			$query = $conexion->query($sql);
			return $query;
		}

		public function Validar($Nombre_Marca, $Id_Marcas_Aeronaval){
			global $conexion;
			$sql = "SELECT * From marcas_aeronaval WHERE nombre_marca = '$Nombre_Marca' AND  Id_Marcas_Aeronaval  <> '$Id_Marcas_Aeronaval'";
			$query = $conexion->query($sql);
			return $query;
		}

		public function VerTipo_Medio(){
			global $conexion;
			$sql = "select * from medios_transporte where Estatus_Medio='1'";
			$query = $conexion->query($sql);
			return $query;
		}

	}
