<?php
	require_once 'cLogin.php';
	error_reporting(0);
	
	if(isset($_POST['txtFahrertag']) and isset($_POST['txtPassword'])){
		if(!try_log($_POST['txtFahrertag'],$_POST['txtPassword'])){
			header("Location: ./login.php?status=failed");
		}
	}
	
	if(logged()){
		header("Location: secured.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>GP20 - Karting Series | The Official Website</title>
		<link rel="stylesheet" type="text/css" href="./../../style.css"/>
		<link rel="shortcut icon" href="http://www.gp20.eu.pn/images/favicon.ico" type="image/ico"/> 
		<script type="text/javascript" src="./../../js/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>	
		<style>
				*	{
			color: black; font-family: Century Gothic, sans-serif; font-size: 14px; 
			}
			
			@font-face {
						font-family: 'bebas_neueregular';
						src: url('./../../BebasNeue-webfont.eot');
						src: url('./../../BebasNeue-webfont.eot?#iefix') format('embedded-opentype'),
						url('./../../BebasNeue-webfont.woff') format('woff'),
						url('./../../BebasNeue-webfont.ttf') format('truetype'),
						url('./../../BebasNeue-webfont.svg#bebas_neueregular') format('svg');
						font-weight: normal;
						font-style: normal;
					}
					
					@font-face {
						font-family: 'copystruct';
						src: url('./../../COPYN___-webfont.eot');
						src: url('./../../COPYN___-webfont.eot?#iefix') format('embedded-opentype'),
						url('./../../COPYN___-webfont.woff') format('woff'),
						url('./../../COPYN___-webfont.ttf') format('truetype'),
						url('./../../COPYN___-webfont.svg#copystruct') format('svg');
						font-weight: normal;
						font-style: normal;
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
					<form method="post" action="login.php">
						<table>
							<tr>
							<td colspan="2">
							<p>
							<?php
								if($_GET['status'] == "failed"){
									echo "Fahrerk&uuml;rzel oder Passwort ist falsch!";
								}
							?>
							</p>
</td>							
							</tr>
							<tr>
								<td>Fahrerk&uuml;rzel:</td>
								<td><input type="text" name="txtFahrertag"/></td>
							</tr>
							<tr>
								<td>Passwort:</td>
								<td><input type="password" name="txtPassword"/></td>
						</tr>
						<tr><td style="text-align:center;"><button type="submit"><div id="login"><h5 style="padding: 0px;">Login</h5></div></button></td><td style="text-align:center;"><a href="passwort_vergessen.php">Passwort vergessen?</a></td></tr>
						</table>
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