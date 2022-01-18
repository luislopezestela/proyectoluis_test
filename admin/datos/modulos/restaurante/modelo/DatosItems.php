<?php
class DatosItems{
	public static $tabla = "items";
	public function __construct(){
		$this->date = "NOW()";
	}

	public static function Mostrar_por_sucursal($sucursal,$usuario){
		$sql = "select * from ".self::$tabla." where sucursal=$sucursal and usuario=$usuario ORDER BY id";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosItems());
	}

	public static function Contar_items_de_sucursal($sucursal,$usuario){
		$sql = "select count(*) as c from ".self::$tabla." where sucursal=$sucursal and usuario=$usuario";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosItems());
	}
}