<?php
$basepagina = Luis::basepage("base_page");
unset($_SESSION["carrito"]);
$datacontrol="<h2 class=\"titulo2carrito\">".str_replace("_"," ",Luis::lang("carrito_sin_productos"))."</h2>";
$datacontrol.="<hr>";
$datacontrol.="<h3 class=\"subtitulocarrito\">".str_replace("_"," ",Luis::lang("encuentra_productos_a_los_mejores_precios")).".</h3>";
$datacontrol.="<div class=\"butt_luis_one\">";
$datacontrol.="<a class=\"botoniniciacompra menupagecurrent\" aria-label=\"inicio\" role=\"link\" href=\"".$basepagina."\"><span>".str_replace("_"," ",Luis::lang("inicio"))."</span></a>";
$datacontrol.="</div>";
$controlcarts=false;
echo json_encode(array('estado' => "exito", 'nullcarts' => $controlcarts,'totalpriceorderslist' => 0,'controlsup' => $datacontrol,'cantidad' => 0));