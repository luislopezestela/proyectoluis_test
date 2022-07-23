<?php
$total=0;
$basepagina = Luis::basepage("base_page");

if(isset($_SESSION['car_stepp'])){
	if($_SESSION['car_stepp']==2){
		$idexhtmls="<div class=\"b_contenido_onb_page_luis\">";
		$idexhtmls.="<div class=\"c_contenido_onb_page_luis\">";

		$idexhtmls.="<section class=\"vista_preb_page\">";
		$idexhtmls.="<ol class=\"box_visw\">";
		$idexhtmls.="<li><a>Inicio</a></li>";
		$idexhtmls.="<li><a>Carrito</a></li>";
		$idexhtmls.="<li class=\"active\">Sucursal</li>";
		$idexhtmls.="</ol>";
		$idexhtmls.="</section>";

		$idexhtmls.="<div class=\"contenido100\">";
		$idexhtmls.="<div class=\"contenidocarrito\">";
		if(isset($_SESSION["carrito"]) && count($_SESSION["carrito"])>0){
			$idexhtmls.="<div class=\"cart_content_list_items_orders_tbn\">";
			$totalcount_car_items="0";
			if(isset($_SESSION["carrito"])=='0'){
				$totalcount_car_items="0";
			}else{
				foreach($_SESSION['carrito']as$cantidadtotalcarrito){
					$totalcount_car_items += $cantidadtotalcarrito["q"];
				}
			}
			$idexhtmls.="<div class=\"count_items_in_car_styls count_items_in_car_styls_dt\">";
			$idexhtmls.=$totalcount_car_items;
			$idexhtmls.="</div>";
			$idexhtmls.="<br>";
			//// contenido 
			foreach($_SESSION["carrito"] as $c){
				$producto=DatosAdmin::porID_producto($c["id_producto"]);
				$typs_it=DatosAdmin::ver_opciones_type($producto->id);
				$volrtotal_precios=0;
				if(count($typs_it)>0){
					foreach($typs_it as $tps){
						$id_data=$c[0][$tps->id];
						$opt_data_details = DatosAdmin::view_iten_in_pages_por_id($id_data);
						$volrtotal_precios+=$opt_data_details->precio;
					}
					$precio_nuevo_suma=$producto->precio_final+$volrtotal_precios;
				}
				$total += $c["q"]*$precio_nuevo_suma;
			}
			////contenido

			/////Contenido 2 carrito_icon
			$idexhtmls.="<div class=\"carrito_seleccionado_step_dos back_in_order_list_page menupagecurrent\" aria-label=\"carrito\" role=\"link\">";
			$idexhtmls.="<img src=\"".$basepagina."datos/source/icons/carrito_icon.png\">";
			$idexhtmls.="<div class=\"count_items_in_car_styls_process_data_styl\">";
			$idexhtmls.="Total items: ".$totalcount_car_items;
			$idexhtmls.="</div>";
			$idexhtmls.="</div>";


			if(isset($_SESSION["usuarioid"])){
				$idexhtmls.="<div class=\"box_session_new_next_order\">";
				///
				$tiposdeventa=DatosAdmin::Mostrartipos_de_ventas_or();
				$visualizar_venta_current_o = DatosAdmin::view_order_realtime_in_page($_SESSION['usuarioid']);
				$idexhtmls.="<div class=\"box_session_new_next_order_conten\">";
				$idexhtmls.="";
				foreach ($tiposdeventa as $tve) {
					if($visualizar_venta_current_o){
						if($tve->code==$visualizar_venta_current_o->tipo_venta){
							$ative_tipo_venta="classs_data_new_locale_view_active";
							$ative_tipo_venta_text="SELECCIONADO";
							$ative_tipo_venta_class="tipe_current_data_active";
						}else{
							$ative_tipo_venta=false;
							$ative_tipo_venta_text="SELECCIONAR";
							$ative_tipo_venta_class="tipe_current_data_false";
						}
					}else{
						$ative_tipo_venta=false;
						$ative_tipo_venta_text="SELECCIONAR";
						$ative_tipo_venta_class="tipe_current_data_false";
					}
					$idexhtmls.="<div data=\"".$tve->code."\" class=\"classs_data_new_locale_view classs_data_new_locale_view_current menupagecurrent ".$ative_tipo_venta."\" aria-label=\"carrito\" role=\"link\">";
					$idexhtmls.=html_entity_decode($tve->nombre);
					$idexhtmls.="<div class=\"".$ative_tipo_venta_class."\">".$ative_tipo_venta_text."</div>";
					$idexhtmls.="</div>";
				}
				
				$idexhtmls.="";
				$idexhtmls.="";
				$idexhtmls.="</div>";
				///*
				$data_sucursales_lines= DatosAdmin::Mostrar_sucursales();
				$idexhtmls.="<br>";
				///****sucursales star
				if($visualizar_venta_current_o){
					if($visualizar_venta_current_o->tipo_venta=="TIENDA001"){
						$idexhtmls.="<div class=\"plans\">";
						$idexhtmls.="<div class=\"title\">Sucursal de atencion</div>";
						foreach($data_sucursales_lines as $su){
							if(isset($_SESSION['usuarioid'])){
								$dr_ac = DatosAdmin::por_el_id_cliente($_SESSION['usuarioid']);
								if($dr_ac->sucursal_compra===$su->id){
									$es_checket_principal="checked";
								}else{
									if($dr_ac->sucursal_compra==null){
										if($su->principal){
											$es_checket_principal="checked";
										}else{
											$es_checket_principal=false;
										}
									}else{
										$es_checket_principal=false;
									}
								}
							}else{
								if($su->principal){
									$es_checket_principal="checked";
								}else{
									$es_checket_principal=false;
								}
							}
							$idexhtmls.="<label class=\"sucursal_list_table_users\" for=\"succursl".$su->id."\">";
							$idexhtmls.="<input ".$es_checket_principal." type=\"radio\" name=\"sucursal\" id=\"succursl".$su->id."\" value=\"".$su->id."\"/>";
							$idexhtmls.="<div class=\"plan-content\">";
							$idexhtmls.="<img loading=\"lazy\" src=\"".$basepagina."datos/source/icons/online-shop.png\"/>";
							$idexhtmls.="<div class=\"plan-details\">";
							$idexhtmls.="<span>".html_entity_decode($su->nombre)."</span>";
							$idexhtmls.="<p>".html_entity_decode($su->direccion)."</p>";
							$idexhtmls.="</div>";
							$idexhtmls.="</div>";
							$idexhtmls.="</label>";
						}
						$idexhtmls.="</div>";
					}elseif($visualizar_venta_current_o->tipo_venta=="DELIVERY001"){
						$data_sucursales_lines_envio= DatosAdmin::Mostrar_direcciones_de_envio($_SESSION['usuarioid']);
						$idexhtmls.="<div class=\"plans\">";
						$idexhtmls.="<div class=\"title\">DIRECCION DE ENVIO.</div>";
						foreach($data_sucursales_lines_envio as $su_envio){
							if(isset($_SESSION['usuarioid'])){
								$dr_ac = DatosAdmin::view_order_realtime_in_page($_SESSION['usuarioid']);
								if($dr_ac->direccion_envio===$su_envio->id){
									$es_checket_principal="checked";
								}else{
									if($dr_ac->direccion_envio==null){
										if($su_envio->principal){
											$es_checket_principal="checked";
										}else{
											$es_checket_principal=false;
										}
									}else{
										$es_checket_principal=false;
									}
								}
							}else{
								if($su_envio->principal){
									$es_checket_principal="checked";
								}else{
									$es_checket_principal=false;
								}
							}
							$idexhtmls.="<label class=\"sucursal_list_table_users\" for=\"succursl".$su_envio->id."\">";
							$idexhtmls.="<input ".$es_checket_principal." type=\"radio\" name=\"sucursal\" id=\"succursl".$su_envio->id."\" value=\"".$su_envio->id."\"/>";
							$idexhtmls.="<div class=\"plan-content\">";
							$idexhtmls.="<img loading=\"lazy\" src=\"".$basepagina."datos/source/icons/ubication.png\"/>";
							$idexhtmls.="<div class=\"plan-details\">";
							$idexhtmls.="<span>".html_entity_decode($su_envio->nombre)."</span>";
							$idexhtmls.="<p>".html_entity_decode($su_envio->direccion)."</p>";
							$idexhtmls.="<p>Costo envio: S/.".number_format($su_envio->costo_envio,2,".",",")."</p>";
							$idexhtmls.="</div>";
							$idexhtmls.="</div>";
							$idexhtmls.="</label>";
						}
						$idexhtmls.="</div>";
					}
				}
				///*** sucursales end
				$idexhtmls.="</div>";
			}else{
				$idexhtmls.="<div class=\"box_session_new_next_order\">";
				$idexhtmls.="<span class=\"new_user_init_title\">Iniciar session</span>";
				$idexhtmls.="<p class=\"new_user_init_title_sup\">Iniciar session para continuar con la compra</p>";
				$idexhtmls.="<input class=\"sess_input_text sess_input_text_data_a\" type=\"email\" placeholder=\"Correo\">";
				$idexhtmls.="<input class=\"sess_input_text sess_input_text_data_b\" type=\"password\" placeholder=\"Contrase&ntilde;a\">";
				$idexhtmls.="<input class=\"sess_input_button sess_input_button789 menupagecurrent\"  aria-label=\"carrito\" role=\"link\" type=\"submit\" value=\"Iniciar session\">";
				$idexhtmls.="</div>";
			}
			//// fin de seleccionar sucursal
			/////contenido 2 end
			/////
			$idexhtmls.="<hr>";
			$idexhtmls.="<div class=\"box_list_cart_order_buttons\">";
			$idexhtmls.="<span class=\"delete_order_in_page_data_sty button_delete_order_current\">Cancelar compra</span>";
			$idexhtmls.="<a class=\"continuarcomprando_in_page_back back_in_order_list_page menupagecurrent\" aria-label=\"carrito\" role=\"link\">Volver al carrito</a>";
			if(isset($_SESSION["usuarioid"])){
				if($visualizar_venta_current_o){
					if($visualizar_venta_current_o->tipo_venta=="TIENDA001"){
						$idexhtmls.="<a class=\"botonsiguientecarrito st_car_button_page next_date_order_process_two new_stored_page_realtime menupagecurrent\"  aria-label=\"carrito\" role=\"link\">Siguiente</a>";
					}elseif($visualizar_venta_current_o->tipo_venta=="DELIVERY001"){
						$idexhtmls.="<a class=\"botonsiguientecarrito st_car_button_page next_date_order_process_two new_stored_page_realtime_envio menupagecurrent\"  aria-label=\"carrito\" role=\"link\">Siguiente</a>";
					}
					
				}
			}
			$idexhtmls.="</div>";
			$idexhtmls.="<li class=\"totalprecio pricetotalboxcarts proce_car_styl\">Total: S/. ".number_format($total,2,".",",")."</li>";
			$idexhtmls.="</div>";
			$idexhtmls.="<div class=\"conten_cart_null_listem\"></div>";
		}else{
			unset($_SESSION['car_stepp']);
		}
		$idexhtmls.="</div>";
		$idexhtmls.="</div>";


		$idexhtmls.="</div>";
		$idexhtmls.="</div>";
	}elseif($_SESSION['car_stepp']==3){
		$idexhtmls="<div class=\"b_contenido_onb_page_luis\">";
		$idexhtmls.="<div class=\"c_contenido_onb_page_luis\">";


		$idexhtmls.="<section class=\"vista_preb_page\">";
		$idexhtmls.="<ol class=\"box_visw\">";
		$idexhtmls.="<li><a>Inicio</a></li>";
		$idexhtmls.="<li><a>Carrito</a></li>";
		$idexhtmls.="<li class=\"active\">Finalizar</li>";
		$idexhtmls.="</ol>";
		$idexhtmls.="</section>";
		$idexhtmls.="<div class=\"contenido100\">";
		$idexhtmls.="<div class=\"contenidocarrito\">";
		if(isset($_SESSION["carrito"]) && count($_SESSION["carrito"])>0){
			$idexhtmls.="<div class=\"cart_content_list_items_orders_tbn\">";
			$totalcount_car_items="0";
			if(isset($_SESSION["carrito"])=='0'){
				$totalcount_car_items="0";
			}else{
				foreach($_SESSION['carrito']as$cantidadtotalcarrito){
					$totalcount_car_items += $cantidadtotalcarrito["q"];
				}
			}
			$idexhtmls.="<div class=\"count_items_in_car_styls count_items_in_car_styls_dt\">";
			$idexhtmls.=$totalcount_car_items;
			$idexhtmls.="</div>";
			$idexhtmls.="<br>";
			//// contenido 
			foreach($_SESSION["carrito"] as $c){
				$producto=DatosAdmin::porID_producto($c["id_producto"]);
				$typs_it=DatosAdmin::ver_opciones_type($producto->id);
				$volrtotal_precios=0;
				if(count($typs_it)>0){
					foreach($typs_it as $tps){
						$id_data=$c[0][$tps->id];
						$opt_data_details = DatosAdmin::view_iten_in_pages_por_id($id_data);
						$volrtotal_precios+=$opt_data_details->precio;
					}
					$precio_nuevo_suma=$producto->precio_final+$volrtotal_precios;
				}
				$total += $c["q"]*$precio_nuevo_suma;
			}
			////contenido

			/////Contenido 2 carrito_icon
			$idexhtmls.="<div class=\"carrito_seleccionado_step_dos back_in_order_list_page menupagecurrent\" aria-label=\"carrito\" role=\"link\">";
			$idexhtmls.="<img src=\"".$basepagina."datos/source/icons/carrito_icon.png\">";
			$idexhtmls.="<div class=\"count_items_in_car_styls_process_data_styl\">";
			$idexhtmls.="Total items: ".$totalcount_car_items;
			$idexhtmls.="</div>";
			$idexhtmls.="</div>";

			if(isset($_SESSION["usuarioid"])){
				$visualizar_venta_current_o = DatosAdmin::view_order_realtime_in_page($_SESSION['usuarioid']);
				if($visualizar_venta_current_o){
					if($visualizar_venta_current_o->tipo_venta=="TIENDA001"){
						$cpl_us = DatosAdmin::por_el_id_cliente($_SESSION["usuarioid"]);
						$sucursal_view = DatosAdmin::poridSucursal($cpl_us->sucursal_compra);
						$idexhtmls.="<div class=\"carrito_seleccionado_step_dos next_date_order_process menupagecurrent\" aria-label=\"carrito\" role=\"link\">";
						$idexhtmls.="<img src=\"".$basepagina."datos/source/icons/online-shop.png\">";
						$idexhtmls.="<div class=\"count_items_in_car_styls_process_data_styl\">";
						$idexhtmls.="<span><b>".html_entity_decode($sucursal_view->nombre)." </b><p>".html_entity_decode($sucursal_view->direccion)."</p></span>";
						$idexhtmls.="</div>";
						$idexhtmls.="</div>";
					}elseif($visualizar_venta_current_o->tipo_venta=="DELIVERY001"){
						$sucursal_view = DatosAdmin::Mostrar_direcciones_de_envio_one($visualizar_venta_current_o->direccion_envio);
						$idexhtmls.="<div class=\"carrito_seleccionado_step_dos next_date_order_process menupagecurrent\" aria-label=\"carrito\" role=\"link\">";
						$idexhtmls.="<img src=\"".$basepagina."datos/source/icons/ubication.png\">";
						$idexhtmls.="<div class=\"count_items_in_car_styls_process_data_styl\">";
						$idexhtmls.="<span><b>".html_entity_decode($sucursal_view->nombre)." </b><p>".html_entity_decode($sucursal_view->direccion)."</p></span>";
						$idexhtmls.="</div>";
						$idexhtmls.="</div>";
					}
				}
				

			
				$idexhtmls.="<div class=\"box_session_new_next_order\">";
				$idexhtmls.="<div class=\"carrito_seleccionado_step_dos_style_lp\">";
				$documentos_venta = DatosAdmin::view_documents();
				$visualizar_venta_current = DatosAdmin::view_order_realtime_in_page($_SESSION['usuarioid']);
				$visualizar_documento = DatosAdmin::visualizar_documento_seleccionado_por_cliente($visualizar_venta_current->documento);
				$ver_usuario_en_venta = DatosAdmin::ver_el_cliente_data_requerido($visualizar_documento->campo_requerido,$_SESSION['usuarioid']);
				foreach($documentos_venta as $ven_d){
					if($ven_d->id==$visualizar_documento->id){
						$ven_d_defecto="checked";
					}else{
						$ven_d_defecto=false;
					}
					if($ven_d->web==1){
						$string_name_ven_d = html_entity_decode($ven_d->nombre);
						$idexhtmls.="<li class=\"carrito_seleccionado_step_dos_style_lp_li\">";
						$idexhtmls.="<input id=\"".$ven_d->id."\" ".$ven_d_defecto." value=\"".$ven_d->id."\" class=\"options menupagecurrent carrito_seleccionado_step_dos_style_lp_input carrito_selec_in_data_step_dos_lp_input\" name=\"documento_venta\" type=\"radio\" aria-label=\"carrito\" role=\"link\"/>";
						$idexhtmls.="<label for=\"".$ven_d->id."\" class=\"carrito_seleccionado_step_dos_style_lp_alphabet\">".$string_name_ven_d[0]."</label>";
						$idexhtmls.="<label for=\"".$ven_d->id."\" class=\"carrito_seleccionado_step_dos_style_lp_text\">".html_entity_decode($ven_d->nombre).".</label>";
						$idexhtmls.="</li>";
					}
				}
				

				$idexhtmls.="";
				$idexhtmls.="";
				$idexhtmls.="";
				$idexhtmls.="</div>";
				$idexhtmls.="</div>";

				$idexhtmls.="<div class=\"box_session_new_next_order\">";
				$idexhtmls.="<div class=\"carrito_seleccionado_step_dos_style_lp_two\">";
				$idexhtmls.="<label>NUMERO DE ".$visualizar_documento->campo_requerido;
				$idexhtmls.="<input class=\"number_doc_in_new_order_web number_doc_in_new_order_web_ac_lims\" type=\"text\" value=\"".$ver_usuario_en_venta->c."\">";
				$idexhtmls.="</div>";
				$idexhtmls.="</div>";

				$idexhtmls.="<div class=\"box_session_new_next_order\">";
				$idexhtmls.="<div class=\"carrito_seleccionado_step_dos_style_lp_two\">";
				$idexhtmls.="METODO DE PAGO";
				$idexhtmls.="";
				$idexhtmls.="";
				//////////******
				$idexhtmls.="<div class=\"plans\">";
				$listarmetodos_de_pagos = DatosAdmin::MostrarAdmin_metodo_pagos_web();
				foreach($listarmetodos_de_pagos as $mp){
					if($mp->id==$visualizar_venta_current->metodo_pago){
						$select_tipo_pagos_online="checked";
					}else{
						$select_tipo_pagos_online=false;
					}
					$idexhtmls.="<label class=\"sucursal_list_table_users\" for=\"succursl".$mp->id."\">";
					$idexhtmls.="<input ".$select_tipo_pagos_online." type=\"radio\" name=\"metodopago\" id=\"succursl".$mp->id."\" value=\"".$mp->id."\"/>";
					$idexhtmls.="<div class=\"plan-content\">";
					$idexhtmls.="<div class=\"plan-details\">";
					$idexhtmls.="<span>".html_entity_decode($mp->nombre)."</span>";
					$idexhtmls.="</div>";
					$idexhtmls.="</div>";
					$idexhtmls.="</label>";
				}
				$idexhtmls.="</div>";
				////////////
				$idexhtmls.="</div>";
				$idexhtmls.="</div>";
			}else{
				$idexhtmls.="<div class=\"box_session_new_next_order\">";
				$idexhtmls.="<span class=\"new_user_init_title\">Iniciar session</span>";
				$idexhtmls.="<p class=\"new_user_init_title_sup\">Iniciar session para continuar con la compra</p>";
				$idexhtmls.="<input class=\"sess_input_text sess_input_text_data_a\" type=\"email\" placeholder=\"Correo\">";
				$idexhtmls.="<input class=\"sess_input_text sess_input_text_data_b\" type=\"password\" placeholder=\"Contrase&ntilde;a\">";
				$idexhtmls.="<input class=\"sess_input_button sess_input_button789 menupagecurrent\" aria-label=\"carrito\" role=\"link\" type=\"submit\" value=\"Iniciar session\">";
				$idexhtmls.="</div>";
			}
			//// fin de seleccionar sucursal
			/////contenido 2 end
			/////
			$idexhtmls.="<hr>";
			$idexhtmls.="<div class=\"box_list_cart_order_buttons\">";
			$idexhtmls.="<span class=\"delete_order_in_page_data_sty button_delete_order_current\">Cancelar compra</span>";
			$idexhtmls.="<a class=\"continuarcomprando_in_page_back next_date_order_process menupagecurrent\" aria-label=\"carrito\" role=\"link\">Sucursales</a>";
			if(isset($_SESSION["usuarioid"])){
				$idexhtmls.="<a class=\"botonsiguientecarrito st_car_button_page next_date_order_process_three new_stored_page_realtime_pagos menupagecurrent\" aria-label=\"carrito\" role=\"link\">Siguiente</a>";
			}
			$idexhtmls.="</div>";
			$idexhtmls.="<li class=\"totalprecio pricetotalboxcarts proce_car_styl\">Total: S/. ".number_format($total,2,".",",")."</li>";
			$idexhtmls.="</div>";
			$idexhtmls.="<div class=\"conten_cart_null_listem\"></div>";
		}else{
			unset($_SESSION['car_stepp']);
		}
		$idexhtmls.="</div>";
		$idexhtmls.="</div>";
	//////*/
		$idexhtmls.="</div>";
		$idexhtmls.="</div>";
	}elseif($_SESSION['car_stepp']==4){

		$idexhtmls="<div class=\"b_contenido_onb_page_luis\">";
		$idexhtmls.="<div class=\"c_contenido_onb_page_luis\">";


		$idexhtmls.="<section class=\"vista_preb_page\">";
		$idexhtmls.="<ol class=\"box_visw\">";
		$idexhtmls.="<li><a>Inicio</a></li>";
		$idexhtmls.="<li><a>Carrito</a></li>";
		$idexhtmls.="<li class=\"active\">PAGAR</li>";
		$idexhtmls.="</ol>";
		$idexhtmls.="</section>";
		$idexhtmls.="<div class=\"contenido100\">";
		$idexhtmls.="<div class=\"contenidocarrito\">";
		if(isset($_SESSION["carrito"]) && count($_SESSION["carrito"])>0){
			$idexhtmls.="<div class=\"cart_content_list_items_orders_tbn\">";
			$totalcount_car_items="0";
			if(isset($_SESSION["carrito"])=='0'){
				$totalcount_car_items="0";
			}else{
				foreach($_SESSION['carrito']as$cantidadtotalcarrito){
					$totalcount_car_items += $cantidadtotalcarrito["q"];
				}
			}
			$idexhtmls.="<div class=\"count_items_in_car_styls count_items_in_car_styls_dt\">";
			$idexhtmls.=$totalcount_car_items;
			$idexhtmls.="</div>";
			$idexhtmls.="<br>";
			//// contenido 
			foreach($_SESSION["carrito"] as $c){
				$producto=DatosAdmin::porID_producto($c["id_producto"]);
				$typs_it=DatosAdmin::ver_opciones_type($producto->id);
				$volrtotal_precios=0;
				if(count($typs_it)>0){
					foreach($typs_it as $tps){
						$id_data=$c[0][$tps->id];
						$opt_data_details = DatosAdmin::view_iten_in_pages_por_id($id_data);
						$volrtotal_precios+=$opt_data_details->precio;
					}
					$precio_nuevo_suma=$producto->precio_final+$volrtotal_precios;
				}
				$total += $c["q"]*$precio_nuevo_suma;
			}
			////contenido

			/////Contenido 2 carrito_icon
			$idexhtmls.="<div class=\"carrito_seleccionado_step_dos back_in_order_list_page menupagecurrent\" aria-label=\"carrito\" role=\"link\">";
			$idexhtmls.="<img src=\"".$basepagina."datos/source/icons/carrito_icon.png\">";
			$idexhtmls.="<div class=\"count_items_in_car_styls_process_data_styl\">";
			$idexhtmls.="Total items: ".$totalcount_car_items;
			$idexhtmls.="</div>";
			$idexhtmls.="</div>";

			if(isset($_SESSION["usuarioid"])){
				$visualizar_venta_current_o = DatosAdmin::view_order_realtime_in_page($_SESSION['usuarioid']);
				if($visualizar_venta_current_o){
					if($visualizar_venta_current_o->tipo_venta=="TIENDA001"){
						$cpl_us = DatosAdmin::por_el_id_cliente($_SESSION["usuarioid"]);
						$sucursal_view = DatosAdmin::poridSucursal($cpl_us->sucursal_compra);
						$idexhtmls.="<div class=\"carrito_seleccionado_step_dos next_date_order_process menupagecurrent\" aria-label=\"carrito\" role=\"link\">";
						$idexhtmls.="<img src=\"".$basepagina."datos/source/icons/online-shop.png\">";
						$idexhtmls.="<div class=\"count_items_in_car_styls_process_data_styl\">";
						$idexhtmls.="<span><b>".html_entity_decode($sucursal_view->nombre)." </b><p>".html_entity_decode($sucursal_view->direccion)."</p></span>";
						$idexhtmls.="</div>";
						$idexhtmls.="</div>";
					}elseif($visualizar_venta_current_o->tipo_venta=="DELIVERY001"){
						$sucursal_view = DatosAdmin::Mostrar_direcciones_de_envio_one($visualizar_venta_current_o->direccion_envio);
						$idexhtmls.="<div class=\"carrito_seleccionado_step_dos next_date_order_process menupagecurrent\" aria-label=\"carrito\" role=\"link\">";
						$idexhtmls.="<img src=\"".$basepagina."datos/source/icons/ubication.png\">";
						$idexhtmls.="<div class=\"count_items_in_car_styls_process_data_styl\">";
						$idexhtmls.="<span><b>".html_entity_decode($sucursal_view->nombre)." </b><p>".html_entity_decode($sucursal_view->direccion)."</p></span>";
						$idexhtmls.="</div>";
						$idexhtmls.="</div>";
					}
				}
				

			
				$idexhtmls.="<div class=\"box_session_new_next_order\">";
				$idexhtmls.="<div class=\"carrito_seleccionado_step_dos_style_lp\">";
				$documentos_venta = DatosAdmin::view_documents();
				$visualizar_venta_current = DatosAdmin::view_order_realtime_in_page($_SESSION['usuarioid']);
				$visualizar_documento = DatosAdmin::visualizar_documento_seleccionado_por_cliente($visualizar_venta_current->documento);
				$ver_usuario_en_venta = DatosAdmin::ver_el_cliente_data_requerido($visualizar_documento->campo_requerido,$_SESSION['usuarioid']);
				foreach($documentos_venta as $ven_d){
					if($ven_d->id==$visualizar_documento->id){
						$ven_d_defecto="checked";
					}else{
						$ven_d_defecto=false;
					}
					if($ven_d->web==1){
						$string_name_ven_d = html_entity_decode($ven_d->nombre);
						$idexhtmls.="<li class=\"carrito_seleccionado_step_dos_style_lp_li\">";
						$idexhtmls.="<input id=\"".$ven_d->id."\" ".$ven_d_defecto." value=\"".$ven_d->id."\" class=\"options menupagecurrent carrito_seleccionado_step_dos_style_lp_input carrito_selec_in_data_step_dos_lp_input\" name=\"documento_venta\" type=\"radio\" aria-label=\"carrito\" role=\"link\"/>";
						$idexhtmls.="<label for=\"".$ven_d->id."\" class=\"carrito_seleccionado_step_dos_style_lp_alphabet\">".$string_name_ven_d[0]."</label>";
						$idexhtmls.="<label for=\"".$ven_d->id."\" class=\"carrito_seleccionado_step_dos_style_lp_text\">".html_entity_decode($ven_d->nombre).".</label>";
						$idexhtmls.="</li>";
					}
				}
				

				$idexhtmls.="";
				$idexhtmls.="";
				$idexhtmls.="";
				$idexhtmls.="</div>";
				$idexhtmls.="</div>";

				$idexhtmls.="<div class=\"box_session_new_next_order\">";
				$idexhtmls.="<div class=\"carrito_seleccionado_step_dos_style_lp_two\">";
				$idexhtmls.="<label>NUMERO DE ".$visualizar_documento->campo_requerido;
				$idexhtmls.="<input class=\"number_doc_in_new_order_web number_doc_in_new_order_web_ac_lims\" type=\"text\" value=\"".$ver_usuario_en_venta->c."\">";
				$idexhtmls.="</div>";
				$idexhtmls.="</div>";

				$idexhtmls.="<div class=\"box_session_new_next_order\">";
				$idexhtmls.="<div class=\"carrito_seleccionado_step_dos_style_lp_two\">";
				$idexhtmls.="METODO DE PAGO";
				//////////******
				$idexhtmls.="<div class=\"metodo_pago_selections_page_order\">";
				$metodo_pag_ones = DatosAdmin::MostrarAdmin_metodo_pagos_web_one($visualizar_venta_current->metodo_pago);
				$idexhtmls.="<span>".html_entity_decode($metodo_pag_ones->nombre)."</span>";
				$idexhtmls.="</div>";
				
				///////----inicio de esto es cuendo es un delivery
				//if($metodo_pag_ones->codigo=="EFECTIVO001"){
				//	$idexhtmls.="<label class=\"class_label_order_mount\">Ingresa el monto con lo que vas a pagar.</label>";
				//	$idexhtmls.="<input class=\"class_label_order_mount_input class_label_order_mount_input_sub_data\" placeholder=\"0.00\">";
				//}
				//***** fin de funcion cuendo es delivery
				////////////
				$idexhtmls.="</div>";
				$idexhtmls.="</div>";
			}else{
				$idexhtmls.="<div class=\"box_session_new_next_order\">";
				$idexhtmls.="<span class=\"new_user_init_title\">Iniciar session</span>";
				$idexhtmls.="<p class=\"new_user_init_title_sup\">Iniciar session para continuar con la compra</p>";
				$idexhtmls.="<input class=\"sess_input_text sess_input_text_data_a\" type=\"email\" placeholder=\"Correo\">";
				$idexhtmls.="<input class=\"sess_input_text sess_input_text_data_b\" type=\"password\" placeholder=\"Contrase&ntilde;a\">";
				$idexhtmls.="<input class=\"sess_input_button sess_input_button789 menupagecurrent\" aria-label=\"carrito\" role=\"link\" type=\"submit\" value=\"Iniciar session\">";
				$idexhtmls.="</div>";
			}
			//// fin de seleccionar sucursal
			/////contenido 2 end
			/////
			$idexhtmls.="<hr>";
			$idexhtmls.="<div class=\"box_list_cart_order_buttons\">";
			$idexhtmls.="<span class=\"delete_order_in_page_data_sty button_delete_order_current\">Cancelar compra</span>";
			$idexhtmls.="<a class=\"continuarcomprando_in_page_back next_date_order_process_two menupagecurrent\" aria-label=\"carrito\" role=\"link\">Metodo de pago</a>";
			if(isset($_SESSION["usuarioid"])){
				$idexhtmls.="<a class=\"botonsiguientecarrito st_car_button_page next_date_order_process_ends_order\">PAGAR</a>";
				$idexhtmls.='<span class="buttoc_load_orderarial menupagecurrent_perfil" aria-label="perfil/historial_compras" role="link"></span>';
			}
			$idexhtmls.="</div>";
			$idexhtmls.="<li class=\"totalprecio pricetotalboxcarts proce_car_styl\">Total: S/. ".number_format($total,2,".",",")."</li>";
			$idexhtmls.="</div>";
			$idexhtmls.="<div class=\"conten_cart_null_listem\"></div>";
		}else{
			unset($_SESSION['car_stepp']);
		}
		$idexhtmls.="</div>";
		$idexhtmls.="</div>";


		$idexhtmls.="</div>";
		$idexhtmls.="</div>";
	}else{
		$idexhtmls="<div class=\"b_contenido_onb_page_luis\">";
		$idexhtmls.="<div class=\"c_contenido_onb_page_luis\">";
		$idexhtmls.="";
		$idexhtmls.="";
		$idexhtmls.="</div>";
		$idexhtmls.="</div>";
	}
}else{
	$idexhtmls="<div class=\"b_contenido_onb_page_luis\">";
	$idexhtmls.="<div class=\"c_contenido_onb_page_luis\">";

	$idexhtmls.="<section class=\"vista_preb_page\">";
	$idexhtmls.="<ol class=\"box_visw\">";
	$idexhtmls.="<li><a>Inicio</a></li>";
	$idexhtmls.="<li class=\"active\">Carrito</li>";
	$idexhtmls.="</ol>";
	$idexhtmls.="</section>";
	//Contenidos
	$idexhtmls.="<div class=\"contenido100\">";
	$idexhtmls.="<div class=\"contenidocarrito\">";
	if(isset($_SESSION["carrito"]) && count($_SESSION["carrito"])>0){
		$idexhtmls.="<div class=\"cart_content_list_items_orders_tbn\">";
		$totalcount_car_items="0";
		if(isset($_SESSION["carrito"])=='0'){
			$totalcount_car_items="0";
		}else{
			foreach($_SESSION['carrito']as$cantidadtotalcarrito){
				$totalcount_car_items += $cantidadtotalcarrito["q"];
			}
		}
		$idexhtmls.="<div class=\"count_items_in_car_styls count_items_in_car_styls_dt\">";
		$idexhtmls.=$totalcount_car_items;
		$idexhtmls.="</div>";
		$idexhtmls.="<br>";
		////

		foreach($_SESSION["carrito"] as $c){
			$producto=DatosAdmin::porID_producto($c["id_producto"]);
			$imagenes=DatosImagenes::mostrar_imagen_items_carta($producto->id);
			$typs_it=DatosAdmin::ver_opciones_type($producto->id);
			$volrtotal_precios=0;
			$idexhtmls.="<div class=\"items_list_views_order_list blockdisplayin \" id=\"itemsviewscartorder".$c["ident_item"]."\">";
			$idexhtmls.="<div class=\"viewimage_items_order_list\">";
			$idexhtmls.="<img src=\"".$basepagina."datos/modulos/".Luis::temass()."/source/imagenes/items/".$producto->id."/thumb/".$imagenes->imagen."\">";
			$idexhtmls.="</div>";
			/////
			$idexhtmls.="<div class=\"detail_producto_order_cart\">";
			$idexhtmls.="<h4 class=\"padbot\">".html_entity_decode($producto->nombre)."</h4>";
			if(count($typs_it)>0){
				$idexhtmls.="<div class=\"descript_c_item\">";
				foreach($typs_it as $tps){
					$id_data=$c[0][$tps->id];
					$opt_data_details = DatosAdmin::view_iten_in_pages_por_id($id_data);
					$idexhtmls.="<div class=\"title_descript_ok_opt title_descript_ok_opt_items\" data_type=\"".$tps->id."\" data_opt=\"".$opt_data_details->id."\">".$tps->nombre.": <span>".html_entity_decode($opt_data_details->nombre).$id_data."</span></div>";
					$volrtotal_precios+=$opt_data_details->precio;
				}
				$precio_nuevo_suma=$producto->precio_final+$volrtotal_precios;
				$idexhtmls.="<div class=\"peruvianprice\" itemprop=\"price\">Precio: S/. ".number_format($precio_nuevo_suma,2,".",",")."</div>";
				$idexhtmls.="<div class=\"quantity\">";
				$idexhtmls.="<input class=\"cantidad_cound_item\" type=\"number\" name=\"q\" min=\"1\" data_code=\"".$c["ident_item"]."\" id=\"num-".$c["ident_item"]."\" value=\"".$c["q"]."\">";
				$idexhtmls.="</div>";
				$idexhtmls.="</div>";
			}
			$idexhtmls.="</div>";
			///////
			////
			$idexhtmls.="<div class=\"close_cart_orders_list close_cart_orders_list_order\">";
			$idexhtmls.="<a class=\"boton_eliminar_producto_de_carrito\" data_cart=\"".$c["ident_item"]."\">x</a>";
			$idexhtmls.="</div>";
			///
			$idexhtmls.="</div>";
			$total += $c["q"]*$precio_nuevo_suma;
		}
		$idexhtmls.="<hr>";
		$idexhtmls.="<div class=\"box_list_cart_order_buttons\">";
		$idexhtmls.="<span class=\"delete_order_in_page_data_sty button_delete_order_current\">Cancelar compra</span>";
		$idexhtmls.="<a class=\"continuarcomprando_in_page_back\" href=\"".$basepagina."\">Seguir comprando</a>";
		$idexhtmls.="<a class=\"botonsiguientecarrito st_car_button_page next_date_order_process menupagecurrent\" aria-label=\"carrito\" role=\"link\">Siguiente</a>";
		$idexhtmls.="</div>";
		$idexhtmls.="<li class=\"totalprecio pricetotalboxcarts proce_car_styl\">Total: S/. ".number_format($total,2,".",",")."</li>";
		$idexhtmls.="</div>";
		$idexhtmls.="<div class=\"conten_cart_null_listem\"></div>";
	}else{
		$idexhtmls.="<div class=\"conten_cart_null_listem\">";
		$idexhtmls.="<h2 class=\"titulo2carrito\">NO TIENES PRODUCTOS EN TU CARRITO</h2>";
		$idexhtmls.="<hr>";
		$idexhtmls.="<h3 class=\"subtitulocarrito\">Encuentra los mejores productos, a los mejores precios.</h3>";
		$idexhtmls.="<div class=\"nuevacompra\">";
		$idexhtmls.="<a class=\"botoniniciacompra menupagecurrent\" aria-label=\"inicio\" role=\"link\" href=\"".$basepagina."\">Comprar ahora</a>";
		$idexhtmls.="</div>";
		$idexhtmls.="</div>";
	}
	$idexhtmls.="</div>";
	$idexhtmls.="</div>";

	$idexhtmls.="</div>";
	$idexhtmls.="</div>";
}


return $idexhtmls;