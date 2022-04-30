<?php
require "Conexion.php";

class Equipos
{


	public function __construct()
	{
	}

	public function Registrar(
		$Id_Provincia_Aeronaval,
		$Id_Region_Aeronaval,
		$Id_Zona_Aeronaval,
		$Id_Base_Aeronaval,
		$Nombre,
		$Marquilla,
		$Matricula,
		$Matricula_Institucional,
		$Fojas,
		$Archivador,
		$Id_Medio_Transporte,
		$Id_Marca_Vehiculo,
		$Id_Modelo,
		$No_De_Chasis,
		$Id_Color,
		$Numero_De_Motores,
		$Numero,
		$No_Carpetilla,
		$No_Expediente,
		$No_Resolucion,
		$Asignado_a,
		$Fecha_Ult_Asignacion,
		$Fecha_De_Entrega,
		$Fecha_Devolucion,
		$Valor_Seguro,
		$Id_Estado,
		$imagen
	) {
		global $conexion;
		$sql = "INSERT INTO equipos_aprehendidos(Id_Provincia_Aeronaval, Id_Region_Aeronaval, Id_Zona_Aeronaval, Id_Base_Aeronaval, Nombre, Marquilla, Matricula, Matricula_Institucional, Fojas, Archivador, Id_Medio_Transporte, Id_Marca_Vehiculo, Id_Modelo, No_De_Chasis, Id_color, Numero_De_Motores, Numero, No_Carpetilla, No_Expediente, No_Resolucion, Asignado_a, Fecha_Ult_asignacion, Fecha_De_Entrega, Fecha_Devolucion, Valor_Seguro, Id_Estado, Foto)
						VALUES($Id_Provincia_Aeronaval, $Id_Region_Aeronaval, $Id_Zona_Aeronaval, $Id_Base_Aeronaval, '$Nombre', '$Marquilla', '$Matricula', '$Matricula_Institucional', '$Fojas', '$Archivador', $Id_Medio_Transporte, $Id_Marca_Vehiculo, $Id_Modelo, '$No_De_Chasis',
						$Id_Color, $Numero_De_Motores, '$Numero', '$No_Carpetilla', '$No_Expediente', '$No_Resolucion', '$Asignado_a', '$Fecha_Ult_Asignacion', '$Fecha_De_Entrega', '$Fecha_Devolucion', $Valor_Seguro, $Id_Estado, '$imagen')";
		$query = $conexion->query($sql);
		return $query;
	}

	public function Modificar(
		$Id_Equipo_Aeronaval,
		$Id_Provincia_Aeronaval,
		$Id_Region_Aeronaval,
		$Id_Zona_Aeronaval,
		$Id_Base_Aeronaval,
		$Nombre,
		$Marquilla,
		$Matricula,
		$Matricula_Institucional,
		$Fojas,
		$Archivador,
		$Id_Medio_Transporte,
		$Id_Marca_Vehiculo,
		$Id_Modelo,
		$No_De_Chasis,
		$Id_Color,
		$Numero_De_Motores,
		$Numero,
		$No_Carpetilla,
		$No_Expediente,
		$No_Resolucion,
		$Asignado_a,
		$Fecha_Ult_Asignacion,
		$Fecha_De_Entrega,
		$Fecha_Devolucion,
		$Valor_Seguro,
		$Id_Estado,
		$imagen
	) {
		global $conexion;
		$sql = "UPDATE equipos_aprehendidos set Id_Equipo_Aeronaval = $Id_Equipo_Aeronaval, Id_Provincia_Aeronaval = $Id_Provincia_Aeronaval, Id_Region_Aeronaval = $Id_Region_Aeronaval, 
		                Id_Zona_Aeronaval = $Id_Zona_Aeronaval, Id_Base_Aeronaval = $Id_Base_Aeronaval, Nombre = '$Nombre',
						Marquilla = '$Marquilla', Matricula = '$Matricula', Matricula_Institucional = '$Matricula_Institucional',  Fojas = '$Fojas', Archivador = '$Archivador',
						Id_Medio_Transporte = $Id_Medio_Transporte, Id_Marca_Vehiculo = $Id_Marca_Vehiculo, Id_Modelo = $Id_Modelo, No_De_Chasis = '$No_De_Chasis',
						Id_Color= $Id_Color, Numero_De_Motores = $Numero_De_Motores, Numero = '$Numero', No_Carpetilla = '$No_Carpetilla', No_Expediente='$No_Expediente',
						No_Resolucion = '$No_Resolucion', Asignado_a = '$Asignado_a', Fecha_Ult_Asignacion = '$Fecha_Ult_Asignacion', Fecha_De_Entrega = '$Fecha_De_Entrega',  Fecha_Devolucion = '$Fecha_Devolucion',  Valor_Seguro= $Valor_Seguro, Id_Estado = $Id_Estado, Foto = '$imagen'
						WHERE Id_Equipo_Aeronaval = $Id_Equipo_Aeronaval";
		$query = $conexion->query($sql);
		return $query;
	}

