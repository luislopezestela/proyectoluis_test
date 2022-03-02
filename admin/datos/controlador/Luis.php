<?php
class Luis {
	public function __construct(){
		$this->get = new Get();
		$this->post = new Post();
		$this->solicitud = new Solicitud();
		$this->cookie = new Cookie();
		$this->session = new Session();
		$this->data = false;
		$this->pagebase = false;
	}

	public static function codigo(){
		$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
		$codigos = "";
		for($i=0;$i<11;$i++){
			$codigos .= $alphabeth[rand(0,strlen($alphabeth)-1)];
		}
		return $codigos;
	}

	public static function formatstyle($datastyle,$opt,$tpl){
		$formatstyles="<link rel=\"stylesheet\" type=\"text/css\" href=\"".Luis::basepage("base_page_admin")."datos/modulos/".Luis::temass()."/source/estilos/".$datastyle.".css\">";
		if($opt){
			$formatstyles.="<link rel=\"stylesheet\" type=\"text/css\" href=\"".Luis::basepage("base_page_admin")."datos/modulos/".Luis::temass()."/source/estilos/".$opt.".css\">";
		}
		if($tpl){
			$formatstyles.="<link rel=\"stylesheet\" type=\"text/css\" href=\"".Luis::basepage("base_page_admin")."datos/modulos/".Luis::temass()."/source/estilos/".$tpl.".css\">";
		}
		return $formatstyles;
	}

	public static function formatscript($datascript){
		$formatscripts="<script type='text/javascript' src='".Luis::basepage("base_page_admin")."datos/modulos/".Luis::temass()."/source/scripts/".$datascript.".js'></script>";
		return $formatscripts;
	}

	public static function styles(){
		if(isset($_SESSION["admin_id"]) && $_SESSION["admin_id"]!=""){
			if(isset($_GET["paginas"])){
				$urb=explode("/", $_GET["paginas"]);
				if(isset($urb[1])){$urb1=$urb[1];}else{$urb1=false;}
				if(isset($urb[2])){$urb2=$urb[2];}else{$urb2=false;}
				if(isset($urb[3])){$urb3=$urb[3];}else{$urb3=false;}
				$page_style=$_GET["paginas"];
				$estilo_page = match($page_style){
					"index" => Luis::formatstyle("stylehome",false,false),
					"carta" => Luis::formatstyle("styleview",false,false),
					"configurar_pagina" => Luis::formatstyle("adminstyle",false,false),
					"carta/crear" => Luis::formatstyle("publiclist",false,false),
					"carta/editar/".$urb2 => Luis::formatstyle("publiclist",false,false),
					"carta/view/".$urb2 => Luis::formatstyle("publiclist","styleview",false),
					"carta/view/".$urb2."/".$urb3 => Luis::formatstyle("publiclist","styleview",false),
					"carta/publicar/".$urb2."/".$urb3 => Luis::formatstyle("publiclist","styleview",false),
					"carta/editar_item/".$urb2."/".$urb3 => Luis::formatstyle("publiclist","styleview",false),
					/// ESTILOS DE RED SOCIAL
					"agregar_idioma" => Luis::formatstyle("publiclist","styleview",false),
					"agregar_nuevas_palabras" => Luis::formatstyle("publiclist","styleview",false),
					"404" => Luis::formatstyle("404",false,false),


					///// estilos de tienda de computo.
					"sucursales" => Luis::formatstyle("pageslist",false,false),
					"sucursales/".$urb1 => Luis::formatstyle("pageslist",false,false),
					"sucursales/".$urb1."/".$urb2 => Luis::formatstyle("pageslist",false,false),
					///-------///
					"categorias" => Luis::formatstyle("pageslist",false,false),
					"categorias/".$urb1 => Luis::formatstyle("pageslist",false,false),
					"categorias/".$urb1."/".$urb2 => Luis::formatstyle("pageslist",false,false),
					"categorias/".$urb1."/".$urb2."/".$urb3 => Luis::formatstyle("pageslist",false,false),
					///------///
					"marcas" => Luis::formatstyle("pageslist",false,false),
					///------///
					"productos" => Luis::formatstyle("productos","pageslist",false),
					"productos/".$urb1 => Luis::formatstyle("productoadd","pageslist",false),
					"productos/".$urb1."/".$urb2 => Luis::formatstyle("productoadd",false,false),
					///------///
					"usuarios" => Luis::formatstyle("productos","pageslist",false),
					"usuarios/".$urb1 => Luis::formatstyle("productos","pageslist",false),
					"usuarios/".$urb1."/".$urb2 => Luis::formatstyle("productos","pageslist",false),
					///------///
					"clientes" => Luis::formatstyle("productos","pageslist",false),
					"clientes/".$urb1 => Luis::formatstyle("productos","pageslist",false),
					"clientes/".$urb1."/".$urb2 => Luis::formatstyle("productos","pageslist",false),
					///------///
					"metododepago" => Luis::formatstyle("productos","pageslist",false),
					///------///
					"proveedores" => Luis::formatstyle("productos","pageslist",false),
					"proveedores/".$urb1 => Luis::formatstyle("productos","pageslist",false),
					"proveedores/".$urb1."/".$urb2 => Luis::formatstyle("productos","pageslist",false),
					///------///
					"ventas" => Luis::formatstyle("ventas",false,false),
					"ventas/vender" => Luis::formatstyle("ventas","pageslist",false),
					"ventas/entregar" => Luis::formatstyle("ventas","pageslist",false),
					"ventas/".$urb1."/".$urb2 => Luis::formatstyle("ventas","pageslist",false),
					///------///
					"devoluciones" => Luis::formatstyle("devols",false,false),
					///------///
					"lotes/".$urb1 => Luis::formatstyle("lotes",false,false),
					///------///

					"gastos" => Luis::formatstyle("productos","pageslist","gastos"),
					"gastos/".$urb1 => Luis::formatstyle("productos","pageslist","gastos"),
					///***/////
					"administrar_idioma" => Luis::formatstyle("productos","pageslist",false),
					"administrar_idioma/".$urb1 => Luis::formatstyle("productos","pageslist",false),

					"administrar_idioma/".$urb1."/".$urb2 => Luis::formatstyle("productos","publiclist","pageslist"),
					/////////////////////////
					default => '',
				};
			}else{
				$estilo_page=Luis::formatstyle("stylehome", false,false);
			}
		}else{
			if(isset($_GET["paginas"])){
				$page_style=$_GET["paginas"];
				$estilo_page = match ($page_style) {
					"login" => Luis::formatstyle("stylelog",false,false),
					"404" => Luis::formatstyle("404",false,false),
					default => Luis::formatstyle("stylelog",false,false),
				};
			}else{
				$estilo_page=Luis::formatstyle("stylelog",false,false);
			}
		}
		return $estilo_page;
	}

