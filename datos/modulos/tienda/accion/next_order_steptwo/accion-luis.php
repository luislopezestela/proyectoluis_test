<?php

if($_POST['nom']==0) {
	unset($_SESSION['car_stepp']);
}
if($_POST['nom']==2) {
	$_SESSION['car_stepp'] = $_POST['nom'];
	echo $_SESSION['car_stepp'];
}elseif($_POST['nom']==3) {
	$_SESSION['car_stepp'] = $_POST['nom'];
	echo $_SESSION['car_stepp'];
}elseif($_POST['nom']==4) {
	$_SESSION['car_stepp'] = $_POST['nom'];
	echo $_SESSION['car_stepp'];
}

