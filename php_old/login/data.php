<?php
require_once 'login/Database.php';
function get_fahrer()
{
	$fahrer;
	$result = mysql_query("SELECT * FROM `fahrer`;");
	$num_rows = mysql_num_rows($result);
	$i=0;
	while($i<$num_rows)
	{
		$fahrer[$i]['id'] = mysql_result($result,$i,'id');
		$fahrer[$i]['fahrer']=mysql_result($result,$i,'fahrer');
		$fahrer[$i]['fahrer-tag'] = mysql_result($result,$i,'fahrer-tag');
		$fahrer[$i]['team'] = mysql_result($result,$i,'team');
		$fahrer[$i]['team-tag'] = mysql_result($result,$i,'team-tag');
		$fahrer[$i]['partner'] = mysql_result($result,$i,'partner');
		$fahrer[$i]['rennen'] = mysql_result($result,$i,'rennen');
		$fahrer[$i]['siege'] = mysql_result($result,$i,'siege');
		$fahrer[$i]['poles'] = mysql_result($result,$i,'poles');
		$fahrer[$i]['punkte'] = mysql_result($result,$i,'punkte');
		$i++;
	}
	return bubble_sort($fahrer);
}
function get_team()
{
	$team;
	$result = mysql_query("SELECT * FROM `team`;");
	$num_rows = mysql_num_rows($result);
	$i=0;
	while($i<$num_rows)
	{
		$team[$i]['id'] = mysql_result($result,$i,'id');
		$team[$i]['team']=mysql_result($result,$i,'team');
		$team[$i]['team-tag']=mysql_result($result,$i,'team-tag');
		$team[$i]['punkte'] = mysql_result($result,$i,'punkte');
		$i++;
	}
		return bubble_sort($team);
}
function bubble_sort($input)
{
$length = count($input);
	for($i=0;$i<$length;$i++)
	{
		for($j=0;$j<$length-1;$j++)
		{
			if($input[$j]['punkte'] < $input[$j+1]['punkte'])
			{
				$temp = $input[$j];
				$input[$j] = $input[$j+1];
				$input[$j+1] = $temp;
			}
		}
	}
	return $input;
}
?>