	public static function scripts_footer(){
		if(isset($_SESSION["admin_id"]) && $_SESSION["admin_id"]!=""){
			if(isset($_GET["paginas"])){
				$urb=explode("/", $_GET["paginas"]);
				if(isset($urb[1])){$urb1=$urb[1];}else{$urb1=false;}
				if(isset($urb[2])){$urb2=$urb[2];}else{$urb2=false;}
				if(isset($urb[3])){$urb3=$urb[3];}else{$urb3=false;}
				$page_script=$_GET["paginas"];
				$script_page = match($page_script){
					"carta" => Luis::formatscript("scriptview"),
					"carta/crear" => Luis::formatscript("publiclist"),
					"carta/editar/".$urb2 => Luis::formatscript("publiclist"),
					"carta/view/".$urb2 => Luis::formatscript("publiclist"),
					"carta/view/".$urb2."/".$urb3 => Luis::formatscript("publiclist_two"),
					"carta/publicar/".$urb2."/".$urb3 => Luis::formatscript("publiclist_two"),
					"carta/editar_item/".$urb2."/".$urb3 => Luis::formatscript("publiclist_two"),
					////// Script para tienda computo
					"categorias" => Luis::formatscript("categoria"),
					"categorias/".$urb1 => Luis::formatscript("categoria"),
					"categorias/".$urb1."/".$urb2 => Luis::formatscript("subcategoria"),
					///------///
					"marcas" => Luis::formatscript("marca"),
					///------///
					"productos" => Luis::formatscript("productosview"),
					"productos/".$urb1 => Luis::formatscript("productos"),
					"productos/".$urb1."/".$urb2 => Luis::formatscript("productos"),
					///------///
					"usuarios" => Luis::formatscript("users"),
					"usuarios/".$urb1 => Luis::formatscript("usuario"),
					"usuarios/".$urb1."/".$urb2 => Luis::formatscript("usuarioup"),
					///------///
					"clientes" => Luis::formatscript("clientes"),
					"clientes/".$urb1 => Luis::formatscript("clientes"),
					"clientes/".$urb1."/".$urb2 => Luis::formatscript("clientes"),
					///------///
					"proveedores" => Luis::formatscript("proveedor"),
					"proveedores/".$urb1 => Luis::formatscript("proveedor"),
					"proveedores/".$urb1."/".$urb2 => Luis::formatscript("proveedor"),
					///------///
					"ventas/vender" => Luis::formatscript("verder"),
					"ventas/".$urb1 => Luis::formatscript("verder_func"),
					"ventas/ventas_en_linea/".$urb2 => Luis::formatscript("verder_func"),
					"ventas/preparar/".$urb2 => Luis::formatscript("preparar"),
					"ventas/entregar/".$urb2 => Luis::formatscript("preparar"),
					"devoluciones" => Luis::formatscript("devols"),
					///------///
					"lotes" => Luis::formatscript("lotes"),
					"lotes/".$urb1 => Luis::formatscript("lotes"),
					///******///
					"gastos" => Luis::formatscript("gastos"),
					"gastos/".$urb1 => Luis::formatscript("gastos"),
					///------///
					"administrar_idioma" => Luis::formatscript("manage_language"),
					"administrar_idioma/".$urb1."/".$urb2 => Luis::formatscript("manage_language"),
					////////////////////////////////
					"index" => '',
					default => '',
				};
			}else{
				$script_page="";
			}
		}else{
			if(isset($_GET["paginas"])){
				$page_script=$_GET["paginas"];
				$script_page = match ($page_script){
					"login" => Luis::formatscript("scriptlog"),
					default => Luis::formatscript("scriptlog"),
				};
			}else{
				$script_page=Luis::formatscript("scriptlog");
			}
		}
		return $script_page;
	}

