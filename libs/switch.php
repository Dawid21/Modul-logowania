<?php
$pages='login';
$belka='logowanie';
if (isset($_GET['pages'])){
   $strona=$_GET['pages'];
   switch ($strona){
      case 'konto':
      $pages='konto'; $belka='Zakładanie konta'; break;

      default:
   }
   }
?>
