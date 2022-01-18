<?php
class DatosAdmin{
	public static $total = 0;
	public static $valortotaldecompra=0;
	public function __construct(){
	}

	public static function poner_guion($url){
        $url = strtolower($url);
        $find = array('á','é','í','ó','ú','â','ê','î','ô','û','ã','õ','ç','ñ');
        $repl = array('a','e','i','o','u','a','e','i','o','u','a','o','c','n');
        $url = str_replace($find, $repl, $url);
        $find = array('<','>','div','styletext');
        $url = str_replace($find, '', $url);
        $find = array(' ', '&', '\r\n', '\n','+','amp');
        $url = str_replace($find, '-', $url);
        $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<{^>*>/');
        $repl = array('', '-', '');
        $url = preg_replace($find, $repl, $url);
        return $url;
    }

	public static function usuario($id){
		$sql = "select * from personas where id=$id";
		$query = Ejecutor::doit($sql);
		$found = null;
		$data = new DatosPagina();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->nombre = $r['nombre'];
			$data->apellido = $r['apellido_paterno'];
			$data->apellido = $r['apellido_materno'];
			$data->dni = $r['dni'];
			$data->correo = $r['correo'];
			$data->pass = $r['pass'];
			$data->celular = $r['celular'];
			$data->direccion = $r['direccion'];
			$data->foto = $r['foto'];
			$data->fecha = $r['fecha'];
			$data->codigo = $r['codigo'];
			$data->estado = $r['estado'];
			$data->tipo = $r['tipo'];
			$found = $data;
			break;
		}
		return $found;
	}

	public static function headerpage(){
		$header="<header>";
		$header.="<nav class=\"menu_administracion\">";
		$header.="<ul class=\"submenu_administracion\">";
		$header.="<li class=\"logo_sistema primer_logotipo\">";
		$header.="<div id=\"optluisfunt\" class=\"icono_menu_de_celular\">";
		$header.="<div class=\"_lineas -uno\"></div>";
		$header.="<div class=\"_lineas -dos\"></div>";
		$header.="<div class=\"_lineas -tres\"></div>";
		$header.="</div>";
		$header.="<h5 class=\"titulosistemahosting\"> <p>Sistema</p> <p>Hosting</p></h5>";
		$header.="</li>";
		$header.="</ul>";
		$header.="</nav> ";
		$header.="<div id=\"hoverlistv\"></div>";
		$header.="</header>";
		return $header;
	}

