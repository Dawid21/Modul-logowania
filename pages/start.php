<?php

if(isset($_GET['logout'])){
	   //unset($sesja->user);
		 //unset($sesja->idsession);
		 $_SESSION[session]=array();
		 session_destroy();
     header('Location:index.php');
     exit();
     }

$sesja= new session;
if (!isset($sesja->user) || !isset($sesja->idSession) || $sesja->idSession!= session_id() 
	  || $sesja->client!=$_SERVER['HTTP_USER_AGENT'] || $sesja->ip!=$_SERVER['REMOTE_ADDR']){
	 header('Location:index.php');
	 exit();
}

?>


<a href="?pages=show" class="block"> Wyświetl kontakty </a>
<a href="?pages=add" class="block"> Dodaj kontakt </a>
<a href="?pages=conf" class="block"> Konfiguracja </a>
<a href="?logout=yes" class="block" onclick="return potwierdz('Czy na pewno chcesz się wylogować?')"> Wyloguj </a>

