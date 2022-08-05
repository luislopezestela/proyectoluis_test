<?php

$r = $_SERVER['REQUEST_URI']; 
$r = explode('/', $r);
$r = array_filter($r);
$r = array_merge($r, array()); 
$r = preg_replace('/\?.*/', '', $r);

$base_a = Luis::basepage("base_page");
$base = Luis::basepage("base_page_admin");
if(isset($_SESSION['usuarioid'])){
	$per=DatosPagina::persona(DatosPagina::confver("persona"));
	if(isset($usuario->foto)==null){
		$imagenper=DatosPagina::confver("base")."admin/datos/imagenes/perfil.png";
	}else{
		$urd_person="datos/sourse/personas/".$usuario->id."/".$usuario->foto;
		if(file_exists($urd_person)){
			$imagenper=DatosPagina::confver("base")."datos/sourse/personas/".$usuario->id."/".$usuario->foto;
		}else{
			$imagenper=DatosPagina::confver("base")."admin/datos/imagenes/perfil.png";
		}
	}

$idexhtmls="<div class=\"b_contenido_onb_page_luis\">";
$idexhtmls.="<div class=\"c_contenido_onb_page_luis\">";

	$idexhtmls.='<div class="contenedor_datos_perfil">';
		/*Datos perfil start*/
		$idexhtmls.='<div class="cdfdperflcont_b">';
			$idexhtmls.='<div class="csdperflcont qfrr9uorilb" role="button" tabindex="0">';
				$idexhtmls.='<div class="iconoloaderbthis"><div class="lidtv"><div></div><div></div><div></div></div><div class="pordf"></div></div>';
					$idexhtmls.='<div class="qfrr9uorilb">';
						$idexhtmls.='<svg class="perf767fils_b" aria-label="'.$per->nombreCompleto_dos().'" data-vc-ignore-dynamic="1" role="img">';
						$idexhtmls.='<mask id="jsc_c_25s">';
						$idexhtmls.='<circle cx="45" cy="45" fill="white" r="45"></circle>';
						$idexhtmls.='</mask>';
						$idexhtmls.='<g mask="url(#jsc_c_25s)">';
						$idexhtmls.='<image id="imagopedperf" x="0" y="0" height="100%" width="100%" xlink:href="'.$imagenper.'"></image>';
						$idexhtmls.='<circle class="mlqo0dh0gtd" cx="45" cy="45" r="45"></circle>';
						$idexhtmls.='</g>';
						$idexhtmls.='</svg>';
					$idexhtmls.='</div>';
				$idexhtmls.='</div>';
			$idexhtmls.='</div>';

			$idexhtmls.='<div class="title_page_perfil_user">';
				$idexhtmls.='<span class="title_page_perfil_user_doc">'.$per->nombreCompleto_dos().'</span>';
				$idexhtmls.='<span class="title_page_perfil_user_doc">'.$per->dni.'</span>';
			$idexhtmls.='</div>';
		$idexhtmls.='</div>';
		/*Datos perfil end*/
	$idexhtmls.='</div>';

	$idexhtmls.='<div class="contenedor_datos_perfil_two">';
	$idexhtmls.='<div class="box_page_perfil_user_details_two">';
	if (isset($r[1])) {
		$number_page=$r[1];
	}else{
		$number_page="perfil";
	}

	$displ_active=null;
	$displ_active1=null;
	$displ_active2=null;
	$displ_active3=null;
	$displ_active4=null;
	if("direcciones"==$number_page) {
		$displ_active1="active_button_current";
	}elseif($number_page=="historial_compras"){
		$displ_active2="active_button_current";
	}elseif($number_page=="configurar"){
		$displ_active3="active_button_current";
	}elseif($number_page=="cambiar_pass"){
		$displ_active4="active_button_current";
	}elseif($number_page=="perfil"){
		$displ_active="active_button_current";
	}
	

	$idexhtmls.='<span class="button_pont_one menupagecurrent_perfil '.$displ_active.'" aria-label="perfil" role="link">PERFIL</span>';
	$idexhtmls.='<span class="button_pont_one menupagecurrent_perfil '.$displ_active1.'" aria-label="perfil/direcciones" role="link">DIRECCIONES</span>';
	$idexhtmls.='<span class="button_pont_one menupagecurrent_perfil '.$displ_active2.'" aria-label="perfil/historial_compras" role="link">HISTORIAL DE COMPRAS</span>';
	$idexhtmls.='<span class="button_pont_one menupagecurrent_perfil '.$displ_active3.'" aria-label="perfil/configurar" role="link">CONFIGURAR</span>';
	$idexhtmls.='<span class="button_pont_one menupagecurrent_perfil '.$displ_active4.'" aria-label="perfil/cambiar_pass" role="link">CAMBIAR CONTRASE&Ntilde;A</span>';

	$idexhtmls.='</div>';
	$idexhtmls.='</div>';
	$idexhtmls.='<br>';
	$idexhtmls.='<br>';
	$idexhtmls.='<div class="contenedor_datos_perfil_two">';
	$idexhtmls.='';
	$title_optio_perfiles=null;
	if($number_page=="direcciones") {
		$title_optio_perfiles="DIRECCIONES";
	}elseif($number_page=="historial_compras"){
		$title_optio_perfiles="HISTORIAL DE COMPRAS";
	}elseif($number_page=="configurar"){
		$title_optio_perfiles="CONFIGURAR";
	}elseif($number_page=="cambiar_pass"){
		$title_optio_perfiles="CAMBIAR CONTRASE&Ntilde;A";
	}elseif($number_page=="perfil"){
		$title_optio_perfiles="PERFIL";
	}

	$idexhtmls.='<br>';
	$idexhtmls.='<div class="title_pa_options_perf">'.$title_optio_perfiles.'</div>';
	$idexhtmls.='<br>';
	if($number_page=="direcciones") {
		$title_optio_perfiles="DIRECCIONES";

		$idexhtmls.='<div class="diplay_box_data_new_address_client">';
		$idexhtmls.='<button class="custom-btn btn_saved_grange btn_new_ge_use btn_new_ge_use_persons btn_new_ge_use_persons_add">AGREGAR</button>';
		$idexhtmls.='<input class="data_input_selc_users_name" type="text" placeholder="NOMBRE">';
		$idexhtmls.='<input class="data_input_selc_users_address" type="text" placeholder="DIRECCION">';
		$idexhtmls.='<input class="data_input_selc_users_surg" type="text" placeholder="SUGERENCIA">';
		$idexhtmls.='</div>';
		$idexhtmls.='<hr>';
		////lista de direcciones opcionesblocklist1000boxlist
		$idexhtmls.='<div class="class_op_address_list_order">';
		$direcciones_envios=DatosAdmin::Mostrar_direcciones_de_envio($_SESSION['usuarioid']);
		foreach($direcciones_envios as $env){
			///direcciones in
			$idexhtmls.='<div class="contentboxitemslist contentboxitemslist_client_viewers'.$env->id.'">';
			$idexhtmls.='<div class="class_op_address_list_order_direcc_logo">';
			$idexhtmls.='<img src="'.$base_a.'datos/source/icons/ubication.png">';
			$idexhtmls.='</div>';
			$idexhtmls.='<div class="detaillsboxlists">';
			$idexhtmls.='<span class="tluisboxunli data_selc_us_name'.$env->id.'">'.html_entity_decode($env->nombre).'</span>';
			$idexhtmls.='<span class="tluisboxunliprice data_selc_us_address'.$env->id.'">'.html_entity_decode($env->direccion).'</span>';
			$idexhtmls.='<div class="tluisboxunlipubl data_selc_us_surg'.$env->id.'">'.html_entity_decode($env->sugerencia).'</div>';
			$idexhtmls.='</div>';
			///* opciones de list
			$idexhtmls.='<div class="opcionesblocklist opcionesblocklist1000boxlist">';
			$idexhtmls.='<a class="opcionesblocklist100 opcionesblocklist1000" href="javascript:void(0)">';
			$idexhtmls.='<span class="opcionesblocklistoption opcionesblocklistoption100">';
			$idexhtmls.='<i class="opcionesblocklistoption200 opcionesblocklistoption300">•••</i>';
			$idexhtmls.='</span>';
			$idexhtmls.='</a>';
			///
			$idexhtmls.='<div class="boxoptionslistlines">';
			$idexhtmls.='<div class="makposdind"></div>';
			$idexhtmls.='<div class="boxoptionslistitems data_address_update" data-config="'.$env->id.'">Editar</div>';
			$idexhtmls.='<div class="boxoptionslistitems data_address_delete" data-config="'.$env->id.'">Eliminar</div>';
			$idexhtmls.='</div>';
			///
			$idexhtmls.='</div>';
			///** fin de opciones list
			$idexhtmls.='</div>';
			///** fin de direcciones in
		}
		$idexhtmls.='</div>';
		///** fin de lista de direcciones
	}elseif($number_page=="historial_compras"){
		$title_optio_perfiles="HISTORIAL DE COMPRAS";
	}elseif($number_page=="configurar"){
		$title_optio_perfiles="CONFIGURAR";
	}elseif($number_page=="cambiar_pass"){
		$title_optio_perfiles="CAMBIAR CONTRASE&Ntilde;A";
	}elseif($number_page=="perfil"){
		$idexhtmls.='<div class="box_page_perfil_user_details">';
		$idexhtmls.='<span>DNI: <input class="class_tipe_upt_d" type="text" value="'.$per->dni.'"></span>';
		$idexhtmls.='<span>NOMBRES: <input class="class_tipe_upt_n" type="text" value="'.html_entity_decode($per->nombre).'"></span>';
		$idexhtmls.='<span>APELLIDO PATERNO: <input class="class_tipe_upt_p" type="text" value="'.html_entity_decode($per->apellido_paterno).'"></span>';
		$idexhtmls.='<span>APELLIDO MATERNO: <input class="class_tipe_upt_m" type="text" value="'.html_entity_decode($per->apellido_materno).'"></span>';
		$idexhtmls.='</div>';
		$idexhtmls.='<div class="butttons_box_content">';
		$idexhtmls.='<button class="custom-btn btn_saved_grange btn_saved_grange_use">GUARDAR</button>';
		$idexhtmls.='</div>';
	}
	$idexhtmls.='</div>';
	$idexhtmls.='<br>';
	$idexhtmls.='<br>';


$idexhtmls.='</div>';	
$idexhtmls.='</div>';
}else{
	$idexhtmls="<div class=\"b_contenido_onb_page_luis\">";
	$idexhtmls.="<div class=\"c_contenido_onb_page_luis\">";

		$idexhtmls.="<div class=\"contenido_access_page_luis \">";
			$idexhtmls.='<h1>Acceder</h1>';
			$idexhtmls.='<label><input class="input_access_dl sess_input_text_data_a" placeholder="Correo"></label>';
			$idexhtmls.='<label><input class="input_access_dl sess_input_text_data_b" type="password" placeholder="Password"></label>';
			$idexhtmls.='<label><input class="input_access_dl sess_input_text_data_c view_null" type="text" placeholder="Codigo de verificacion"></label>';
			$idexhtmls.='<span class="button_acces_dl sess_input_button789">Acceder</span>';
			$idexhtmls.='<span class="button_acces_new_dl button_acces_new_dl_a">Registrarme</span>';
		$idexhtmls.='</div>';

		$idexhtmls.="<div class=\"contenido_access_new_page_luis view_null\">";
			$idexhtmls.='<h1>Registrar</h1>';
			$idexhtmls.='<label><input class="input_access_dl reg_input_text_data_a" placeholder="Correo"></label>';
			$idexhtmls.='<label><input class="input_access_dl reg_input_text_data_b" type="password" placeholder="Contrase&ntilde;a"></label>';
			$idexhtmls.='<label><input class="input_access_dl reg_input_text_data_c" type="password" placeholder="Confirmar contrase&ntilde;a"></label>';
			$idexhtmls.='<label class="title_data_cl">Datos</label>';
			$idexhtmls.='<label><input class="input_access_dl reg_input_text_data_d" name="dni" placeholder="DNI"></label>';
			$idexhtmls.='<label><input class="input_access_dl reg_input_text_data_e" name="nombres" placeholder="Nombres"></label>';
			$idexhtmls.='<label><input class="input_access_dl reg_input_text_data_f" name="apellido_paterno" placeholder="Apellido paterno"></label>';
			$idexhtmls.='<label><input class="input_access_dl reg_input_text_data_g" name="apellido_materno" placeholder="Apellido materno"></label>';
			$idexhtmls.='<label><input class="input_access_dl reg_input_text_data_h" placeholder="Numero de celular"></label>';
			$idexhtmls.='<span class="button_acces_dl sess_input_button789_b">Registrar</span>';

			$idexhtmls.='<span class="button_acces_new_dl button_acces_new_dl_b">Acceder</span>';
		$idexhtmls.='</div>';

	$idexhtmls.='</div>';	
	$idexhtmls.='</div>';
}
return $idexhtmls;