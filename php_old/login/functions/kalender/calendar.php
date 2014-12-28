<?php
	require_once './../../cLogin.php';
	
	if(!logged()){
		header("Location: ./../../login.php");
	}
?>
<html>
<head>
	<!-- Kalender-Dateien einbinden -->
		<script type="text/javascript" src="inc/calendar.js"></script>
		<link rel="stylesheet" type="text/css" href="inc/calendar.css" />

		<style>
		h1	{
			color: black;  font-family: 'bebas_neueregular', sans-serif; font-size: 38px; padding-left: 35px; padding-right: 35px; font-weight: normal;margin-top:-10px;
			} 
		h2	{
			color: black;  font-family: 'bebas_neueregular', sans-serif; font-size: 20px; padding-left: 15px; margin-top: 30px; padding-top: 2px; font-weight: normal;
			} 
					h5	{
			color: black;  font-family: 'bebas_neueregular', sans-serif; font-size: 17px; padding-left: 7px; margin: 0; padding-top: 2px; font-weight: normal;
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
</style>
</head>
<body>
<h1>Kalender</h1>
	<Center>
	<table border=1 id='calendar'>
		<tr style='visibility:collapse;' hidden>
			<td colspan=7 id='date_memory'>---</td>
		</tr>
		<tr>
			<td class='calendar_head'><a class='calendar_link'
				href='javascript:prevMonth()'> &laquo;</a></td>
			<td colspan=5 class='calendar_head_month' id='calendar_month'>
				---</td>
			<td class='calendar_head'><a class='calendar_link'
				href='javascript:nextMonth()'> &raquo;</a></td>
		</tr>
		<tr>
			<td class='calendar_day'>Mo</td>
			<td class='calendar_day'>Di</td>
			<td class='calendar_day'>Mi</td>
			<td class='calendar_day'>Do</td>
			<td class='calendar_day'>Fr</td>
			<td class='calendar_day'>Sa</td>
			<td class='calendar_day'>So</td>
		</tr>
		<tr>
			<td class='calendar_entry' id='calendar_entry_1'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_2'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_3'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_4'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_5'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_6'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_7'>-x-</td>
		</tr>
		<tr>
			<td class='calendar_entry' id='calendar_entry_8'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_9'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_10'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_11'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_12'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_13'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_14'>-x-</td>
		</tr>
		<tr>
			<td class='calendar_entry' id='calendar_entry_15'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_16'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_17'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_18'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_19'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_20'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_21'>-x-</td>
		</tr>
		<tr>
			<td class='calendar_entry' id='calendar_entry_22'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_23'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_24'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_25'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_26'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_27'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_28'>-x-</td>
		</tr>
		<tr>
			<td class='calendar_entry' id='calendar_entry_29'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_30'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_31'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_32'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_33'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_34'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_35'>-x-</td>
		</tr>
		<tr>
			<td class='calendar_entry' id='calendar_entry_36'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_37'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_38'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_39'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_40'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_41'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_42'>-x-</td>
		</tr>
	</table>
	
	<script type='text/javascript'>
		iniCalendar();
		
		/*0 = wie bisher, Datum wird in die Box geschrieben*/
		setReturnModus(1);
		/*1 = neu, Eventtext wird in die Box geschrieben
		Das event muss in der calendar.js in der Function
		getEventtext definiert werden.*/
		//setReturnModus(1);
	</script>
	<br />	
		<table>
			<form id='myform'>
				<tr>
					<td>
						Datum:
					</td>
					<td>
						<input type="text" id='datum'/>
					</td>
				</tr>
				<tr>
					<td>
						Event:
					</td>
					<td>
						<input type="text" id='event'/>
					</td>
				</tr>
			</form>
			<form id="Confirmation">
			<tr>
					<td style="text-align:center;" colspan=2>
						<button type="button"><a style="text-decoration:none;" href="./../zusagen.php"><h5>Zusagen/Absagen</h5></a></button>
					</td>
			</tr>
			</form>
		</table>
</Center>
</body>
</html>


