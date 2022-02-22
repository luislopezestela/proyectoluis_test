<?php
class BaseDatos {
	public static $db;
	public static $con;
	function __construct(){
		$this->user="root";
		$this->pass="";
		$this->host="localhost";
	}

	public static function basedatos_p(){
		$datass = "restaurant";
		return $datass;
	}
	function conectar(){
		$con = new mysqli($this->host,$this->user,$this->pass,BaseDatos::basedatos_p());
		$con->query("SET NAMES utf8");
		//$con->query("CREATE DATABASE IF NOT EXISTS " .BaseDatos::basedatos_p()." DEFAULT CHARACTER SET UTF8");
		//mysqli_select_db($con, BaseDatos::basedatos_p());
		if (mysqli_connect_errno()){
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


	public static function creardatabase($nombre){
		$con = new mysqli($this->host,$this->user,$this->pass);
		$con->query("SET NAMES utf8");
		$con->query("CREATE DATABASE IF NOT EXISTS " .$nombre." DEFAULT CHARACTER SET UTF8");
		mysqli_select_db($con, $nombre);
		return $con;
	}
}