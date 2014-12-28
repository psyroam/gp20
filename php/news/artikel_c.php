<?php
	class Artikel
	{
		public $id;
		public $author; //string catenation in db
		public $title;
		public $href;
		public $preview_img_href;
		public $preview_href;
		public $date;

		public function __construct($id,$author,$title,$text,$href,$preview_img_href,$preview_href,$date)
		{
			$this->id = $id;
			$this->author = $author;
			$this->title = $title;
			$this->text = $text;
			$this->href = $href;
			$this->preview_img_href = $preview_img_href;
			$this->preview_href = $preview_href;
			$this->date = $date;
		}

	
	}
?>