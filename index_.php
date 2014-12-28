<?php
error_reporting(0);
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
				<div id="logo" title="GP20 Karting Series" onclick="location.href='index.html';"></div>
			</div>
				<div id="navMenu">
					<div id="navMenuContainer">
						<div id="navMenuMain">
							<a href="news.php">News</a>
							<a href="fahrerfeld.php">Fahrerfeld</a>
							<a href="rennen.html">Rennkalender</a>
							<a href="ergebnisse.html">Ergebnisse</a>
							<a href="galerie.html">Galerie</a>                                             
       						<a href="mehr">Mehr</a>                                                 
						</div>
						<div id="navMenuRight">
							<form><input class="suchleiste" name="Suche" placeholder="Suche" type="text" />
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
	123
	   		<?php
	   			if($_SESSION['db']->get_fullpage_by_url($URL) != 1)
	   			{
	   				?>
	   					<script>
	   						$("#content").ready(
	   							function(){
	   								document.getElementById("content").style.width = "830px";
	   							});
	   					</script>
	   				<?php
	   				include("php/score.php");
	   			}
	   		?>
   	   		<div id="content">
	   			<div class="normheadline">
	   				<h3>
	   					<?php
	   						$title = $_SESSION['db']->get_title_by_url($URL);
	   						print($title);
	   					?>
	   				</h3>					
	   			</div>
					<?php
						print("URL: ".$URL);
						readfile($URL);
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