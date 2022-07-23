<?php 
$base=Luis::basepage("base_page");
$servicios = DatosAdmin::servicios_public();

$idexhtmls="<div class=\"b_contenido_services_page_luis\">";
$idexhtmls.="<div class=\"c_contenido_services_page_luis\">";
$idexhtmls.="<div class=\"v_contenido_services_page_luis\">";
$idexhtmls.="<div class=\"contenido_services_page_luis\">";
/**left**/

	// code...opacit
if(isset($_GET["paginas"])) {
	$urb=explode("/", $_GET["paginas"]);
	if(isset($urb[1])){$urb1=$urb[1];}else{$urb1=false;}
	$ulr_places = $urb1;
}elseif(isset($_GET["viewind"])) {
	$ulr_places = $_GET["viewind"];
}

$idexhtmls.="<div class=\"left_contenido_list\">";
	$idexhtmls.="<div class=\"left_list_conten_a\">";
		$idexhtmls.="<div class=\"left_list_conten_b\">";
			$idexhtmls.="<div class=\"left_list_conten_c\">";
				$idexhtmls.="<h2 class=\"left_list_conten_title\">Menu de servicios</h2>";
				$idexhtmls.="<div class=\"left_list_conten_data_a\">";
					$idexhtmls.="<div class=\"left_list_conten_data_b\">";
						$idexhtmls.="<div class=\"left_list_conten_data_c\">";
							$idexhtmls.="<div>";
								$idexhtmls.="<ul>";
									$idexhtmls.="<li>";
										$idexhtmls.="<div class=\"data_left_div\">";

											foreach ($servicios as $ser) {
												if($ser->url==$ulr_places) {
													$undex_active_plo = "opacit";
												}else{
													$undex_active_plo = "";
												}
												$idexhtmls.="<a class=\"data_left_div_a view_servicios_timeline_page\" href=\"".$base.$ser->url."\" aria-label=\"".$ser->url."\" data_int=\"3\">";
													$idexhtmls.="<div class=\"data_left_div_a_data\">";
														$idexhtmls.="<div class=\"data_left_div_a_data_icon\">";
															$idexhtmls.="<img class=\"data_left_div_a_data_icon_image\" src=\"".$base."datos/modulos/".Luis::temass()."/source/imagenes/servicios/thumb_".$ser->icono."\" alt=\"".$ser->nombre."\">";
														$idexhtmls.="</div>";
														
														$idexhtmls.="<div class=\"data_left_div_a_data_name_text\">";
															$idexhtmls.="<div class=\"data_left_div_a_data_name_text_a\">";
																$idexhtmls.="<div>";
																	$idexhtmls.="<div class=\"data_left_div_a_data_name_text_b\">";
																		$idexhtmls.="<div class=\"data_left_div_a_data_name_text_c\">";
																			$idexhtmls.="<span class=\"data_left_div_a_data_name_text_d\">";
																				$idexhtmls.="<span class=\"data_left_div_a_data_name_text_e\">";
																					$idexhtmls.=html_entity_decode($ser->nombre);
																				$idexhtmls.="</span>";
																			$idexhtmls.="</span>";
																		$idexhtmls.="</div>";
																	$idexhtmls.="</div>";
																$idexhtmls.="</div>";
															$idexhtmls.="</div>";
														$idexhtmls.="</div>";
														
													$idexhtmls.="</div>";
													$idexhtmls.="<div class=\"data_left_div_a_data_x ".$undex_active_plo."\">";
													$idexhtmls.="</div>";
												$idexhtmls.="</a>";
											}
											

										$idexhtmls.="</div>";
									$idexhtmls.="</li>";
								$idexhtmls.="</ul>";
							$idexhtmls.="</div>";
						$idexhtmls.="</div>";
					$idexhtmls.="</div>";
				$idexhtmls.="</div>";
			$idexhtmls.="</div>";
		$idexhtmls.="</div>";
	$idexhtmls.="</div>";
$idexhtmls.="</div>";
/**end left **/

