<?php
$base = Luis::basepage("base_page");
$menu = Luis::menu();
$servicios = DatosAdmin::servicios_public();
$idexhtmls ="<div class=\"cont_fort_all\">";
	$idexhtmls.="<span class=\"title_name_menu\">Men&uacute;</span>";
	$idexhtmls.="<span class=\"title_name_menu_ac\">Todos los accesos directos</span>";
	$idexhtmls.="<div class=\"cont_fort_list\">";
		if(isset($_SESSION["usuarioid"])){
			$idexhtmls.="<li class=\"li_menu\">";
				$idexhtmls.="<a class=\"menupagecurrent_perfil\" aria-label=\"perfil/direcciones\" href=\"".DatosPagina::confver("base")."perfil/direcciones\">";
					$idexhtmls.='<svg class="data_left_div_a_data_icon_sv" height="36" viewBox="0 0 24 24" width="36">';
					$idexhtmls.='<path d="M14,7a2,2,0,1,1-2-2A2,2,0,0,1,14,7Zm2.95,4.957L12,16.8,7.058,11.964a7,7,0,1,1,9.892-.008ZM16,7a4,4,0,1,0-4,4A4,4,0,0,0,16,7Zm5.867,3.613-1.435-.48a8.948,8.948,0,0,1-2.068,3.239L12,19.6l-6.34-6.2A8.989,8.989,0,0,1,3.24,9.029,2.968,2.968,0,0,0,0,12v9.752l7.983,2.281,8.02-2,8,1.948V13.483A3,3,0,0,0,21.867,10.612Z"/>';
					$idexhtmls.='</svg>';
					$idexhtmls.=Luis::lang('direcciones');
				$idexhtmls.="</a>";
			$idexhtmls.="</li>";

			$idexhtmls.="<li class=\"li_menu\">";
				$idexhtmls.="<a class=\"menupagecurrent_perfil\" aria-label=\"perfil/historial_compras\" href=\"".DatosPagina::confver("base")."perfil/historial_compras\">";
					$idexhtmls.='<svg class="data_left_div_a_data_icon_sv" height="36" viewBox="0 0 24 24" width="36">';
					$idexhtmls.='<path d="M24,10,21.8,0H2.2L.024,9.783,0,11a3.966,3.966,0,0,0,1,2.618V21a3,3,0,0,0,3,3H20a3,3,0,0,0,3-3V13.618A3.966,3.966,0,0,0,24,11ZM2,10.109,3.8,2H7V6H9V2h6V6h2V2h3.2L22,10.109V11a2,2,0,0,1-2,2H19a2,2,0,0,1-2-2H15a2,2,0,0,1-2,2H11a2,2,0,0,1-2-2H7a2,2,0,0,1-2,2H4a2,2,0,0,1-2-2ZM20,22H4a1,1,0,0,1-1-1V14.858A3.939,3.939,0,0,0,4,15H5a3.975,3.975,0,0,0,3-1.382A3.975,3.975,0,0,0,11,15h2a3.99,3.99,0,0,0,3-1.357A3.99,3.99,0,0,0,19,15h1a3.939,3.939,0,0,0,1-.142V21A1,1,0,0,1,20,22Z"/>';
					$idexhtmls.='</svg>';
					$idexhtmls.=Luis::lang('compras');
				$idexhtmls.="</a>";
			$idexhtmls.="</li>";

			$idexhtmls.="<li class=\"li_menu\">";
				$idexhtmls.="<a class=\"menupagecurrent_perfil\" aria-label=\"perfil/configurar\" href=\"".DatosPagina::confver("base")."perfil/configurar\">";
					$idexhtmls.='<svg class="data_left_div_a_data_icon_sv" height="36" viewBox="0 0 24 24" width="36">';
					$idexhtmls.='<path d="M21,12a9.143,9.143,0,0,0-.15-1.645L23.893,8.6l-3-5.2L17.849,5.159A9,9,0,0,0,15,3.513V0H9V3.513A9,9,0,0,0,6.151,5.159L3.107,3.4l-3,5.2L3.15,10.355a9.1,9.1,0,0,0,0,3.29L.107,15.4l3,5.2,3.044-1.758A9,9,0,0,0,9,20.487V24h6V20.487a9,9,0,0,0,2.849-1.646L20.893,20.6l3-5.2L20.85,13.645A9.143,9.143,0,0,0,21,12Zm-6,0a3,3,0,1,1-3-3A3,3,0,0,1,15,12Z"/>';
					$idexhtmls.='</svg>';
					$idexhtmls.=Luis::lang('configurar');
				$idexhtmls.="</a>";
			$idexhtmls.="</li>";

			$idexhtmls.="<li class=\"li_menu\">";
				$idexhtmls.="<a class=\"menupagecurrent_perfil\" aria-label=\"perfil/cambiar_pass\" href=\"".DatosPagina::confver("base")."perfil/cambiar_pass\">";
					$idexhtmls.='<svg class="data_left_div_a_data_icon_sv" height="36" viewBox="0 0 24 24" width="36">';
					$idexhtmls.='<path d="m15.989 12.7v-2.7a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h2.685a1.016 1.016 0 0 0 .922-.6 4.522 4.522 0 0 0 .376-2.377 3.491 3.491 0 0 0 -3.506-3.023 4.537 4.537 0 0 0 -3.208 1.329l-7.908 7.906a7.368 7.368 0 0 0 -3.881.048 7.5 7.5 0 0 0 2.036 14.717 7.654 7.654 0 0 0 .784-.041 7.529 7.529 0 0 0 6.428-5.429 7.334 7.334 0 0 0 .047-3.88l.65-.65a1.984 1.984 0 0 0 .575-1.3zm-10.489 7.3a1.5 1.5 0 1 1 1.5-1.5 1.5 1.5 0 0 1 -1.5 1.5z"/>';
					$idexhtmls.='</svg>';
					$idexhtmls.=Luis::lang('cambiar_contrasena');
				$idexhtmls.="</a>";
			$idexhtmls.="</li>";
		}
	$idexhtmls.="</div>";

	$idexhtmls.="<div class=\"cont_fort_list\">";
		foreach($menu as $m) {
			$idexhtmls.="<li class=\"".$m->ukr."_page li_menu\">";
				$idexhtmls.="<a class=\"menu menupagecurrent\" aria-label=\"".$m->ukr."\" href=\"".DatosPagina::confver("base").$m->nombre."\">";
					$idexhtmls.=html_entity_decode($m->titulo);
				$idexhtmls.="</a>";
			$idexhtmls.="</li>";
		}
		foreach ($servicios as $ser) {
			$idexhtmls.="<li>";
				$idexhtmls.="<a class=\"view_servicios_timeline_page\" href=\"".$base.$ser->url."\" aria-label=\"".$ser->url."\" data_int=\"3\">";
					$idexhtmls.="<img class=\"data_left_div_a_data_icon_image\" src=\"".$base."datos/modulos/".Luis::temass()."/source/imagenes/servicios/thumb_".$ser->icono."\" alt=\"".$ser->nombre."\">";
					$idexhtmls.=html_entity_decode($ser->nombre);
				$idexhtmls.="</a>";
			$idexhtmls.="</li>";
		}
	$idexhtmls.="</div>";
	if(isset($_SESSION['usuarioid'])){
		$idexhtmls.="<span class=\"closed_var_users_data ini_play_luis\">".Luis::lang("cerrar_session")."</span>";
	}
$idexhtmls.="</div>";
return $idexhtmls;