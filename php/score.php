 <?php
require_once './php/data_c.php';
 ?>
 <div id="sidebox">
 <style>
		h1	{
			color: black;  font-family: 'bebas_neueregular', sans-serif; font-size: 28px; padding-left: 20px; padding-top: 0; font-weight: normal; text-decoration: none;
			}
		 h2 {
		   font-size: 12px; font-family: Century Gothic, Arial, sans-serif; padding-left: 20px; padding-right: 20px; font-weight: bold; padding-top: 0; padding-bottom: 0; margin-top: 0; margin-bottom: 0;
		 }                       
		 p  {
		   font-size: 12px; font-family: Century Gothic, Arial, sans-serif; padding-left: 20px; padding-right: 20px; padding-top: 0; padding-bottom: 0; margin-top: 0; margin-bottom: 10px;
		 }
		                    
					.tablesmall th {
						font-size: 11px;
						font-family: Century Gothic, Arial, sans-serif;
					}

					.tablesmall td {
						font-size: 14px;
						font-family: Century Gothic, Arial, sans-serif;
					}
		                        
		   .frame {
		    background-color: #f5f5f5;
		   }

		</style>
	  	<div id="scoretable_einzelwertung">
			<?php
				include($_SESSION['db']->getLinkById('15'));
			?>
		</div>
		
		<div id="scoretable_teamwertung">
			<?php 
				include($_SESSION['db']->getLinkById('16'));
			?>
		</div>
		<div id="letztes_rennen">
			<?php
				include($_SESSION['db']->getLinkById('14'));
			?>
		</div>
</div>   