$servicio_view_data = DatosAdmin::serv_view($ulr_places);
$servicio_view_data_conten = DatosAdmin::vista_previa_lp($servicio_view_data->id);
/**main**/
$idexhtmls.="<div class=\"main_contenido_list\">";
	$idexhtmls.="<div class=\"main_list_conten_a\">";
		$idexhtmls.="<div class=\"main_list_conten_b\">";
			$idexhtmls.="<div class=\"main_list_conten_c\">";
				$idexhtmls.="<div class=\"main_list_conten_d\">";
					$idexhtmls.="<div class=\"main_list_conten_e\">";
						$idexhtmls.="<div class=\"main_list_conten_f\">";
							$idexhtmls.="<div class=\"main_list_conten_g\">";
								foreach($servicio_view_data_conten as $kdata) {
									$idexhtmls.="<div>";
										$idexhtmls.="<div class=\"main_list_conten_post_public\">";
											$idexhtmls.="<div class=\"main_list_conten_post_public_a\">";
												$idexhtmls.="<div>";
													$idexhtmls.="<div>";
														$idexhtmls.="<div class=\"main_list_conten_post_public_b\">";
															$idexhtmls.="<div class=\"main_list_conten_post_public_c\">";
																$idexhtmls.="<div class=\"main_list_conten_post_public_d\">";
																	$idexhtmls.="<div class=\"main_list_conten_post_public_f\">";
																		$idexhtmls.="<div class=\"main_list_conten_post_public_g\">";
																			$idexhtmls.="<div>";
																				$idexhtmls.="<div></div>";
																				$idexhtmls.="<div>";
																					$idexhtmls.="<div>";
																						/**/
																						$idexhtmls.="<div>";
																							$idexhtmls.="<div class=\"main_list_conten_post_public_header\">";
																								$idexhtmls.="<p>";
																								$idexhtmls.=Functions::_hace(date(strtotime($kdata->fecha)));
																								$idexhtmls.="</p>";
																							$idexhtmls.="</div>";
																						$idexhtmls.="</div>";
																						/**/
																						$idexhtmls.="<div>";
																							$idexhtmls.="<div class=\"main_post_public_timeline\">";
																								$idexhtmls.="<div class=\"main_post_public_timeline_a\">";
																									$idexhtmls.="<div class=\"main_post_public_timeline_b\">";
																										$idexhtmls.="<div class=\"main_post_public_timeline_c\">";
																											$idexhtmls.="<span class=\"main_post_public_timeline_d\">";
																												$idexhtmls.="<div class=\"main_post_public_timeline_e\">";
																													$idexhtmls.="<div class=\"main_post_public_timeline_f\">";
																														$idexhtmls.=html_entity_decode($kdata->texto);
																													$idexhtmls.="</div>";
																												$idexhtmls.="</div>";
																											$idexhtmls.="</span>";
																										$idexhtmls.="</div>";
																									$idexhtmls.="</div>";
																								$idexhtmls.="</div>";
																							$idexhtmls.="</div>";
																						$idexhtmls.="</div>";
																						/**/
																						$img_file="datos/modulos/".Luis::temass()."/source/imagenes/servicios/publics/".$kdata->id_servicio."/".$kdata->imagen;
																						if(is_file($img_file)){
																							$idexhtmls.="<div>";
																								$idexhtmls.="<div class=\"main_post_p_tim_images_data\">";
																									$idexhtmls.="<div class=\"main_post_p_tim_images_data_a\">";
																										$idexhtmls.="<div>";
																											$idexhtmls.="<a class=\"main_post_p_tim_images_data_b\">";
																												$idexhtmls.="<div class=\"main_post_p_tim_images_data_c\" style=\"background-color:".$kdata->color."\">";
																													$idexhtmls.="<div class=\"main_post_p_tim_images_data_d\">";
																														$idexhtmls.="<div class=\"main_post_p_tim_images_data_e\">";
																															$idexhtmls.="<div class=\"main_post_p_tim_images_data_f\">";
																																$idexhtmls.="<img class=\"main_post_p_tim_images_data_g\" src=\"".$base."datos/modulos/".Luis::temass()."/source/imagenes/servicios/publics/".$kdata->id_servicio."/".$kdata->imagen."\">";
																															$idexhtmls.="</div>";
																														$idexhtmls.="</div>";
																													$idexhtmls.="</div>";
																												$idexhtmls.="</div>";
																											$idexhtmls.="</a>";
																										$idexhtmls.="</div>";
																									$idexhtmls.="</div>";
																								$idexhtmls.="</div>";
																							$idexhtmls.="</div>";
																						}elseif($kdata->imagen==null){
																							//**
																						}else{
																							//**
																						}
																						/**/
																					$idexhtmls.="</div>";
																				$idexhtmls.="</div>";
																			$idexhtmls.="</div>";
																		$idexhtmls.="</div>";
																	$idexhtmls.="</div>";
																$idexhtmls.="</div>";
															$idexhtmls.="</div>";
														$idexhtmls.="</div>";
													$idexhtmls.="</div>";
												$idexhtmls.="</div>";
											$idexhtmls.="</div>";
										$idexhtmls.="</div>";
									$idexhtmls.="</div>";
								}
							$idexhtmls.="</div>";
						$idexhtmls.="</div>";
					$idexhtmls.="</div>";
				$idexhtmls.="</div>";
			$idexhtmls.="</div>";
		$idexhtmls.="</div>";
	$idexhtmls.="</div>";
$idexhtmls.="</div>";
/** end main **/

/**right**/
/*$idexhtmls.="<div class=\"right_contenido_list\">";
$idexhtmls.="hello";
$idexhtmls.="</div>";*/
/**end right **/
$idexhtmls.="";
$idexhtmls.="</div>";
$idexhtmls.="</div>";
$idexhtmls.="</div>";
$idexhtmls.="</div>";
return $idexhtmls;