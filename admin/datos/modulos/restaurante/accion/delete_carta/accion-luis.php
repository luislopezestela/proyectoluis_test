<?php
if(isset($_SESSION["admin_id"])){
	$usuario=DatosUsuario::porId($_SESSION["admin_id"]);
	$imge=DatosImagenes::mostrar_imagen_carta($_POST["datw"]);
	if(isset($_POST)){
		$url="../datos/modulos/".Luis::temass()."/source/imagenes/carta/".$_POST["datw"]."/thumb";
		$url2="../datos/modulos/".Luis::temass()."/source/imagenes/carta/".$_POST["datw"];
		
	
		if(is_dir($url)){
			if(file_exists($url."/".$imge->imagen)){
				foreach(glob($url."/*.*") as $img){  
					unlink($img);
				}
				rmdir($url);
			}
		}
		if(is_dir($url2)){
			if(file_exists($url2."/".$imge->imagen)){
				foreach(glob($url2."/*.*") as $imgs){  
					unlink($imgs);
				}
				rmdir($url2);
			}
		}

		$item = new DatosCarta();
		$item->id = $_POST["datw"];
		$item->eliminar_carta();
		$countbo=DatosCarta::Contar_items_de_sucursal($usuario->sucursal,$usuario->id)->c;
		echo json_encode(array('tipo' => "exito", 'mensaje' => "Carta eliminado con exito.", 'cantidad' => $countbo));
	}
	
}

