<?php
$verif = DatosMails::check_email($_POST["n_sub_a"]);
if ($verif){
	$personas = DatosAdmin::Cliente_porElCorreo($_POST["n_sub_a"]);
	if($personas==null){
		echo json_encode(array('estado' => 'error900_pl','mensaje' => 'El correo no esta registrado.'));
	}else{
		foreach ($personas as $pers) {
			if(sha1(md5($_POST["n_sub_b"]))==$pers->pass){
				if($pers->estado){
					echo json_encode(array('estado' => 'exito','mensaje' => 'Bienvenido.'));
					$_SESSION["usuarioid"]=$pers->id;
				}else{
					if($_POST["cods"]==""){
						echo json_encode(array('estado' => 'noactivado','mensaje' => 'Debes verificar tu cuenta para continuar'));
					}else{
						if($_POST["cods"]==$pers->codigo){
							$_SESSION["usuarioid"]=$pers->id;
							$inlines = new DatosAdmin();
							$inlines->id = $pers->id;
							$inlines->activar_persona();
							echo json_encode(array('estado' => 'activado','mensaje' => 'Tu cuenta se activo con exito.'));
						}else{
							echo json_encode(array('estado' => 'noactivadods','mensaje' => 'El codigo no es correcto'));
						}
					}
				}
			}else{
				echo json_encode(array('estado' => 'error400_pl','mensaje' => 'La contrase&ntilde;a no es correcto.'));
			}
		}
	}
}else{
	echo json_encode(array('estado' => 'errormail','mensaje' => 'El correo no es valido'));
}