<?php
if(!isset($_GET["accion"])){
	Modulo::loadLayout();
}else{
	Action::load($_GET["accion"],new Solicitud());
}