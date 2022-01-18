<?php
class DatosCarta{
	public static $tabla = "carta";
	public static $categoria_table = "categorias";
	public static $item_table = "items";
	public static $item_table_car = "caracteristica_item";
	public function __construct(){
		$this->fecha = "NOW()";
	}

	public static function porId($id){
		$sql = "select * from ".self::$tabla." where id=$id ORDER BY id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosCarta());
	}

	public static function porUkr($ukr){
		$sql = "select * from ".self::$tabla." where ukr=\"$ukr\" ORDER BY id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosCarta());
	}

	public function update_carta(){
		$sql = " update ".self::$tabla." SET nombre=\"$this->nombre\", ukr=\"$this->ukr\" where id=$this->id";
		Ejecutor::doit($sql);
	}

	public function eliminar_carta(){
		$sql = "delete from ".self::$tabla." where id=$this->id";
		Ejecutor::doit($sql);
	}

	public static function Mostrar_por_sucursal($sucursal,$usuario){
		$sql = "select * from ".self::$tabla." where id_sucursal=$sucursal and id_persona=$usuario ORDER BY id desc";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosCarta());
	}

	public static function Contar_items_de_sucursal($sucursal,$usuario){
		$sql = "select count(*) as c from ".self::$tabla." where id_sucursal=$sucursal and id_persona=$usuario";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosCarta());
	}

	public function agregar(){
		$sql = "insert into ".self::$tabla." (nombre,id_persona,id_sucursal,ukr,fecha)";
		$sql .= "value (\"$this->nombre\",$this->id_persona,$this->id_sucursal,\"$this->ukr\",\"$this->fecha\")";
		return Ejecutor::doit($sql);
	}


	////### view in page ###////
	public static function carta_view_one($ukr){
		$sql = "select * from ".self::$tabla." where ukr=\"$ukr\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosCarta());
	}

	public static function MostrarCartas(){
		$sql = "select * from ".self::$tabla." where estado=1 ORDER BY id desc";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosCarta());
	}


	////### Opciones de carta ####/////

	public function new_option_carta(){
		$sql = "insert into ".self::$categoria_table." (nombre,sucursal,id_carta,ukr,fecha)";
		$sql .= "value (\"$this->nombre\",$this->sucursal,$this->id_carta,\"$this->ukr\",$this->fecha)";
		return Ejecutor::doit($sql);
	}
	
	public function update_option_carta(){
		$sql = " update ".self::$categoria_table." SET nombre=\"$this->nombre\", ukr=\"$this->ukr\" where id=$this->id";
		Ejecutor::doit($sql);
	}

	public static function porUkr_opcion($ukr){
		$sql = "select * from ".self::$categoria_table." where ukr=\"$ukr\" ORDER BY id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosCarta());
	}

	public static function porUkr_opcion_page($ukr){
		$sql = "select * from ".self::$categoria_table." where ukr=\"$ukr\" and estado=1 ORDER BY id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosCarta());
	}

	public static function Mostrar_opciones_carta($carta){
		$sql = "select * from ".self::$categoria_table." where id_carta=$carta ORDER BY id desc";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosCarta());
	}

	public static function porId_opcion($id){
		$sql = "select * from ".self::$categoria_table." where id=$id ORDER BY id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosCarta());
	}

	public static function porId_opcion_all($id){
		$sql = "select * from ".self::$categoria_table." where id_carta=$id ORDER BY id";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosCarta());
	}

	public static function Contar_opciones_carta($ko){
		$sql = "select count(*) as c from ".self::$categoria_table." where id_carta=$ko";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosCarta());
	}

	public function eliminar_opcion_carta(){
		$sql = "delete from ".self::$categoria_table." where id=$this->id";
		Ejecutor::doit($sql);
	}

	/////////####### Items en carta con sus caategorias o opciones ##########//////

	public static function MostrarItems_cartas_opciones($opc){
		$sql = "select * from ".self::$item_table." where carta=$opc ORDER BY id desc";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosCarta());
	}

	public static function MostrarItems_items_opciones($opc){
		$sql = "select * from ".self::$item_table." where categoria=$opc ORDER BY id desc";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosCarta());
	}
	
	public static function porUkr_items($ukr){
		$sql = "select * from ".self::$item_table." where ukr=\"$ukr\" ORDER BY id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosCarta());
	}

	public static function porUkr_items_page($ukr){
		$sql = "select * from ".self::$item_table." where ukr=\"$ukr\" and estado=1  ORDER BY id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosCarta());
	}

	public static function por_opciones_list_view($opc){
		$sql = "select * from ".self::$item_table." where categoria=$opc ORDER BY id desc";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosCarta());
	}

	public static function Contar_items_opciones_carta($ko){
		$sql = "select count(*) as c from ".self::$item_table." where categoria=$ko";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosCarta());
	}

	public static function Contar_items_carta_all($ko){
		$sql = "select count(*) as c from ".self::$item_table." where carta=$ko";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosCarta());
	}

	public static function Contar_items_carta_opciones($ct){
		$sql = "select count(*) as c from ".self::$item_table." where categoria=$ct";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosCarta());
	}

	public function agregar_item_carta(){
		$sql = "insert into ".self::$item_table." (nombre,usuario,sucursal,precio,carta,categoria,ukr,fecha)";
		$sql .= "value (\"$this->nombre\",$this->usuario,$this->sucursal,\"$this->precio\",$this->carta,".(($this->categoria_pol=='')?"NULL":("'".$this->categoria_pol."'")).",\"$this->ukr\",\"$this->fecha\")";
		return Ejecutor::doit($sql);
	}

	public function eliminar_option_item_carta(){
		$sql = "delete from ".self::$item_table." where id=$this->id";
		Ejecutor::doit($sql);
	}

	public function update_items_carta_view(){
		$sql = " update ".self::$item_table." SET nombre=\"$this->nombre\",precio=$this->precio,categoria=".(($this->opcional_select=='')?"NULL":("'".$this->opcional_select."'")).", ukr=\"$this->ukr\" where id=$this->id";
		Ejecutor::doit($sql);
	}

	/* insert caracteristicas items */

	public function insert_caracteristic_item(){
		$sql = "insert into ".self::$item_table_car." (nombre,id_item)";
		$sql .= "value (\"$this->nombre\",$this->id_item)";
		return Ejecutor::doit($sql);
	}
	

}