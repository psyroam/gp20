<?php
require_once 'data.php';

$fahrer = get_fahrer();
$team = get_team();
?>

<html>
	<head>
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
                        
			.tablesmall {
				width: 230px;
				margin-left: auto;
    margin-right: auto;                            
				padding-left: 5px;
				margin-top: 10px;
				margin-bottom: 20px;
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
    margin: 0px;
    height: 100%;
    width: 100%;
    background-color: #f5f5f5;
    position: absolute;
    left: 0;
    bottom: 0;
   }
   
     .frame:hover{
     background-color: #f1f1f1;
     cursor: pointer;
     }
     
     .frame:hover h1 {
     color: #cc0033;
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
						src: url('COPYN___-webfont.eot');
						src: url('COPYN___-webfont.eot?#iefix') format('embedded-opentype'),
						url('COPYN___-webfont.woff') format('woff'),
						url('COPYN___-webfont.ttf') format('truetype'),
						url('COPYN___-webfont.svg#copystruct') format('svg');
						font-weight: normal;
						font-style: normal;
					}
		</style>
  <base target="_parent" />              
	</head>
	<body>
  <div class="frame">
		<h1>Letztes Rennen</h1>
  <h2>Langenzersdorf GP 2014</h2>
  <p>13.09.2014</p>

		<table class="tablesmall">
   <tr>
				<th>Pos.</th>
				<th>Fahrer</th>
				<th>Diff.</th>
			</tr>             
   <tr>
				<td>1</td>
				<td>Alexander Schuster</td>
				<td>/</td>
			</tr>
   <tr>
				<td>2</td>
				<td>Florian Schellnast</td>
				<td>k.A.</td>
			</tr> 
   <tr>
				<td>3</td>
				<td>Gabriel Feyertag</td>
				<td>k.A.</td>
			</tr> 
		</table>
<h2>Schnellste Rennrunde</h2>                
<p>Alexander Schuster (55.300)</p>

<h2>Pole Position</h2> 
<p>Alexander Schuster (55.456)</p>

 </div>       
	</body>
</html>