<?php

$value = ciastka ('zapiszKlawisz', 'login', 'loginZakl' );

if (isset($_POST['zapiszKlawisz'])){
     $val= new validate;

		 #$val->CzyPuste($_POST['login'], 'Login');
		 $val->CharPl($_POST['login'], 'Login');
		 $val->CharBad($_POST['login'], 'Login');
		 $val->CharMin($_POST['login'], 'Login', 6);

		 #$val->CzyPuste($_POST['password'], 'Hasło');
		 $val->CharPl($_POST['password'], 'Hasło');
		 $val->CharMin($_POST['password'], 'Hasło', 6);
		 $val->CzyRowne($_POST['password'], $_POST['password2']);
		 
		 if (empty($val->error)){
				$login = $_POST['login'];
				$pass = sha1($_POST['password']);
				
				sqlConnect();
				
				$zapytanie_login = "SELECT * FROM `uzytkownicy` WHERE `login`='$login' LIMIT 1;";
				$wynik = $db->query($zapytanie_login);
				if ($wynik->num_rows == 0){
					 $zapytanie = "INSERT INTO `uzytkownicy` (`id_u`, `login`, `pass`) VALUES (NULL, '$login', '$pass');";
					 $db->query($zapytanie);                      //dodaje do bazy
					 if ($db->affected_rows){
					 		echo 'Utworzono konto';
							}
					 else { echo 'Wystąpił błąd. Spróbuj ponmownie';} 

				}
				else echo 'Taki login już istnieje';
				}

     unset($val);    
  }

$form = new form('post');
$form->input('login', 'Login', 'text', "autofocus value='$value'");//
$form->input('password', 'Hasło', 'password');
$form->input('password2', 'Powtórz hasło', 'password');
$form->klawisz('zapiszKlawisz', 'Zapisz');

?>

<hr />
Masz konto? Zaloguj się <a href="?pages=login">tutaj</a>.
