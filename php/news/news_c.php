<?php
	class News
	{
		public static function get_all()
		{
			return $_SESSION['db']->get_all_artikel();
		}
	}
?>