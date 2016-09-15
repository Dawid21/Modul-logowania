<?php
   session_start();
	 session_regenerate_id();
	 require('libs/switch.php');
	 require('libs/functionLibs.php');
	 require('libs/sqlConnect.php');
   function __autoload($klasa){
   require_once 'class/'.$klasa.'.php';
   }
?>


<!DOCTYPE html>
<html lang="pl">
  <head>
    <title><?php echo $belka; ?></title>
    <meta charset="UTF-8">
    <link rel="Stylesheet" href="style/style.css" type="text/css" />
  </head>
  <body>
    <div id="all">
       <div id="belka"><?php echo $belka; ?></div>
       <div id="okno">
          <?php 
          require("pages/$pages.php");
          ?>
       </div>
    </div>
  </body>
</html>
