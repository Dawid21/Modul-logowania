<?php
  if (isset($_GET['zapisz'])){
	   $sesja= new session;
	   sqlConnect();	 	

	   $nazw=trim($_GET['nazwisko']); 
	   $imie=trim($_GET['imie']);
	   $tel=trim($_GET['telefon']); 
	   $mail=trim($_GET['mail']); 
	   $miasto=trim($_GET['miasto']); 

     $val= new validate;
     $val->CzyPuste($nazw, 'nazwisko');
     $val->CzyPuste($imie, 'imię');
     $val->CzyPuste($nazw, 'telefon');
     $val->CzyPuste($mail,'e-mail');
     $val->CzyPuste($miasto, 'miasto');

     $val->CharBad($nazw, 'Nazwisko');
     $val->CharBad($imie, 'Imię');
     //$val->CharBad($nazw, 'Telefon');
     if (!empty($mail)) $val->verifyMail($mail,'E-mail');
     $val->CharBad($miasto, 'Miasto');

     if (empty($val->error)) {
	       $zapytanie = "INSERT INTO `kontakt` (`id_k`, `id_u`, `nazwisko`, `imie`, `telefon`, `mail`, `miasto`) 
                       VALUES (NULL,'$sesja->idUser', '$nazw' , '$imie', '$tel','$mail', '$miasto');";
	       $db->query($zapytanie); //dodaje do bazy
	
         if ($db->affected_rows){
			      echo 'Utworzono kontakt'; //echo db->insert_id; //nie dziala
	       }
	        else { echo 'Wystąpił błąd. Spróbuj ponmownie';} 
	        //echo $zapytanie;
	   } 
     unset($val); 
}
	
  $form = new form('get');
  $form->input('nazwisko', 'Nazwisko/nazwa firmy', 'text', "autofocus");
  $form->input('imie', 'Imię', 'text');
  $form->input('telefon', 'Telefon', 'text');
  $form->input('mail', 'E-mail', 'text');
  $form->input('miasto', 'Miasto', 'text');
  $form->inputsl('pages', '', 'hidden', 'value="add"'); //<!--dla post action="?pages=add"-->
  $form->klawisz('zapisz', 'Dodaj do kontaktów');

?>

<hr />
<a href="?pages=start">Zarządznie kontaktami</a>
