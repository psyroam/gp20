<?php
	session_start();
	
	require_once 'Database.php';
	
	function logged(){
		if(isset($_SESSION['fahrer-tag']))
			return true;
		else
			return false;
	}
	
	function try_log($fahrer_tag,$password){
		$query = "SELECT `fahrer-tag` FROM `login` WHERE `fahrer-tag`='".mysql_escape_string(strtoupper($fahrer_tag))."' and `password`='".mysql_escape_string(cryption($password))."';";
		$result = mysql_query($query)or die(mysql_error());
		
		if(mysql_num_rows($result) > 0){
			return log_in($fahrer_tag);
		}
		return false;
	}
	
	function log_in($fahrer_tag){
		$_SESSION['fahrer-tag'] = $fahrer_tag;
		return true;
	}
	
	function cryption($plain){
		return md5($plain);
	}

	function rebuild_password(){
		$query = "UPDATE `login` SET `password`='".mysql_escape_string(cryption("123"))."' WHERE `fahrer-tag`='".mysql_escape_string(strtoupper($_SESSION['fahrer-tag']))."';";
		mysql_query($query)or die(mysql_error());
	}

	function isFilled($fahrer_tag){
		$query = "SELECT * FROM `login` WHERE `fahrer-tag`='".mysql_escape_string($fahrer_tag)."'";
		$result = mysql_query($query) or die(mysql_error());

		if(mysql_num_rows($result)>0){
			$email = mysql_result($result, 0,'email');
			$frage = mysql_result($result, 0,'Frage');
			$antwort = mysql_result($result,0,'Antwort');

			if(($email)==""){
				$_SESSION['email'] = true;
			}else{
				$_SESSION['email'] = false;
			}

			if(($frage)==""){
				$_SESSION['frage'] = true;
			}else{
				$_SESSION['frage'] = false;
			}

			if(($antwort)==""){
				$_SESSION['antwort'] = true;
			}else{
				$_SESSION['antwort'] = false;
			}
		}
	}
?>