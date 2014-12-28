<?php
	function get_all_previews(){
		$unfilterted_dirs = scandir("./news/Previews");
		$dirs;
		$i=0;
		foreach($unfilterted_dirs as $dir){
			if($dir == "." || $dir == ".."){
				continue;
			}

			$dirs[$i] = $dir; 
			$i++;
		}

		//Reihenfolge
		$length = count($dirs);
		for($j=0;$j<$length;$j++){
			for($k=0;$k<$length-1;$k++){
				//Vergleich 
				//1st
				$endOfPos = strpos($dirs[$j], "~"); //Index, wo die Positon endet, 5~Foo <-- endet mit Index 2 	
				$temp_1st = substr($dirs[$j], 0,$endOfPos); // Holt sich 5 --> 5~Foo 
				
				//2nd
				$endOfPos = strpos($dirs[$k],"~"); //Index, wo die Positon endet, 5%~Foo <-- endet mit Index 2 	
				$temp_2nd = substr($dirs[$k], 0,$endOfPos);// Holt sich 5 --> 5~Foo 

				if($temp_1st > $temp_2nd){
					//swap
					$temp = $dirs[$j];
					$dirs[$j] = $dirs[$k];
					$dirs[$k] = $temp;
				}

			}
		}
		
	//Return
		return $dirs;
	}

	function delete_ranking($preview){

		$endOfpos = strpos($preview,"~");
		$preview = substr($preview,$endOfpos+1);// 5%~Foo <-- Foo
		return $preview;
	}

	function just_ranking($preview){
		$endOfpos = strpos($preview,"~");
		$preview = substr($preview,0,$endOfpos);
		return $preview;
	}

	function delete_extension($previews){
		$length = count($previews);

		for($i = 0;$i<$length;$i++){
			$previews[$i] = str_replace(".html", "", $previews[$i]);
		}
		return $previews;
	}
?>