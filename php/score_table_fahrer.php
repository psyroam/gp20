<?php
	$fahrer = $_SESSION['db']->get_score_rank();
?>
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
				<td><?=$i+1?></td>
				<td><?=$fahrer[$i]['tag'] ?></td>
				<td><?=$fahrer[$i]['score'] ?></td>
			</tr>
			<?php
				}
			?>
		</table>
 </div>