<?php
   session_start();
	 require('libs/switchlogin.php');
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
    <script type="text/javascript" src="js/script.js"></script>
  </head>
  <body>
    <div id="all">
    <div id="belka"><?php echo $belka; ?></div>
    <div id="okno">
       <?php 
       require("pages/$pages.php");
       ?>
    </div>
  </body>
</html>
