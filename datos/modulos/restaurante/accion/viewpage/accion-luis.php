<?php
 $pages=Luis::viewpagelink($_GET["viewind"]);
 $stylespage=Luis::styles($_GET["viewind"]);
 $titlepages = Luis::Mostrartituloukr($_GET["viewind"]);
if ($titlepages){	
	echo json_encode(array('type' => 1, 'mensaje' => "", 'datapage' => $pages, 'stylepage' => $stylespage, "title" => $titlepages->label_menu));
}else{
	echo json_encode(array('type' => 0, 'mensaje' => "", 'datapage' => $pages, 'stylepage' => $stylespage, "title" => $titlepages->label_menu));
}
