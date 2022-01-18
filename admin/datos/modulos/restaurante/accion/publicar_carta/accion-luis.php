<?php
$usuario=DatosUsuario::porId($_SESSION["admin_id"]);
$ukm=DatosAdmin::poner_guion(strip_tags($_POST["nombre"]));
$com=DatosCarta::porUkr($ukm);
if($com==null){
try{
  $publi = new DatosCarta();
  $publi->nombre = htmlentities($_POST["nombre"]);
  $publi->id_persona = $usuario->id;
  $publi->id_sucursal = $usuario->sucursal;
  $publi->fecha=date ('Y-m-d H:i:s');
  $publi->ukr=DatosAdmin::poner_guion(strip_tags($_POST["nombre"]));
  if(isset($_FILES) && !empty($_FILES)){
    if(count($_FILES)>1){
      echo json_encode(array('estado' => "error", 'mensaje' => "Puedes seleccionar un máximo de 1 foto."));
    }else{
      $s=$publi->agregar();
      $error = false;
      $files = array();
      $files = array_filter($_FILES, function($item) {
        return $item["name"][0] != "";
      });

      foreach ($files as $file){
        $handle = new \Verot\Upload\Upload($file);
        /*thumbails*/
        if($handle->uploaded){
          $handle->image_resize = true;
          $handle->image_ratio_x = true;
          $handle->image_y = 250;
          $handle->image_convert = 'jpeg';
          $url="../datos/modulos/".Luis::temass()."/source/imagenes/carta/".$s[1]."/thumb/";
          $handle->Process($url);
        }

        if($handle->uploaded){
          $imagen = new DatosImagenes();
          $handle->image_convert = 'jpeg';
          $url="../datos/modulos/".Luis::temass()."/source/imagenes/carta/".$s[1]."/";
          $handle->Process($url);
          if($handle->processed){
            $imagen->imagen = $handle->file_dst_name;
            $imagen->id_carta = $s[1];
            $imagen->agregar_foto_carta();
          }else{
            $error = true;
            echo json_encode(array('estado' => "error", 'mensaje' => $handle->error));
          }
        }
        /*thumbails end */
        unset($handle);
      }
      if($s[1]){
        $_SESSION["puhdr"] = 1;
        echo json_encode(array('estado' => "exito", 'mensaje' => "Publicacion con exito."));
      }else{
        echo json_encode(array('estado' => "error", 'mensaje' => "Error"));
      }
    }
  }else{
    echo json_encode(array('estado' => "error", 'mensaje' => "Sube al menos una foto."));
  }
}catch(Exception $e){
  echo json_encode(array('estado' => "error", 'mensaje' => "Error"));
}
}else{
  echo json_encode(array('estado' => "error", 'mensaje' => "El nombre de la carta ya existe. "));
}