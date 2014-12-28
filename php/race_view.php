<?php
	if(!isset($_GET['id']))
	{
		$race = $_SESSION['db']->get_latest_race();
		$extra = "Letztes ";
	}
	else
	{
		$race = $_SESSION['db']->get_race_by_id($_GET['id']);
		$extra = "";
	}
?>

  <div class="frame">
		<h1><?=$extra?>Rennen:</h1>
  		<h2><?=$race['location']." GP ".$race['saison']?></h2>
  		<p><?php

  			$date = $race['latest race'];
  			$adate = explode("-", $date);
  			$day = $adate[2];
  			$month = $adate[1];
  			$year = $adate[0];

  			print($day.".".$month.".".$year);
  		?></p>
  		<?php
  			
  			$fahrer = $_SESSION['db']->get_poles_by_id($race['id']);
  		?>
		<table class="tablesmall">
   <tr>
				<th>Pos.</th>
				<th>Fahrer</th>
				<th>Diff.</th>
			</tr>             
   <tr>
				<td><?=$fahrer[0]['ranking']?></td>
				<td><?=$fahrer[0]['first_name']." ".$fahrer[0]['last_name']?></td>
				<td><?=$fahrer[0]['diff']?></td>
			</tr>
   <tr>
				<td><?=$fahrer[1]['ranking']?></td>
				<td><?=$fahrer[1]['first_name']." ".$fahrer[1]['last_name']?></td>
				<td><?=$fahrer[1]['diff']?></td>
			</tr> 
   <tr>
				<td><?=$fahrer[2]['ranking']?></td>
				<td><?=$fahrer[2]['first_name']." ".$fahrer[2]['last_name']?></td>
				<td><?=$fahrer[2]['diff']?></td>
			</tr> 
		</table>
<?php
	$fastest_lap = $_SESSION['db']->get_fastest_lap_by_race_id($race['id']);
	$pole_position = $_SESSION['db']->get_pole_by_id($race['id']);
?>

<h2>Schnellste Rennrunde</h2>                
<p><?=$fastest_lap['first_name']." ".$fastest_lap['last_name']."(".$fastest_lap['fastest lap'].")"?></p>
<h2>Pole Position</h2> 
<p><?=$pole_position['first_name']." ".$pole_position['last_name']." (".$pole_position['best_lap'].")"?></p>
</div>       
