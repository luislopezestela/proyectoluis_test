<?php
class Session{
	public static function setUID($uid){
		$_SESSION['usuarioid'] = $uid;
	}

	public static function unsetUID(){
		if(isset($_SESSION['usuarioid']))
			unset($_SESSION['usuarioid']);
	}

	public static function issetUID(){
		if(isset($_SESSION['usuarioid']))
			return true;
		else return false;
	}

	public static function getUID(){
		if(isset($_SESSION['usuarioid']))
			return $_SESSION['usuarioid'];
		else return false;
	}
}