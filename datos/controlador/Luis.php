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
	

	public function guardar_url_base_page(){
		$sql = "update configuracion SET valor=\"$this->urldata\" where nombre=\"$this->noms\"";
		Ejecutor::doit($sql);
	}

	public static function fromRGB($R, $G, $B){
	    $R = dechex($R);
	    if (strlen($R)<2)
	    $R = '0'.$R;

	    $G = dechex($G);
	    if (strlen($G)<2)
	    $G = '0'.$G;

	    $B = dechex($B);
	    if (strlen($B)<2)
	    $B = '0'.$B;

	    return '#' . $R . $G . $B;
	}

	public static function promedioColorImagen($rutaImagen){
		$finfo=finfo_open(FILEINFO_MIME_TYPE);
		$fileMime=finfo_file($finfo, $rutaImagen);
		if($fileMime=="image/jpeg" || $fileMime=="image/pjpeg")
			$imgId=imagecreatefromjpeg($rutaImagen);
		elseif($fileMime=="image/gif")
			$imgId=imagecreatefromgif($rutaImagen);
		elseif($fileMime=="image/png")
			$imgId=imagecreatefrompng($rutaImagen);
		elseif($fileMime=="image/webp")
			$imgId=imagecreatefromwebp($rutaImagen);
		else
			return array(0,0,0);
		$red=0;
		$green=0;
		$blue=0;
		$total=0;
		for ($x=0;$x<imagesx($imgId);$x++){
			for ($y=0;$y<imagesy($imgId);$y++){
				$rgb=imagecolorat($imgId,$x,$y);
				$red+=($rgb >> 16) & 0xFF;
				$green+=($rgb >> 8) & 0xFF;
				$blue+=$rgb & 0xFF;
				$total++;
			}
		}
		$redPromedio = round($red/$total);
		$greenPromedio = round($green/$total);
		$bluePromedio = round($blue/$total);
		return array($redPromedio,$greenPromedio,$bluePromedio);
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

	

	public static function codigo(){
		$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
		$codigos = "";
		for($i=0;$i<11;$i++){
			$codigos .= $alphabeth[rand(0,strlen($alphabeth)-1)];
		}
		return $codigos;
	}

	public static function formatstyle($datastyle){
		$formatstyles="<link rel=\"stylesheet\" type=\"text/css\" href=\"".Luis::basepage("base_page")."datos/modulos/".Luis::temass()."/source/estilos/".$datastyle.".css\">";
		return $formatstyles;
	}

	public static function formatscript($datascript){
		$formatscripts="<script type='text/javascript' src='".Luis::basepage("base_page")."datos/modulos/".Luis::temass()."/source/scripts/".$datascript.".js'></script>";
		return $formatscripts;
	}

	public static function currentpage($page,$yh){
		if(isset($_GET["paginas"])){
			$urb=explode("/", $_GET["paginas"]);
			if(isset($urb[0])){$urb0=$urb[0];}else{$urb0=false;}
		}
		
		if($page==="restaurante"){
			$itemscurrent=DatosCarta::porUkr($yh);
			$itemsviewslist = DatosCarta::porUkr_items_page($yh);
			if($itemsviewslist){
				$itempage_view=$itemsviewslist;
				$pagecurrent=false;
				$cartacurrent=false;
				$itemscurrent=false;
			}elseif($itemscurrent){
				$itemscurrent=DatosCarta::porUkr($yh);
				$pagecurrent=false;
				$itempage_view=false;
				$cartacurrent=false;
			}elseif(isset($urb0)){
				$cartacurrent=DatosCarta::carta_view_one($urb0);
				$pagecurrent=false;
				$itemscurrent=false;
				$itempage_view=false;
			}elseif($yh){
				$itemscurrent=false;
				$itempage_view=false;
				$cartacurrent=false;
				$pagecurrent=Luis::menu_porUkr($yh);
			}
			if($itempage_view){
				$pageview="itemsview_list";
			}elseif($itemscurrent){
				$pageview="itemsview";
			}elseif($cartacurrent){
				$pageview=Luis::formatstyle("itemsview"); 
			}elseif($pagecurrent){
				$pageview="itemsview";
			}else{
				$pageview=false;
			}
		}elseif($page==="tienda"){
			$itemscurrent=DatosAdmin::categoriaporUkr($yh);
			$itemsviewslist = DatosAdmin::porUkr_items_page($yh);
			if($itemsviewslist){
				$itempage_view=$itemsviewslist;
				$pagecurrent=false;
				$cartacurrent=false;
				$itemscurrent=false;
			}elseif($itemscurrent){
				$itemscurrent=DatosAdmin::categoriaporUkr($yh);
				$pagecurrent=false;
				$itempage_view=false;
				$cartacurrent=false;
			}elseif(isset($urb0)){
				$cartacurrent=DatosAdmin::categoria_view_one($urb0);
				$pagecurrent=false;
				$itemscurrent=false;
				$itempage_view=false;
			}elseif($yh){
				$itemscurrent=false;
				$itempage_view=false;
				$cartacurrent=false;
				$pagecurrent=Luis::menu_porUkr($yh);
			}
			if($itempage_view){
				$pageview="itemsview_list";
			}elseif($itemscurrent){
				$pageview="itemsview";
			}elseif($cartacurrent){
				$pageview=Luis::formatstyle("itemsview"); 
			}elseif($pagecurrent){
				$pageview="itemsview";
			}else{
				$pageview=false;
			}
		}else{
			$pageview=false;
		}
		return $pageview;
	}

	public static function viewpagelink($pages){
		$fileview = "datos/modulos/".Luis::temass()."/accion/".$pages."/accion-luis.php";
		$fat404="datos/modulos/".Luis::temass()."/accion/404/accion-luis.php";;
		$fat=false;
		if (file_exists($fileview)) {
			include $fileview;
			$fat=$idexhtmls;
		}else{
			include $fat404;
			$fat=$idexhtmls;
		}
		return $fat;
		
		 
	}

	public static function currentpagemenu($upl,$hm){
		if(isset($_GET['paginas'])){
			$urb=explode("/", $_GET["paginas"]);
			if(isset($urb[0])){$urb0=$urb[0];}else{$urb0=false;}
			if ($hm==1) {
				$actmenty = match($urb0){
					"index" => 'menu_activo',
					$urb0 => $upl,
					default => '',
				};
			}else{
				if ($_GET["paginas"]==$upl) {
					$actmenty = 'menu_activo';
				}else{
					$actmenty=false;
				}
			}
		}else{
			if($hm==1){
				$actmenty='menu_activo '.$hm;
			}else{
				$actmenty=false;
			}
			
		}
		return $actmenty;
	}


	public static function styles($sts){
		if ($sts){
		    $urb0b=$sts;
		    if(isset($_GET["paginas"])){
				$urb=explode("/", $_GET["paginas"]);
			}
		    if(isset($urb[0])){$urb0=$urb[0];}else{$urb0=false;}
			$estilo_page = match($sts){
					"inicio" => "cssindex",
					$urb0b => Luis::currentpage(Luis::temass(),$sts),
					$urb0."/".$urb0b => Luis::currentpage(Luis::temass(),$sts),
					"404" => "404",
					default => '',
				};
		}else{
			if(isset($_GET["paginas"])){
				$urb=explode("/", $_GET["paginas"]);
				if(isset($urb[0])){$urb0=$urb[0];}else{$urb0=false;}
				if(isset($urb[1])){$urb1=$urb[1];}else{$urb1=false;}
				if(isset($urb[2])){$urb2=$urb[2];}else{$urb2=false;}
				if(isset($urb[3])){$urb3=$urb[3];}else{$urb3=false;}

				$verrifiv_pad = Luis::currentpage(Luis::temass(),$urb1);
				if($verrifiv_pad){ $urb_null=$verrifiv_pad; }else{$urb_null="non_sl";}

				$page_style=$_GET["paginas"];
				$estilo_page = match($page_style){
					"index" => Luis::formatstyle("cssindex"),
					"carrito" => Luis::formatstyle("carrito_style"),
					"perfil" => Luis::formatstyle("perfil_style"),
					"menulk" => Luis::formatstyle("menulk"),
					"perfil/".$urb1 => Luis::formatstyle("perfil_style"),
					"serv/".$urb1 => Luis::formatstyle("services"),
					$urb0 => Luis::currentpage(Luis::temass(),false),		
					$urb0."/".$urb1 => Luis::formatstyle($urb_null),				
					"404" => Luis::formatstyle("404"),
					default => '',
				};
			}else{
				$estilo_page=Luis::formatstyle("cssindex");
			}
		}
		
		return $estilo_page;
	}

	public static function scripts_footer(){
		if(isset($_SESSION["usuarioid"]) && $_SESSION["usuarioid"]!=""){
			if(isset($_GET["paginas"])){
				$urb=explode("/", $_GET["paginas"]);
				if(isset($urb[0])){$urb0=$urb[0];}else{$urb0=false;}
				if(isset($urb[1])){$urb1=$urb[1];}else{$urb1=false;}
				if(isset($urb[2])){$urb2=$urb[2];}else{$urb2=false;}
				if(isset($urb[3])){$urb3=$urb[3];}else{$urb3=false;}
				$page_script=$_GET["paginas"];
				$script_page = match($page_script){
					"carta" => Luis::formatscript("scriptview"),
					"carta/crear" => Luis::formatscript("publiclist"),
					"carrito" => Luis::formatscript("carrito_js"),
					"perfil" => Luis::formatscript("perfil_js"),
					"perfil/".$urb1 => Luis::formatscript("perfil_js"),
					"index" => '',
					default => '',
				};
			}else{
				$script_page="";
			}
		}else{
			if(isset($_GET["paginas"])){
				$urb=explode("/", $_GET["paginas"]);
				if(isset($urb[0])){$urb0=$urb[0];}else{$urb0=false;}
				if(isset($urb[1])){$urb1=$urb[1];}else{$urb1=false;}
				if(isset($urb[2])){$urb2=$urb[2];}else{$urb2=false;}
				if(isset($urb[3])){$urb3=$urb[3];}else{$urb3=false;}
				$page_script=$_GET["paginas"];
				$script_page = match ($page_script){
					"login" => Luis::formatscript("scriptlog"),
					"carrito" => Luis::formatscript("carrito_js"),
					"perfil" => Luis::formatscript("perfil_js"),
					"perfil/".$urb1 => Luis::formatscript("perfil_js"),
					default => '',//Luis::formatscript("scriptlog"),
				};

			}else{
				$script_page="";
			}
		}
		return $script_page;
	}

	

	public static function menu(){
		$sql = "select * from menu where activado=1 ORDER BY posicion ";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new Luis());
	}

	public static function menu_porUkr($ukj){
		$sql = "select * from menu where ukr=\"$ukj\" and activado=1 ORDER BY posicion ";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new Luis());
	}

	public static function dato($id){
		$sql = "select * from configuracion where nombre=\"$id\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new Luis());
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

    public static function ver_certificado( $domain ) {
    	$ssl_check = @fsockopen( 'ssl://' . $domain, 443, $errno, $errstr, 30 );
    	$res = !! $ssl_check;
    	if($ssl_check){ fclose($ssl_check); }
    	return $res;
    }
    
    public static function basepage($base){
    	if(Luis::ver_certificado(Luis::dato("luis_base")->valor)) {
    		$pageURLvalor = "https://";
    	}else{
    		$pageURLvalor = "http://";
    	}

    	if($base==="base_page"){
    		$pagebase = $pageURLvalor.Luis::dato("luis_base")->valor.'/';
    	}elseif($base==="base_page_admin"){
    		$pagebase = $pageURLvalor.Luis::dato("luis_base")->valor."/admin/";
    	}
    	return $pagebase;
    }
    public static function Mostrartitulo($nombres){
		$sql = "select * from menu where nombre=\"$nombres\" and activado=1";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new Luis());
	}
	public static function Mostrartituloukr($uj){
		$sql = "select * from menu where ukr=\"$uj\" and activado=1";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new Luis());
	}
	public static function mostrar_el_color_principal(){
		$sql = "select * from temas where estado=1";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new Luis());
	}
	public static function mostrar_el_color_principal_view($id){
		$sql = "select * from colores where id=\"$id\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new Luis());
	}
	public static function head_init($name){
		$titulopagina_luislopez = Luis::dato("luis_titulo")->valor;
		if(isset($titulopagina_luislopez)==null){
			$titulopagina="";
		}else{
			$titulopagina=$titulopagina_luislopez;
		}
		$nombrepagina_luislopez = Luis::dato("luis_nombre")->valor;
		if(isset($nombrepagina_luislopez)==null){
			$nombrepagina="";
		}else{
			$nombrepagina=$nombrepagina_luislopez;
		}
		$descripcionpagina_luislopez = Luis::dato("luis_descripcion")->valor;
		if(isset($descripcionpagina_luislopez)==null){
			$descripcionpagina="";
		}else{
			$descripcionpagina=$descripcionpagina_luislopez;
		}
		$keywordspagina_luislopez = Luis::dato("luis_keywords")->valor;
		if(isset($keywordspagina_luislopez)==null){
			$keywordspagina="";
		}else{
			$keywordspagina=$keywordspagina_luislopez;
		}
		$verifica_luislopez = Luis::dato("luis_verifica_google")->valor;
		if(isset($verifica_luislopez)==null){
			$verifica="";
		}else{
			$verifica=$verifica_luislopez;
		}
		$search_colors_in_page = Luis::mostrar_el_color_principal()->color_page;
		$colorPrimario_herad = Luis::mostrar_el_color_principal_view($search_colors_in_page);
		if(isset($colorPrimario_herad->color_primario)==null){
			$colorprimarioview='#FFF';
		}else{
			$colorprimarioview=$colorPrimario_herad->color_primario;
		}
		$colorPrimario = $colorprimarioview."0D";
		if(isset($_GET["paginas"])){
			$urb=explode("/", $_GET["paginas"]);
			if(isset($urb[0])){$urb0=$urb[0];}else{$urb0=false;}
			if(isset($urb[1])){$urb1=$urb[1];}else{$urb1=false;}
			$laspaginas = $_GET["paginas"];
			switch($laspaginas){
				case '404':
					if($name==="title"){
					 	$data = "ERROR 404, pagina no encontrada!";
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
				case $_GET["paginas"]:
				    $pld=Luis::Mostrartitulo($_GET["paginas"]);
				    $slpo=DatosAdmin::categoriaporUkr($urb0);
				    $serv=DatosAdmin::serv_view($urb1);
				    if(isset($slpo)){
				    	if($name==="title") {
				    		$data = $slpo->nombre;
				    	}elseif($name==="name"){
				    		$data = html_entity_decode($nombrepagina);
				    	}elseif($name==="description"){
				    		$data = Luis::poner_guion_ur(strip_tags(html_entity_decode($descripcionpagina)));
				    	}elseif($name==="keywords"){
				    		$data = html_entity_decode($keywordspagina);
				    	}elseif($name==="primarycolor"){
				    		$data = $colorPrimario;
				    	}
				    }elseif(isset($serv)){
				    	if($name==="title") {
				    		$data = $serv->nombre;
				    	}elseif($name==="name"){
				    		$data = html_entity_decode($nombrepagina);
				    	}elseif($name==="description"){
				    		$data = Luis::poner_guion_ur(strip_tags(html_entity_decode($descripcionpagina)));
				    	}elseif($name==="keywords"){
				    		$data = html_entity_decode($keywordspagina);
				    	}elseif($name==="primarycolor"){
				    		$data = $colorPrimario;
				    	}
				    }elseif($_GET["paginas"]==="carrito"){
				    	if($name==="title") {
				    		$data = "CARRITO";
				    	}elseif($name==="name"){
				    		$data = html_entity_decode($nombrepagina);
				    	}elseif($name==="description"){
				    		$data = Luis::poner_guion_ur(strip_tags(html_entity_decode($descripcionpagina)));
				    	}elseif($name==="keywords"){
				    		$data = html_entity_decode($keywordspagina);
				    	}elseif($name==="primarycolor"){
				    		$data = $colorPrimario;
				    	}
				    }elseif($_GET["paginas"]==="perfil"){
				    	if($name==="title"){
				    		if(isset($_SESSION['usuarioid'])){
				    			$persona_vieew = DatosAdmin::usuario($_SESSION['usuarioid']);
				    			$titulo_perfil=$persona_vieew->nombreCompleto();
				    		}else{
				    			$titulo_perfil="Perfil";
				    		}
				    		$data = html_entity_decode($titulo_perfil);
				    	}elseif($name==="name"){
				    		$data = html_entity_decode($nombrepagina);
				    	}elseif($name==="description"){
				    		$data = Luis::poner_guion_ur(strip_tags(html_entity_decode($descripcionpagina)));
				    	}elseif($name==="keywords"){
				    		$data = html_entity_decode($keywordspagina);
				    	}elseif($name==="primarycolor"){
				    		$data = $colorPrimario;
				    	}
				    }elseif(isset($pld->ukr)){
				    	if($name==="title") {
				    		$data = $pld->titulo;
				    	}elseif($name==="name"){
				    		$data = html_entity_decode($nombrepagina);
				    	}elseif($name==="description"){
				    		$data = Luis::poner_guion_ur(strip_tags(html_entity_decode($descripcionpagina)));
				    	}elseif($name==="keywords"){
				    		$data = html_entity_decode($keywordspagina);
				    	}elseif($name==="primarycolor"){
				    		$data = $colorPrimario;
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

	public static function httpconfss(){
			if(Luis::ver_certificado(Luis::dato("luis_base")->valor)) {
	    		$pageURLvalor = "https://";
	    	}else{
	    		$pageURLvalor = "http://";
	    	}

	    	if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != '') {
			    header("location: https://".$_SERVER['HTTP_HOST']);
			    echo "hello";
			} else {
			   // header("location: http://".$_SERVER['HTTP_HOST']);
			    echo "string";
			}
	}

	public static function httpconf(){
		$basepagina = Luis::dato("luis_base")->valor;
		if(!empty($_SERVER['HTTP_HOST'])){
			$server_scheme = @$_SERVER["HTTPS"];
			$pageURL = ($server_scheme == "on") ? "https://" : "http://";
			$http_url = $pageURL . $_SERVER['HTTP_HOST'];
			$url = parse_url($pageURL.$_SERVER['HTTP_HOST']);
			if(!empty($url)){
				if($url['scheme'] == 'http') {
					if($http_url != 'http://'.$url['host']){
						echo "1";
						header('Location:'.$url);exit();
					}else if($http_url != 'http://'.$url['host']){
						echo "2";
						header('Location: '."www.".$url);exit();
					}
				}else{
					if($http_url != 'https://'.$url['host']){
						echo "3";
						header('Location: '.$url);exit();
					}else if($http_url != 'https://'.$url['host']){
						echo "4";
						header('Location: '."www.".$url);exit();
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
				}else{
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




	/// iniciar

	public static function persona_cliente($id){
		$sql = "select * from personas where id=$id";
		$query = Ejecutor::doit($sql);
		$found = null;
		$data = new DatosUsuario();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->idioma = $r['idioma'];
			$found = $data;
			break;
		}
		return $found;
	}

	//Creamos una función que detecte el idioma del navegador del cliente.
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
		if (isset($_SESSION["usuarioid"])) {
			$clientes_lang=Luis::persona_cliente($_SESSION["usuarioid"]);
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

	public static function idiomas(){
		$sql = "select * from lang where activado=1";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new Luis());
	}

}