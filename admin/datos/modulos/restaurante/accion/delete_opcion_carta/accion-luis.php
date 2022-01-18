<?php
if(isset($_SESSION["admin_id"])){
	if(isset($_POST)){
		$item = new DatosCarta();
		$item->id = $_POST["datw"];
		$item->eliminar_opcion_carta();
		$countbo=DatosCarta::Contar_opciones_carta($_POST["cart"])->c;
		echo json_encode(array('tipo' => "exito", 'mensaje' => "Carta eliminado con exito.", 'cantidad' => $countbo));
	}
	
}