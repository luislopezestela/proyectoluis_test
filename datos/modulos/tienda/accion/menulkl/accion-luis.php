<?php
$base = Luis::basepage("base_page");
$menu = Luis::menu();
$servicios = DatosAdmin::servicios_public();
$idexhtmls ="<div class=\"cont_fort_all\">";
	$idexhtmls.="<span class=\"title_name_menu\">Men&uacute;</span>";
	$idexhtmls.="<span class=\"title_name_menu_ac\">Todos los accesos directos</span>";
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
	$idexhtmls.="";
$idexhtmls.="</div>";
return $idexhtmls;