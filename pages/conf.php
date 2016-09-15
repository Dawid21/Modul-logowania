<?php
$sesja= new session;  
if (!isset($sesja->user) || !isset($sesja->idSession)){
	 header('Location:index.php');
	 exit();
}

	if (isset($_POST['powrot'])){
  header('Location:indexlog.php');}
?>


Tu będą opcje konfiguracji
<hr />
<form action="" method="post">
  <input name="powrot" class="klawisz" type="submit" value="Powrót" />
</form>
