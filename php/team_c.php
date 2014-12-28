<?php
	class Team
	{
		public $name;
		public $fahrer = array();
		public $score = 0;

		public function __construct($name)
		{
			$this->name = $name;
			
			$this->get_fahrer();
			$this->get_score();
		}

		private function get_fahrer()
		{
			$this->fahrer = $_SESSION['db']->get_fahrer_by_team($this->name);
		}

		private function get_score()
		{
			$this->score = $_SESSION['db']->get_team_score($this->name);
		}
	}
?>