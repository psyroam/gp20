	<?php
	class USER
	{
		public $id;
		public $username="";	
		public $isAdmin="";
		public $isLocked="";
		public $isEnabled="";
		public $update="";
		public $register_date="";
		public $isLogged = true;
		
		public function __construct($username)
		{
			$this->username = $username;
			$this->ini();
		}

		public function loggout(){
			
		}	

		private static function random($length)
		{
			$salt = ""; 
			$salt_chars = array_merge(range('A','Z'), range('a','z'), range(0,9)); 
			for($i=0; $i < $length; $i++) 
			{ 
				$salt .= $salt_chars[array_rand($salt_chars)]; 
			}
			return $salt;
		}

		private static function create_enabling_key()
		{
			return USER::random(256);
		}

		public static function salt()
		{
			 return USER::random(22);
		}
			private static function get_salt($username)
			{
				$salt = $_SESSION['db']->get_salt($username);
				if($salt != -1)
				{
					return $salt;
				} 
				else 
					Report::publish(new Report("Fehler beim Erstellen des Salts!","Bitte wenden Sie sich an den Administrator",Error_LVL::Negative));
			}

		public static function register($username,$password)
		{
			$salt = USER::salt();
			$hashed = USER::hash_blowfish($password,$salt);
			$token = USER::create_enabling_key();
			
			if($_SESSION['db']->register($username,$hashed,$salt,$token))
			{
				$_SESSION['token'] = $token;
				header("location: ?enabling=true");
			}
		}

		public static function hash_blowfish($plaintext,$salt,$rounds = 10)
		{
			return crypt($plaintext,sprintf("$2a$%02d$",$rounds) . $salt);
		}

		public function enable_account($token)
		{
			if($_SESSION['db']->enable_account($token))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public static function try_login($username,$password)
		{	
			if($_SESSION['db']->try_login($username,USER::hash_blowfish($password,USER::get_salt($username))))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		public function ini()
		{
			$ini = $_SESSION['db']->ini($this->username);

			$this->id = $ini['id'];
			$this->isAdmin = $ini['isAdmin'];
			$this->isLocked = $ini['isLocked'];
			$this->isEnabled = $ini['isEnabled'];
		}
		
		public function enable($tk)
		{
			if(!$this->isEnabled)
			{
				$_SESSION['db']->enable_account($tk);
			}
		}
	}
?>