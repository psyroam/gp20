<?php
	//require_once './php/data.php';
	//require_once './php/fahrer_profil.php';
	
	//$team = get_team();
	error_reporting(0);
	
?>
	<style>
		.teamlogo img{
			height: 150px;
			width:250px;
		}
                
 		#content2 p {
  			margin-top: 50px;
 	 	}              
	</style>
	
		<div id="content2">	
		<script>
			function expand(x,y){
				retract_();
				document.getElementById(y).parentNode.insertBefore(document.getElementById("profil"), document.getElementById(y).nextSibling);
				//document.getElementById("profil").style.display = "block";
				$("#profil").show("slow");
				document.getElementById("iprofil").setAttribute('src','./php/fahrer_profil.php?fahrer='+x);
			}
			function retract(){
				//document.getElementById("statistik").style.display = "none";
				$("#profil").hide("slow");
			}
				function retract_(){
				document.getElementById("profil").style.display = "none";
				//$("#statistik").hide("slow");
			}
		</script>
	       		
	       		test

		</div>
