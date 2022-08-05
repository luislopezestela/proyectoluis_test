<?php
$alphabeth ="ABCDEFGHIJKLMNOPQRSTUVWYZ1234567890";
$codigos = "";
for($i=0;$i<11;$i++){
    $codigos .= $alphabeth[rand(0,strlen($alphabeth)-1)];
}
$mail = $_POST['a'];
$pass = $_POST['b'];
$pasb = $_POST['c'];
$docu = $_POST['d'];
$name = $_POST['e'];
$ap_a = $_POST['f'];
$ap_b = $_POST['g'];
$celu = $_POST['h'];
$verif = DatosMails::check_email($mail);
$sirectpage=DatosAdmin::poner_guion(strip_tags($name))."_".DatosAdmin::poner_guion(strip_tags($ap_a))."_".DatosAdmin::poner_guion(strip_tags($ap_b));
$cliente_view=DatosAdmin::cliente_ver_por_ukr($sirectpage);

if($mail==""){
	echo json_encode(array('estado' => 0,'mensaje' => 'Escribe un correo', 'cl' => '.reg_input_text_data_a'));
}elseif($pass==""){
	echo json_encode(array('estado' => 0,'mensaje' => 'Escribe un contrase&ntilde;a', 'cl' => '.reg_input_text_data_b'));
}elseif($pasb==""){
	echo json_encode(array('estado' => 0,'mensaje' => 'Confirma su contrase&ntilde;a', 'cl' => '.reg_input_text_data_c'));
}elseif($pass!=$pasb){
	echo json_encode(array('estado' => 0,'mensaje' => 'Las contrase&ntilde;as no son iguales', 'cl' => '.reg_input_text_data_c'));
}elseif($docu==""){
	echo json_encode(array('estado' => 0,'mensaje' => 'Escribe el numero de DNI', 'cl' => '.reg_input_text_data_d'));
}elseif($name==""){
	echo json_encode(array('estado' => 0,'mensaje' => 'Escribe su nombre', 'cl' => '.reg_input_text_data_e'));
}elseif($ap_a==""){
	echo json_encode(array('estado' => 0,'mensaje' => 'Escribe su apellido paterno', 'cl' => '.reg_input_text_data_f'));
}elseif($ap_b==""){
	echo json_encode(array('estado' => 0,'mensaje' => 'Escribe su apellido materno', 'cl' => '.reg_input_text_data_g'));
}elseif($celu==""){
	echo json_encode(array('estado' => 0,'mensaje' => 'Escribe su numero de celular', 'cl' => '.reg_input_text_data_h'));
}else{
	if($verif){
		$personas = DatosAdmin::Cliente_porElCorreo($mail);
		if($personas==null){
			
			if($cliente_view==null){
				$data = new DatosAdmin();
				$data->correo = $mail;
				$data->pass = sha1(md5($pass));
				$data->dni = $docu;
				$data->nombre = $name;
				$data->apellido_paterno = $ap_a;
				$data->apellido_materno = $ap_b;
				$data->celular = $celu;
				$data->tipo = 3;
				$data->ukr = $sirectpage;
				$data->codigo = $codigos;
				$data->fecha = date("Y-m-d H:i:s");
				$data->registrar_cliente_page();
				$m = new DatosMails();
				$m->persona_correo = $mail;
				$m->codigo_activacion = $data->codigo;
				$m->unombres = $data->nombre;
				$m->verificar_persona();
				echo json_encode(array('estado' => 1,'mensaje' => 'Datos agregados con exito.'));
			}else{
				echo json_encode(array('estado' => 0,'mensaje' => 'El usuario ya existe'));
			}
		}else{
			echo json_encode(array('estado' => 0,'mensaje' => 'El correo ya existe'));
		}
	}else{
		echo json_encode(array('estado' => 0,'mensaje' => 'El correo no es valido'));
	}
}