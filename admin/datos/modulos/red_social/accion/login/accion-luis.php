<?php
if(Session::getUID()==""){ 
$admin = $_POST['correo'];
$pass = sha1(md5($_POST['pass']));
$base = new BaseDatos();
$con = $base->conectar();
$sql = "select * from usuarios where (correo= \"".$admin."\" ) and pass= \"".$pass."\" and esta_activado=1";
$query = $con->query($sql);
$found = false;
$adminid = null;
while($r = $query->fetch_array()){
	$found = true ;
	$adminid = $r['id'];
}

if($found==true){
	$_SESSION['admin_id']=$adminid;
  echo(json_encode(array('type' => true, 'mensaje' => "Cargando...")));
}else{
	echo(json_encode(array('type' => false, 'mensaje' => "El usuario y/o la contrase&ntilde;a no son correctos.")));
}
}