	public static function page_menu_list($page){
		if(isset($_GET["paginas"])){
		$urb=explode("/", $_GET["paginas"]);
		if(isset($urb[1])){$urb1=$urb[1];}else{$urb1=false;}
		if(isset($urb[2])){$urb2=$urb[2];}else{$urb2=false;}
		if(isset($urb[3])){$urb3=$urb[3];}else{$urb3=false;}
		}
		$home_a=false;
		$configurar_a=false;
		$lista_menu="";
		if(isset($_GET["paginas"])&&$_GET["paginas"]){$home_a=false;}else{$home_a="opcionActivado";}
		if(isset($_GET["paginas"])&&$_GET["paginas"]=="configurar_pagina"){$configurar_a="opcionActivado";}else{$configurar_a=false;}
		if($page==="restaurante"){
			$restaurant_a=false;
			$restaurant_b=false;
			$restaurant_c=false;
			$restaurant_d=false;
			if(isset($_GET["paginas"])){
				if($_GET["paginas"]=="carta" or $_GET["paginas"]=="carta/crear" or $_GET["paginas"]=="carta/editar/".$urb2 or $_GET["paginas"]=="carta/view/".$urb2 or $_GET["paginas"]=="carta/view/".$urb2."/".$urb3 or $_GET["paginas"]=="carta/publicar/".$urb2."/".$urb3 or $_GET["paginas"]=="carta/editar_item/".$urb2."/".$urb3){
					$restaurant_a="opcionActivado";
					$restaurant_b="opcionulActivado";
					$restaurant_c="opciontiendaActivado";
				}
				if($_GET["paginas"]=="item" or $_GET["paginas"]=="item/crear" or $_GET["paginas"]=="item/editar/".$urb2 or $_GET["paginas"]=="item/view/".$urb2){
					$restaurant_a="opcionActivado";
					$restaurant_b="opcionulActivado";
					$restaurant_d="opciontiendaActivado";
				}
			}
			

			$lista_menu.='<li><a class="inicio opcion '.$home_a.'" href="'.Luis::basepage("base_page_admin").'"><i class="icono__principal"></i> Tablero</a></li>';
			$lista_menu.='<li class="sub-menu">';
			$lista_menu.='<a class="tienda opcion '.$restaurant_a.'" href="javascript:void(0);"><i class="icono__restaurant"></i> Restaurante</a>';
			$lista_menu.='<ul class="ultienda '.$restaurant_b.'">';
			$lista_menu.='<li><a href="'.Luis::basepage("base_page").'" target="_blank">Ver pagina</a></li>';
			$lista_menu.='<li><a class="'.$restaurant_c.'" href="'.Luis::basepage("base_page_admin").'carta">Carta</a></li>';
			$lista_menu.='<li><a class="'.$restaurant_d.'" href="'.Luis::basepage("base_page_admin").'item">Items</a></li>';
			$lista_menu.='</ul>';
			$lista_menu.='</li>';
			$lista_menu.='<li><a class="inicio opcion '.$configurar_a.'" href="'.Luis::basepage("base_page_admin").'configurar_pagina"><i class="icono__configurar"></i> Configurar </a></li>';
		}
		return $lista_menu;
	}

	public static function header_page_menu(){
		$u=null;
		if(isset($_SESSION["admin_id"]) && $_SESSION["admin_id"]!=""):
			$u=DatosUsuario::porId($_SESSION["admin_id"]);
			$header_menu="<div id=\"sidebar\" class=\"sidebar\">";
			$header_menu.="<ul class=\"menu\">";
			$header_menu.=DatosAdmin::page_menu_list(Luis::temass());
			$header_menu.="</ul>";
			$header_menu.="</div>";
		else:
			$header_menu=false;
		endif;
		return $header_menu;
	}

	public static function page_timeline_view(){
		if(isset($_SESSION["admin_id"]) && $_SESSION["admin_id"]!=""){
			print(DatosAdmin::headerpage());
			print(DatosAdmin::header_page_menu());
			print("<div id=\"contenidos_data\">");
			Vista::load("index");
			print("</div>");
			print('<footer class="footer">');
			print('<p> &copy; Sistema Hosting '.date("Y").'</p>');
			print('</footer>');
			$pageview=false;
		}else{
			$pageview="<div class=\"iniciarpanel\">";
			$pageview.="<form id=\"logboxinit\">";
			$pageview.="<h4 class=\"titulo\">PANEL<b>Hosting</b></h4>";
			$pageview.="<label class=\"labelpanel\">Correo</label>";
			$pageview.="<input type=\"email\" required name=\"correo\" id=\"inputEmail1\" class=\"cajas_de_texto_acceder\" autocomplete=\"off\" placeholder=\"Escriba su correo electronico.\">";
			$pageview.="<label class=\"labelpanel\">Contrase&ntilde;a</label>";
			$pageview.="<input type=\"password\" name=\"pass\" class=\"cajas_de_texto_acceder\" autocomplete=\"off\" placeholder=\"Escriba la contrase&ntilde;a de su cuenta.\">";
			$pageview.="<input type=\"submit\" class=\"boton_acceder\" value=\"Acceder\">";
			$pageview.="<a href=\"#\" class=\"olvide_mi_pass\">Olvide mi contraseña</a>";
			$pageview.="<br>";
			$pageview.="</form>";
			$pageview.="</div>";
			$pageview.="<footer class=\"footer\">";
			$pageview.="<p> &copy; Sistema Hosting ".date("Y")."</p>";
			$pageview.="</footer>";
		}
		return $pageview;
	}
}