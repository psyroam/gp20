<?php
    require_once 'error/error_msg_c.php';
	require_once 'database_c.php';
	require_once 'user_c.php';
    
    session_start();
	
	$_SESSION['db'] = new db();
	
	require_once '/../score_c.php';
	require_once '/../fahrer_c.php';
	require_once '/../team_c.php';

    require_once 'check.php';

?>