	public static function temass(){
		$base = new BaseDatos();
		$con = $base->conectar();
		$sql = "select * from temas where estado=1";
		$query = $con->query($sql);
		while($r = $query->fetch_array()){
			return $r['nombre'];
		}
	}

	public static function listartemas(){
		$sql = "select * from temas";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new Luis());
	}

	public static function noes_principal(){
		$sql = "update temas set estado=0";
		Ejecutor::doit($sql);
	}

	public static function aser_principal($id){
		$sql = "update temas set estado=1 where id=$id";
		Ejecutor::doit($sql);
	}

	public static function listacolores(){
		$sql = "select * from colores";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new Luis());
	}

	public static function cambio_color($color,$id){
		$sql = "update temas set color_admin=$color where id=$id";
		Ejecutor::doit($sql);
	}

	public static function cambio_color_page($color,$id){
		$sql = "update temas set color_page=$color where id=$id";
		Ejecutor::doit($sql);
	}
	

	public static function menu(){
		$sql = "select * from menu where activado=1 ORDER BY posicion ";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new Luis());
	}

	public static function dato($id){
		$sql = "select * from configuracion where nombre=\"$id\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new Luis());
	}

	public static function lang_files_all(){
		$sql = "select * from lang";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new Luis());
	}

	public static function langpages($name){
		$sql = "select * from lang where lang_key=\"$name\" ";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new Luis());
	}


    public static function lenguagedeUsuario(){ 
		$idioma =substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2);
		return $idioma;
	}
	

	public static function lang_data($name){
		$sql = "select * from lang where lang_key=\"$name\" ";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new Luis());
	}

	public static function lang($lap){
		if (isset($_SESSION["admin_id"])) {
			$clientes_lang=DatosUsuario::porId($_SESSION["admin_id"]);
			$pagelangs = Luis::lang_data($lap);
			if($pagelangs){
		    	if($clientes_lang->idioma){
		    		$idiomapages = $clientes_lang->idioma;
		    	}else{
		    		$idiomapages = "spanish";
		    	}
		    	return Luis::lang_data($lap)->$idiomapages;
			}else{
				return html_entity_decode($lap);
			}
		}else{
			$pagelangs = Luis::lang_data($lap);
			if($pagelangs){
		    	if(Luis::lenguagedeUsuario()=="es"){
		    		$idiomapages = "spanish";
		    	}elseif(Luis::lenguagedeUsuario()=="en"){
		    		$idiomapages = "ingles";
		    	}else{
		    		$idiomapages = "spanish";
		    	}
		    	return Luis::lang_data($lap)->$idiomapages;
			}else{
				return html_entity_decode($lap);
			}
		}
    }

	public static function page_conf($id){
		$sql = "select * from pagina where nombre=\"$id\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new Luis());
	}

	public static function poner_guion_ur($url){
        $find = array('&', 'nbsp', ';','"','\r','\n','\t','\r\n');
        $repl = array('', ' ', '',' Pulgadas ',' ',' ',' ',' ');
        $url = str_replace($find, $repl, $url);
        return $url;
    }

    public static function poner_subguion($url){
        $url = strtolower($url);
        $find = array('á','é','í','ó','ú','â','ê','î','ô','û','ã','õ','ç','ñ');
        $repl = array('a','e','i','o','u','a','e','i','o','u','a','o','c','n');
        $url = str_replace($find, $repl, $url);
        $find = array('<','>','div','styletext');
        $url = str_replace($find, '', $url);
        $find = array(' ', '&', '\r\n', '\n','+','amp');
        $url = str_replace($find, '-', $url);
        $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<{^>*>/');
        $repl = array('', '_', '');
        $url = preg_replace($find, $repl, $url);
        return $url;
    }

    public static function basepage($base){
    	if($base==="base_page"){
    		$pagebase = Luis::dato("luis_base")->valor;
    	}elseif($base==="base_page_admin"){
    		$pagebase = Luis::dato("luis_base")->valor."admin/";
    	}
    	return $pagebase;
    }
    public static function Mostrartitulo($nombres){
		$sql = "select * from menu where nombre=\"$nombres\" and activado=1";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new Luis());
	}
	public static function head_init($name){
		$titulopagina = Luis::dato("luis_titulo")->valor;
		$nombrepagina = Luis::dato("luis_nombre")->valor;
		$descripcionpagina = Luis::dato("luis_descripcion")->valor;
		$keywordspagina = Luis::dato("luis_keywords")->valor;
		$verifica = Luis::dato("luis_verifica_google")->valor;
		$colorPrimario = Luis::page_conf("header")->color_primario;
		if(isset($_GET["paginas"])){
			$urb=explode("/", $_GET["paginas"]);
			if(isset($urb[1])){$urb1=$urb[1];}else{$urb1=false;}
			$laspaginas = $_GET["paginas"];
			if(Luis::temass()==="restaurante"){
				switch($laspaginas){
					case $_GET["paginas"]:
					    if($name==="title"){
					    	if(Vista::esValido()){
					    		switch ($laspaginas) {
					    			case 'carta':
					    				$data = 'Carta';
					    				break;
					    			
					    			default:
					    				$data = html_entity_decode($titulopagina);
					    				break;
					    		}
					    	}else{
					    		$data = "ERROR 404, pagina ".$laspaginas." no encontrada!";
					    	}
					    }elseif($name==="name"){
					    	$data = html_entity_decode($nombrepagina);
					    }elseif($name==="description"){
					    	$data = Luis::poner_guion_ur(strip_tags(html_entity_decode($descripcionpagina)));
					    }elseif($name==="keywords"){
					    	$data = html_entity_decode($keywordspagina);
					    }elseif($name==="primarycolor"){
					    	$data = $colorPrimario;
					    }
					    return $data;
						break;
					default:
					    if($name==="title") {
					    	$data = html_entity_decode($titulopagina);
					    }elseif($name==="name"){
					    	$data = html_entity_decode($nombrepagina);
					    }elseif($name==="description"){
					    	$data = Luis::poner_guion_ur(strip_tags(html_entity_decode($descripcionpagina)));
					    }elseif($name==="keywords"){
					    	$data = html_entity_decode($keywordspagina);
					    }elseif($name==="primarycolor"){
					    	$data = $colorPrimario;
					    }
					    return $data;
					    break;
				}
			}elseif(Luis::temass()==="tienda"){
				switch($laspaginas){
					case $_GET["paginas"]:
					    if($name==="title"){
					    	if(Vista::esValido()){
					    		switch ($laspaginas) {
					    			case 'tienda':
					    				$data = 'Tienda';
					    				break;
					    			
					    			default:
					    				$data = html_entity_decode($titulopagina);
					    				break;
					    		}
					    	}else{
					    		$data = "ERROR 404, pagina ".$laspaginas." no encontrada!";
					    	}
					    }elseif($name==="name"){
					    	$data = html_entity_decode($nombrepagina);
					    }elseif($name==="description"){
					    	$data = Luis::poner_guion_ur(strip_tags(html_entity_decode($descripcionpagina)));
					    }elseif($name==="keywords"){
					    	$data = html_entity_decode($keywordspagina);
					    }elseif($name==="primarycolor"){
					    	$data = $colorPrimario;
					    }
					    return $data;
						break;
					default:
					    if($name==="title") {
					    	$data = html_entity_decode($titulopagina);
					    }elseif($name==="name"){
					    	$data = html_entity_decode($nombrepagina);
					    }elseif($name==="description"){
					    	$data = Luis::poner_guion_ur(strip_tags(html_entity_decode($descripcionpagina)));
					    }elseif($name==="keywords"){
					    	$data = html_entity_decode($keywordspagina);
					    }elseif($name==="primarycolor"){
					    	$data = $colorPrimario;
					    }
					    return $data;
					    break;
				}
			}
		}else{
			if($name==="title") {
				$data = html_entity_decode($titulopagina);
			}elseif($name==="name"){
				$data = html_entity_decode($nombrepagina);
			}elseif($name==="description"){
				$data = Luis::poner_guion_ur(strip_tags(html_entity_decode($descripcionpagina)));
			}elseif($name==="keywords"){
				$data = html_entity_decode($keywordspagina);
			}elseif($name==="primarycolor"){
				$data = $colorPrimario;
			}
			return $data;
		}
	}

	public static function httpconf(){
		$basepagina = Luis::dato("luis_base")->valor;
		if(!empty($_SERVER['HTTP_HOST'])){
			$server_scheme = @$_SERVER["HTTPS"];
			$pageURL = ($server_scheme == "on") ? "https://" : "http://";
			$http_url = $pageURL . $_SERVER['HTTP_HOST'];
			$url = parse_url($basepagina);
			if(!empty($url)){
				if($url['scheme'] == 'http') {
					if($http_url != 'http://'.$url['host']){
						header('Location: '.$basepagina);exit();
					}else if($http_url != 'http://'.$url['host']){
						header('Location: '."www.".$basepagina);exit();
					}
				}else{
					if($http_url != 'https://' . $url['host']){
						header('Location: '.$basepagina);exit();
					}else if($http_url != 'https://'.$url['host']){
						header('Location: '."www.".$basepagina);exit();
					}
				}
			}
		}
	}

	public function loadModule($modulo){
			if(!isset($_GET['modulo'])){
				
				Modulo::setModule($modulo);
				include "datos/modulos/".$modulo."/autocarga.php";
				include "datos/modulos/".$modulo."/superinicio.php";
				include "datos/modulos/".$modulo."/ini.php";
			}else{
				Modulo::setModule($_GET['modulo']);
				if(Modulo::esValido()){
					include "datos/modulos/".$_GET['modulo']."/ini.php";
				}else {
					Modulo::Error();
				}
			}
	}

	public static function sectionviewpage($page){
		$bodyconten=$page;
		print $bodyconten;
	}

	public static function viewcartend($page){
		$bodyconten='<div class="contenido100">';
		$bodyconten.=$page;
		$bodyconten.='</div>';
		print $bodyconten;
	}
	public static function viewcartendlistbox($title,$page){
		$bodyconten='<div class="contenidocarrito">';
		$bodyconten.='<p class="mensajedecompletarcompra">'.$title.'</p>';
		$bodyconten.=$page;
		$bodyconten.='</div>';
		print $bodyconten;
	}


	///// iniciar la pagina con detalles y skin
	public function guardar_datos_pagina(){
		$sql = "update configuracion set luis_nombre=\"$this->p_nombre\",luis_titulo=\"$this->p_titulo\",luis_descripcion=\"$this->p_descripcion\",eslogan=\"$this->p_eslogan\" where nombre=$this->id";
		Ejecutor::doit($sql);
	}

}