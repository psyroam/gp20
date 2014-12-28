<?php
$teams = $_SESSION['db']->get_team_score_rank();
?> 
<div class="frame">       
	<h1>Teamwertung</h1>

	<table class="tablesmall">
		<tr>
			<th>Pos.</th>
			<th>Team</th>
			<th>Pkt.</th>
		</tr>
		<?php for($i=0;$i<sizeof($teams);$i++)
			{
		?>
		<tr>
			<td><?=$i+1 ?></td>
			<td><?=$teams[$i]['name'] ?></td>
			<td><?=$teams[$i]['score'] ?></td>
		</tr>
		<?php
		}
		?>
	</table>
</div>
