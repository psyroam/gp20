<?php
	
	if(isset($_GET['fahrer']))
	{
	require_once 'data.php';
	error_reporting(0);
	$x = $_GET['fahrer'];
	
	$query = "SELECT * FROM `profile` WHERE `fahrer-tag`='".$x."';";
	$result = mysql_query($query)or die(mysql_error());
	
	$profil['id'] = mysql_result($result,0,'id');
	$profil['team'] = mysql_result($result,0,'team');
	$profil['fahrer-tag'] = mysql_result($result,0,'fahrer-tag');
	$profil['podestplaetze'] = mysql_result($result,0,'podestplaetze');
	$profil['punkte'] = mysql_result($result,0,'punkte');
	$profil['rennteilnahmen'] = mysql_result($result,0,'rennteilnahmen');
	$profil['einzel-meisterschaften'] = mysql_result($result,0,'einzel-meisterschaften');
	$profil['team-meisterschaften'] = mysql_result($result,0,'team-meisterschaften');
	$profil['beir'] = mysql_result($result,0,'beir');
	$profil['beiq'] = mysql_result($result,0,'beiq');
	
	$query = "SELECT `fahrer` FROM `fahrer` WHERE `fahrer-tag`='".$x."';";
	$result = mysql_query($query)or die(mysql_error());
?>
<style>
h1	{
			color: black;  font-family: 'bebas_neueregular', sans-serif; font-size: 38px; padding-left: 35px; padding-right: 35px; font-weight: normal; margin-top: 10px;
			} 
			
			@font-face {
						font-family: 'bebas_neueregular';
						src: url('./../BebasNeue-webfont.eot');
						src: url('./../BebasNeue-webfont.eot?#iefix') format('embedded-opentype'),
						url('./../BebasNeue-webfont.woff') format('woff'),
						url('./../BebasNeue-webfont.ttf') format('truetype'),
						url('./../BebasNeue-webfont.svg#bebas_neueregular') format('svg');
						font-weight: normal;
						font-style: normal;
					}
					
					@font-face {
						font-family: 'copystruct';
						src: url('./../COPYN___-webfont.eot');
						src: url('./../COPYN___-webfont.eot?#iefix') format('embedded-opentype'),
						url('./../COPYN___-webfont.woff') format('woff'),
						url('./../COPYN___-webfont.ttf') format('truetype'),
						url('./../COPYN___-webfont.svg#copystruct') format('svg');
						font-weight: normal;
						font-style: normal;
					}
</style>
<div>
	<div id="fahrer_logo" style="float:left;">
		<?php
			echo "<img style='width:200px;height:125px;margin-top:8px;' src='./../images/fahrer_logos/logo_".$profil['fahrer-tag'].".jpg'/>";
		?>
	</div>
	<div style="float:left";>
	<table cellspacing="0" cellpadding="0" summary="Fahrerinformationen" style="text-align: left; font-family: Century Gothic, sans-serif; font-size: 12px; margin-left: 30px; table-layout:fixed">
                    <tbody><tr>
                        <td style="padding-right:15px;">Team</td>
                        <td><?php print($profil['team']); ?></td>
                    </tr>
					<tr>
                        <td style="padding-right:15px;">Namenskürzel</td>
                        <td><?php print($profil['fahrer-tag']); ?></td>
                    </tr>
                    <tr>
                        <td style="padding-right:15px;">Podestplätze</td>
                        <td><?php print($profil['podestplaetze']); ?></td>
                    </tr>
                    <tr>
                        <td style="padding-right:15px;">Punkte</td>
                        <td><?php print($profil['punkte']); ?></td>
                    </tr>
                    <tr>
                        <td style="padding-right:15px;">Rennteilnahmen</td>
                        <td><?php print($profil['rennteilnahmen']);?></td>
                    </tr>
                    <tr>
                        <td style="padding-right:15px;">Gewonnene Einzel-Meisterschaften</td>
                        <td><?php print($profil['einzel-meisterschaften']);?></td>
                    </tr>
					 <tr>
                        <td style="padding-right:15px;">Gewonnene Team-Meisterschaften</td>
                        <td><?php print($profil['team-meisterschaften']); ?></td>
                    </tr>
                    <tr>
                        <td style="padding-right:15px;">Bestes Ergebnis im Rennen</td>
                        <td><?php print($profil['beir']); ?></td>
                    </tr>
                    <tr>
                        <td style="padding-right:15px;"q>Bestes Ergebnis im Qualifying</td>
                        <td><?php print($profil['beiq']);?></td>
                    </tr>
                </tbody></table>	
				</div>
			<div style="position:absolute;top:30%;bottom:0px;left:60%;right:0px;"><h1><?php print(mysql_result($result,0,'fahrer')); ?></h1></div>	
		</div>
				
<?php
}
?>