<?php
	class Data
	{
		public static function get_fahrer()
		{
			$fahrer;
			$i=0;
			foreach($_SESSION['db']->get_fahrer() as $row)
			{
				$f = Fahrer::get_data($row);
				$fahrer[$i] = $f;
				$i++;
			}

			return $fahrer;
		}

		public static function get_team()
		{
			return null;
		}

	}
?>