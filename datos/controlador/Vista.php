<?php
class Vista {
	public static function load($paginas){
		if(!isset($_GET['paginas'])){
			include "datos/modulos/".Modulo::$modulo."/paginas/".$paginas."/luis_lopez.php";
		}else{
			if(Vista::esValido()){
				$vistas = explode("/", $_GET['paginas']);
				include "datos/modulos/".Modulo::$modulo."/paginas/".$vistas[0]."/luis_lopez.php";				
			}else{
				include "datos/modulos/".Modulo::$modulo."/paginas/index/luis_lopez.php";
				//$basepagina = Luis::basepage("base_page");
				//print "<script>window.location='".$basepagina."404';</script>";
			}
		}
	}
	public static function esValido(){
		$valid=false;
		if(isset($_GET["paginas"])){
			$vistas = explode("/", $_GET['paginas']);
			if(file_exists($file = "datos/modulos/".Modulo::$modulo."/paginas/".$vistas[0]."/luis_lopez.php")){
				$valid = true;
			}
		}
		return $valid;
	}

	public static function Error($message){
		print $message;
	}

	public static function loader_page($opcionretiroentienda){
		include_once "datos/modulos/".Luis::temass()."/accion/inicio/accion-luis.php";
	}

	public static function cargar($opcionretiroentienda){
		include "datos/modulos/index/accion/opcionretiroentienda/accion-luis.php";
	}

	public static function cargarts($opciondeliverienvio){
		include "datos/modulos/index/accion/opciondeliverienvio/accion-luis.php";
	}
	public static function opcionedepago($pago){
		include "datos/modulos/index/accion/".$pago."/accion-luis.php";
	}
}

class LuisLopez {
	public static function load($luis){
	 include "datos/modulos/index/paginas/footer/luis_lopez.php";
	}
}
class FooterMobil {
	public static function load($luis){
	 include "datos/modulos/index/paginas/footer_mobil/luis_lopez.php";
	}
}
class LuisLopezerrorconexion {
	public static function error($luis){
	 include "datos/modulos/index/paginas/errorconexion/luis_lopez.php";
	}
}

class error404 {
	public static function load(){
	 include "datos/modulos/".Luis::temass()."/paginas/404/luis_lopez.php";
	}
}

class error404view {
	public static function load(){
	 include "datos/modulos/".Luis::temass()."/paginas/404/luis_lopez.php";
	}
}

class Headerluislopez {
	public static function load($luis){
	 include "datos/modulos/index/paginas/header/luis_lopez.php";
	}
}
class HeaderMobil {
	public static function load($luis){
	 include "datos/modulos/index/paginas/header_mobil/luis_lopez.php";
	}
}
class Perfil {
	public static function load($luis){
	  include "datos/modulos/index/paginas/menuperfil/luis_lopez.php";
	}
}