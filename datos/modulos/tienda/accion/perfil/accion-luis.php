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
		$number_page="perfil";
	}
	if($number_page=="direcciones"){
		$displ_active1="opacit";
		$title_optio_perfiles="DIRECCIONES";
	}elseif($number_page=="historial_compras"){
		$displ_active2="opacit";
		$title_optio_perfiles="HISTORIAL DE COMPRAS";
	}elseif($number_page=="configurar"){
		$displ_active3="opacit";
		$title_optio_perfiles="CONFIGURAR";
	}elseif($number_page=="cambiar_pass"){
		$displ_active4="opacit";
		$title_optio_perfiles="CAMBIAR CONTRASE&Ntilde;A";
	}elseif($number_page=="perfil"){
		$displ_active="opacit";
		$title_optio_perfiles="PERFIL";
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
																										$idexhtmls.='<span class="perfil_left_data_list_a_data_name_e">PERFIL</span>';
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
																										$idexhtmls.='<span class="perfil_left_data_list_a_data_name_e">DIRECCIONES</span>';
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
																							$idexhtmls.='<path d="m24 12a1 1 0 0 1 -2 0 10.011 10.011 0 0 0 -10-10 1 1 0 0 1 0-2 12.013 12.013 0 0 1 12 12zm-8 1a1 1 0 0 0 0-2h-2.277a2 2 0 0 0 -.723-.723v-3.277a1 1 0 0 0 -2 0v3.277a1.994 1.994 0 1 0 2.723 2.723zm-14.173-6.216a1 1 0 1 0 1 1 1 1 0 0 0 -1-1zm.173 5.216a1 1 0 1 0 -1 1 1 1 0 0 0 1-1zm10 10a1 1 0 1 0 1 1 1 1 0 0 0 -1-1zm-7.779-18.793a1 1 0 1 0 1 1 1 1 0 0 0 -1-1zm3.558-2.366a1 1 0 1 0 1 1 1 1 0 0 0 -1-1zm-5.952 14.375a1 1 0 1 0 1 1 1 1 0 0 0 -1-1zm2.394 3.577a1 1 0 1 0 1 1 1 1 0 0 0 -1-1zm3.558 2.366a1 1 0 1 0 1 1 1 1 0 0 0 -1-1zm14.394-5.943a1 1 0 1 0 1 1 1 1 0 0 0 -1-1zm-2.394 3.577a1 1 0 1 0 1 1 1 1 0 0 0 -1-1zm-3.558 2.366a1 1 0 1 0 1 1 1 1 0 0 0 -1-1z"/>';
																					$idexhtmls.='</svg>';
																				$idexhtmls.='</div>';

																				$idexhtmls.='<div class="perfil_left_data_list_a_data_name">';
																					$idexhtmls.='<div class="perfil_left_data_list_a_data_name_a">';
																						$idexhtmls.='<div>';
																							$idexhtmls.='<div class="perfil_left_data_list_a_data_name_b">';
																								$idexhtmls.='<div class="perfil_left_data_list_a_data_name_c">';
																									$idexhtmls.='<span class="perfil_left_data_list_a_data_name_d">';
																										$idexhtmls.='<span class="perfil_left_data_list_a_data_name_e">HISTORIAL DE COMPRAS</span>';
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
																										$idexhtmls.='<span class="perfil_left_data_list_a_data_name_e">CONFIGURAR</span>';
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
																										$idexhtmls.='<span class="perfil_left_data_list_a_data_name_e">CAMBIAR CONTRASE&Ntilde;A</span>';
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

																				$idexhtmls.='<div class="perfil_left_data_list_a_data_name">';
																					$idexhtmls.='<div class="perfil_left_data_list_a_data_name_a">';
																						$idexhtmls.='<div>';
																							$idexhtmls.='<div class="perfil_left_data_list_a_data_name_b">';
																								$idexhtmls.='<div class="perfil_left_data_list_a_data_name_c">';
																									$idexhtmls.='<span class="perfil_left_data_list_a_data_name_d">';
																										$idexhtmls.='<span class="perfil_left_data_list_a_data_name_e">Cerrar sesion</span>';
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
																								// code...
																							}elseif($number_page=="historial_compras"){
																								// code...
																							}elseif($number_page=="configurar"){
																								// code...
																							}elseif($number_page=="cambiar_pass"){
																								// code...
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