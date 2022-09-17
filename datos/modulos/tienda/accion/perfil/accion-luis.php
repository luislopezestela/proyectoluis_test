<?php

$r = $_SERVER['REQUEST_URI']; 
$r = explode('/', $r);
$r = array_filter($r);
$r = array_merge($r, array()); 
$r = preg_replace('/\?.*/', '', $r);
$displ_active=null;
$displ_active1=null;
$displ_active2=null;
$displ_active3=null;
$displ_active4=null;
$title_optio_perfiles=null;
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
	if(isset($r[1])){
		$number_page=$r[1];
	}else{
		$number_page=Luis::lang('perfil');;
	}
	if($number_page=="direcciones"){
		$displ_active1="opacit";
		$title_optio_perfiles=Luis::lang('direcciones');
	}elseif($number_page=="historial_compras"){
		$displ_active2="opacit";
		$title_optio_perfiles=Luis::lang('compras');
	}elseif($number_page=="configurar"){
		$displ_active3="opacit";
		$title_optio_perfiles=Luis::lang('configurar');
	}elseif($number_page=="cambiar_pass"){
		$displ_active4="opacit";
		$title_optio_perfiles=Luis::lang('cambiar_contrasena');;
	}elseif($number_page=="perfil"){
		$displ_active="opacit";
		$title_optio_perfiles=Luis::lang('perfil');;
	}

	$idexhtmls="<div class=\"b_contenido_onb_page_luis\">";
		$idexhtmls.="<div class=\"c_contenido_onb_page_luis\">";
			$idexhtmls.='<div class="contenedor_datos_users">';

				

				$idexhtmls.='<div class="a_contenidos_perfile_data">';
					$idexhtmls.='<div class="contenidos_perfile_data">';
						$idexhtmls.='<div class="contenedor_perfil_left">';
							$idexhtmls.='<div class="perfil_left_a">';
								$idexhtmls.='<div class="perfil_left_b">';
									$idexhtmls.='<div class="perfil_left_c">';
										$idexhtmls.='<h2 class="perfil_left_title">Menu de perfil</h2>';
											$idexhtmls.='<div class="perfil_left_data_a">';
												$idexhtmls.='<div class="perfil_left_data_b">';
													$idexhtmls.='<div class="perfil_left_data_c">';
														$idexhtmls.='<div>';
															$idexhtmls.='<ul>';
																$idexhtmls.='<li>';
																	$idexhtmls.='<div class="perfil_left_data_list">';
																		$idexhtmls.='<a class="perfil_left_data_list_a menupagecurrent_perfil" aria-label="perfil" role="link">';
																			$idexhtmls.='<div class="perfil_left_data_list_a_data">';
																				$idexhtmls.='<div class="perfil_left_data_list_a_data_icon">';
																					$idexhtmls.='<svg x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="36" height="36">';
																						$idexhtmls.'<g>';
																							$idexhtmls.='<circle cx="256" cy="128" r="128"/>';
																							$idexhtmls.='<path d="M256,298.667c-105.99,0.118-191.882,86.01-192,192C64,502.449,73.551,512,85.333,512h341.333   c11.782,0,21.333-9.551,21.333-21.333C447.882,384.677,361.99,298.784,256,298.667z"/>';
																						$idexhtmls.='</g>';
																					$idexhtmls.='</svg>';
																				$idexhtmls.='</div>';

																				$idexhtmls.='<div class="perfil_left_data_list_a_data_name">';
																					$idexhtmls.='<div class="perfil_left_data_list_a_data_name_a">';
																						$idexhtmls.='<div>';
																							$idexhtmls.='<div class="perfil_left_data_list_a_data_name_b">';
																								$idexhtmls.='<div class="perfil_left_data_list_a_data_name_c">';
																									$idexhtmls.='<span class="perfil_left_data_list_a_data_name_d">';
																										$idexhtmls.='<span class="perfil_left_data_list_a_data_name_e">'.Luis::lang('perfil').'</span>';
																									$idexhtmls.='</span>';
																								$idexhtmls.='</div>';
																							$idexhtmls.='</div>';
																						$idexhtmls.='</div>';
																					$idexhtmls.='</div>';
																				$idexhtmls.='</div>';
																			$idexhtmls.='</div>';
																			$idexhtmls.='<div class="perfil_left_data_list_a_data_x '.$displ_active.'">';
																			$idexhtmls.='</div>';
																		$idexhtmls.='</a>';
																	$idexhtmls.='</div>';
																$idexhtmls.='</li>';

																$idexhtmls.='<li>';
																	$idexhtmls.='<div class="perfil_left_data_list">';
																		$idexhtmls.='<a class="perfil_left_data_list_a menupagecurrent_perfil" aria-label="perfil/direcciones" role="link">';
																			$idexhtmls.='<div class="perfil_left_data_list_a_data">';
																				$idexhtmls.='<div class="perfil_left_data_list_a_data_icon">';
																					$idexhtmls.='<svg viewBox="0 0 24 24" width="36" height="36">';
																						$idexhtmls.='<path d="M14,7a2,2,0,1,1-2-2A2,2,0,0,1,14,7Zm2.95,4.957L12,16.8,7.058,11.964a7,7,0,1,1,9.892-.008ZM16,7a4,4,0,1,0-4,4A4,4,0,0,0,16,7Zm5.867,3.613-1.435-.48a8.948,8.948,0,0,1-2.068,3.239L12,19.6l-6.34-6.2A8.989,8.989,0,0,1,3.24,9.029,2.968,2.968,0,0,0,0,12v9.752l7.983,2.281,8.02-2,8,1.948V13.483A3,3,0,0,0,21.867,10.612Z"/>';
																					$idexhtmls.='</svg>';
																				$idexhtmls.='</div>';

																				$idexhtmls.='<div class="perfil_left_data_list_a_data_name">';
																					$idexhtmls.='<div class="perfil_left_data_list_a_data_name_a">';
																						$idexhtmls.='<div>';
																							$idexhtmls.='<div class="perfil_left_data_list_a_data_name_b">';
																								$idexhtmls.='<div class="perfil_left_data_list_a_data_name_c">';
																									$idexhtmls.='<span class="perfil_left_data_list_a_data_name_d">';
																										$idexhtmls.='<span class="perfil_left_data_list_a_data_name_e">'.Luis::lang('direcciones').'</span>';
																									$idexhtmls.='</span>';
																								$idexhtmls.='</div>';
																							$idexhtmls.='</div>';
																						$idexhtmls.='</div>';
																					$idexhtmls.='</div>';
																				$idexhtmls.='</div>';
																			$idexhtmls.='</div>';
																			$idexhtmls.='<div class="perfil_left_data_list_a_data_x '.$displ_active1.'">';
																			$idexhtmls.='</div>';
																		$idexhtmls.='</a>';
																	$idexhtmls.='</div>';
																$idexhtmls.='</li>';

																$idexhtmls.='<li>';
																	$idexhtmls.='<div class="perfil_left_data_list">';
																		$idexhtmls.='<a class="perfil_left_data_list_a menupagecurrent_perfil" aria-label="perfil/historial_compras" role="link">';
																			$idexhtmls.='<div class="perfil_left_data_list_a_data">';
																				$idexhtmls.='<div class="perfil_left_data_list_a_data_icon">';
																					$idexhtmls.='<svg height="36" viewBox="0 0 24 24" width="36">';
																							$idexhtmls.='<path d="M24,10,21.8,0H2.2L.024,9.783,0,11a3.966,3.966,0,0,0,1,2.618V21a3,3,0,0,0,3,3H20a3,3,0,0,0,3-3V13.618A3.966,3.966,0,0,0,24,11ZM2,10.109,3.8,2H7V6H9V2h6V6h2V2h3.2L22,10.109V11a2,2,0,0,1-2,2H19a2,2,0,0,1-2-2H15a2,2,0,0,1-2,2H11a2,2,0,0,1-2-2H7a2,2,0,0,1-2,2H4a2,2,0,0,1-2-2ZM20,22H4a1,1,0,0,1-1-1V14.858A3.939,3.939,0,0,0,4,15H5a3.975,3.975,0,0,0,3-1.382A3.975,3.975,0,0,0,11,15h2a3.99,3.99,0,0,0,3-1.357A3.99,3.99,0,0,0,19,15h1a3.939,3.939,0,0,0,1-.142V21A1,1,0,0,1,20,22Z"/>';
																					$idexhtmls.='</svg>';
																				$idexhtmls.='</div>';

																				$idexhtmls.='<div class="perfil_left_data_list_a_data_name">';
																					$idexhtmls.='<div class="perfil_left_data_list_a_data_name_a">';
																						$idexhtmls.='<div>';
																							$idexhtmls.='<div class="perfil_left_data_list_a_data_name_b">';
																								$idexhtmls.='<div class="perfil_left_data_list_a_data_name_c">';
																									$idexhtmls.='<span class="perfil_left_data_list_a_data_name_d">';
																										$idexhtmls.='<span class="perfil_left_data_list_a_data_name_e">'.Luis::lang('compras').'</span>';
																									$idexhtmls.='</span>';
																								$idexhtmls.='</div>';
																							$idexhtmls.='</div>';
																						$idexhtmls.='</div>';
																					$idexhtmls.='</div>';
																				$idexhtmls.='</div>';
																			$idexhtmls.='</div>';
																			$idexhtmls.='<div class="perfil_left_data_list_a_data_x '.$displ_active2.'">';
																			$idexhtmls.='</div>';
																		$idexhtmls.='</a>';
																	$idexhtmls.='</div>';
																$idexhtmls.='</li>';

																$idexhtmls.='<li>';
																	$idexhtmls.='<div class="perfil_left_data_list">';
																		$idexhtmls.='<a class="perfil_left_data_list_a menupagecurrent_perfil" aria-label="perfil/configurar" role="link">';
																			$idexhtmls.='<div class="perfil_left_data_list_a_data">';
																				$idexhtmls.='<div class="perfil_left_data_list_a_data_icon">';
																					$idexhtmls.='<svg viewBox="0 0 24 24" width="36" height="36">';
																							$idexhtmls.='<path d="M21,12a9.143,9.143,0,0,0-.15-1.645L23.893,8.6l-3-5.2L17.849,5.159A9,9,0,0,0,15,3.513V0H9V3.513A9,9,0,0,0,6.151,5.159L3.107,3.4l-3,5.2L3.15,10.355a9.1,9.1,0,0,0,0,3.29L.107,15.4l3,5.2,3.044-1.758A9,9,0,0,0,9,20.487V24h6V20.487a9,9,0,0,0,2.849-1.646L20.893,20.6l3-5.2L20.85,13.645A9.143,9.143,0,0,0,21,12Zm-6,0a3,3,0,1,1-3-3A3,3,0,0,1,15,12Z"/>';
																					$idexhtmls.='</svg>';
																				$idexhtmls.='</div>';

																				$idexhtmls.='<div class="perfil_left_data_list_a_data_name">';
																					$idexhtmls.='<div class="perfil_left_data_list_a_data_name_a">';
																						$idexhtmls.='<div>';
																							$idexhtmls.='<div class="perfil_left_data_list_a_data_name_b">';
																								$idexhtmls.='<div class="perfil_left_data_list_a_data_name_c">';
																									$idexhtmls.='<span class="perfil_left_data_list_a_data_name_d">';
																										$idexhtmls.='<span class="perfil_left_data_list_a_data_name_e">'.Luis::lang('configurar').'</span>';
																									$idexhtmls.='</span>';
																								$idexhtmls.='</div>';
																							$idexhtmls.='</div>';
																						$idexhtmls.='</div>';
																					$idexhtmls.='</div>';
																				$idexhtmls.='</div>';
																			$idexhtmls.='</div>';
																			$idexhtmls.='<div class="perfil_left_data_list_a_data_x '.$displ_active3.'">';
																			$idexhtmls.='</div>';
																		$idexhtmls.='</a>';
																	$idexhtmls.='</div>';
																$idexhtmls.='</li>';

																$idexhtmls.='<li>';
																	$idexhtmls.='<div class="perfil_left_data_list">';
																		$idexhtmls.='<a class="perfil_left_data_list_a menupagecurrent_perfil" aria-label="perfil/cambiar_pass" role="link">';
																			$idexhtmls.='<div class="perfil_left_data_list_a_data">';
																				$idexhtmls.='<div class="perfil_left_data_list_a_data_icon">';
																					$idexhtmls.='<svg height="36" viewBox="0 0 24 24" width="36">';
																							$idexhtmls.='<path d="m15.989 12.7v-2.7a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h2.685a1.016 1.016 0 0 0 .922-.6 4.522 4.522 0 0 0 .376-2.377 3.491 3.491 0 0 0 -3.506-3.023 4.537 4.537 0 0 0 -3.208 1.329l-7.908 7.906a7.368 7.368 0 0 0 -3.881.048 7.5 7.5 0 0 0 2.036 14.717 7.654 7.654 0 0 0 .784-.041 7.529 7.529 0 0 0 6.428-5.429 7.334 7.334 0 0 0 .047-3.88l.65-.65a1.984 1.984 0 0 0 .575-1.3zm-10.489 7.3a1.5 1.5 0 1 1 1.5-1.5 1.5 1.5 0 0 1 -1.5 1.5z"/>';
																					$idexhtmls.='</svg>';
																				$idexhtmls.='</div>';

																				$idexhtmls.='<div class="perfil_left_data_list_a_data_name">';
																					$idexhtmls.='<div class="perfil_left_data_list_a_data_name_a">';
																						$idexhtmls.='<div>';
																							$idexhtmls.='<div class="perfil_left_data_list_a_data_name_b">';
																								$idexhtmls.='<div class="perfil_left_data_list_a_data_name_c">';
																									$idexhtmls.='<span class="perfil_left_data_list_a_data_name_d">';
																										$idexhtmls.='<span class="perfil_left_data_list_a_data_name_e">'.Luis::lang('cambiar_contrasena').'</span>';
																									$idexhtmls.='</span>';
																								$idexhtmls.='</div>';
																							$idexhtmls.='</div>';
																						$idexhtmls.='</div>';
																					$idexhtmls.='</div>';
																				$idexhtmls.='</div>';
																			$idexhtmls.='</div>';
																			$idexhtmls.='<div class="perfil_left_data_list_a_data_x '.$displ_active4.'">';
																			$idexhtmls.='</div>';
																		$idexhtmls.='</a>';
																	$idexhtmls.='</div>';
																$idexhtmls.='</li>';

																$idexhtmls.='<li>';
																	$idexhtmls.='<div class="perfil_left_data_list">';
																		$idexhtmls.='<a class="perfil_left_data_list_a ini_play_luis" role="link">';
																			$idexhtmls.='<div class="perfil_left_data_list_a_data">';
																				$idexhtmls.='<div class="perfil_left_data_list_a_data_icon">';
																					$idexhtmls.='<svg x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="36" height="36">';
																							$idexhtmls.='<path d="M170.698,448H72.757c-4.814-0.012-8.714-3.911-8.725-8.725V72.725c0.012-4.814,3.911-8.714,8.725-8.725h97.941   c17.673,0,32-14.327,32-32s-14.327-32-32-32H72.757C32.611,0.047,0.079,32.58,0.032,72.725v366.549   C0.079,479.42,32.611,511.953,72.757,512h97.941c17.673,0,32-14.327,32-32S188.371,448,170.698,448z"/>';
																							$idexhtmls.='<path d="M483.914,188.117l-82.816-82.752c-12.501-12.495-32.764-12.49-45.259,0.011s-12.49,32.764,0.011,45.259l72.789,72.768   L138.698,224c-17.673,0-32,14.327-32,32s14.327,32,32,32l0,0l291.115-0.533l-73.963,73.963   c-12.042,12.936-11.317,33.184,1.618,45.226c12.295,11.445,31.346,11.436,43.63-0.021l82.752-82.752   c37.491-37.49,37.491-98.274,0.001-135.764c0,0-0.001-0.001-0.001-0.001L483.914,188.117z"/>';
																					$idexhtmls.='</svg>';
																				$idexhtmls.='</div>';

																				if(isset($_SESSION['usuarioid'])){
																					$idexhtmls.='<div class="perfil_left_data_list_a_data_name">';
																						$idexhtmls.='<div class="perfil_left_data_list_a_data_name_a">';
																							$idexhtmls.='<div>';
																								$idexhtmls.='<div class="perfil_left_data_list_a_data_name_b">';
																									$idexhtmls.='<div class="perfil_left_data_list_a_data_name_c">';
																										$idexhtmls.='<span class="perfil_left_data_list_a_data_name_d">';
																											$idexhtmls.='<span class="perfil_left_data_list_a_data_name_e">'.Luis::lang("cerrar_session").'</span>';
																										$idexhtmls.='</span>';
																									$idexhtmls.='</div>';
																								$idexhtmls.='</div>';
																							$idexhtmls.='</div>';
																						$idexhtmls.='</div>';
																					$idexhtmls.='</div>';
																				}

																			$idexhtmls.='</div>';
																			$idexhtmls.='<div class="perfil_left_data_list_a_data_x">';
																			$idexhtmls.='</div>';
																		$idexhtmls.='</a>';
																	$idexhtmls.='</div>';
																$idexhtmls.='</li>';

																
															$idexhtmls.='</ul>';
														$idexhtmls.='</div>';
													$idexhtmls.='</div>';
												$idexhtmls.='</div>';
											$idexhtmls.='</div>';
									$idexhtmls.='</div>';
								$idexhtmls.='</div>';
							$idexhtmls.='</div>';
						$idexhtmls.='</div>';

						$idexhtmls.='<div class="contenedor_perfil_main">';
							$idexhtmls.='<div class="contenedor_perfil_main_a">';
								$idexhtmls.='<div class="contenedor_perfil_main_b">';
									$idexhtmls.='<div class="contenedor_perfil_main_c">';
										$idexhtmls.='<div class="contenedor_perfil_main_d">';
											$idexhtmls.='<div class="contenedor_perfil_main_e">';
												$idexhtmls.='<div class="contenedor_perfil_main_f">';
													$idexhtmls.='<div class="contenedor_perfil_main_g">';
														$idexhtmls.='<div>';
															$idexhtmls.='<div class="contenedor_perfil_main_timeline">';
																$idexhtmls.='<div class="contenedor_perfil_main_timeline_a">';
																	$idexhtmls.='<div>';
																		$idexhtmls.='<div>';
																			$idexhtmls.='<div class="contenedor_perfil_main_timeline_b">';
																				$idexhtmls.='<div class="contenedor_perfil_main_timeline_c">';
																					$idexhtmls.='<div class="contenedor_perfil_main_timeline_d">';
																						$idexhtmls.='<div class="contenedor_perfil_main_timeline_e">';
																							$idexhtmls.='<div class="title_pa_options_perf">'.$title_optio_perfiles.'</div>';

																							if($number_page=="direcciones"){
																								$idexhtmls.='<button class="custom-btn btn_saved_grange btn_new_ge_use btn_new_ge_use_persons btn_new_ge_use_persons_add">AGREGAR</button>';
																								$idexhtmls.='<div class="diplay_box_data_new_address_client">';
																									$idexhtmls.='<input class="data_input_selc_users_name" type="text" placeholder="NOMBRE">';
																									$idexhtmls.='<input class="data_input_selc_users_address" type="text" placeholder="DIRECCION">';
																									$idexhtmls.='<input class="data_input_selc_users_surg" type="text" placeholder="SUGERENCIA">';
																								$idexhtmls.='</div>';

																								$idexhtmls.='<div class="class_op_address_list_order">';
																									$direcciones_envios=DatosAdmin::Mostrar_direcciones_de_envio($_SESSION['usuarioid']);
																									foreach($direcciones_envios as $env){
																									///direcciones in
																										$idexhtmls.='<div class="conten_address_timelines contentboxitemslist_client_viewers'.$env->id.'">';
																										$idexhtmls.='<div class="class_op_address_list_order_direcc_logo">';
																										$idexhtmls.='<div class="marcador_mapa"></div>';
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
																							}elseif($number_page=="historial_compras"){
																								$idexhtmls.='<div class="box_page_compras_contenido">';
																									$lista_de_compras = DatosAdmin::compras_de_cliente($_SESSION['usuarioid']);
																									if(count($lista_de_compras)>0){
																										foreach ($lista_de_compras as $com){
																											$total=0;
																											$total1=0;
																											$detalles_de_venta = DatosAdmin::listar_detalles_ventas_pendientes_web($com->id);
																											$idexhtmls.='<div class="box_page_compras_lista">';
																												$idexhtmls.='<div class="box_page_compras_head">';
																													$idexhtmls.='<div class="left"><span>'.$com->numero_venta.'</span></div>';
																													if($com->estado_de_venta==2){
																														$idexhtmls.='<div class="center comp_op_a"><span>'.Luis::lang("cancelado").'</span></div>';
																													}elseif($com->estado_de_venta==3){
																														$idexhtmls.='<div class="center comp_op_b"><span>'.Luis::lang("entregado").'</span></div>';
																													}elseif($com->estado_de_venta==4){
																														$idexhtmls.='<div class="center comp_op_c"><span>'.Luis::lang("reservado").'</span></div>';
																													}elseif($com->estado_de_venta==5){
																														$idexhtmls.='<div class="center comp_op_d"><span>'.Luis::lang("pendiente").'</span></div>';
																													}elseif($com->estado_de_venta==6){
																														$idexhtmls.='<div class="center comp_op_e"><span>'.Luis::lang("recibido").'</span></div>';
																													}elseif($com->estado_de_venta==7){
																														$idexhtmls.='<div class="center comp_op_f"><span>'.Luis::lang("finalizado").'</span></div>';
																													}
																													
																													$idexhtmls.='<div class="right"><span data-modal-trigger="detalles_compra_'.$com->barcode.'">'.Luis::lang("detalles").'</span></div>';

																													$idexhtmls.='<div class="modal" data-modal-name="detalles_compra_'.$com->barcode.'" data-modal-dismiss>';
																														$idexhtmls.='<div class="modal__dialog">';
																															$idexhtmls.='<header class="modal__header">';
																															$idexhtmls.='<h3 class="modal__title">'.$com->numero_venta.'</h3>';
																															$idexhtmls.='<i class="modal__close" data-modal-dismiss="">X</i>';
																															$idexhtmls.='</header>';
																															$idexhtmls.='<div class="modal__content">';
																															foreach($detalles_de_venta as $d_v1) {
																																$volrtotal_precios1=0;
																																$item_view_in_order1 = DatosAdmin::itemview_productos($d_v1->id_item);
																																$item_option_type_view1 = DatosAdmin::listar_detalles_ventas_pendientes_web_sub($d_v1->codigo);
																																$idexhtmls.='<div class="items_list_en_compra_conten">';
																																	$idexhtmls.='<div class="en_compra_conten en_compra_conten_a">';
																																		$idexhtmls.=html_entity_decode($item_view_in_order1->nombre);
																																	$idexhtmls.='</div>';
																																	$idexhtmls.='<div class="en_compra_conten en_compra_conten_b">';
																																	foreach($item_option_type_view1 as $v_iop){
																																		if($v_iop->id_opcion_sub){
																																			$view_data_sub_one_details1 = DatosAdmin::view_iten_in_pages_por_id($v_iop->id_opcion_sub);
																																			$view_type_options_details1 = DatosAdmin::ver_opciones_type_por_id($view_data_sub_one_details1->id_opciones_type);
																																			if($view_data_sub_one_details1->precio==1){
																																				$open_producto1 = DatosAdmin::porID_producto($view_data_sub_one_details1->item_k);
																																				$volrtotal_precios1+=$open_producto1->precio_final;
																																			}else{
																																				$volrtotal_precios1+=0;
																																			}
																																		}else{
																																			$volrtotal_precios1+=0;
	 																																	}
																																	}
																																	$idexhtmls.='</div>';
																																	$precio_nuevo_suma1=$item_view_in_order1->precio_final+$volrtotal_precios1;
																																	$total1 += $d_v1->cantidad*$precio_nuevo_suma1;
																																	$mostrar_tipo_de_moneda=DatosAdmin::Mostrar_las_monedas_por_id($com->moneda);
																																	$idexhtmls.='<div class="en_compra_conten en_compra_conten_c">';
																																		$idexhtmls.='<div class="en_compra_conten_c_a">';
																																			$idexhtmls.='<span>'.Luis::lang("cantidad").' </span>';
																																			$idexhtmls.='<span>'.$d_v1->cantidad.'</span>';
																																		$idexhtmls.='</div>';
																																		$idexhtmls.='<div class="en_compra_conten_c_a">';
																																			$idexhtmls.='<span>'.Luis::lang("precio").' </span>';
																																			$idexhtmls.='<span>'.$mostrar_tipo_de_moneda->simbolo.". ".number_format($precio_nuevo_suma1,2,".",",").'</span>';
																																		$idexhtmls.='</div>';
																																	$idexhtmls.='</div>';

																																	
																																$idexhtmls.='</div>';
																															}
																															$idexhtmls.='';
																															$idexhtmls.='';
																															$idexhtmls.='</div>';
																														$idexhtmls.='</div>';
																													$idexhtmls.='</div>';

																												$idexhtmls.='</div>';

																												$idexhtmls.='<div class="box_page_compras_body">';
																												$idexhtmls.='<span class="date_name_bod">'.Luis::lang("resumen").'</span>';
																													$idexhtmls.='<div class="box_page_compras_body_resd">';
																														$ver_tipo_venta = DatosAdmin::tipo_de_venta_nombre($com->tipo_venta);
																														$metodo_de_pago = DatosAdmin::metododepago_porelId($com->metodo_pago);
																														$cantidad_stock = DatosAdmin::contar_stock_en_venta($com->id)->c;
																														$idexhtmls.='<div class="detailsorderl_items">';
																															$idexhtmls.='<span>'.Luis::lang("entrega").'</span>';
																															$idexhtmls.=html_entity_decode($ver_tipo_venta->nombre);
																														$idexhtmls.='</div>';
																														$idexhtmls.='<div class="detailsorderl_items">';
																															$idexhtmls.='<span>'.Luis::lang("metodo_de_pago").'</span>';
																															$idexhtmls.=html_entity_decode($metodo_de_pago->nombre);
																														$idexhtmls.='</div>';
																														$idexhtmls.='<div class="detailsorderl_items">';
																															$idexhtmls.='<span>'.Luis::lang("cantidad").'</span>';
																															$idexhtmls.=$cantidad_stock;
																														$idexhtmls.='</div>';
																														$idexhtmls.='<div class="detailsorderl_items">';
																															$idexhtmls.='<span>'.Luis::lang("total").'</span>';
																															foreach($detalles_de_venta as $d_v) {
																																$volrtotal_precios=0;
																																$item_view_in_order = DatosAdmin::itemview_productos($d_v->id_item);
																																$item_option_type_view = DatosAdmin::listar_detalles_ventas_pendientes_web_sub($d_v->codigo);
																																foreach($item_option_type_view as $v_iop){
																																	if($v_iop->id_opcion_sub){
																																		$view_data_sub_one_details = DatosAdmin::view_iten_in_pages_por_id($v_iop->id_opcion_sub);
																																		$view_type_options_details = DatosAdmin::ver_opciones_type_por_id($view_data_sub_one_details->id_opciones_type);
																																		if($view_data_sub_one_details->precio==1){
																																			$open_producto = DatosAdmin::porID_producto($view_data_sub_one_details->item_k);
																																			$volrtotal_precios+=$open_producto->precio_final;
																																		}else{
																																			$volrtotal_precios+=0;
																																		}
																																	}else{
																																		$volrtotal_precios+=0;
 																																	}
																																}
																																$precio_nuevo_suma=$item_view_in_order->precio_final+$volrtotal_precios;
																																$total += $d_v->cantidad*$precio_nuevo_suma;
																															}
																															$mostrar_tipo_de_moneda=DatosAdmin::Mostrar_las_monedas_por_id($com->moneda);
																															$idexhtmls.=$mostrar_tipo_de_moneda->simbolo.". ".number_format($total,2,".",",");
																														$idexhtmls.='</div>';
																													$idexhtmls.='</div>';
																													if($ver_tipo_venta->code=="TIENDA001"){
																														$sucursal_ent=DatosAdmin::poridSucursal($com->sucursal);
																														$idexhtmls.='<span class="entr_name_bod">'.str_replace("_", " ",Luis::lang("sucursal_de_entrega"))." ".html_entity_decode($sucursal_ent->nombre).' <a href="https://www.google.com/maps/search/?api=1&query='.$sucursal_ent->latitud.','.$sucursal_ent->longitud.'&zoom='.$sucursal_ent->zoom.'" target="_blank">'.str_replace("_", " ",Luis::lang("ver_direccion")).'</a></span>';
																													}elseif($ver_tipo_venta->code=="DELIVERY001") {
																														$idexhtmls.='<span class="entr_name_bod">'.str_replace("_", " ",Luis::lang("direccion_envio"))." ".'</span>';
																													}
																													
																													$idexhtmls.='<span class="date_name_bod">'.Luis::lang("comprado")." ".Functions::fechasluislopes($com->fecha).'</span>';
																												$idexhtmls.='</div>';
																											$idexhtmls.='</div>';
																										}
																									}else{
																										// code...
																									}
																									

																									
																								$idexhtmls.='</div>';
																							}elseif($number_page=="configurar"){
																								$idexhtmls.='<div class="box_page_perfil_user_details">';
																								$idexhtmls.='<span>'.Luis::lang("dni").': <input class="class_tipe_upt_d" type="text" value="'.$per->dni.'"></span>';
																								$idexhtmls.='<span>'.Luis::lang("nombres").': <input class="class_tipe_upt_n" type="text" value="'.html_entity_decode($per->nombre).'"></span>';
																								$idexhtmls.='<span>'.Luis::lang("apellido_paterno").': <input class="class_tipe_upt_p" type="text" value="'.html_entity_decode($per->apellido_paterno).'"></span>';
																								$idexhtmls.='<span>'.Luis::lang("apellido_materno").': <input class="class_tipe_upt_m" type="text" value="'.html_entity_decode($per->apellido_materno).'"></span>';
																								$idexhtmls.='</div>';
																								$idexhtmls.='<div class="butttons_box_content">';
																								$idexhtmls.='<button class="custom-btn btn_saved_grange btn_saved_grange_use">'.Luis::lang("guardar").'</button>';
																								$idexhtmls.='</div>';
																							}elseif($number_page=="cambiar_pass"){
																								$idexhtmls.='<div class="conten_display_pass">';
																								$idexhtmls.='<span>Contrase&ntilde;a: <input class="pass_g_ntr_a" type="password"></span>';
																								$idexhtmls.='<span>Confirmar contrase&ntilde;a: <input class="pass_g_ntr_b" type="password"></span>';
																								$idexhtmls.='<button class="custom-btn btn_saved_grange btn_new_ge_use btn_new_ge_use_persons btn_new_ge_use_persons_pass_ing">Guardar cambios</button>';
																								$idexhtmls.='</div>';
																							}elseif($number_page=="perfil"){
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
																									/*Datos perfil end*/
																								$idexhtmls.='</div>';

																								$idexhtmls.='<div class="contenido_accesos_directos_pags">';
																									$idexhtmls.='<div class="contenido_accesos_directos_pags_lines">';
																									$idexhtmls.='<span class="head_acceso_direc">'.Luis::lang("billetera").'</span>';
																									$idexhtmls.='<svg class="acceso_direc_a" viewBox="0 0 24 24" width="35" height="35">';
																									$idexhtmls.='<path d="M21,6H5c-.859,0-1.672-.372-2.235-.999,.55-.614,1.349-1.001,2.235-1.001H23c1.308-.006,1.307-1.995,0-2H5C2.239,2,0,4.239,0,7v10c0,2.761,2.239,5,5,5H21c1.657,0,3-1.343,3-3V9c0-1.657-1.343-3-3-3Zm-1,9c-1.308-.006-1.308-1.994,0-2,1.308,.006,1.308,1.994,0,2Z"/>';
																									$idexhtmls.='</svg>';
																									$idexhtmls.='<span class="acceso_direc_b">S/.0.00</span>';
																									$idexhtmls.='</div>';

																									$idexhtmls.='<div class="contenido_accesos_directos_pags_lines">';
																									$idexhtmls.='<span class="head_acceso_direc">'.Luis::lang("deuda").'</span>';
																									$idexhtmls.='<svg class="acceso_direc_a" viewBox="0 0 24 24" width="36" height="36">';
																									$idexhtmls.='<path d="M12.5,0H5.5c-1.378,0-2.5,1.121-2.5,2.5v6.5H15V2.5c0-1.379-1.122-2.5-2.5-2.5Zm-1.5,2v2H7V2h4Zm12.152,6.681c-.515-.469-1.186-.712-1.878-.678-.697,.032-1.339,.334-1.794,.835l-3.541,3.737c.032,.21,.065,.42,.065,.638,0,2.083-1.555,3.876-3.617,4.17l-4.241,.606-.283-1.979,4.241-.606c1.084-.155,1.9-1.097,1.9-2.191,0-1.22-.993-2.213-2.213-2.213H3.003C1.349,11,.003,12.346,.003,14v7c0,1.654,1.346,3,3,3H12.667l10.674-11.655c.948-1.062,.862-2.707-.189-3.665Z"/>';
																									$idexhtmls.='</svg>';
																									$idexhtmls.='<span class="acceso_direc_b">S/.0.00</span>';
																									$idexhtmls.='</div>';

																									$idexhtmls.='<div class="contenido_accesos_directos_pags_lines">';
																									$idexhtmls.='<span class="head_acceso_direc">'.Luis::lang("compras_pendientes").'</span>';
																									$idexhtmls.='<svg class="acceso_direc_a" viewBox="0 0 24 24" width="36" height="36">';
																									$idexhtmls.='<path d="M17,10.039c-3.859,0-7,3.14-7,7,0,3.838,3.141,6.961,7,6.961s7-3.14,7-7c0-3.838-3.141-6.961-7-6.961Zm0,11.961c-2.757,0-5-2.226-5-4.961,0-2.757,2.243-5,5-5s5,2.226,5,4.961c0,2.757-2.243,5-5,5Zm1.707-4.707c.391,.391,.391,1.023,0,1.414-.195,.195-.451,.293-.707,.293s-.512-.098-.707-.293l-1-1c-.188-.188-.293-.442-.293-.707v-2c0-.552,.447-1,1-1s1,.448,1,1v1.586l.707,.707Zm5.293-10.293v2c0,.552-.447,1-1,1s-1-.448-1-1v-2c0-1.654-1.346-3-3-3H5c-1.654,0-3,1.346-3,3v1H11c.552,0,1,.448,1,1s-.448,1-1,1H2v9c0,1.654,1.346,3,3,3h4c.552,0,1,.448,1,1s-.448,1-1,1H5c-2.757,0-5-2.243-5-5V7C0,4.243,2.243,2,5,2h1V1c0-.552,.448-1,1-1s1,.448,1,1v1h8V1c0-.552,.447-1,1-1s1,.448,1,1v1h1c2.757,0,5,2.243,5,5Z"/>';
																									$idexhtmls.='</svg>';
																									if(isset($_SESSION['usuarioid'])){
																										$compras_pendientes_list = DatosAdmin::ventas_contar_cliente($_SESSION['usuarioid'],5)->c;
																									}else{
																										$compras_pendientes_list = "-";
																									}
																									
																									$idexhtmls.='<span class="acceso_direc_b">'.$compras_pendientes_list.'</span>';
																									$idexhtmls.='</div>';

																									$idexhtmls.='<div class="contenido_accesos_directos_pags_lines">';
																									$idexhtmls.='<span class="head_acceso_direc">'.Luis::lang("total_compras").'</span>';
																									$idexhtmls.='<svg class="acceso_direc_a" viewBox="0 0 24 24" width="36" height="36">';
																									$idexhtmls.='<path d="M18,12a5.993,5.993,0,0,1-5.191-9H4.242L4.2,2.648A3,3,0,0,0,1.222,0H1A1,1,0,0,0,1,2h.222a1,1,0,0,1,.993.883l1.376,11.7A5,5,0,0,0,8.557,19H19a1,1,0,0,0,0-2H8.557a3,3,0,0,1-2.821-2H17.657a5,5,0,0,0,4.921-4.113l.238-1.319A5.984,5.984,0,0,1,18,12Z"/>';
																									$idexhtmls.='<circle cx="7" cy="22" r="2"/>';
																									$idexhtmls.='<circle cx="17" cy="22" r="2"/>';
																									$idexhtmls.='<path d="M15.733,8.946a1.872,1.872,0,0,0,1.345.6h.033a1.873,1.873,0,0,0,1.335-.553l4.272-4.272A1,1,0,1,0,21.3,3.3L17.113,7.494,15.879,6.17a1,1,0,0,0-1.463,1.366Z"/>';
																									$idexhtmls.='</svg>';
																									if(isset($_SESSION['usuarioid'])){
																										$compras_total_list = DatosAdmin::ventas_contar_cliente($_SESSION['usuarioid'],4)->c;
																									}else{
																										$compras_total_list = "0";
																									}
																									$idexhtmls.='<span class="acceso_direc_b">'.$compras_total_list.'</span>';
																									$idexhtmls.='</div>';

																									$idexhtmls.='<div class="contenido_accesos_directos_pags_lines">';
																									$idexhtmls.='<span class="head_acceso_direc">'.Luis::lang("reservados").'</span>';
																									$idexhtmls.='<svg class="acceso_direc_a" viewBox="0 0 24 24" width="36" height="36">';
																									$idexhtmls.='<path d="M18.987,1.975h-6.528c-.154,0-.31-.037-.447-.105L8.856,.291c-.414-.207-.878-.316-1.342-.316h-2.527C2.23-.025-.013,2.218-.013,4.975v12c0,1.779,.958,3.438,2.499,4.33,.479,.278,1.09,.113,1.366-.364,.277-.479,.113-1.09-.364-1.366-.926-.536-1.501-1.532-1.501-2.6V7.975H21.987v9c0,1.067-.575,2.063-1.501,2.6-.478,.276-.642,.888-.364,1.366,.185,.32,.521,.499,.866,.499,.17,0,.342-.043,.5-.135,1.541-.892,2.499-2.551,2.499-4.33V6.975c0-2.757-2.243-5-5-5ZM1.987,4.975c0-1.654,1.346-3,3-3h2.527c.154,0,.31,.036,.447,.105l3.156,1.579c.415,.206,.879,.315,1.341,.315h6.528c1.302,0,2.402,.839,2.816,2H1.987v-1Zm9.991,5c-3.859,0-7,3.141-7,7s3.141,7,7,7,7-3.141,7-7-3.141-7-7-7Zm0,12c-2.757,0-5-2.243-5-5s2.243-5,5-5,5,2.243,5,5-2.243,5-5,5Zm1.707-4.707c.391,.391,.391,1.023,0,1.414-.195,.195-.451,.293-.707,.293s-.512-.098-.707-.293l-1-1c-.188-.188-.293-.441-.293-.707v-2c0-.553,.447-1,1-1s1,.447,1,1v1.586l.707,.707Z"/>';
																									$idexhtmls.='</svg>';
																									if(isset($_SESSION['usuarioid'])){
																										$compras_total_list = DatosAdmin::ventas_contar_cliente($_SESSION['usuarioid'],3)->c;
																									}else{
																										$compras_total_list = "0";
																									}
																									$idexhtmls.='<span class="acceso_direc_b">'.$compras_total_list.'</span>';
																									$idexhtmls.='</div>';

																								$idexhtmls.='</div>';
																							}
																						$idexhtmls.='</div>';
																					$idexhtmls.='</div>';
																				$idexhtmls.='</div>';
																			$idexhtmls.='</div>';
																		$idexhtmls.='</div>';
																	$idexhtmls.='</div>';
																$idexhtmls.='</div>';
															$idexhtmls.='</div>';
														$idexhtmls.='</div>';
													$idexhtmls.='</div>';
												$idexhtmls.='</div>';
											$idexhtmls.='</div>';
										$idexhtmls.='</div>';
									$idexhtmls.='</div>';
								$idexhtmls.='</div>';
							$idexhtmls.='</div>';
						$idexhtmls.='</div>';

					$idexhtmls.='</div>';
				$idexhtmls.='</div>';

			$idexhtmls.='</div>';


			/*$idexhtmls.='<div class="contenedor_datos_perfil_two">';
			
			if() {
				$title_optio_perfiles="DIRECCIONES";

				

				////lista de direcciones opcionesblocklist1000boxlist
				
				///** fin de lista de direcciones
			}elseif($number_page=="historial_compras"){
				$title_optio_perfiles="HISTORIAL DE COMPRAS";
			}elseif($number_page=="configurar"){
				$title_optio_perfiles="CONFIGURAR";
			}elseif($number_page=="cambiar_pass"){
				$title_optio_perfiles="CAMBIAR CONTRASE&Ntilde;A";
			}elseif($number_page=="perfil"){
				
			}
			$idexhtmls.='</div>';*/

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