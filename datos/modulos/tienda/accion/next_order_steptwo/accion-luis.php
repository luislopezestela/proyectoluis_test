<?php

if($_POST['nom']==0) {
	unset($_SESSION['car_stepp']);
}
if($_POST['nom']==2) {
	$_SESSION['car_stepp'] = $_POST['nom'];
	echo $_SESSION['car_stepp'];
}elseif($_POST['nom']==3) {
	if(isset($_POST['data_p'])){
		$_SESSION['car_stepp'] = $_POST['nom'];
		echo $_SESSION['car_stepp'];
	}
}elseif($_POST['nom']==4) {
	if(isset($_POST['data_p'])){
		if($_POST['data_w']==""){
			
		}else{
			$_SESSION['car_stepp'] = $_POST['nom'];
			echo $_SESSION['car_stepp'];
		}
	}
}elseif($_POST['nom']==5) {
	$_SESSION['car_stepp'] = 3;
	echo $_SESSION['car_stepp'];
}

