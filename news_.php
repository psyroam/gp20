<?php
	require_once 'php/cNews.php';

	$anz_previews = 4; // ANZAHL DER PREVIEWS AUF EINER SITE

	$iSite;
	if(!isset($_GET['site'])){
		echo "<script>var iSite =0;</script>";
		$iSite = 0;
	}else{
		print("<script>var iSite = ".$_GET['site'].";</script>");
		$iSite =$_GET['site'];
	}
	
	$previews = get_all_previews();

	$previews_length = count($previews);
	$max_Site = $previews_length / $anz_previews;
	$max_Site = ceil($max_Site);

	if($max_Site-1 < $iSite){//wenn sich jemand an der URL spielt und z.B news.php?site=6 aber es nur 3 Sites gibt
		print($max_Site);
		header("location: news.php?site="."0"); //Zurück
	}

	echo "<script>var max_Site =".$max_Site.";</script>";
?>
	
	</head>
	<body>
		<div id="content2" style="margin-bottom: 10px;">
				<?php

					for($i = 0;$i<$anz_previews;$i++){
						$pr[$i] = $previews[$iSite * $anz_previews + $i];
					}



				$pr = delete_extension($pr);

				for($i=0;$i<$anz_previews;$i++){

					if(($pr[$i])==null){
						continue;                                                           
					}

					print("<div id='view_on_preview'>");
						print("<h6>".delete_ranking($pr[$i])."</h6>");
						print("<iframe scrolling='no' src='./news/Previews/".$pr[$i].".html'></iframe>");
     				print("</div>");                                  
				}
				?>	
			</div>	