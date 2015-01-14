<?php

	class db
	{
		private $creds=array();
		private $connection;

		private function connect(){
			require 'credentials.php';
			$this->creds = $creds;
			$this->connection = mysql_connect($creds['host'],$creds['username'],$creds['password'])or die(mysql_error());
			mysql_select_db($creds['db'],$this->connection);		
		}

		public function __construct()
		{
			$this->connect();
		}

		/*public function get_links(){
			$query = "SELECT * FROM `".$this->creds['table']['sites']."` WHERE `isHidden`='0';";

			$result =  mysql_query($query)or die(mysql_error());	
		
			$rows = array();
			$i=0;
			while($row=mysql_fetch_object($result))
			{
				$rows[$i]['id'] = $row->id;
				$rows[$i]['text'] = $row->text;
				$rows[$i]['url'] = $row->url;
				$i++;
			}

			return $rows;
		}

		public function get_hidden_links()
		{
			if($_SESSION['user']->isLogged==1 && $_SESSION['user']->isAdmin==1)
			{
				$query = "SELECT * FROM `".$this->creds['table']['sites']."` WHERE `isHidden`='1';";

				$result =  mysql_query($query)or die(mysql_error());	
			
				$rows = array();
				$i=0;

				while($row=mysql_fetch_object($result))
				{
					$rows[$i]['id'] = $row->id;
					$rows[$i]['text'] = $row->text;
					$rows[$i]['url'] = $row->url;
					$i++;
				}

				return $rows;
			}
		}*/

		///<summary>
		/*
			The function returns the URL which you want include
		*/
		///</summary>
		///<param name="id">$_GET['site']</param>
		public function getLinkById($id){
			$query = "SELECT `url` FROM `".$this->creds['table']['sites']."` WHERE `id`='".mysql_escape_string($id)."';";
			$result =  mysql_query($query)or die(mysql_error());
			$link="";
			
			while($row = mysql_fetch_object($result))
			{
				$link = $row->url;
			}

			return $link;
		}

		///<summary>
		/*
			Check if row returns where `username` = :username AND `password` = :password
		*/
		///</summary>
		///<param name="username">username</param>
		///<param name="password">hashed password</param>
		///<returns>TRUE or FALSE ($found)</returns>
		public function try_login($username,$password){
			$query = "SELECT * FROM `".$this->creds['table']['credentials']."` WHERE `username`='".mysql_escape_string($username)."' AND `password`='".mysql_escape_string($password)."';";
			$res = mysql_query($query)or die(mysql_error());

			$num_rows = mysql_num_rows($res);
			$found = false;

			if($num_rows >= 1)
			{
				$_SESSION['user']->isLogged = true;	

				while($row = mysql_fetch_object($res))
				{
					if($row->isLocked)
					{
						Report::publish(new Report("Account ist gesperrt","Bitte wenden Sie sich an den Administrator",Error_LVL::Negative));
						return false;
					}
					if(!$row->isEnabled)
					{
						Report::publish(new Report("Account wurde noch nicht aktiviert","Bitte aktivieren Sie Ihren Account",Error_LVL::Negative));
						header("location: ?set_enable=true");
					}
				}

				$found = true;
			}
			else
			{
				$o = new Report("Benutzername oder Passwort stimmt nicht!","Bitte überprüfen Sie Ihre Eingaben",Error_LVL::Negative);
				Report::publish($o);
			}

			return $found;
		}

		public function loggout($username)
		{
			
		}

		///<summary>
		/*
			Close the connection
		*/
		///</summary>
		public function close(){
			mysql_close($this->connection);
		}

		///<summary>
		/*
			
		*/
		///</summary>
		//not up to date
		public function update_values($id,$text,$url)
		{
			print("not up to date");
			$tb = $this->creds['table']['sites'];
			$query = "SELECT * FROM $tb WHERE `id`='".mysql_escape_string($id)."';";
			print($query);
			$result = mysql_query($query)or die(mysql_error());

			$query = "UPDATE $tb SET `text` = '".mysql_escape_string($text)."',`url` = '".mysql_escape_string($url)."' WHERE `id`='".mysql_escape_string($id)."';";
			mysql_query($query)or die(mysql_error());

			Report::publish(new Report("Erfolgreich geändert!","",Error_LVL::Positive));
		}
		
		///<summary>
		/*
			
		*/
		///</summary>
		///TO-DO: delete or edit params because they are not needed 
		public function delete_values($id,$text,$url)
		{
			$table = $this->creds['table']['sites'];
			$query = "DELETE FROM `$table` WHERE `id`='".mysql_escape_string($id)."';";
			mysql_query($query)or die(mysql_error());
			
			Report::publish(new Report("Erfolgreich gelöscht!","",Error_LVL::Positve));
		}


		//not up to date
		///<summary>
		/*
			The function returns an array with the userdata
		*/
		///</summary>
		///<param name="username">Username</param>
		///<returns>array</returns>

		public function ini($username)
		{
			print("not up to date");
			$query = "SELECT * FROM `".$this->creds['table']['credentials']."` WHERE `username` = '".mysql_escape_string($username)."';";
			$result = mysql_query($query)or die(mysql_error());

			$data;
			while($row = mysql_fetch_object($result))
			{
				$data['id'] = $row->id;
				$data['username'] = $row->username;
				$data['password'] = "";
				$data['salt'] = "";
				$data['isAdmin'] = $row->isAdmin;
				$data['isNewsman'] = $row->isNewsman;
				$data['isLocked'] = $row->isLocked;
				$data['isEnabled'] = $row->isEnabled;
				$data['enable_token'] = "";
				$data['register_date']=$row->register_date;
			}
			return $data;
		}

		///<summary>
		/*
			This function adds a new site to the database
		*/
		///</summary>
		///<param name="text"></param>
		///<param name="url"></param>
		///<param name="hidden">If($hidden === true) 
		///not up to date
		public function new_link($text,$url,$hidden)
		{
			if(empty($hidden))
				$hidden = "0";
			else
				$hidden = "1";

			$table = $this->creds['table']['sites'];
			$query = "INSERT INTO `".$table."` (`text`,`url`,`isHidden`) VALUES('".mysql_escape_string($text)."','".mysql_escape_string($url)."','".mysql_escape_string($hidden)."');";
				
			mysql_query($query)or die(mysql_error());
			
			Report::publish(new Report("Erfolgreich hinzufügt","Die Seite \"$text\" wurde erfolgreich hinzufügt!", Error_LVL::Positive));
		}


		public function register($username,$password,$salt,$first_name,$last_name,$tag)

		///<summary>
		/*
			This function creates an new user
		*/
		///</summary>
		///<param name="text"></param>
		public function register($username,$password,$salt,$enabling_token)
>>>>>>> master
		{
			$query = "INSERT INTO `".$this->creds['table']['credentials']."` (`username`,`password`,`salt`) VALUES('".mysql_escape_string($username)."','".mysql_escape_string($password)."','".mysql_escape_string($salt)."');";

			mysql_query($query)or die(mysql_error());

			$query_2 = "SELECT `id` FROM `".$this->creds['table']['credentials']."` WHERE `username`='".$username."';";

			$result = mysql_query($query_2)or die(mysql_error());


			$query_3 = "INSERT INTO `".$this->creds['table']['data']."` (`id`,`first_name`,`last_name`,`tag`) VALUES('".mysql_escape_string(mysql_result($result, 0))."','".mysql_escape_string($first_name)."','".mysql_escape_string($last_name)."','".mysql_escape_string($tag)."')";

			mysql_query($query_3)or die(mysql_error());
			
			
			return true;
		}

		///<summary>
		/*
			This function returns the salt to hash later a by user typed password
		*/
		///</summary>
		///<param name="username"></param>
		public function get_salt($username)
		{
			$query ="SELECT `salt` FROM `".$this->creds['table']['credentials']."` WHERE `username`='".mysql_escape_string($username)."';";
			
			$result = mysql_query($query)or die(mysql_error());

			while($row = mysql_fetch_object($result))
			{
				return $row->salt;
			}
		}
		//not up to date

		///<summary>
		/*
			This function gets all user information
		*/
		///</summary>
		///<returns>Array</returns>

		public function su_getUsers()
		{
			print("not up to date");
			if($_SESSION['user']->isAdmin)
			{
				$query = "SELECT `username`,`update`,`register_date` FROM `".$this->creds['table']['credentials']."` WHERE `username`!='".mysql_escape_string($_SESSION['user']->username)."';";
				$result = mysql_query($query)or die(mysql_error());

				$data;
				$i = 0;
				while($row = mysql_fetch_object($result))
				{
					//$data[$i] = new USER($row->username);
				//	$data[$i] = new User();
					$i++;
				}

				return $data;
			}
			else
			{
				Report::publish(new Report("Fehler beim Laden!","Sie haben nicht die nötigen Rechte!",Error_LVL::Negative));	
			}
		}

		///<summary>
		/*
			Update user permissions
		*/
		///</summary>
		///<param name="username">username:string</param>
		///<param name="isAdmin">isAdmin:boolean</param>
		///<param name="isLocked">isLocked:boolean</param>
		///<param name="isEnabled">isEnabled:boolean</param>
		public function su_CTRL_Panel_Update($username,$isAdmin,$isLocked,$isEnabled)
		{
			if($_SESSION['user']->isAdmin)
			{
				$query = "UPDATE `".$this->creds['table']['credentials']."` SET `isAdmin`='".mysql_escape_string($isAdmin)."',`isLocked`='".mysql_escape_string($isLocked)."',`isEnabled`='".mysql_escape_string($isEnabled)."' WHERE `username`='".mysql_escape_string($username)."'";
				mysql_query($query)or die(mysql_error());			
			}
		}

		///<summary>
		/*
			Check and enable account if the token is right
		*/
		///</summary>
		public function enable_account($token)
		{
			$query = "SELECT `enabling_token` FROM `".$this->creds['table']['credentials']."` WHERE `username`='".mysql_escape_string($_SESSION['user']->username)."' AND `enabling_token`='".mysql_escape_string($token)."';";
		
			$result = mysql_query($query)or die(mysql_error());

			if(mysql_num_rows($result)>=1)
			{
				$query = "UPDATE `".$this->creds['table']['credentials']."` SET `enabling_token` = NULL,`isEnabled`=1 WHERE `username`='".mysql_escape_string($_SESSION['user']->username)."' AND `enabling_token`='".mysql_escape_string($token)."';";
				mysql_query($query)or die(mysql_error());
				
				Report::publisch(new Report("Account wurde freigeschalten!","",Error_LVL::Positive));
				
				return true;
			}
			else
			{
				Report::publish(new Report("Token ist falsch!","Das angegebene Token ist ungültig",Error_LVL::Negative));
			}
		}

		public function get_title_by_id($id)
		{
			$query = "SELECT `title` FROM `".$this->creds['table']['sites']."` WHERE `id` = '".mysql_escape_string($id)."';";
			$result = mysql_query($query)or die(mysql_error());

			return mysql_result($result, 0);
		}

		public function get_title_by_url($url)
		{
			$query = "SELECT `title` FROM `".$this->creds['table']['sites']."` WHERE `url`='".mysql_escape_string($url)."';";
			$result = mysql_query($query)or die(mysql_error());

			return mysql_result($result,0);
		}

		public function get_fullpage_by_url($url)
		{
			$query = "SELECT `fullpage` FROM `".$this->creds['table']['sites']."` WHERE `url`='".mysql_escape_string($url)."';";
			$result = mysql_query($query)or die(mysql_error());

			return mysql_result($result,0);
		}

		public function get_Fahrer_Data($tag)
		{
			$query = "SELECT * FROM `".$this->creds['table']['data']."` JOIN `".$this->creds['table']['credentials']."` ON ".$this->creds['table']['data'].".id = ".$this->creds['table']['credentials'].".id WHERE ".$this->creds['table']['data'].".tag = '".mysql_escape_string($tag)."' ;";
			$result = mysql_query($query) or die(mysql_error());

			while($row = mysql_fetch_object($result))
			{
				return new Fahrer($row->first_name,$row->last_name,$row->tag,$row->team,$row->score,$row->team_score,$row->isAdmin,$row->isNewsman,$row->isLocked,$row->isEnabled);
			}
		}

		public function get_tag_by_username($username)
		{
			//SELECT `tag` FROM `credentials` JOIN `data` ON credentials.id = data.id WHERE `username`= 'PER';
			$query = "SELECT `tag` FROM `".$this->creds['table']['credentials']."` JOIN `".$this->creds['table']['data']."` ON credentials.id = data.id WHERE `username`='".mysql_escape_string($username)."';";
			$result = mysql_query($query)or die(mysql_error());

			return mysql_result($result, 0);
		}
		
		///<summary>
		/*
			Search after the highest year(by value) and return the season
		*/
		///</summary>
		///<returns></returns>
		public function get_latest_saison()
		{
			$query = "SELECT MAX(`saison`) FROM `".$this->creds['table']['race']."`;";
			$result = mysql_query($query)or die(mysql_error());

			return mysql_result($result, 0);
		}

		///<summary>
		/*
			Return sum of scores of all races in the season(=$saison)
		*/
		///</summary>	
		///<param name="tag">driver tag</param>
		///<param name="saison">season</param>
		public function get_score($tag,$saison)
		{
			//SELECT `tag`, SUM(`score`) AS 'Punkte' FROM `results` JOIN `race` ON results.race = race.id WHERE `saison` = '2013' GROUP BY `tag` 
			$query = "SELECT SUM(`score`) AS `punkte` FROM `".$this->creds['table']['results']."` JOIN `".$this->creds['table']['race']."` ON ".$this->creds['table']['results'].".race = ".$this->creds['table']['race'].".id WHERE `tag` = '".mysql_escape_string($tag)."' && `saison`= '".mysql_escape_string($saison)."' GROUP BY `tag` ;";
			$result = mysql_query($query)or die(mysql_error());
			return mysql_result($result, 0);
		}

		///<summary>
		/*
			Return an array of all drivers ordered by score
		*/
		///</summary>
		///<returns>an array of drivers</returns>
		public function get_score_rank()
		{
			$fahrer = $this->get_fahrer();
			$result=array();
			$i = 0;
			foreach($fahrer as $f)
			{
				$score = $this->get_score($f,$this->get_latest_saison());

				$result[$i]['tag'] = $f;
				$result[$i]['score'] = $score;
				$i++;
			}

			return $this->mysort($result);
		}

		private function mysort($t)
		{
			$arr = $t;
			for($i=0;$i<sizeof($arr);$i++)
			{
				for($j=$i+1;$j<sizeof($arr);$j++)
				{
					if($arr[$j]['score']>$arr[$i]['score'])
					{
						$temp = $arr[$i];
						$arr[$i] = $arr[$j];
						$arr[$j] = $temp;
					}
				}
			}

			return $arr;
		}

		public function get_siege($tag)
		{
			return $this->get_sieg_or_pole($tag,"race");
		}

		public function get_pole($tag)
		{ 
			return $this->get_sieg_or_pole($tag,"qualifying");
		} 

		private function get_sieg_or_pole($tag,$type)
		{
			//SELECT COUNT(`ranking`) FROM `results` WHERE `tag`='ASC' AND `ranking`='1' AND `type`='qualifying'
			$query = "SELECT COUNT(`ranking`) FROM `".$this->creds['table']['results']."` WHERE `tag`='".mysql_escape_string($tag)."' AND `ranking`='1' AND `type`='".mysql_escape_string($type)."'";
			$result = mysql_query($query)or die(mysql_error());

			return mysql_result($result, 0);
		}

		public function get_rennen($tag)
		{
			$query = "SELECT COUNT(`race`) AS 'races' FROM `".$this->creds['table']['results']."` WHERE  `tag`='".mysql_escape_string($tag)."' AND `type` = 'race' GROUP BY `race`;";		
			$result = mysql_query($query)or die(mysql_error());

			return mysql_result($result, 0);
		}

		public function get_fahrer()
		{
			$query = "SELECT `tag` FROM `".$this->creds['table']['data']."` GROUP BY `tag`;";
			$result = mysql_query($query)or die(mysql_error());
			$fahrer;

			$i = 0;
			while($row = mysql_fetch_object($result))
			{
				$fahrer[$i] = $row->tag;
				$i++;
			}

			return $fahrer;
		}

		public function get_team()
		{
			$teams;
			$query = "SELECT `name` FROM `".$this->creds['table']['team']."`;";
			$result = mysql_query($query)or die(mysql_error());

			$i = 0;
			while($row = mysql_fetch_object($result))
			{
				$teams[$i]['name'] = $row->name;
				$teams[$i]['fahrer'] = $this->get_fahrer_by_team($row->name);
				$teams[$i]['score'] = $this->get_team_score($row->name);
				$i++;
			}

			return $teams;
		}

		public function get_team_score_rank()
		{
			$teams = $this->get_team();
			
			return $this->mysort($teams);
		}


		public function get_team_score($team_name)
		{
			//SELECT SUM(`score`) AS "Punkte" FROM `results` WHERE `team` = 'SpeedBros' 
			$query = "SELECT SUM(`score`) AS 'Punkte' FROM `".$this->creds['table']['results']."` WHERE `team` = '".mysql_escape_string($team_name)."';";
			$result = mysql_query($query)or die(mysql_error());

			return mysql_result($result, 0);
		}


		public function get_fahrer_by_team($team)
		{
			$query = "SELECT `team` FROM `".$this->creds['table']['data']."` WHERE `team`='".mysql_escape_string($team)."';";
			$result = mysql_query($query)or die(mysql_error());

			$fahrer = array();
			for($i = 0;$i<mysql_num_rows($result);$i++)
			{
				$fahrer[$i] = $this->get_Fahrer_Data(mysql_result($result, $i));
			}

			return $fahrer;
		}

		public function get_latest_race()
		{
			//SELECT race.id,`saison`,`name`,`location`,MAX(`race_date`) AS 'latest race' FROM `race` JOIN `track_infos` ON race.track_infos = track_infos.name JOIN `results` ON race.id = results.race WHERE `type`='race';
			$query = "SELECT race.id,`saison`,`name`,`location`,MAX(`race_date`) AS 'latest race' FROM `".$this->creds['table']['race']."` JOIN `".$this->creds['table']['track_infos']."` ON race.track_infos = track_infos.name JOIN `".$this->creds['table']['results']."` ON race.id = results.race WHERE `type`='race';";

			$result = mysql_query($query)or die(mysql_error());

			$race;
			while($row = mysql_fetch_array($result))
			{
				$race = $row;
			}

			return $race;
		}

		public function get_poles_by_id($id)
		{
			//SELECT `ranking`,`first_name`,`last_name`,`diff` FROM `results` JOIN `data` ON results.tag = data.tag WHERE race = '4' AND `type` = 'race' AND `ranking` <= 3 ORDER BY `ranking`
			$query = "SELECT `ranking`,`first_name`,`last_name`,`diff` FROM `".$this->creds['table']['results']."` JOIN `".$this->creds['table']['data']."` ON results.tag = data.tag WHERE `race` ='".mysql_escape_string($id)."' AND `type`='race' AND `ranking` <= 3 ORDER BY `ranking`;";
			$result = mysql_query($query)or die(mysql_error());

			$fahrer=array();

			$i = 0;
			while($row = mysql_fetch_array($result))
			{
				$fahrer[$i] = $row;
				$i++;
			}

			return $fahrer;
		}
		public function get_fastest_lap_by_race_id($id)
		{
			//SELECT `first_name`,`last_name`,MIN(`best_lap`) AS 'fastest lap' FROM `results` JOIN `data` ON results.tag = data.tag WHERE `race`='4'
			$query = "SELECT  `first_name`,`last_name`,MIN(`best_lap`) AS 'fastest lap' FROM `".$this->creds['table']['results']."` JOIN `".$this->creds['table']['data']."` ON results.tag = data.tag WHERE `race` = '".mysql_escape_string($id)."';";
			$result = mysql_query($query)or die(mysql_error());
			$arr;

			while($row = mysql_fetch_array($result))
			{
				$arr = $row;
			}

			return $arr;
		}

		public function get_pole_position_by_race_id($id)
		{
			//SELECT `first_name`,`last_name`,`best_lap` FROM `results` JOIN `data` ON results.tag = data.tag  WHERE `race`='4' AND `ranking` = '1' AND `type`='qualifying';
			//$query = "SELECT `first_name`, `last_name`,`best_lap` FROM `".$this->creds['table']['results']."` JOIN `".$this->creds['table']['data']."` ON results.tag = data.tag WHERE `race`='".mysql_escape_string($id)."' AND `ranking`='1' AND `type`='qualifying';"
			$query = "SELECT `first_name`,`last_name`,`best_lap` FROM `results` JOIN `data` ON results.tag = data.tag WHERE `race`='".mysql_escape_string($id)."' AND `ranking` = '1' AND `type`='qualifying'";
			$result = mysql_query($query)or die(mysql_error());

			$arr;

			while($row = mysql_fetch_array($result))
			{
				$arr = $row;
			}

			print_r($arr);

			return $arr;
		}

		public function get_race_by_id($id)
		{
			//@not implemented
		}

		public function get_races_by_saison($saison)
		{
			//@not implemented
		}

		public function get_artikel_object_by_id($id)
		{
			$query = "SELECT * FROM `".$this->creds['table']['news']."` JOIN `".$this->creds['table']['data']."` ON news.author = data.tag WHERE news.id='".mysql_escape_string($id)."';";
			print($query);
			$result = mysql_query($query)or die(mysql_error());

			while($row = mysql_fetch_object($result))
			{
				return new Artikel($row->id,$row->author,$row->title,"",$row->href,$row->preview_img_href,$row->preview_href,$row->date);
			}
		}

		public function get_artikel_by_id($id)
		{
			$query = "SELECT `href` FROM `".$this->creds['table']['news']."` WHERE `id`='".mysql_escape_string($id)."';";
			$result = mysql_query($query)or die(mysql_error());

			return mysql_result($result, 0);
		}
		public function get_all_artikel()
		{
			//SELECT *,`first_name`,`last_name` FROM `news` JOIN `data` ON news.author = data.tag ORDER BY `date` DESC 
			$query = "SELECT * FROM `".$this->creds['table']['news']."` JOIN `".$this->creds['table']['data']."` ON news.author = data.tag ORDER BY `date` DESC";
			$result = mysql_query($query)or die(mysql_error());

			$artikel = array();
			$i = 0;
			while($row = mysql_fetch_object($result))
			{
				$artikel[$i] = new Artikel($row->id,$row->author,$row->title,"",$row->href,$row->preview_img_href,$row->preview_href,$row->date);			 
				$i++;
			}
			return $artikel;
		}

		public function get_full_name_by_tag($tag)
		{
			$query = "SELECT `first_name`,`last_name` FROM `".$this->creds['table']['data']."` WHERE `tag`='".mysql_escape_string($tag)."';";
			$result = mysql_query($query)or die(mysql_error());

			while($row = mysql_fetch_object($result))
			{
				return $row->first_name.$row->last_name;
			}
		}
	}
?>