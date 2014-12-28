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
		<h1>Einzelwertung</h1>
		<table class="tablesmall">
			<tr>
				<th>Pos.</th>
				<th>Fahrer</th>
				<th>Pkt.</th>
			</tr>
			<?php
				for($i=0;$i<sizeof($fahrer);$i++)
				{
			?>
			<tr>
				<td><?php print($i+1);?></td>
				<td><?php print($fahrer[$i]['fahrer']); ?></td>
				<td><?php print($fahrer[$i]['punkte']); ?></td>
			</tr>
			<?php
				}
			?>
		</table>
 </div>
	</body>
</html>