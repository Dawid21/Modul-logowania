<?php
  $pages='start';
  $belka='Zarządanie kontaktami';
  if(isset($_GET['pages']))
   {$strona = $_GET['pages'];
   switch ($strona){
      case 'show':
      $pages='show'; $belka='Twoje kontakty'; break;

      case 'add':
      $pages='add'; $belka='Dodaj kontakt'; break;

      case 'conf':
      $pages='conf'; $belka='Konfiguracja'; break;
      default:
   }}
?>
