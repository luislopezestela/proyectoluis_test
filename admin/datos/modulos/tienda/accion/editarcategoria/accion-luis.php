<?php
$basepagina = Luis::basepage("base_page_admin");
$namesukr=DatosAdmin::poner_guion(strip_tags(htmlentities($_POST["nombre"])));
$categoria_d = DatosAdmin::getById_categoria($_POST['id']);
$ver=DatosAdmin::Verif_categoria($namesukr);
if ($ver==null or $namesukr==$categoria_d->ukr) {

 $categoria = new DatosAdmin();
 $categoria->id = $_POST["id"];
 $categoria->nombre = $_POST["nombre"];
 $categoria->ukr=$namesukr;
 $categoria->sucursal=$_POST["sucursal"];
$handle = new \Verot\Upload\Upload($_FILES['logo']);
if($handle->uploaded) {
$lod = "datos/imagenes/categoria/".$categoria_d->logo;
if (file_exists($lod)) {
unlink($lod);
}
$handle->image_resize = true;
$handle->image_x = 50;
$handle->image_y = 50;
$handle->image_convert='jpg';
$url="datos/imagenes/categoria/";
$handle->Process($url);
$categoria->logo=$handle->file_dst_name;
}else{
$categoria->logo = $categoria_d->logo;
}
$categoria->editar_categoria();
Nucleo::redir($basepagina."categorias/".$namesukr."/update");
}else{
$_SESSION["failexep"]=$_POST["nombre"];
Nucleo::redir($basepagina."categorias/".$categoria_d->ukr."/update");
}