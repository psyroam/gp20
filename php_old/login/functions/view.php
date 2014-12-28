<?php
	require_once './../cLogin.php';
	
	if(!logged()){
		header("Location: ./../login.php");
	}
	
	$query = "SELECT * FROM `fahrer` WHERE `fahrer-tag`='".mysql_escape_string(strtoupper($_SESSION['fahrer-tag']))."';";
	$result = mysql_query($query)or die(mysql_error());
	
	$fahrer['fahrer'] = mysql_result($result,0,'fahrer');
	$fahrer['fahrer-tag'] = mysql_result($result,0,'fahrer-tag');
	$fahrer['team'] = mysql_result($result,0,'team');
	$fahrer['partner'] = mysql_result($result,0,'partner');
	$fahrer['rennen'] = mysql_result($result,0,'rennen');
	$fahrer['siege'] = mysql_result($result,0,'siege');
	$fahrer['poles'] = mysql_result($result,0,'poles');
	$fahrer['punkte'] = mysql_result($result,0,'punkte');
	
	
	$query = "SELECT `punkte` FROM `team` WHERE `team`='".mysql_escape_string($fahrer['team'])."';";
	$result = mysql_query($query)or die(mysql_error());
	$fahrer['teampunkte'] = mysql_result($result,0,'punkte');
	
	$query = "SELECT * FROM `profile` WHERE `fahrer-tag`='".mysql_escape_string(strtoupper($fahrer['fahrer-tag']))."';";
	$result = mysql_query($query)or die(mysql_error());
	
	$fahrer['podestplaetze'] = mysql_result($result,0,'podestplaetze');
	$fahrer['rennteilnahmen'] = mysql_result($result,0,'rennteilnahmen');
	$fahrer['einzel-meisterschaften'] = mysql_result($result,0,'einzel-meisterschaften');
	$fahrer['team-meisterschaften'] = mysql_result($result,0,'team-meisterschaften');
	$fahrer['beir'] = mysql_result($result,0,'beir');
	$fahrer['beiq'] = mysql_result($result,0,'beiq');
?>
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
</script>
<style>
	html{
		margin-top:5.5px;
		height:auto;
		width:80%;
	}
	#view td{
			padding-left:25px;
			color: black; font-family: Century Gothic, sans-serif; font-size: 14px;
			}
	
	#fahrer_logo{
		position:relative;
		top:10%;
		left:25%;
	}
	
	#fuell_team_logo:hover{
				cursor:pointer;
			}
</style>
<div id="view" style="padding-top:-15px;margin-top:-15px;float:left;">
						<table>
							<tr>
								<td>
									Fahrer
								</td>
								<td>
									<?php print($fahrer['fahrer']); ?>
								</td>
							</tr>
							<tr>
								<td>
									Fahrerk&uuml;rzel
								</td>
								<td>
									<?php print($fahrer['fahrer-tag']); ?>
								</td>
							</tr>
							<tr>							
							<td>
									Team
								</td>
								<td>
									<?php print($fahrer['team']); ?>
								</td>
							</tr>							
							<tr>
							<td>
									Rennen
								</td>
														
							<td>
									<?php print($fahrer['rennen']); ?>
								</td>
							</tr>
							<tr>							
							<td>
									Siege
								</td>
								<td>
									<?php print($fahrer['siege']); ?>
								</td>
							</tr>							
							<tr>
								<td>
									Poles
								</td>
								<td>
									<?php print($fahrer['poles']); ?>
								</td>
							</tr>
							<tr>
								<td>
									Podestpl&auml;tze
								</td>
								<td>
									<?php print($fahrer['podestplaetze']);?>
								</td>
							</tr>
							<tr>
								<td>
									Gewonnene Einzel-Meisterschaften
								</td>
								<td>
									<?php print($fahrer['einzel-meisterschaften']); ?>
								</td>
							</tr>
							<tr>
								<td>
									Gewonnene Team-Meisterschaften
								</td>
								<td>
									<?php print($fahrer['team-meisterschaften']); ?>
								</td>
							</tr>
							<tr>
								<td>
									Bestes Ergebnis im Rennen
								</td>
								<td>
									<?php print($fahrer['beir']); ?>
								</td>
							</tr>
							<tr>
								<td>
									Bestes Ergebnis im Qualifying
								</td>
								<td>
									<?php print($fahrer['beiq']); ?>
								</td>
							</tr>
							<tr>
								<td>
									Punkte
								</td>
								<td>
									<?php print($fahrer['punkte']); ?>
								</td>
							</tr>
							<tr>
								<td>
									Team-Punkte
								</td>
								<td>
									<?php print($fahrer['teampunkte']); ?>
								</td>
							</tr>
						</table>
</div>
<div id="fahrer_logo" onmouseover="mouse_in()" onmouseout="mouse_out()">
	<?php echo "<img style=\"border-radius:7.5px;height:200px;width:300px;padding-bottom:0px;margin-bottom:0px;top:-5px;position:relative;\" src=\"./../../../images/fahrer_logos/logo_".($fahrer['fahrer-tag']).".jpg\"/>"; ?> 
		<img id="fuell_team_logo" onclick="window.location='change_profile_img.php'" src="./../../../images/login/fuellfeder.png" style="position:relative;right:29px;bottom:0px;height:25px;width:25px;opacity:0;top:-2.5px;"/>
</div>