<?php
	require_once 'cLogin.php';
	$sent = false;

	if(isset($_POST['txtEmail'])and $_SESSION['email']==true){
		$query = "UPDATE `login` SET `email`='".mysql_escape_string($_POST['txtEmail'])."' WHERE `fahrer-tag`='".mysql_escape_string(strtoupper($_SESSION['fahrer-tag']))."';";
		mysql_query($query);
		$sent = true;
	}

	if(isset($_POST['txtFrage'])and $_SESSION['frage']==true){
		$query = "UPDATE `login` SET `Frage`='".mysql_escape_string($_POST['txtFrage'])."' WHERE `fahrer-tag`='".mysql_escape_string(strtoupper($_SESSION['fahrer-tag']))."';";
		mysql_query($query);
		$sent = true;
	}

	if(isset($_POST['txtAnswer']) and $_SESSION['antwort']==true){
		$query ="UPDATE `login` SET `Antwort`='".mysql_escape_string($_POST['txtAnswer'])."' WHERE `fahrer-tag`='".mysql_escape_string(strtoupper($_SESSION['fahrer-tag']))."';";
		mysql_query($query);
		$sent = true;
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
			*{
				color: black; text-align: justify; font-family: Century Gothic, sans-serif; font-size: 14px;
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
		
			<div id="header" title="GP20 Karting Series" onclick="location.href='./../../index.html';';">
			</div>
			<div id="navMenu">
				<ul>
					<li><a href="./../../fahrerfeld.php"><h4>Fahrerfeld</h4></a>
					</li>
				</ul>
				<ul>
					<li><a href="./../../ergebnisse.html"><h4>Ergebnisse</h4></a>
					</li>
				</ul>
				<ul>
					<li><a href="./../../multimedia.html"><h4>Multimedia</h4></a>
					</li>
				</ul>
				<ul>
					<li><a href="./../../about.html"><h4>Über Uns</h4></a>
					</li>
				</ul>
			</div>
			
			<div id="content2">
				<h1>Setup</h1>
				<p>Bevor der vollst&auml;ndige-Zugriff auf Ihr Konto freigegeben wird, benötigen wir noch ein paar Daten von Ihnen.</p>
				<center>
				<form style="text-align:center;margin-left:30%;" method="post" action="setup.php">
					<table>
						<tr>
							<td colspan="2" style="text-align:Center;padding-left:21%;">
								<p id="status">
									<?php
										if($sent){
											echo "<b>Erfolgreich gesendet!</b>";
											header("Location: secured.php", true, 5);
										}
									?>
								</p>
							</td>
						</tr>
						<?php
							if($_SESSION['email']==true){
						?>
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
							if($_SESSION['frage']==true){
						?>
							<tr>
								<td>
									Geheimfrage:
								</td>
								<td>
									<input type="text" name="txtFrage"/>
								</td>
							</tr>
						<?php
							}
							if($_SESSION['antwort']==true){
							?>
							<tr>
								<td>
									Antwort auf Ihre Geheimfrage:
								</td>
								<td>
									<input type="text" name="txtAnswer"/>
								</td>
							</tr>
						<?php
							}
						?>
						<tr>
							<td colspan="2" style="text-align:center;">
								<button type="submit"><h5>Senden</h5></button>
							</td>
						</tr>

					</table>
				</form>
			</center>
			</div>
			<div id="footer">
			<p style="padding-left: 35px"><b>Quicklinks:</b> <a href="fahrerfeld.php">Fahrerfeld</a> | <a href="ergebnisse.html">Ergebnisse</a> | <a href="multimedia.html">Multimedia</a> | <a href="about.html">Über uns</a> | <a href="impressum.html">Impressum</a> | <a href="kontakt.html">Kontakt</a> | <a href="reglement.html">Reglement</a> | <a href="login.php">Login</a> | <a href="sitemap.html">Sitemap</a><a href="http://www.facebook.com/gp20AUT/" target="_blank"><img id="fblink"/></a></p>
			<p style="text-align: center; font-size: 12px;">&copy GP20 Karting Series 2014 - Alle Rechte vorbehalten</p>
			</div>
	</body>
</html>