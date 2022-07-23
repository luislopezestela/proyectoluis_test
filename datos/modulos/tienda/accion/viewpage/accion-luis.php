<?php
 $pages=Luis::viewpagelink($_GET["viewind"]);
 $stylespage=Luis::styles($_GET["viewind"]);
 $stylespage=Luis::styles($_GET["viewind"]);
 $titlepages = Luis::Mostrartituloukr($_GET["viewind"]);
if($_GET["viewind"]=="carrito"){
    echo json_encode(array('type' => 1, 'mensaje' => "", 'datapage' => $pages, 'stylepage' => "carrito_style",'jspage' => "carrito_js", "title" => "CARRITO"));
}elseif($_GET["viewind"]=="menulk"){
    $pages_two=Luis::viewpagelink("menulkl");
    echo json_encode(array('type' => 1, 'mensaje' => "", 'datapage' => $pages_two, 'stylepage' => "menulk", "title" => "Menu"));
}elseif($_GET["viewind"]=="serv"){
    echo json_encode(array('type' => 0, 'mensaje' => "", 'datapage' => $pages, "title" => "Error"));
}elseif($_GET["viewind"]=="perfil"){
    echo json_encode(array('type' => 1, 'mensaje' => "", 'datapage' => $pages, 'stylepage' => "perfil_style",'jspage' => "perfil_js", "title" => "Perfil"));
}elseif($_GET["viewind"]=="perfil/direcciones"){
    $pages_two=Luis::viewpagelink("perfil");
    echo json_encode(array('type' => 1, 'mensaje' => "", 'datapage' => $pages_two, 'stylepage' => "perfil_style",'jspage' => "perfil_js", "title" => "PERFIL | DIRECCIONES"));
}elseif($_GET["viewind"]=="perfil/historial_compras"){
    $pages_two=Luis::viewpagelink("perfil");
    echo json_encode(array('type' => 1, 'mensaje' => "", 'datapage' => $pages_two, 'stylepage' => "perfil_style",'jspage' => "perfil_js", "title" => "PERFIL | HISTORIAL DE COMPRAS"));
}elseif($_GET["viewind"]=="perfil/configurar"){
    $pages_two=Luis::viewpagelink("perfil");
    echo json_encode(array('type' => 1, 'mensaje' => "", 'datapage' => $pages_two, 'stylepage' => "perfil_style",'jspage' => "perfil_js", "title" => "PERFIL | CONFIGURAR"));
}elseif($_GET["viewind"]=="perfil/cambiar_pass"){
    $pages_two=Luis::viewpagelink("perfil");
    echo json_encode(array('type' => 1, 'mensaje' => "", 'datapage' => $pages_two, 'stylepage' => "perfil_style",'jspage' => "perfil_js", "title" => "PERFIL | CAMBIAR PASSWORD"));
}elseif($titlepages->home){   
    echo json_encode(array('type' => 1, 'mensaje' => "", 'datapage' => $pages, 'stylepage' => $stylespage, 'jspage' => "slick.min", "title" =>  Luis::head_init("title")));
}elseif($titlepages){	
	echo json_encode(array('type' => 1, 'mensaje' => "", 'datapage' => $pages, 'stylepage' => $stylespage, 'jspage' => "slick.min", "title" => $titlepages->label_menu));
}else{
	echo json_encode(array('type' => 0, 'mensaje' => "", 'datapage' => $pages, 'stylepage' => $stylespage, 'jspage' => "slick.min", "title" => $titlepages->label_menu));
}
