<?php
$url = "https://".$_SERVER["HTTP_HOST"];
$ur = new Luis();
$ur->noms = "luis_base";
$ur->urldata = $url."/";
$ur->guardar_url_base_page();
echo $ur->urldata."admin/";
?>