	public function Eliminar($idequipo)
	{
		global $conexion;
		//ESTADO = 3 INOPERATIVO

		$sql = "UPDATE equipos_aprehendidos set Estado = '3' WHERE Id_Equipo_Aeronaval = $idequipo";
		$query = $conexion->query($sql);
		return $query;
	}

	public function Listar()
	{
		global $conexion;
		$sql = "SELECT e.Id_Equipo_Aeronaval, e.Id_Provincia_Aeronaval, e.Id_Region_Aeronaval, e.Id_Zona_Aeronaval, e.Id_Base_Aeronaval, e.Nombre, e.Marquilla, e.Matricula, e.Matricula_Institucional, e.Fojas, e.Archivador, 
		e.Id_Medio_Transporte, e.Id_Marca_Vehiculo, e.Id_Modelo, e.No_De_Chasis, e.Id_Color, e.Numero_De_Motores, e.Numero, e.No_Carpetilla,
		e.No_Expediente, e.No_Resolucion, e.Asignado_a, e.Fecha_Ult_Asignacion, e.Fecha_De_Entrega, e.Fecha_Devolucion, e.Valor_Seguro, e.Id_Estado, s.Nombre_Estado as Estado, e.Foto, 
		r.Nombre_Region as Region, p.Nombre_Provincia as Provincia, z.Nombre_Zona as Zona, b.Nombre_Base as Base,
		t.Nombre_Medio as Medio, m.Nombre_Marca as Marca, o.Nombre_Modelo as Modelo  
			FROM equipos_aprehendidos e
			JOIN
			regiones_aeronaval r
				ON e.Id_Region_Aeronaval = r.Id_Region_Aeronaval
			JOIN
			provincias_aeronaval p
				ON e.Id_Provincia_Aeronaval = p.Id_Provincia_Aeronaval
			JOIN
			zonas_aeronaval z
			   ON e.Id_Zona_Aeronaval = z.Id_Zona_Aeronaval
			JOIN
			bases_aeronaval b
			   ON e.Id_Base_Aeronaval = b.Id_Bases_Aeronaval
			JOIN
			medios_transporte t
			   ON e.Id_Medio_Transporte = t.Id_Medio_Transporte
			JOIN
			marcas_aeronaval m
			   ON e.Id_Marca_Vehiculo = m.Id_Marcas_Aeronaval
			JOIN
			modelos_aeronaval o
			   ON e.Id_Modelo = o.Id_Modelo_Aeronaval
			JOIN
			estado_equipos s
			   ON e.Id_Estado = s.Id_Estado";

		$query = $conexion->query($sql);
		return $query;
	}


	public function VerTipo_Region()
	{
		global $conexion;
		$sql = "select * from regiones_aeronaval where Estatus_Region='1'";
		$query = $conexion->query($sql);
		return $query;
	}

	public function VerTipo_Provincia()
	{
		global $conexion;
		$sql = "select * from provincias_aeronaval where Provincia_Activa='1'";
		$query = $conexion->query($sql);
		return $query;
	}

	public function VerTipo_Zona()
	{
		global $conexion;
		$sql = "select * from zonas_aeronaval where Estatus_Zona='1'";
		$query = $conexion->query($sql);
		return $query;
	}

	public function VerTipo_Tipologia()
	{
		global $conexion;
		$sql = "select * from tipologia_aeronaval where Estatus_Tipologia='1'";
		$query = $conexion->query($sql);
		return $query;
	}

	public function VerTipo_Base()
	{
		global $conexion;
		$sql = "select * from Bases_aeronaval where Estatus_Base='1'";
		$query = $conexion->query($sql);
		return $query;
	}

	public function VerTipo_Modelo()
	{
		global $conexion;
		$sql = "select * from modelos_aeronaval where Estatus_Modelo='1'";
		$query = $conexion->query($sql);
		return $query;
	}

	public function VerTipo_Marca()
	{
		global $conexion;
		$sql = "select * from marcas_aeronaval where Estatus_Marca='1'";
		$query = $conexion->query($sql);
		return $query;
	}

	public function VerTipo_Medio()
	{
		global $conexion;
		$sql = "select * from medios_transporte where Estatus_Medio='1'";
		$query = $conexion->query($sql);
		return $query;
	}

	public function VerTipo_Estado()
	{
		global $conexion;
		$sql = "select * from estado_equipos where Estatus_Equipo='1'";
		$query = $conexion->query($sql);
		return $query;
	}
}
