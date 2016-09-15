<?php
  function sqlConnect(){
	   global $db;
		 $db = new mysqli('localhost', 'root', '', 'wroclaw'); // połączenie z bazą
		 return $db;
	}
?>
