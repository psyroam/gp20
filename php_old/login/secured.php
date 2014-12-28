<?php
	require_once 'cLogin.php';
	
	if(!logged()){
		header("Location: login.php");
	}
	
	$query = "SELECT * FROM `fahrer` WHERE `fahrer-tag`='".mysql_escape_string($_SESSION['fahrer-tag'])."';";
	$result = mysql_query($query)or die(mysql_error());
	
	$fahrer['fahrer'] = mysql_result($result,0,'fahrer');
	$fahrer['fahrer-tag'] = strtoupper(mysql_result($result,0,'fahrer-tag'));
	$fahrer['team'] = mysql_result($result,0,'team');
	$fahrer['partner'] = mysql_result($result,0,'partner');
	$fahrer['rennen'] = mysql_result($result,0,'rennen');
	$fahrer['siege'] = mysql_result($result,0,'siege');
	$fahrer['poles'] = mysql_result($result,0,'poles');
	$fahrer['punkte'] = mysql_result($result,0,'punkte');
	
	//--------------.setup------------------------
	isFilled($fahrer['fahrer-tag']);
	if($_SESSION['email']==true or $_SESSION['frage']==true or $_SESSION['antwort']==true){
		header("Location: setup.php");
	}else{// Wenn $check == false, dann ist alles in der Datenbank ausgefüllt

	}
	//ENDE-----------setup------------------------
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
		<script>
			function mouse_in()
			{
			$("#fuell_team_logo").animate({
					opacity:1
				});
			}
			
			function mouse_out()
			{
				
				$("#fuell_team_logo").animate({
					opacity:0
				});
			}
			
			function settings()
			{
			
				if(document.getElementById("_Settings").style.display == "none")
				{
					//show
					var x = document.getElementById("_Settings");
					
					x.style.display = "block";
				}
				else{
					//hide
					var x = document.getElementById("_Settings");
					
					x.style.display = "none";
				}
			}
			
			function team()
			{
			
				if(document.getElementById("_Team").style.display == "none")
				{
					//show
					var x = document.getElementById("_Team");
					
					x.style.display = "block";
				}
				else{
					//hide
					var x = document.getElementById("_Team");
					
					x.style.display = "none";
				}
			}
		</script>
		<style>
			#team_logo{
				margin-left:40px;
				margin-right:15px;
				float:left;
			}
			
			#fuell_team_logo:hover{
				cursor:pointer;
			}
			
			#functions ul li{
			text-decoration:none;
			display:flex;
			}
			
			#functions div{
				font-size:18px;
				font-color: black;
				font-family: Century Gothic, sans-serif;
				width:50%;
				height:auto;
			}
				#functions div:hover{
					background:#C8C8C8;
					cursor:pointer;
				}
				
			.function_menue_point{
				text-align:center;
				height:auto;
				width:100%;
				margin:5px;
			}
			
			#loggout{
				position:relative;
				bottom:75px;
				left:91%;
				width: 75px;
				height: 22px;
				background:#C8C8C8;
				cursor: pointer;
			}
			#loggout:hover{
				background:#E0E0E0;
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
				<h1><?php print($fahrer['fahrer']); ?></h1>
				<div id="loggout" onclick="window.location = 'logout.php';"><h5>Ausloggen</h5></div>
				<div id="content3">
					<div id="team_logo" onmouseover="mouse_in()" onmouseout="mouse_out()">
					 <?php echo "<img style=\"border-radius:7.5px;height:200px;width:300px;padding-bottom:0px;margin-bottom:0px;top:-5px;position:relative;bottom:5px;\" src=\"./../../images/team_logos/logo_".(strtolower($fahrer['team'])).".jpg\"/>"; ?> 
						<img id="fuell_team_logo" onclick="change('functions/team/change_TeamLogo.php')" src="./../../images/login/fuellfeder.png" style="position:relative;right:29px;bottom:0px;height:25px;width:25px;opacity:0;top:-2.5px;"/>
					</div>
					<div id="functions" style="position:relative;top:-5px;right:15px;padding-right:5px;height:250px;width:auto;overflow:auto;">
								<script>	
									function change(link){
										document.getElementById("content4").setAttribute("src",link);
									}
								</script>
								<div class="function_menue_point"><b><a onclick="change('functions/view.php')">Profil</a></b></div>
								<div class="function_menue_point" onclick="settings()" ><b>Einstellungen</b></div>
								<span id="_Settings" style="display:none;">
									<div class="function_menue_point"><a onclick="change('functions/change_profile_img.php')">Profilbild &auml;ndern</a></div>
									<div class="function_menue_point"><a onclick="change('functions/settings/change_Password.php')">Passwort &auml;ndern</a></div>
								</span>
								<div class="function_menue_point" onclick="team()"><b>Team</b></div>
									<span id="_Team" style="display:none;">
										<div class="function_menue_point"><a onclick="change('functions/team/change_TeamLogo.php')">Team-Logo &auml;ndern</a></div>
									</span>
								<div class="function_menue_point"><a onclick="change('functions/kalender/calendar.php')"><b>Kalender</b></a></div>
								<div class="function_menue_point"><a onclick="change('functions/zusagen.php')"><b>Zusagen</b></a></div>
								<div class="function_menue_point"><a onclick="change('functions/statistiken/statistiken.php')"><b>Statistiken</b></a></div>
					</div> 
					<div id="team_logo">
						
					</div>

					<iframe id="content4" style="width:100%;height:350px;border:0px;overflow:scroll;" src="functions/view.php">
					
					</iframe>
				</div>
			</div>
			<div id="footer">
			<p style="padding-left: 35px"><b>Quicklinks:</b> <a href="./../../fahrerfeld.php">Fahrerfeld</a> | <a href="./../../ergebnisse.html">Ergebnisse</a> | <a href="./../../multimedia.html">Multimedia</a> | <a href="./../../about.html">Über uns</a> | <a href="./../../impressum.html">Impressum</a> | <a href="./../../kontakt.html">Kontakt</a> | <a href="./../../reglement.html">Reglement</a> | <a href="login.php">Login</a> | <a href="./../../sitemap.html">Sitemap</a><a href="http://www.facebook.com/gp20AUT/" target="_blank"><img id="fblink"/></a></p>
			<p style="text-align: center; font-size: 12px;">&copy GP20 Karting Series 2014 - Alle Rechte vorbehalten</p>
			</div>
			</div>
		
	</body>
</html>