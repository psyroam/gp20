<?php
	require_once './../../cLogin.php';
	require_once './../../../data.php';
	
	function php_ep(){
		$chart;//Array in dem die "Categories" und "Series" returned werden
		$fahrer = get_fahrer(); // "get_fahrer"-Funktion aus data.php; holt alle Fahrer aus der Datenbank in das Array(,) $fahrer
		$fahrer_length = count($fahrer);
		//die Strecken(categories) aus der Datenbank bekommen
			$query = "SELECT `strecke` FROM `statistiken`";
			$result = mysql_query($query)or die(mysql_error()); // bekomme alle Strecken aus der `Statistiken`-Tabelle 
			
			$anz_strecken = mysql_num_rows($result);
			if($anz_strecken == 0){
				die("Keine Werte in der Datenbank");
			}
			
			$a_strecken;
			for($i=0;$i<$anz_strecken;$i++){
				$a_strecken[$i] = mysql_result($result,$i,'strecke'); //Alle Strecken ins Array packen
			}

			$a_strecken = unique_data ($a_strecken);//Alle doppelten des Arrays löschen

			$anz_strecken = count($a_strecken);
		//Strecken-Array in "Categories" konvertieren
			$categories="";

			foreach ($a_strecken as $strecke) {
				$categories .= "'".$strecke."',";
			}
			$categories = substr($categories,0,-1); //Das letzte Zeichen des Strings löschen ","

		//Series-> Punkte aus der Datenbank holen und in ein Array konvertieren
			$a_series="";
			for($i=0;$i<$fahrer_length;$i++){//fahrer
				foreach($a_strecken as $strecke){//strecken
					if($fahrer[$i] == "" ||$strecke==""){
						continue;
					}

					$query = "SELECT * FROM `statistiken` WHERE `fahrer-tag`='".$fahrer[$i]['fahrer-tag']."' and `strecke`='".$strecke."';";
					$result = mysql_query($query)or die(mysql_error());
					
					if(mysql_num_rows($result)==0){
						echo("Keine Fahrerdaten in der Datenbank gefunden.<br>Fahrer: ".$fahrer[$i]['fahrer-tag']."<br>Strecke: ".$strecke."<br>");
					}
					$punkte =  mysql_result($result,0,'punkte');// 0 = 0 Reihe -> 1 vorhande Reihe
					
					if(($punkte)==""){
						$punkte = 0;
					}
					$str_fahrer = $fahrer[$i]['fahrer-tag'];
					$a_series[$str_fahrer][$strecke] = $punkte;
				}
			}
		//Series-Array in "Series" konvertieren
			$series="";
			$a_series_length = count($a_series);
			for($i=0;$i<$a_series_length;$i++){//Fahrer
				$series .= "{";
					$series .= "name: '" . $fahrer[$i]['fahrer-tag']."',";
					$series .= "data:[";
						foreach($a_strecken as $strecke){//Strecken
							if($a_series[$fahrer[$i]['fahrer-tag']][$strecke]==""){
								$a_series[$fahrer[$i]['fahrer-tag']][$strecke] = "0";
							}
							$series.= "".$a_series[$fahrer[$i]['fahrer-tag']][$strecke].",";
						}
						$series = substr($series,0,-1);//Das letzte Zeichen löschen ","
					$series.="]";
				$series .= "},";
			}

			$series = substr($series,0,-1);//Das letzte Zeichen löschen ","
		//return
			//setcookie("ep_cat",$categories,time()+3600);
			//setcookie("ep_series",$series,time()+3600);
			$chart['categories']= $categories;
			$chart['series'] = $series;
			return $chart;
	}
	
	function php_tp(){
		$chart;//Array in dem die "Categories" und "Series" returned werden
		$team = get_team();
		$team_length = count($team);
		//die Strecken(categories) aus der Datenbank bekommen
			$query = "SELECT `strecke` FROM `statistiken`";
			$result = mysql_query($query)or die(mysql_error());
			
			$anz_strecken = mysql_num_rows($result);
			if($anz_strecken == 0){
				die("Keine Werte in der Datenbank");
			}
			
			$a_strecken;
			for($i=0;$i<$anz_strecken;$i++){
				$a_strecken[$i] = mysql_result($result,$i,'strecke'); //Alle Strecken ins Array packen
			}
			
			$a_strecken = unique_data ($a_strecken);//Alle doppelten des Arrays löschen
			$anz_strecken = count($a_strecken);
			
		//Strecken-Array in "Categories" konvertieren
			$categories="";
			for($i=0;$i<$anz_strecken;$i++){
				$categories .= "'".$a_strecken[$i]."',";
			}
			$categories = substr($categories,0,-1); //Das letzte Zeichen des Strings löschen ","
		//Series-> Punkte aus der Datenbank holen und in ein Array konvertieren
			$a_series="";
			for($i=0;$i<$team_length;$i++){//fahrer
				foreach($a_strecken as $strecke){//strecken
					if($team[$i] == "" || $strecke == ""){
						continue;
					}

					$query = "SELECT * FROM `statistiken` WHERE `team`='".$team[$i]['team']."' and `strecke`='".$strecke."';";
					$result = mysql_query($query)or die(mysql_error());
					
					if(mysql_num_rows($result)==0){
						echo("Keine Team-Daten in der Datenbank gefunden.<br>Team: ".$team[$i]['team']."<br>Strecke: ".$strecke."<br>");
					}
					$punkte =  mysql_result($result,0,'team-punkte');// 0 = 0 Reihe -> 1 vorhande Reihe
					
					if(($punkte)==""){
						$punkte = 0;
					}
					
					$a_series[$team[$i]['team']][$strecke] = $punkte;
				}
			}
		
		//Series-Array in "Series" konvertieren
			$series="";
			$a_series_length = count($a_series);
			for($i=0;$i<$a_series_length;$i++){//Team
				$series .= "{";
					$series .= "name: '" . $team[$i]['team']."',";
					$series .= "data:[";
						foreach($a_strecken as $strecke){//Strecken/ navigiert durch die Punkte
							$series.= "".$a_series[$team[$i]['team']][$strecke].",";
						}
						$series = substr($series,0,-1);//Das letzte Zeichen löschen ","
					$series.="]";
				$series .= "},";
			}
			$series = substr($series,0,-1);//Das letzte Zeichen löschen ","
		//return
			$chart['categories']= $categories;
			$chart['series'] = $series;
			return $chart;
	
	}

	function unique_data($data){//BubbleSort Aufbau; Löscht alle doppelten Einträge eines Arrays
		$length = count($data);

		for($i = 0;$i < $length;$i++){
			for($j = $i+1;$j < $length;$j++){
				if($data[$i] == $data[$j]){
					unset($data[$j]);
				}
			}
		}

		return $data;
	}
?>