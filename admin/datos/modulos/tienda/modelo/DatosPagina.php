<?php
class DatosPagina{
	public static $total = 0;
	public function __construct(){

	}
	function nombreCompleto(){ return $this->nombre." ".$this->apellido_paterno; }
    function nombreCompleto_dos(){ return $this->nombre." ".$this->apellido_paterno." ".$this->apellido_materno; }


    public static function calculardistancia($lat1, $lon1, $lat2, $lon2, $unit){
    	$theta = $lon1 - $lon2;
    	$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    	$dist = acos($dist);
    	$dist = rad2deg($dist);
    	$miles = $dist * 60 * 1.1515;
    	$unit = strtoupper($unit);
    	if($unit == "K"){
    		return ($miles * 1.609344);
    	}else if($unit == "N"){
    		return($miles * 0.8684);
    	}else{
    		return $miles;
    	}
    }


	public static function confver($data){
		if($data==="base"){
			$viewdata=$base = Luis::basepage("base_page");
		}elseif($data==="logopagina"){
			$viewdata=$logopagina = Luis::page_conf("header")->logo_img;
		}elseif($data==="persona"){
			$viewdata=$persona = $_SESSION["usuarioid"];
		}
		return $viewdata;
	}

	public static function diapositivas(){
		$sql = "select * from diapositiva";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosPagina());
	}

	public static function persona($id){
		$sql = "select * from personas where id=$id";
		$query = Ejecutor::doit($sql);
		$found = null;
		$data = new DatosPagina();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->nombre = $r['nombre'];
			$data->apellido_paterno = $r['apellido_paterno'];
			$data->apellido_materno = $r['apellido_materno'];
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
		$valortotaldecompra=0;
		$menu=Luis::menu();
		if(isset($_SESSION["usuarioid"])){$usuario=DatosPagina::persona(DatosPagina::confver("persona"));}
		if(isset($_GET["paginas"])) {
			$urb=explode("/", $_GET["paginas"]);
			if(isset($urb[1])){$urbp=$urb[1];}else{$urbp=false;}
		}
		if(isset($usuario->foto)==null){
			$imagenper=DatosPagina::confver("base")."admin/datos/imagenes/perfil.png";
		}else{
			if($usuario->tipo==1){
				$imagenper=DatosPagina::confver("base")."datos/sourse/personas/tiendas/".$usuario->id."/".$usuario->foto;
			}else{
				$imagenper=DatosPagina::confver("base")."datos/sourse/personas/clientes/".$usuario->id."/".$usuario->foto;
			}
		}

		$header="<header class=\"header\">";
		$header.="<div class=\"contenedor_header_menu\">";
		$header.="<nav id=\"header\">";
		$header.="<ul class=\"on_displ_menu_line\">";
		$header.="<div class=\"perf_mens_subs_pl900 clperflleft\">";
		$header.="<img class='logo_principal' src='".DatosPagina::confver("base")."/admin/datos/imagenes/pagina/".DatosPagina::confver("logopagina")."'>";
		if(!$menu==null){
			foreach($menu as $m){
			$urlmenu=false;
				if($m->nombre=='acceder'){
				}else{
					if(isset($m->nombre)){$urlmenu=$m->nombre;}
					$header.="<li class=\"".$m->ukr."_page li_menu ".Luis::currentpagemenu($m->ukr,$m->home)."\">";
					$header.="<a class=\"menu menupagecurrent\" aria-label=\"".$m->ukr."\" role=\"link\" href=\"".DatosPagina::confver("base").$urlmenu."\">".$m->label_menu."</a>";
					$header.="</li>";
				}
			}
		}
		
		if(isset($_SESSION["usuarioid"])){
			$header.="<div class=\"perf_mens_subs_pl900 clperfllrih\">";

			# imagen de perfil usuario
			$header.="<div class=\"mens_perf_nots09 ".Luis::currentpagemenu("perfil",false)." perfil_page \">";
			$header.="<a class=\"usernoneviewcartbox menupagecurrent \" href=\"".DatosPagina::confver("base")."perfil\" aria-label=\"perfil\" role=\"link\">";
			$header.="<div class=\"cdfdperflcontblius\">";
			$header.="<div class=\"csdperflcont qfrr9uorilb\" role=\"button\" tabindex=\"0\">";
			$header.="<div class=\"qfrr9uorilb\">";
			$header.='<svg class="perf767fildobs" data-vc-ignore-dynamic="1" role="none"><mask id="jsc_c_9"><circle cx="20" cy="20" fill="white" r="20"></circle></mask><g mask="url(#jsc_c_9)"><image id="imagopedperfds" x="0" y="0" height="100%" preserveAspectRatio="xMidYMid slice" width="100%" xlink:href="'.$imagenper.'" style="height:41px;width:41px;"></image><circle class="mlqo0dh0gtd " cx="20" cy="20" r="20"></circle></g></svg>';
			$header.="</div>";
			$header.="</div>";
			$header.="</div>";
			$header.="</a>";
			$header.="</div>";
			# ///imagen de perfil usuario

			#carrito de compras
			$header.="<div class=\"mens_perf_nots09 ".Luis::currentpagemenu("carrito",false)." carrito_page mens_perf_nots09200\">";
			$header.="<a href=\"".DatosPagina::confver("base")."carrito\" class=\"menupagecurrent\" aria-label=\"carrito\" role=\"link\" id=\"open_opder_list\">";
			$header.="<div class=\"cdfdperflcontbliustwo\">";
			$header.="<div class=\"csdperflcont qfrr9uorilb\" role=\"button\" tabindex=\"0\">";

			$header.="<div class=\"qfrr9uorilb\">";
			/////cantidad carrito
			$header.="<span class=\"shop_store_box\">";
			if(isset($_SESSION["carrito"])=='0'){
				$header.="0";
			}else{
				foreach ($_SESSION['carrito'] as $cantidadtotalcarrito) {
					$valortotaldecompra += $cantidadtotalcarrito["q"];
				}
				 $header.=$valortotaldecompra;
			}
			$header.="</span>";
			///** cantidad carrito
			$header.='<svg class="perf767fildobs cart_body_up" style="height:41px;width:41px;" viewBox="0 0 512.001 512.001" xml:space="preserve">
                        <path d="M503.142,79.784c-7.303-8.857-18.128-13.933-29.696-13.933H176.37c-6.085,0-11.023,4.938-11.023,11.023
                        c0,6.085,4.938,11.023,11.023,11.023h297.07c5.032,0,9.541,2.1,12.688,5.914c3.197,3.88,4.475,8.995,3.511,13.972l-44.054,220.282c-1.709,7.871-8.383,13.366-16.232,13.366H184.323L83.158,36.854C77.69,21.234,62.886,10.74,45.932,10.74c-0.005,0-0.011,0-0.017,0c-14.38,0.496-28.963,0.491-32.535,0.248c-3.555-0.772-7.397,0.22-10.152,2.976c-4.305,4.305-4.305,11.282,0,15.587c3.412,3.412,4.564,4.564,43.068,3.23c7.22,0,13.674,4.564,15.995,11.188l103.618,311.962c1.499,4.503,5.71,7.545,10.461,7.545h252.982c18.31,0,33.841-12.638,37.815-30.909l44.109-220.525C513.503,100.513,510.544,88.757,503.142,79.784z"/>
                        <path d="M424.392,424.11H223.77c-6.785,0-13.162-4.674-15.46-11.233l-21.495-63.935c-1.94-5.771-8.207-8.885-13.961-6.934c-5.771,1.935-8.874,8.19-6.934,13.961l21.539,64.061c5.473,15.625,20.062,26.119,36.31,26.119h200.622c6.085,0,11.023-4.933,11.023-11.018S430.477,424.11,424.392,424.11z"/>
                        <path d="M231.486,424.104c-21.275,0-38.581,17.312-38.581,38.581s17.306,38.581,38.581,38.581s38.581-17.312,38.581-38.581S252.761,424.104,231.486,424.104z M231.486,479.22c-9.116,0-16.535-7.419-16.535-16.535c0-9.116,7.419-16.535,16.535-16.535c9.116,0,16.535,7.419,16.535,16.535C248.021,471.802,240.602,479.22,231.486,479.22z"/>
                        <path d="M424.392,424.104c-21.269,0-38.581,17.312-38.581,38.581s17.312,38.581,38.581,38.581c21.269,0,38.581-17.312,38.581-38.581S445.661,424.104,424.392,424.104z M424.392,479.22c-9.116,0-16.535-7.419-16.535-16.535c0-9.116,7.419-16.535,16.535-16.535c9.116,0,16.535,7.419,16.535,16.535C440.927,471.802,433.508,479.22,424.392,479.22z"/>
                      </svg>';

			$header.="</div>";

			$header.="</div>";
			////////


			$header.="</div>";
			$header.="</a>";

			$header.="</div>";
			$header.="</div>";
		}else{
			$header.="<div class=\"perf_mens_subs_pl900 clperfllrih\">";
			if(!$menu==null){
				foreach($menu as $m){
					$urlmenutwo=false;
					if($m->nombre=='acceder'){
						if(isset($m->nombre)){$urlmenutwo=$m->nombre;}
						$header.="<li class=\"".$m->ukr."_page li_menu ".Luis::currentpagemenu($m->ukr,$m->home)."\">";
						$header.="<a class=\"menu menupagecurrent\" aria-label=\"".$m->nombre."\" role=\"link\" href=\"".DatosPagina::confver("base").$urlmenutwo."\">";
						$header.=$m->label_menu;
						$header.="</a>";
						$header.="</li>";
					}else{
					}
				}
				$header.="<div class=\"mens_perf_nots09 ".Luis::currentpagemenu("carrito",false)." carrito_page mens_perf_nots09200\">";
				$header.="<a href=\"".DatosPagina::confver("base")."carrito\" class=\"menupagecurrent\" aria-label=\"carrito\" role=\"link\" id=\"open_opder_list\">";
				$header.="<div class=\"cdfdperflcontbliustwo\">";
				$header.="<div class=\"csdperflcont qfrr9uorilb\" role=\"button\" tabindex=\"0\">";
				$header.="<div class=\"qfrr9uorilb\">";
				$header.="<span class=\"shop_store_box\">";
				if (isset($_SESSION["carrito"])=='0'){
					$header.="0";
				}else{
					foreach($_SESSION['carrito']as$cantidadtotalcarrito) {
						$valortotaldecompra += $cantidadtotalcarrito["q"];
					}
					$header.=$valortotaldecompra;
				}
				$header.="</span>";
				$header.='<svg class="perf767fildobs cart_body_up" style="height:41px;width:41px;" viewBox="0 0 512.001 512.001" xml:space="preserve">
                          <path d="M503.142,79.784c-7.303-8.857-18.128-13.933-29.696-13.933H176.37c-6.085,0-11.023,4.938-11.023,11.023c0,6.085,4.938,11.023,11.023,11.023h297.07c5.032,0,9.541,2.1,12.688,5.914c3.197,3.88,4.475,8.995,3.511,13.972l-44.054,220.282c-1.709,7.871-8.383,13.366-16.232,13.366H184.323L83.158,36.854C77.69,21.234,62.886,10.74,45.932,10.74c-0.005,0-0.011,0-0.017,0c-14.38,0.496-28.963,0.491-32.535,0.248c-3.555-0.772-7.397,0.22-10.152,2.976c-4.305,4.305-4.305,11.282,0,15.587c3.412,3.412,4.564,4.564,43.068,3.23c7.22,0,13.674,4.564,15.995,11.188l103.618,311.962c1.499,4.503,5.71,7.545,10.461,7.545h252.982c18.31,0,33.841-12.638,37.815-30.909l44.109-220.525C513.503,100.513,510.544,88.757,503.142,79.784z"/>
                          <path d="M424.392,424.11H223.77c-6.785,0-13.162-4.674-15.46-11.233l-21.495-63.935c-1.94-5.771-8.207-8.885-13.961-6.934c-5.771,1.935-8.874,8.19-6.934,13.961l21.539,64.061c5.473,15.625,20.062,26.119,36.31,26.119h200.622c6.085,0,11.023-4.933,11.023-11.018S430.477,424.11,424.392,424.11z"/>
                          <path d="M231.486,424.104c-21.275,0-38.581,17.312-38.581,38.581s17.306,38.581,38.581,38.581s38.581-17.312,38.581-38.581S252.761,424.104,231.486,424.104z M231.486,479.22c-9.116,0-16.535-7.419-16.535-16.535c0-9.116,7.419-16.535,16.535-16.535c9.116,0,16.535,7.419,16.535,16.535C248.021,471.802,240.602,479.22,231.486,479.22z"/>
                          <path d="M424.392,424.104c-21.269,0-38.581,17.312-38.581,38.581s17.312,38.581,38.581,38.581c21.269,0,38.581-17.312,38.581-38.581S445.661,424.104,424.392,424.104z M424.392,479.22c-9.116,0-16.535-7.419-16.535-16.535c0-9.116,7.419-16.535,16.535-16.535c9.116,0,16.535,7.419,16.535,16.535C440.927,471.802,433.508,479.22,424.392,479.22z"/>
                        </svg>';
				$header.="</div>";
				$header.="</div>";
				$header.="</div>";
				$header.="</a>";
				$header.="</div>";

			}
			$header.="</div>";
		}

		$header.="</div>";
		$header.="</ul>";
		$header.="</nav>";
		$header.="</div>";
		$header.="</header>";
		return $header;
	}

	public static function diapositivas_view(){
		$diapositiva=DatosPagina::diapositivas();
	}

}