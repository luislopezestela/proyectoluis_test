<?php
class BaseDatos {
public static $db;
public static $con;
function __construct(){
	$this->user="root";$this->pass="";$this->host="localhost";$this->ddbb="restaurant";
}
function conectar(){
	$con = new mysqli($this->host,$this->user,$this->pass,$this->ddbb);
	$con->query("SET NAMES utf8");
	if (mysqli_connect_errno()){
		LuisLopezerrorconexion::error("errorconexion");
		exit();
	}
	return $con;
	}
	public static function getCon(){
		if(self::$con==null && self::$db==null){
			self::$db = new BaseDatos();
			self::$con = self::$db->conectar();
		}
		return self::$con;
	}
}