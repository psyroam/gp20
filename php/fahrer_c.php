<?php
	class Fahrer
	{
		public $firstname;
		public $lastname;
		public $tag;
		public $team;
		public $score;
		public $team_score;
		private $isAdmin;
		private $isNewsman;
		private $isLocked;
		private $isEnabled;
		public $siege=0;
		public $pole=0;
		public $rennen=0;

		public function __construct($firstname,$lastname,$tag,$team,$isAdmin,$isNewsman,$isLocked,$isEnabled)
		{
			$this->firstname = $firstname;
			$this->lastname = $lastname;
			$this->tag = $tag;
			$this->team = $team;
		
			$this->isAdmin = $isAdmin;
			$this->isLocked = $isLocked;
			$this->isNewsman = $isNewsman;
			$this->isEnabled = $isEnabled;


			$this->get_score();
			$this->get_team_score();

			$this->get_siege();
			$this->get_pole();
			$this->get_rennen();
		}

		public static function get_data($tag)
		{
			return $_SESSION['db']->get_Fahrer_Data($tag);
		}

		public function get_score()
		{
			$this->score = $_SESSION['db']->get_score($this->tag,date("Y"));
		}

		public function get_team_score()
		{
			$this->team_score = $_SESSION['db']->get_team_score($this->team);
		}

		public function get_siege()
		{
			$this->siege = $_SESSION['db']->get_siege($this->tag);
		}

		public function get_pole()
		{
			$this->pole = $_SESSION['db']->get_pole($this->tag);
		}

		public function get_rennen()
		{
			$this->rennen = $_SESSION['db']->get_rennen($this->tag);
		}

	}
?>