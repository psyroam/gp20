<?php
	//DO NOT CHANGE


	$link = "$_SERVER[HTTP_HOST]";


		$server="fdb7.freehostingeu.com";
		
		$db="1614450_gp20";

	//overwrite
	if($link === "localhost")
	{
		$server = "localhost";
		$username = "root";
		$password = "6046";
		$db = "1614450_gp20";
	}
	$con = mysql_connect($server,$username,$password);
	mysql_select_db($db,$con);
?>