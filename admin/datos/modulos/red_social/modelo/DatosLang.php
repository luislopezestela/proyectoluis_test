<?php
class DatosLang {
	public static $tabladeusuario = "lang";
	public function __construct(){
		$this->fecha = "NOW()";
	}

	//////////////////////////////////////////////////////

	public static function luis_lang_bd_names($lang = 'spanish') {
		$base = new BaseDatos();
		$con = $base->conectar();
		$sql = "SHOW COLUMNS FROM ".self::$tabladeusuario;
		$query = $con->query($sql);
		$data = array();
			if (mysqli_num_rows($query)) {
				while ($fetched_data = mysqli_fetch_assoc($query)) {
					$data[] = $fetched_data['Field'];
				}
				unset($data[0]);
				unset($data[1]);
				unset($data[2]);
			}
		return $data;
	}



	public static function categoriaDatos($id){
		$sql = "select * from ".self::$tabla." where id=\"$id\"";
		$query = Ejecutor::doit($sql);
		$found = null;
		$data = new DatosCategoria();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->nombre = $r['nombre'];
			$found = $data;
			break;
		}
		return $found;
	}

	public function eliminar(){
		$sql = "delete from ".self::$tabladeusuario." where id=$this->id";
		Ejecutor::doit($sql);
	}

	public static function luis_lang_bd($lang = 'spanish') {
		$sql = "select lang_key, $lang from ".self::$tabladeusuario;
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosLang());
	}

	public static function idiomarecient($id){
		$sql = "select * from ".self::$tabladeusuario." where id=$id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosLang());
	}


	public function add_languages(){
		$sql = "ALTER TABLE lang ADD $this->nombre TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;";
		return Ejecutor::doit($sql);
	}

	public function guardar_cambios_language_files(){
		$sql = "ALTER TABLE lang CHANGE \"$this->columna\" \"$this->data_cols\" TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;";
		return Ejecutor::doit($sql);
	}

	public function eliminar_language_file(){
		$sql = "ALTER TABLE lang DROP \"$this->columna\"";
		return Ejecutor::doit($sql);
	}

	public function add_language_name(){
		$sql ="update ".self::$tabladeusuario." set $this->keyname=\"$this->langdefault\" where lang_key=\"$this->keylangid\"";
		return Ejecutor::doit($sql);
	}

	public function agregar_palabra_languages(){
		$sql = "insert into lang (lang_key) ";
		$sql .= "value(\"$this->lang_key_name\")";
		return Ejecutor::doit($sql);
	}

	public function agregar_palabra_languages_two($id){
		$sql ="update ".self::$tabladeusuario." set $this->columnadata=\"$this->datavalue\" where id=$id";
		return Ejecutor::doit($sql);
	}

}