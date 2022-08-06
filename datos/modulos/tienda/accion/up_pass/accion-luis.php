<?php 
if($_SESSION['usuarioid']){
	$pass_a=sha1(md5($_POST['a']));
	$pass_b=sha1(md5($_POST['b']));

	if($pass_a==$pass_b) {
		$pass = new DatosAdmin();
		$pass->id = $_SESSION['usuarioid'];
		$pass->pass = $pass_a;
		$pass->update_password();
		echo json_encode(array('estado' => 1,'mensaje' => 'Cambios guardados'));
	}else{
		echo json_encode(array('estado' => 0,'mensaje' => 'Las contrase&ntilde;as no son iguales'));
	}
}else{
	echo json_encode(array('estado' => 0,'mensaje' => 'Error'));
}

?>