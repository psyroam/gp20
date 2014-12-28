<?php
	require_once 'cLogin.php';
	error_reporting(0);

	if(isset($_POST['txtAnswer'])){
				$query = "SELECT * FROM `login` WHERE `Antwort`='".mysql_escape_string($_POST['txtAnswer'])."';";
				$result = mysql_query($query)or die(mysql_error());

				if(mysql_num_rows($result)>0){
					rebuild_password();
					header("location: passwort_vergessen.php?status=success");
				}else{
					header("location: passwort_vergessen.php?status=wrong_answer");
				}
	}

	if(isset($_POST['txtFahrertag']) and isset($_POST['txtEmail']) or isset($question)){
		$query = "SELECT * FROM `login` WHERE `fahrer-tag`='".$_POST['txtFahrertag']."' and `Email`='".mysql_escape_string(($_POST['txtEmail']))."';";
		$result = mysql_query($query)or die(mysql_error());

		if(mysql_num_rows($result)==0){
			header("location: passwort_vergessen.php?status=failed");
		}else{
			save_session_vars();

			$question = mysql_result($result,0,'Frage');
			$_SESSION['question'] = $question;
			echo "<script>
				var question = '".$question."';
			</script>";

		}
	}

	function save_session_vars(){
		$_SESSION['Fahrer-tag'] = $_POST['txtFahrertag'];
		$_SESSION['Email'] = $_POST['txtEmail'];
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>GP20 - Karting Series | The Official Website</title>
		<link rel="stylesheet" type="text/css" href="./../../style.css"/>
		<link rel="shortcut icon" href="./../images/favicon.ico" type="image/ico"/> 
		<script type="text/javascript" src="./../../js/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>	
		
		<style>
			#next_step{
				display:none;
			}

			h5{
				margin:0px;
				padding:0px;
			}
		</style>	

	</head>
	<body>
	
		<div id="page">

		<div id="header">
				<div id="headercontainer">
					<iframe scrolling="no" frameBorder="0" width="980px" src="./../../info/info.php"></iframe>
					
				</div>
						<div id="navMenu">
						<div id="navMenuContainer">
						<div id="navMenuMain">
							<a href="./../../news.php">News</a>
							<a href="./../../fahrerfeld.php">Fahrerfeld</a>
							<a href="./../../rennen.html">Rennen</a>
							<a href="./../../ergebnisse.html">Ergebnisse</a>
							<a href="./../../galerie.html">Galerie</a>
							<a href="./../../about.html">Über uns</a>
					
						</div>
						<div id="navMenuRight">
					
							<a href="./../../kontakt.html">Kontakt</a>
							<a href="./../../impressum.html">Impressum</a>
							<a href="./../../php/login/login.php">Login</a>
						</div>
						</div>
						</div>
			
			</div>

		<div id="wrapper">
		
			
			<div id="content2">
				<h1>Login</h1>
					<Center>
					<form method="post" action="passwort_vergessen.php?show=true">
						<table>
							<tr>
								<td colspan="2">
									<p id="status">
										<?php
											if($_GET['status']=="failed"){
												echo "Fahrerk&uuml;rzel oder Email ist falsch!";
											}else if($_GET['status']=="wrong_answer"){
												echo "Antwort ist falsch!";
											}else if($_GET['status'] == "success"){
												echo "Ihr Passwort wurde erfolgreich wiederhergestellt! <b>Passwort = 123</b>";
											}
										?>
									</p>
								</td>
							</tr>
							<?php 
								if(!isset($question)){
							?>
							<tr>
								<td>Fahrerk&uuml;rzel:</td>
								<td><input type="text" name="txtFahrertag"/></td>
							</tr>
							<tr>
								<td>
									Email:
								</td>
								<td>
									<input type="text" name="txtEmail"/>
								</td>
							</tr>
							<?php
								}
								if($_GET['show']==true && isset($_SESSION['question'])){
							?>
								<tr>
									<td colspan="2" style="text-align:center;">
										<p id="question">
											<script>
												document.getElementById('question').innerHTML = question;
											</script>
										</p>
									</td>
								</tr>
								<tr>
									<td>
										Antwort:
									</td>
									<td>
										<input type="text" name="txtAnswer"/>
									</td>
								</tr>	
								<tr>
									<td>
										<br>
									</td>
									<td>

									</td>
								</tr>
							<?php
							}
							?>
							</table>
						
					<button type="submit"><h5>Senden</h5></button>
						
					</form>
					</Center>
					</br>	
			</div>
		<div id="footer">
			<p style="padding-left: 35px"><b>Quicklinks:</b> <a href="./../../fahrerfeld.php">Fahrerfeld</a> | <a href="./../../ergebnisse.html">Ergebnisse</a> | <a href="./../../multimedia.html">Multimedia</a> | <a href="./../../about.html">Über uns</a> | <a href="./../../impressum.html">Impressum</a> | <a href="./../../kontakt.html">Kontakt</a> | <a href="./../../reglement.html">Reglement</a> | <a href="login.php">Login</a> | <a href="./../../sitemap.html">Sitemap</a><a href="http://www.facebook.com/gp20AUT/" target="_blank"><img id="fblink"/></a></p>
			<p style="text-align: center; font-size: 12px;">&copy GP20 Karting Series 2014 - Alle Rechte vorbehalten</p>
			</div>
			</div>
		
	</body>
</html>