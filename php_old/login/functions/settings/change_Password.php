<?php
	require_once './../../cLogin.php';
		
	if(!logged()){
		die("Fail");
	}
	
	if(isset($_POST['txtFahrertag']) and isset($_POST['txtPassword']) and isset($_POST['txtNewPassword']) and isset($_POST['txtNewPasswordConfirmation'])){
	$Fahrertag = strtoupper($_POST['txtFahrertag']);
	$Password = $_POST['txtPassword'];
	$NewPassword = $_POST['txtNewPassword'];
	$NewPasswordConfirmation = $_POST['txtNewPasswordConfirmation'];
	
	//check if exists
	$query = "SELECT `id` FROM `login` WHERE `fahrer-tag`='".mysql_escape_string($Fahrertag)."' and `password`='".mysql_escape_string(cryption($Password))."';";
	$result = mysql_query($query)or die(mysql_error());
	
	if(mysql_num_rows($result)>0){
		//ok
		//change it
		if($NewPassword === $NewPasswordConfirmation)
		{
			$query = "UPDATE `login` SET `password`='".mysql_escape_string(cryption($NewPassword))."' WHERE `fahrer-tag`='".mysql_escape_string($Fahrertag)."';";
			mysql_query($query)or die(mysql_error());
			echo "<script>document.write(\"Erfolgreich ge&auml;ndert!\");</script>";
		}
		else{
			echo "<script>document.write(\"\'Neues Passwort\' und \'Neues Passwort best&auml;tigen\' sind ungleich!\");</script>";
		}
		
	}
	else{
		echo "<script>document.write(\"Passwort ist falsch!\");</script>";
	}
	}
	
?>
<style>
		h1	{
			color: black;  font-family: 'bebas_neueregular', sans-serif; font-size: 38px; padding-left: 35px; padding-right: 35px; font-weight: normal;margin-top:-10px;
			} 
		h2	{
			color: black;  font-family: 'bebas_neueregular', sans-serif; font-size: 20px; padding-left: 15px; margin-top: 30px; padding-top: 2px; font-weight: normal;
			} 
		*	{
			color: black; font-family: Century Gothic, sans-serif; font-size: 14px; 
			}
			
			@font-face {
						font-family: 'bebas_neueregular';
						src: url('./../../../../BebasNeue-webfont.eot');
						src: url('./../../../../BebasNeue-webfont.eot?#iefix') format('embedded-opentype'),
						url('./../../../../BebasNeue-webfont.woff') format('woff'),
						url('./../../../../BebasNeue-webfont.ttf') format('truetype'),
						url('./../../../../BebasNeue-webfont.svg#bebas_neueregular') format('svg');
						font-weight: normal;
						font-style: normal;
					}
					
					@font-face {
						font-family: 'copystruct';
						src: url('./../../../../COPYN___-webfont.eot');
						src: url('./../../../../COPYN___-webfont.eot?#iefix') format('embedded-opentype'),
						url('./../../../../COPYN___-webfont.woff') format('woff'),
						url('./../../../../COPYN___-webfont.ttf') format('truetype'),
						url('./../../../../COPYN___-webfont.svg#copystruct') format('svg');
						font-weight: normal;
						font-style: normal;
					}
</style>
<div id="content2">
<h1>Passwort &auml;ndern</h2>
	<Center>
		<form method="post" action="change_Password.php">
			<table>
				<tr>
					<td>Fahrerk&uuml;rzel:</td>
					<td><input type="text" name="txtFahrertag" readonly value="<?php print($_SESSION['fahrer-tag']); ?>"/></td>
				</tr>
				<tr>
					<td>Passwort:</td>
					<td><input type="password" name="txtPassword"/></td>
				</tr>
				<tr>
					<td>Neues Passwort:</td>
					<td><input type="password" name="txtNewPassword"/></td>
				</tr>
				<tr>
					<td>Neues Passwort bestätigen:</td>
					<td><input type="password" name="txtNewPasswordConfirmation"/></td>
				</tr>
				<tr>
					<td><input type="submit" value="&Auml;ndern"/></td>
				</tr>
			</table>
		</form>
	</Center>
</div>