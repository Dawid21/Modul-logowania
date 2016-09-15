<?php      
   if (isset($_POST['remember']) && $_POST['remember']==1){   
      $value = ciastka ('loginKlawisz', 'login', 'login', 60*60*24*7);
      $checked='checked';     
   }else {
      $value='';
      $checked='';
      ciastka ('loginKlawisz', 'login', 'login', -60*60*24*7);
   }
  
   if (isset($_POST['loginKlawisz'])){ 
     $val= new validate;

		 #$val->CzyPuste($_POST['login'], 'Login');
		 $val->CharPl($_POST['login'], 'Login');
		 $val->CharBad($_POST['login'], 'Login');
		 $val->CharMin($_POST['login'], 'Login', 6);

		 #$val->CzyPuste($_POST['password'], 'Hasło');
		 $val->CharPl($_POST['password'], 'Hasło');
		 $val->CharMin($_POST['password'], 'Hasło', 6);
     
		 if (empty($val->error)){		 
		 $user = $_POST['login'];
		 $pass = sha1($_POST['password']);

		 sqlConnect();
				
		 $zapytanie_login = "SELECT * FROM `uzytkownicy` WHERE `login`='$user' and `pass`='$pass' LIMIT 1;";
		 $wynik = $db->query($zapytanie_login);

		 if ($wynik->num_rows > 0){
					 
		 		 $row = $wynik->fetch_object();
				 $sesja= new session;
				 $sesja->user=$user;
				 $sesja->idUser= $row->id_u;
				 $sesja->idSession=session_id();
				 $sesja->ip=$_SERVER['REMOTE_ADDR'];
				 $sesja->client=$_SERVER['HTTP_USER_AGENT'];
					 
				 header('Location:indexlog.php');
     		 exit();
			}
			else {
				$val->error.='Zły login lub hasło';
			}	
	 }

   unset($val);
	 unset($sesja);
  }

$form = new form('post');
$form->input('login', 'Login', 'text', "autofocus value='$value'");
$form->input('password', 'Hasło', 'password');
$form->input('remember', 'zapamiętaj login', 'checkbox', "value='1' $checked");
$form->klawisz('loginKlawisz', 'Zaloguj');

unset($form);
?>

<hr />
Nie masz konta? Załóż <a href="?pages=konto">tutaj</a>.

