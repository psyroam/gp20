<?php
	//error_reporting(0);
	require_once './php/cms/cms.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>GP20 Karting Series | Home</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<link rel="shortcut icon" href="images/icons/favicon.ico" type="image/ico"/> 
		<script type="text/javascript" src="js/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script>
	$(function slide(){
		$('.fadein img:gt(0)').hide();
		setInterval(function slide(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 6000);
	});
	</script>
	<script language="javascript" type="text/javascript">
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
</script>
	</head>
	<body>
		<div id="page">
			<div id="header">
			<div id="headercontainer">
					<div id="logo" title="GP20 Karting Series" onclick="location.href='index.html';">
					</div>
					</div>
						<div id="navMenu">
						<div id="navMenuContainer">
						<div id="navMenuMain">
							<a href="<?=$_SESSION['db']->getLinkById(10)?>"><?=$_SESSION['db']->get_title_by_id(10)?></a>
							<a href="<?=$_SESSION['db']->getLinkById(5)?>"><?=$_SESSION['db']->get_title_by_id(5)?></a>
							<a href="<?=$_SESSION['db']->getLinkById(12)?>"><?=$_SESSION['db']->get_title_by_id(12)?></a>
							<a href="<?=$_SESSION['db']->getLinkById(2)?>"><?=$_SESSION['db']->get_title_by_id(2)?></a>
							<a href="<?=$_SESSION['db']->getLinkById(6)?>"><?=$_SESSION['db']->get_title_by_id(6)?></a>                                            
       						<a href="mehr">Mehr</a>                                                 
					
							</div>
							<div id="navMenuRight">
								<form>
									<input class="suchleiste" name="Suche" placeholder="Suche" type="text" />
									<input type="image" src="images/icons/icon_search.png" alt="Suche" class="submit" />
								</form>
      						</div>
						</div>
						</div>
			</div>
		<div id="wrapper">
			<div id="foto">
   				<div class="fadein">                     
					<img src="images/slider/slide01.jpg" title="Zielgerade">
    				<img src="images/slider/slide02.jpg" title="Julian Breitner in Kottingbrunn">
    				<img src="images/slider/slide03.jpg" title="Daytona-Kartbahn">
   				</div>
				<div class="infoto"><h3>Der Countdown für die Saison 2015 läuft!</h3><p class="whitep">Im März 2015 ist es wieder soweit: Die GP20-Serie startet in ihre zweite Saison...</p>
     				<div class="mehrlesen">
			  			<a href="rennen3report.html">&#x276f;&#x276f; mehr lesen</a>
			  		</div>                   
				</div>
   			</div>     
   		<?php
   			if(!$_SESSION['db']->get_fullpage_by_url($URL))
   			{
   				require_once './php/data_c.php';
   				 ?>
   				 <div id="sidebox">
 <style>
		h1	{
			color: black;  font-family: 'bebas_neueregular', sans-serif; font-size: 28px; padding-left: 20px; padding-top: 0; font-weight: normal; text-decoration: none;
			}
		 h2 {
		   font-size: 12px; font-family: Century Gothic, Arial, sans-serif; padding-left: 20px; padding-right: 20px; font-weight: bold; padding-top: 0; padding-bottom: 0; margin-top: 0; margin-bottom: 0;
		 }                       
		 p  {
		   font-size: 12px; font-family: Century Gothic, Arial, sans-serif; padding-left: 20px; padding-right: 20px; padding-top: 0; padding-bottom: 0; margin-top: 0; margin-bottom: 10px;
		 }
		                    
					.tablesmall th {
						font-size: 11px;
						font-family: Century Gothic, Arial, sans-serif;
					}

					.tablesmall td {
						font-size: 14px;
						font-family: Century Gothic, Arial, sans-serif;
					}
		                        
		   .frame {
		    background-color: #f5f5f5;
		   }

		</style>
		<script type="text/javascript">
		$("#content").ready(function(){
			document.getElementById("content").style.width = "830px";
		});
		</script>
	  	<div id="scoretable_einzelwertung">
			<?php
				include($_SESSION['db']->getLinkById('15'));
			?>
		</div>
		
		<div id="scoretable_teamwertung">
			<?php 
				include($_SESSION['db']->getLinkById('16'));
			?>
		</div>
</div>   
		<?php
			}
		?>

		<div id="content">
			<?=$URL?>
			<?php

				print_r($_SESSION);

			include($URL);

			?>
		</div>
		<div id="footer">
			<p style="text-align: center;"><a href="about.html">Über uns</a> | <a href="impressum.html">Impressum</a> | <a href="kontakt.html">Kontakt</a> | <a href="nutzungshinweis.html">Nutzungshinweis</a> | <a href="datenschutz.html">Datenschutz</a> | <a href="sitemap.html">Sitemap</a></p>
			<p style="text-align: center; font-size: 12px;">&copy GP20 Karting Series 2014 - Alle Rechte vorbehalten</p>
		</div>
			
		</div>
		</div>
	</body>
</html>