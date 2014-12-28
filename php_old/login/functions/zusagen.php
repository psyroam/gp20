<?php
	require_once './../cLogin.php';
	require_once './../../data.php';
	
	if(!logged()){
		header("Location: ./../login.php");
	}
	
	$fahrer['fahrer-tag']=strtoupper($_SESSION['fahrer-tag']);
	
	$query = "SELECT * FROM `next_race`";
	$result = mysql_query($query)or die(mysql_error());
	
	$strecke = mysql_result($result,0,'strecke');
	$date = mysql_result($result,0,'date');
	$time = mysql_result($result,0,'time');
	
	//check Password
	if(!check_pass()){
		if($_POST['txtPassword']!="")
			echo "<Center><p>Passwort ist falsch!</p></Center>";
	}else{
	
		$rd = $_POST['confirmation']; // schreibt in die Variable welcher Radiobutton checked ist.
			
			if($rd == "Zusagen"){
				insert($strecke,$date,$time,"Zusagen","",""); //Braucht keine "Vorschläge" da zugesagt wird.
			}else if($rd == "Absagen"){
				$txtDatum = $_POST['txtVorschlag_Date'];
				$txtTime = $_POST['txtVorschlag_Time'];
			
				if(isset($txtDatum) and isset($txtTime)){
					insert($strecke,$date,$time,"Absagen",$txtDatum,$txtTime);
				}else{
					echo "<Center><p>Kein Vorschlag eingegeben!</p></Center>";
				}
			}
	}
			
	function check_pass(){
		$password = $_POST['txtPassword'];
		$query = "SELECT * FROM `login` WHERE `fahrer-tag`='".mysql_escape_string(strtoupper($_SESSION['fahrer-tag']))."' and `password`='".mysql_escape_string(cryption($password))."';";
		$result = mysql_query($query)or die(mysql_error());
		
		if(mysql_num_rows($result)>0)
		{
			return true;
		}
		else
			return false;
	}
	
	function insert($strecke,$date,$time,$do,$Vorschlag_Date,$Vorschlag_Time){
		
		if($do == "Zusagen"){
			$do = 1;
		}else{
			$do = 0;
		}
	
		$query = "INSERT INTO `next_race` (`strecke`,`date`,`time`,`fahrer-tag`, `vorschlag_date`,`vorschlag_time`,`zusage`) VALUES('".mysql_escape_string($strecke)."','".mysql_escape_string($date)."','".mysql_escape_string($time)."','".mysql_escape_string($_SESSION['fahrer-tag'])."','".mysql_escape_string($Vorschlag_Date)."','".mysql_escape_string($Vorschlag_Time)."','".mysql_escape_string($do)."');";
		mysql_query($query)or die(mysql_error());
		print("<Center><p>Deine Zusage/Absage ist erfolgreich bei uns angekommen!</p></Center>");
	}
?>
<!DOCTYPE html>
<html>
	<head>
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script>
			function show_(){
				document.getElementById("vorschlag").style.display = "block";
			}

			function hide_(){
				document.getElementById("vorschlag").style.display = "none";
			}
		</script>
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
						src: url('./../../../BebasNeue-webfont.eot');
						src: url('./../../../BebasNeue-webfont.eot?#iefix') format('embedded-opentype'),
						url('./../../../BebasNeue-webfont.woff') format('woff'),
						url('./../../../BebasNeue-webfont.ttf') format('truetype'),
						url('./../../../BebasNeue-webfont.svg#bebas_neueregular') format('svg');
						font-weight: normal;
						font-style: normal;
					}
					
					@font-face {
						font-family: 'copystruct';
						src: url('./../../../COPYN___-webfont.eot');
						src: url('./../../../COPYN___-webfont.eot?#iefix') format('embedded-opentype'),
						url('./../../../COPYN___-webfont.woff') format('woff'),
						url('./../../../COPYN___-webfont.ttf') format('truetype'),
						url('./../../../COPYN___-webfont.svg#copystruct') format('svg');
						font-weight: normal;
						font-style: normal;
					}
	</style>
	</head>
	<body>
		<Center>
			<form method="post">
				<table>
					<tr>
						<td>
							Fahrerk&uuml;rzel:
						</td>
						<td>
							<?php print(($fahrer['fahrer-tag'])); ?>
						</td>
					</tr>
					<tr>
						<td>
							Passwort:
						</td>
						<td>
							<input type="password" name="txtPassword"/>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="text-align:center;">
							<b>N&auml;chstes Rennen:</b>
						</td>
					</tr>
					<tr>
						<td>
							Strecke:
						</td>
						<td>
							<?php print($strecke); ?>
						</td>
					</tr>
					<tr>
						<td>
							Datum:
						</td>
						<td>
							<?php print($date); ?>
						</td>
					</tr>
					<tr>
						<td>
							Uhrzeit
						</td>
						<td>
							<?php print($time); ?>
						</td>
					</tr>
					</table> 
						<div id="vorschlag" style="display:none;height:auto;">
						<tr>
							<td>
								Vorschlag:
							</td>
						</tr>
						<tr>
							<td>
								Datum:
							</td>
							<td>
								<input type="text" name="txtVorschlag_Date"/>
							</td>
						</tr>
						<tr>
							<td>
								Uhrzeit:
							</td>
							<td>
								<input type="text" name="txtVorschlag_Time"/>
							</td>
						</tr>
						</table>
						</div>
						<table>
					<tr>
						<td>
							<input type="radio" onclick="hide_()" name="confirmation" id="rdZusagen" value="Zusagen" checked>Zusagen</input>
						</td>
						<td>
							<input type="radio" onclick="show_()" name="confirmation" id="rdAbsagen" value="Absagen">Absagen</input>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="text-align:center;">
							<input type="submit" value="Senden"/>
						</td>
					</tr>
				</table>
				</form>
			</br></br>
			<h1>Wer kommt mit?</h1>
				<table width="100%" style="border:1px solid black;border-radius:2.5px;text-align:center;">
					<tbody>
						<tr>
							<th>
								Fahrer:
							</th>
							<th>
								Fahrerk&uuml;rzel:
							</th>
							<th>
								Ist dabei?
							</th>
						</tr>
						<?php
						
							$fahrer = get_fahrer();
							$fahrer_length = count($fahrer);
							for($i = 0;$i<$fahrer_length;$i++){
								$query = "SELECT `zusage` FROM `next_race` WHERE `fahrer-tag`='".$fahrer[$i]['fahrer-tag']."';";
								$result = mysql_query($query)or die(mysql_error());
								if(mysql_num_rows($result)==1){
									?>
										<tr>
											<td>
												<?php print($fahrer[$i]['fahrer']);?>
											</td>
											<td>
												<?php print($fahrer[$i]['fahrer-tag']);?>
											</td>
											<td>
												<?php 
													$dabei = (mysql_result($result, 0,'zusage'));

													if($dabei == "1"){
														print("Ja");
													}else if($dabei == "0"){
														print("Nein");
													}
												?>
											</td>
										</tr>
									<?php
								}
							}
						?>
					</tbody>
				</table>
		</Center>
	</body>
</html>