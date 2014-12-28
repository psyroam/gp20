<?php
	require_once 'php/news/news_c.php';
	require_once 'php/news/artikel_c.php';	

	if(isset($_GET['artikel']))
	{
		$artikel = $_SESSION['db']->get_artikel_object_by_id($_GET['artikel']);
	}
	else
		print("Kein Artikel ausgewählt!");
?>
<div id="content2">
	<h1><?=$artikel->title?></h1> by <h7><?=$_SESSION['db']->get_full_name_by_tag($artikel->author)?></h7>
	<br/>
	<br/>
	<p>
	<?php
		include $artikel->href;
	?>
	</p>
</div>