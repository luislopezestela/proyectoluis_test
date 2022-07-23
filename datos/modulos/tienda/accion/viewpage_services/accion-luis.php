<?php
$service=DatosAdmin::serv_view($_GET["viewind"]);
if($service->url) {
	$pages=Luis::viewpagelink("service_lk");
	$titlepages = html_entity_decode($service->nombre);
	echo json_encode(array('type' => 1, 'mensaje' => "4", 'datapage' => $pages, "title" => $titlepages));
}else{
	$pages=Luis::viewpagelink($_GET['viewind']);
	echo json_encode(array('type' => 1, 'mensaje' => $_GET['viewind'], 'datapage' => $pages, "title" => "Pagina no encontrada5"));
}
