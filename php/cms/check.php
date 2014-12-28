<?php
	if(isset($_POST['txtUser'])&&isset($_POST['txtPass']))
	{
		$successful = USER::try_login($_POST['txtUser'],$_POST['txtPass']);		
		switch($successful)
		{
			case true:
				$_SESSION['user'] = new USER($_POST['txtUser']);				
			break;
			case false:
				unset($_SESSION['user']);
			break;
			default:
				unset($_SESSION['user']);
			break;
		}
	}

	if(isset($_GET['login']) && $_GET['login']==="true")
	{
		$URL = "php/login/login.php";
	}

	/*
	#region Register
		if(isset($_GET['enabling']))
		{
			if($_GET['enabling'] == true)
			{
				//$URL = "sites/essentials/enabling_show.php";
			}
		}

		if(isset($_GET['set_enable']))
		{
			if($_GET['set_enable'] == true)
			{
				//$URL = "sites/essentials/enabling_set.php";
			}
		}

		if(isset($_POST['btnEnabling']))
		{
			$_SESSION['user']->enable($_POST['txtSetEnabling']);
		}
	*/

	#region Register

		if(isset($_POST['txtRegister_Benutzername'])&&isset($_POST['txtRegister_Password'])&&isset($_POST['txtRegister_Password_Confirmation']))
		{
			if($_POST['txtRegister_Password'] === $_POST['txtRegister_Password_Confirmation'])
			{
				USER::register($_POST['txtRegister_Benutzername'],$_POST['txtRegister_Password']);
			}
		}
		
	#endregion

		#regin login
				
			if(isset($_GET['id']))
			{
				$URL = $_SESSION['db']->getLinkById($_GET['id']);
			}
			else if(!isset($_GET))
			{
				$URL = $_SESSION['db']->getLinkById(10);//default load
			}
			//ansonsten home.php
			else if(!isset($_GET['id']) && isset($_SESSION['user']) && $_SESSION['user']->isLogged === true)
			{
				$URL = $_SESSION['db']->getLinkById(18);//home.php
			}

		#endregion

	if($_SESSION['user']->isEnabled)
	{
		#region Add new link
			if(isset($_POST['txtAddLink_Text']) && isset($_POST['txtAddLink_URL']))
			{
				$_SESSION['db']->new_link($_POST['txtAddLink_Text'],$_POST['txtAddLink_URL'],$_POST['txtAddLink_Hidden']);	
			}
		#endregion

		#region Admin
			if(isset($_SESSION['user'])&&$_SESSION['user']->isAdmin)
			{
				if(isset($_POST['txtAdmin_CTRL_Panel']))
				{
					$username = $_POST['txtAdmin_CTRL_Panel_Username'];
					$isAdmin = $_POST['txtAdmin_CTRL_Panel_isAdmin'];
					$isLocked = $_POST['txtAdmin_CTRL_Panel_isLocked'];
					$isEnabled = $_POST['txtAdmin_CTRL_Panel_isEnabled'];

					if(!isset($isAdmin))
					{
						$isAdmin = "0";
					}
					else
						$isAdmin = "1";


					if(!isset($isLocked))
					{
						$isLocked = "0";
					}
					else
						$isLocked = "1";

					if(!isset($isEnabled))
					{
						$isEnabled = "0";
					}
					else
						$isEnabled = "1";

					$_SESSION['db']->su_CTRL_Panel_Update($username,$isAdmin,$isLocked,$isEnabled);				
				}	
			}
		#endregion
	}

	#region news
		if(isset($_GET['news_site']))
		{
			$URL = $_SESSION['db']->getLinkById(10);
		}
		else if(isset($_GET['artikel']))
		{
			$URL = $_SESSION['db']->getLinkById(17);
		}
	#endregion

	function isURL_ID_valid($id)
	{
		if(isNumber($id))
		{
			if($_SESSION['db']->isURL_ID_valid($id))
				return true;
			else
				return false;
		}
	}

	function isNumber($foo)
	{
		for($i=0;$i<strlen($foo);$i++)
		{
			$s = substr($foo, $i,1);

			if($s !== 0 && $s !== 1 && $s !== 2 && $s !== 3 && $s !== 4 && $s !== 5 && $s !== 6 && $s !== 7 && $s !== 8 && $s !== 9 )
			{
				return false;
			}
		}
		return true;
	}
	?>