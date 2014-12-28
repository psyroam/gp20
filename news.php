<?php
	//require_once 'php/cNews.php';	
	require_once 'php/news/news_c.php';
	require_once 'php/news/artikel_c.php';	

	$artikel = News::get_all();
	$artikel_per_site = 4;
	$max_sites = ceil(sizeof($artikel) / $artikel_per_site);
	$current_site = 0;

	if(!isset($_GET['news_site']))
	{
		$current_site = 0;
	}
	else
	{
		$current_site = $_GET['news_site'];

		if($current_site < 0)
			$current_site = 0;
		else if($current_site > $max_sites)
			$current_site = $max_sites;
	}
?>
<div id="content2" style="position:relative;">
	<?php
		for($i=($current_site * $artikel_per_site);$i<($current_site * $artikel_per_site)+$artikel_per_site;$i++)
		{
			if(!isset($artikel[$i]))
			{
				continue;
			}

			?>
				<div id="normpreview" style="height:33.33%;width:100%;">
					<div class="normheadline" >
						<h6 style="margin:0px;padding:0px;color:white;"><?=$artikel[$i]->title?></h6>
					</div>
					<div id="preview_img" style="float:left;width:125px;height:160px">
						<img style="height:160pxpx;width:160px;" src="images/news/Preview/7.jpg"/>
					</div>
					<div id="preview_text" style="height:160px;position:relative;left:45px">
						<?php include($artikel[$i]->preview_href); ?>

						<div id="mehr_lesen" style="">
						<a href="?artikel=<?=$artikel[$i]->id?>">mehr lesen</a>
					</div>
					</div>

				</div>
			<?php
		}
	?>
<table style="width:100%">
	<tr style="width:100%;">
	<td style="text-align:left;">
		<a href="?news_site=<?php print($_GET['news_site']-1);?>">Zurück</a>
	</td>
	<td style="text-align:right;">
		<a href="?news_site=<?php print($_GET['news_site']+1);?>">Weiter</a>
	</td>
	</tr>
</table>
</div>