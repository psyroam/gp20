<?php
	require_once 'cStatistiken.php';
	error_reporting(0);
	if(!logged()){
		header("Location: ./../../../login.php");
	}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script src="highcharts.js"></script>
		<?php
			$chart_ep = php_ep();
			$chart_tp = php_tp();
		?>
		<script>
		function ep(){
			$('#chart').highcharts({
            title: {
                text: 'Einzel-Punkte',
                x: -20 //center
            },
            xAxis: {
                categories: [<?php echo ($chart_ep['categories']) ?>]
            },
            yAxis: {
                title: {
                    text: 'Punkte'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [<?php echo ($chart_ep['series']) ?>]
        });
   		}

   		function tp(){
			$('#chart').highcharts({
            title: {
                text: 'Team-Punkte',
                x: -20 //center
            },
            xAxis: {
                categories: [<?php echo ($chart_tp['categories']) ?>]
            },
            yAxis: {
                title: {
                    text: 'Punkte'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [<?php echo ($chart_tp['series']) ?>]
        });
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
						src: url('./../../../../BebasNeue-webfont.eot');
						src: url('./../../../../BebasNeue-webfont.eot?#iefix') format('embedded-opentype'),
						url('./../../../../BebasNeue-webfont.woff') format('woff'),
						url('./../../../../BebasNeue-webfont.ttf') format('truetype'),
						url('./../../../../BebasNeue-webfont.svg#bebas_neueregular') format('svg');
						font-weight: normal;
						font-style: normal;
					}
					
					@font-face {
						font-family: 'copystruct';
						src: url('./../../../../COPYN___-webfont.eot');
						src: url('./../../../../COPYN___-webfont.eot?#iefix') format('embedded-opentype'),
						url('./../../../../COPYN___-webfont.woff') format('woff'),
						url('./../../../../COPYN___-webfont.ttf') format('truetype'),
						url('./../../../../COPYN___-webfont.svg#copystruct') format('svg');
						font-weight: normal;
						font-style: normal;
					}
					
			ul{
				display:inline;
			}
			ul li{
				text-decoration:none;
				list-style-type:none;
				float:left;
				margin-right:15px;
				padding:5px;
				padding-left:2px;
				
			}
			
			#content{
				height:auto;
				text-align:center;
			}
			
			#content ul li:hover{
				background:#C8C8C8;
			}
			
			#content ul li p{
				padding:0px;
				margin:0px;
			}
			
			#content ul li p:hover{
				cursor:pointer;
			}
			
			#chart{
				padding-top:15px;
				margin:0px;
				margin-top:15px;
				padding-top:15px;
				padding:0px;
				height:auto;
				width:auto;
				padding-left:20%;
			}
</style>
	</head>
	<body>
		<h1>Statistiken</h1>
		<div id="content">
			<Center>
			<div id="nav" style="padding-left:39%;">
				<ul>
					<li>
						<p onclick="ep()">Einzel-Punkte</p>
					</li>
					<li>
						<p onclick="tp()">Team-Punkte</p>
					</li>
			</ul>
			</div>
			</Center>
			<div id="chart" style="position:absolute;left:0px;margin-top:25px;">
				
			</div>		
		</div>
	</body>
</html>