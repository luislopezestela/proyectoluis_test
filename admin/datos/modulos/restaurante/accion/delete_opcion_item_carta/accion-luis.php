<?php
if(isset($_SESSION["admin_id"])){
	$usuario=DatosUsuario::porId($_SESSION["admin_id"]);
	if (isset($_POST["datw"])) {

	
	$imge=DatosImagenes::mostrar_imagen_items_carta($_POST["datw"]);

	if(isset($_POST)){
		if (isset($imge)) {
		$url="../datos/modulos/".Luis::temass()."/source/imagenes/items/".$_POST["datw"]."/thumb";
		$url2="../datos/modulos/".Luis::temass()."/source/imagenes/items/".$_POST["datw"];
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
		}
		$image = new DatosImagenes();
		$image->id_item = $_POST["datw"];
		$image->delete_item_image();

		$item = new DatosCarta();
		$item->id = $_POST["datw"];
		$item->eliminar_option_item_carta();

		if($_POST["umd"]==="all") {
			$countbo = DatosCarta::Contar_items_carta_all($_POST["cart"])->c;
		}else{
			$opcion_p=DatosCarta::porUkr_opcion_page($_POST["umd"]);
			$countbo=DatosCarta::Contar_items_carta_opciones($opcion_p->id)->c;
		}
		
		echo json_encode(array('tipo' => "exito", 'mensaje' => "Item eliminado con exito. ".$opcion_p->id, 'cantidad' => $countbo));
	}
	}
}

