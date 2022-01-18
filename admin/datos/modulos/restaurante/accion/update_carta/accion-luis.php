<?php
$usuario=DatosUsuario::porId($_SESSION["admin_id"]);
$ukm=DatosAdmin::poner_guion(strip_tags($_POST["nombre"]));
$com=DatosCarta::porUkr($ukm);
if($com==null or $com->ukr==$ukm){
try{
  $publi = new DatosCarta();
  $publi->id = $_POST["intlinear"];
  $publi->nombre = htmlentities($_POST["nombre"]);
  $publi->ukr=DatosAdmin::poner_guion(strip_tags($_POST["nombre"]));
  $todaslasimagenes=DatosImagenes::cantidadImage_carta($_POST["intlinear"])->c;
  $publi->update_carta();
  if($todaslasimagenes>1){
    echo json_encode(array('estado' => "error", 'mensaje' => "Puedes seleccionar un máximo de 1 foto."));
  }else{
    if(isset($_FILES) && !empty($_FILES)){
      $error = false;
      $files = array();
      $files = array_filter($_FILES, function($item) {
        return $item["name"][0] != "";
      });
      if(isset($_POST["imagen"])){
      foreach ($_POST["imagen"] as $i => $datai){
        $img_conf=DatosImagenes::porId($datai);
        $img_date="../datos/modulos/".Luis::temass()."/source/imagenes/carta/".$_POST["intlinear"]."/thumb/".$img_conf->imagen;
        $img_date_b="../datos/modulos/".Luis::temass()."/source/imagenes/carta/".$_POST["intlinear"]."/".$img_conf->imagen;
        if(file_exists($img_date) and file_exists($img_date_b)){
          unlink($img_date);
          unlink($img_date_b);
        }
        $img = new DatosImagenes();
        $img->id = $datai;
        $img->delete_img();
      }
      }
      foreach ($files as $file){
        $handle = new \Verot\Upload\Upload($file);
        /*thumbails*/
        if($handle->uploaded){
          $handle->image_resize = true;
          $handle->image_ratio_x = true;
          $handle->image_y = 250;
          $handle->image_convert = 'jpeg';
          $url="../datos/modulos/".Luis::temass()."/source/imagenes/carta/".$_POST["intlinear"]."/thumb/";
            $handle->Process($url);
        }

        if($handle->uploaded){
          $imagen = new DatosImagenes();
          $handle->image_convert = 'jpeg';
          $url="../datos/modulos/".Luis::temass()."/source/imagenes/carta/".$_POST["intlinear"]."/";
            $handle->Process($url);
            if($handle->processed){
              $imagen->imagen = $handle->file_dst_name;
              $imagen->id_carta = $_POST["intlinear"];
              $imagen->agregar_foto_carta();
            }else{
              $error = true;
              echo json_encode(array('estado' => "error", 'mensaje' => $handle->error));
            }
        }
        /*thumbails end */
        unset($handle);
      }
      if($_POST["intlinear"]){
        $_SESSION["puhdr"] = 1;
        echo json_encode(array('estado' => "exito", 'mensaje' => "Publicacion con exito.", 'dirb' => $ukm));
      }else{
        echo json_encode(array('estado' => "error", 'mensaje' => "Error"));
      }
    }elseif($todaslasimagenes<1){
      echo json_encode(array('estado' => "error", 'mensaje' => "Sube al menos una foto."));
    }else{
      $_SESSION["puhdr"] = 1;
      echo json_encode(array('estado' => "exito", 'mensaje' => "Publicacion con exito.", 'dirb' => $ukm));
    }
  }
}catch(Exception $e){
  echo json_encode(array('estado' => "error", 'mensaje' => "Error"));
}
}else{
  echo json_encode(array('estado' => "error", 'mensaje' => "El nombre de la carta ya existe. "));
}