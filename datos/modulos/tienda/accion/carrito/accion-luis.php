<?php
$total=0;
$basepagina = Luis::basepage("base_page");
$moneda_principal = DatosAdmin::mostrar_la_moneda_principal();
if($moneda_principal){
	$moneda_principal_view=$moneda_principal->simbolo;
}else{
	$moneda_principal_view=false; 
}
$idexhtmls="<div class=\"b_contenido_onb_page_luis\">";
	$idexhtmls.="<div class=\"c_contenido_onb_page_luis\">";
		$idexhtmls.="<section class=\"vista_preb_page\">";
			$idexhtmls.="<ol class=\"box_visw\">";
				$idexhtmls.="<li><a>".str_replace("_"," ",Luis::lang("inicio"))."</a></li>";
				if(isset($_SESSION['car_stepp'])){
					if($_SESSION['car_stepp']==2){
						$idexhtmls.="<li><a>".str_replace("_"," ",Luis::lang("carrito"))."</a></li>";
						$idexhtmls.="<li class=\"active\">".str_replace("_"," ",Luis::lang("sucursal"))."</li>";
					}elseif($_SESSION['car_stepp']==3){
						$idexhtmls.="<li><a>".str_replace("_"," ",Luis::lang("carrito"))."</a></li>";
						$idexhtmls.="<li class=\"active\">".str_replace("_"," ",Luis::lang("metodo_de_pago"))."</li>";
					}else{
						$idexhtmls.="<li class=\"active\">".str_replace("_"," ",Luis::lang("carrito"))."</li>";
					}
				}
			$idexhtmls.="</ol>";
		$idexhtmls.="</section>";

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
				$idexhtmls.="<div class=\"funtions_title_on_back\">";
					if(isset($_SESSION['car_stepp'])){
						if($_SESSION['car_stepp']==2){
							$idexhtmls.="<a class=\"continuarcomprando_in_page_back tinuarcomprando_in_page_ba back_in_order_list_page menupagecurrent\" href=\"".$basepagina."carrito\" aria-label=\"carrito\" role=\"link\">".str_replace("_"," ",Luis::lang("volver_al_carrito"))."</a>";
						}elseif($_SESSION['car_stepp']==3){
							if(isset($_SESSION['usuarioid'])) {
								$visualizar_venta_current_o = DatosAdmin::view_order_realtime_in_page($_SESSION['usuarioid']);
								if($visualizar_venta_current_o){
									if($visualizar_venta_current_o->tipo_venta=="TIENDA001"){
										$idexhtmls.="<a class=\"continuarcomprando_in_page_back tinuarcomprando_in_page_ba next_date_order_process menupagecurrent\" href=\"".$basepagina."carrito\" aria-label=\"carrito\" role=\"link\">".str_replace("_"," ",Luis::lang("volver_a_sucursales"))."</a>";
									}elseif($visualizar_venta_current_o->tipo_venta=="DELIVERY001"){
										$idexhtmls.="<a class=\"continuarcomprando_in_page_back tinuarcomprando_in_page_ba next_date_order_process menupagecurrent\" href=\"".$basepagina."carrito\" aria-label=\"carrito\" role=\"link\">".str_replace("_"," ",Luis::lang("volver_a_direcciones"))."</a>";
									}
								}else{
									$idexhtmls.="<a class=\"continuarcomprando_in_page_back tinuarcomprando_in_page_ba back_in_order_list_page menupagecurrent\" href=\"".$basepagina."carrito\" aria-label=\"carrito\" role=\"link\">".str_replace("_"," ",Luis::lang("volver_al_carrito"))."</a>";
								}
							}
							
						}elseif($_SESSION['car_stepp']==4){
							$idexhtmls.="<a class=\"continuarcomprando_in_page_back tinuarcomprando_in_page_ba next_date_order_process_two_s menupagecurrent\" href=\"".$basepagina."carrito\" aria-label=\"carrito\" role=\"link\">".str_replace("_"," ",Luis::lang("volver_a_metodo_de_pagos"))."</a>";
						}
					}else{
						$idexhtmls.="<a class=\"continuarcomprando_in_page_back tinuarcomprando_in_page_ba\" href=\"".$basepagina."\">".str_replace("_"," ",Luis::lang("seguir_comprando"))."</a>";
					}
				$idexhtmls.="</div>";

				$idexhtmls.="<div class=\"count_items_in_car_styls count_items_in_car_styls_dt\">";
					$idexhtmls.="<h2>".Luis::lang("carrito")."</h3>";
					$idexhtmls.="<h4>".$totalcount_car_items." ".Luis::lang("productos")."</h4>";
				$idexhtmls.="</div>";

			$idexhtmls.="</div>";
		}
		$idexhtmls.="<div class=\"contenido100\">";
			$idexhtmls.="<div class=\"contenidocarrito\">";
				if(isset($_SESSION['car_stepp'])){
					if($_SESSION['car_stepp']==2){
						if(isset($_SESSION["carrito"]) && count($_SESSION["carrito"])>0){
							$idexhtmls.="<div class=\"cart_content_list_items_orders_tbn\">";
								foreach($_SESSION["carrito"] as $c){
									$producto=DatosAdmin::porID_producto($c["id_producto"]);
									$typs_it=DatosAdmin::ver_opciones_type($producto->id);
									$volrtotal_precios=0;
									if(count($typs_it)>0){
										foreach($typs_it as $tps){
											if(isset($c[0][$tps->id])){
												$id_data=$c[0][$tps->id];
												$opt_data_details = DatosAdmin::view_iten_in_pages_por_id($id_data);
												if($opt_data_details->precio==1){
													$open_producto = DatosAdmin::porID_producto($opt_data_details->item_k);
													$volrtotal_precios+=$open_producto->precio_final;
												}else{
													$volrtotal_precios+=0;
												}
											}else{
												$opt_data_details = DatosAdmin::view_iten_in_pages_por_id($tps->id);
												$volrtotal_precios+=0;
											}
										}
										$precio_nuevo_suma=$producto->precio_final+$volrtotal_precios;
									}
									$total += $c["q"]*$precio_nuevo_suma;
								}
								////contenido
								if(isset($_SESSION["usuarioid"])){
									$idexhtmls.="<div class=\"box_session_new_next_order\">";
										$tiposdeventa=DatosAdmin::Mostrartipos_de_ventas_or();
										$visualizar_venta_current_o = DatosAdmin::view_order_realtime_in_page($_SESSION['usuarioid']);
										$idexhtmls.="<div class=\"box_session_new_next_order_conten\">";
											foreach($tiposdeventa as $tve){
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
										$idexhtmls.="</div>";
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
									$idexhtmls.="<div class=\"contenido_access_page_luis \">";
										$idexhtmls.='<h1>Acceder</h1>';
										$idexhtmls.='<label><input class="input_access_dl sess_input_text_data_a" placeholder="Correo"></label>';
										$idexhtmls.='<label><input class="input_access_dl sess_input_text_data_b" type="password" placeholder="Password"></label>';
										$idexhtmls.='<label><input class="input_access_dl sess_input_text_data_c view_null" type="text" placeholder="Codigo de verificacion"></label>';
										$idexhtmls.='<span class="button_acces_dl sess_input_button790">Acceder</span>';
										$idexhtmls.='<span class="button_acces_new_dl button_acces_new_dl_a">Registrarme</span>';
									$idexhtmls.='</div>';
									$idexhtmls.="<div class=\"contenido_access_new_page_luis view_null\">";
										$idexhtmls.='<h1>Registrar</h1>';
										$idexhtmls.='<label><input class="input_access_dl reg_input_text_data_a" placeholder="Correo"></label>';
										$idexhtmls.='<label><input class="input_access_dl reg_input_text_data_b" type="password" placeholder="Contrase&ntilde;a"></label>';
										$idexhtmls.='<label><input class="input_access_dl reg_input_text_data_c" type="password" placeholder="Confirmar contrase&ntilde;a"></label>';
										$idexhtmls.='<label class="title_data_cl">Datos</label>';
										$idexhtmls.='<label><input class="input_access_dl reg_input_text_data_d" name="dnis" placeholder="DNI"></label>';
										$idexhtmls.='<label><input class="input_access_dl reg_input_text_data_e" name="nombres" placeholder="Nombres"></label>';
										$idexhtmls.='<label><input class="input_access_dl reg_input_text_data_f" name="apellido_paterno" placeholder="Apellido paterno"></label>';
										$idexhtmls.='<label><input class="input_access_dl reg_input_text_data_g" name="apellido_materno" placeholder="Apellido materno"></label>';
										$idexhtmls.='<label><input class="input_access_dl reg_input_text_data_h_c" placeholder="Numero de celular"></label>';
										$idexhtmls.='<span class="button_acces_dl sess_input_button790_b">Registrar</span>';
										$idexhtmls.='<span class="button_acces_new_dl button_acces_new_dl_b">Acceder</span>';
									$idexhtmls.='</div>';
								}
								//// fin de seleccionar sucursal
								/////contenido 2 end
								/////
								$idexhtmls.="<hr>";
								$idexhtmls.="<div class=\"box_list_cart_order_buttons\">";
									if(isset($_SESSION["usuarioid"])){
										if($visualizar_venta_current_o){
											if($visualizar_venta_current_o->tipo_venta=="TIENDA001"){
												$idexhtmls.="<a class=\"botonsiguientecarrito st_car_button_page next_date_order_process_two new_stored_page_realtime menupagecurrent\"  aria-label=\"carrito\" role=\"link\">".Luis::lang("siguiente")."</a>";
											}elseif($visualizar_venta_current_o->tipo_venta=="DELIVERY001"){
												$idexhtmls.="<a class=\"botonsiguientecarrito st_car_button_page next_date_order_process_two new_stored_page_realtime_envio menupagecurrent\">".Luis::lang("siguiente")."</a>";
											}							
										}
									}
								$idexhtmls.="</div>";
								$idexhtmls.="<li class=\"totalprecio pricetotalboxcarts proce_car_styl\">".$moneda_principal_view.". ".number_format($total,2,".",",")."</li>";
							$idexhtmls.="</div>";
							$idexhtmls.="<div class=\"conten_cart_null_listem\"></div>";
						}else{
							unset($_SESSION['car_stepp']);
						}
					}elseif($_SESSION['car_stepp']==3){
						if(isset($_SESSION["carrito"]) && count($_SESSION["carrito"])>0){
							$idexhtmls.="<div class=\"cart_content_list_items_orders_tbn\">";
								//// contenido 
								foreach($_SESSION["carrito"] as $c){
									$producto=DatosAdmin::porID_producto($c["id_producto"]);
									$typs_it=DatosAdmin::ver_opciones_type($producto->id);
									$volrtotal_precios=0;
									if(count($typs_it)>0){
										foreach($typs_it as $tps){
											if(isset($c[0][$tps->id])){
												$id_data=$c[0][$tps->id];
												$opt_data_details = DatosAdmin::view_iten_in_pages_por_id($id_data);
												if($opt_data_details->precio==1){
													$open_producto = DatosAdmin::porID_producto($opt_data_details->item_k);
													$volrtotal_precios+=$open_producto->precio_final;
												}else{
													$volrtotal_precios+=0;
												}
											}else{
												$opt_data_details = DatosAdmin::view_iten_in_pages_por_id($tps->id);
												$volrtotal_precios+=0;
											}
										}
										$precio_nuevo_suma=$producto->precio_final+$volrtotal_precios;
									}
									$total += $c["q"]*$precio_nuevo_suma;
								}
								////contenido
								if(isset($_SESSION["usuarioid"])){
									$documentos_venta = DatosAdmin::view_documents();
									$visualizar_venta_current = DatosAdmin::view_order_realtime_in_page($_SESSION['usuarioid']);
									if($visualizar_venta_current){
										$idexhtmls.="<div class=\"box_session_new_next_order\">";
											$idexhtmls.="<div class=\"carrito_seleccionado_step_dos_style_lp\">";
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
															$idexhtmls.="<label for=\"".$ven_d->id."\" class=\"carrito_seleccionado_step_dos_style_lp_text\">".strtolower(str_replace("_", " ", Luis::lang(Functions::poner_subguion(html_entity_decode($ven_d->nombre))))).".</label>";
														$idexhtmls.="</li>";
													}
												}
											$idexhtmls.="</div>";
										$idexhtmls.="</div>";

										$idexhtmls.="<div class=\"box_session_new_next_order\">";
											$idexhtmls.="<div class=\"carrito_seleccionado_step_dos_style_lp_two\">";
												$idexhtmls.="<label>".strtolower(str_replace("_", " ", Luis::lang("numero_de")))." ".$visualizar_documento->campo_requerido."</label>";
												if(isset($visualizar_venta_current->cliente_doc)){
													$documento_cliente_num = $visualizar_venta_current->cliente_doc;
												}else{
													$documento_cliente_num = $ver_usuario_en_venta->c;
												}
												$idexhtmls.="<input class=\"number_doc_in_new_order_web number_doc_in_new_order_web_ac_lims\" type=\"text\" value=\"".$documento_cliente_num."\">";
											$idexhtmls.="</div>";
										$idexhtmls.="</div>";

										$idexhtmls.="<div class=\"box_session_new_next_order\">";
											$idexhtmls.="<div class=\"carrito_seleccionado_step_dos_style_lp_two\">";
												$idexhtmls.=strtolower(str_replace("_", " ", Luis::lang("metodo_de_pago")));
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
																	$idexhtmls.="<span>".strtolower(str_replace("_", " ", Luis::lang(Functions::poner_subguion(html_entity_decode($mp->nombre)))))."</span>";
																$idexhtmls.="</div>";
															$idexhtmls.="</div>";
														$idexhtmls.="</label>";
													}
												$idexhtmls.="</div>";
											$idexhtmls.="</div>";
										$idexhtmls.="</div>";
									}
								}
								//// fin de seleccionar sucursal
								/////contenido 2 end
								/////
								$idexhtmls.="<hr>";
								$idexhtmls.="<div class=\"box_list_cart_order_buttons\">";	
									if(isset($_SESSION["usuarioid"])){
										$idexhtmls.="<span class=\"botonsiguientecarrito st_car_button_page next_date_order_process_three new_stored_page_realtime_pagos\">".Luis::lang("siguiente")."</span>";
									}
								$idexhtmls.="</div>";
								$idexhtmls.="<li class=\"totalprecio pricetotalboxcarts proce_car_styl\">".$moneda_principal_view.". ".number_format($total,2,".",",")."</li>";
							$idexhtmls.="</div>";
							$idexhtmls.="<div class=\"conten_cart_null_listem\"></div>";
						}else{
							unset($_SESSION['car_stepp']);
						}
						//////*/
					}elseif($_SESSION['car_stepp']==4){
						if(isset($_SESSION["carrito"]) && count($_SESSION["carrito"])>0){
							$idexhtmls.="<div class=\"cart_content_list_items_orders_tbn\">";
								//// contenido 
								foreach($_SESSION["carrito"] as $c){
									$producto=DatosAdmin::porID_producto($c["id_producto"]);
									$typs_it=DatosAdmin::ver_opciones_type($producto->id);
									$volrtotal_precios=0;
									if(count($typs_it)>0){
										foreach($typs_it as $tps){
											if(isset($c[0][$tps->id])){
												$id_data=$c[0][$tps->id];
												$opt_data_details = DatosAdmin::view_iten_in_pages_por_id($id_data);
												if($opt_data_details->precio==1){
													$open_producto = DatosAdmin::porID_producto($opt_data_details->item_k);
													$volrtotal_precios+=$open_producto->precio_final;
												}else{
													$volrtotal_precios+=0;
												}
											}else{
												$opt_data_details = DatosAdmin::view_iten_in_pages_por_id($tps->id);
												$volrtotal_precios+=0;
											}
										}
										$precio_nuevo_suma=$producto->precio_final+$volrtotal_precios;
									}
									$total += $c["q"]*$precio_nuevo_suma;
								}
								////contenido
								if(isset($_SESSION["usuarioid"])){
									$visualizar_venta_current = DatosAdmin::view_order_realtime_in_page($_SESSION['usuarioid']);
									$idexhtmls.="<div class=\"box_session_new_next_order\">";
										$idexhtmls.="<div class=\"carrito_seleccionado_step_dos_style_lp_two\">";
											$idexhtmls.=strtolower(str_replace("_", " ", Luis::lang(html_entity_decode("metodo_de_pago"))));
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
								}
								//// fin de seleccionar sucursal
								/////contenido 2 end
								/////
								$idexhtmls.="<hr>";
								$idexhtmls.="<div class=\"box_list_cart_order_buttons\">";
									if(isset($_SESSION["usuarioid"])){
										$idexhtmls.="<a class=\"botonsiguientecarrito st_car_button_page next_date_order_process_ends_order\">PAGAR</a>";
										$idexhtmls.='<span class="buttoc_load_orderarial menupagecurrent_perfil" aria-label="perfil/historial_compras" role="link"></span>';
									}
								$idexhtmls.="</div>";
								$idexhtmls.="<li class=\"totalprecio pricetotalboxcarts proce_car_styl\">".$moneda_principal_view.". ".number_format($total,2,".",",")."</li>";
							$idexhtmls.="</div>";
							$idexhtmls.="<div class=\"conten_cart_null_listem\"></div>";
						}else{
							unset($_SESSION['car_stepp']);
						}
					}
				}else{
					//Contenidos
					$idexhtmls.="<div class=\"contenidocarrito_in_page_car\">";
						if(isset($_SESSION["carrito"]) && count($_SESSION["carrito"])>0){
							$idexhtmls.="<div class=\"cart_content_list_items_orders_tbn\">";
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
													if(isset($c[0][$tps->id])){
														$id_data=$c[0][$tps->id];
														$opt_data_details = DatosAdmin::view_iten_in_pages_por_id($id_data);
														$idexhtmls.="<div class=\"title_descript_ok_opt title_descript_ok_opt_items\" data_type=\"".$tps->id."\" data_opt=\"".$opt_data_details->id."\">";
															$detalles_opciones = DatosAdmin::ver_detalles_opciones($tps->id);
															if($tps->id_cat_sub_add){
																$cat_b = DatosAdmin::sub_categoria_getById($tps->id_cat_sub_add);
																$idexhtmls.="<span class=\"title_item_in_car\">".html_entity_decode($cat_b->nombre)."</span>";
															}elseif($tps->id_cat_add){
																$cat_a = DatosAdmin::getById_categoria($tps->id_cat_add);
																$idexhtmls.="<span class=\"title_item_in_car\">".html_entity_decode($cat_a->nombre)."</span>";
															}else{
																$idexhtmls.="<span class=\"title_item_in_car\">".html_entity_decode($tps->nombre)."</span>";
															}
															$idexhtmls.="<span>".html_entity_decode($opt_data_details->nombre)."</span>";
														$idexhtmls.="</div>";
														if($opt_data_details->precio==1){
															$open_producto = DatosAdmin::porID_producto($opt_data_details->item_k);
															$volrtotal_precios+=$open_producto->precio_final;
														}else{
															$volrtotal_precios+=0;
														}
													}else{
														$idexhtmls.="<div class=\"title_descript_ok_opt title_descript_ok_opt_items\" data_type=\"".$tps->id."\" data_opt=\"0\">".$tps->nombre."</div>";
														$volrtotal_precios+=0;	
													}
												}
												$precio_nuevo_suma=$producto->precio_final+$volrtotal_precios;
												if($producto->moneda_a){
													$moneda_por_id_a=DatosAdmin::Mostrar_las_monedas_por_id($producto->moneda_a)->simbolo;
												}else{
													$moneda_por_id_a=false; 
												}
												$idexhtmls.="<div class=\"peruvianprice\" itemprop=\"price\">".$moneda_por_id_a.". ".number_format($precio_nuevo_suma,2,".",",")."</div>";
													$idexhtmls.="<div class=\"quantity\">";
														$idexhtmls.="<input class=\"cantidad_cound_item\" type=\"number\" name=\"q\" min=\"1\" data_code=\"".$c["ident_item"]."\" id=\"num-".$c["ident_item"]."\" value=\"".$c["q"]."\">";
													$idexhtmls.="</div>";
												$idexhtmls.="</div>";
											}
										$idexhtmls.="</div>";
										///////
										$idexhtmls.="<div class=\"close_cart_orders_list close_cart_orders_list_order\">";
											$idexhtmls.="<a class=\"boton_eliminar_producto_de_carrito\" data_cart=\"".$c["ident_item"]."\">x</a>";
										$idexhtmls.="</div>";
										///
									$idexhtmls.="</div>";
									$total += $c["q"]*$precio_nuevo_suma;
								}
								$idexhtmls.="<hr>";
								$idexhtmls.="<div class=\"box_list_cart_order_buttons\">";
									$idexhtmls.="<a class=\"botonsiguientecarrito st_car_button_page next_date_order_process menupagecurrent\" aria-label=\"carrito\" role=\"link\">Siguiente</a>";
								$idexhtmls.="</div>";
								$idexhtmls.="<li class=\"totalprecio pricetotalboxcarts proce_car_styl\">".$moneda_principal_view.". ".number_format($total,2,".",",")."</li>";
							$idexhtmls.="</div>";
							$idexhtmls.="<div class=\"conten_cart_null_listem\"></div>";
						}else{
							$idexhtmls.="<div class=\"conten_cart_null_listem\">";
								$idexhtmls.="<h2 class=\"titulo2carrito\">".str_replace("_"," ",Luis::lang("carrito_sin_productos"))."</h2>";
								$idexhtmls.="<hr>";
								$idexhtmls.="<h3 class=\"subtitulocarrito\">".str_replace("_"," ",Luis::lang("encuentra_productos_a_los_mejores_precios")).".</h3>";
								$idexhtmls.="<div class=\"butt_luis_one\">";
									$idexhtmls.="<a class=\"botoniniciacompra menupagecurrent\" aria-label=\"inicio\" role=\"link\" href=\"".$basepagina."\"><span>".str_replace("_"," ",Luis::lang("inicio"))."</span></a>";
								$idexhtmls.="</div>";
							$idexhtmls.="</div>";
						}
					$idexhtmls.="</div>";
				}
				if(isset($_SESSION["carrito"]) && count($_SESSION["carrito"])>0){
					$idexhtmls.="<div class=\"cart_content_list_items_orders_tbn\">";
						$idexhtmls.="<div class='funtions_title_on_back'><span class=\"delete_order_in_page_data_sty button_delete_order_current\">".str_replace("_"," ",Luis::lang("vaciar_carrito"))."</span></div>";
					$idexhtmls.="</div>";
				}
				
			$idexhtmls.="</div>";
		$idexhtmls.="</div>";
	$idexhtmls.="</div>";
$idexhtmls.="</div>";
return $idexhtmls;