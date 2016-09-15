
<?php

      $form = new form('get'); 
      $form->inputsl('pattern', '', 'text', "autofocus ");
      $form->klawisz('find', 'szukaj');
      $form->inputsl('szukajPo', 'Imię', 'radio', 'value="imie" checked="checked"');
      $form->input('szukajPo', 'Nazwisko', 'radio', 'value="nazwisko"');
      $form->inputsl('pages', '', 'hidden', 'value="show"');

      echo '<table>
              <tr>
                <th>Lp.</th> <th>Nazwisko</th> <th>Imię</th><th>Telefon</th><th>Mail</th><th>Miasto</th><th>Usuń kontakt</th>
              </tr>';


		 $sesja= new session;
		 sqlConnect();
		 $idUser = $sesja->idUser;
		 if(isset($_GET['find']) && !empty($_GET['pattern'])){
        $val= new validate;
        $val->CharBad($_GET['pattern'], 'Wyszukiwana fraza');
        
        if (empty($val->error)) {
           $szukajPo = $_GET['szukajPo'];
           $coSzukac = $_GET['pattern'];
           echo $_GET['pattern'];
		       $pobierz = "SELECT * FROM `kontakt` WHERE `$szukajPo`='$coSzukac' and `id_u`=$idUser;";
        }else {
		    $pobierz = "SELECT * FROM `kontakt` WHERE `id_u`=$idUser;";
		    }
        unset($val); 
		 }
		 else {
		 $pobierz = "SELECT * FROM `kontakt` WHERE `id_u`=$idUser;";
		 }

		 $wynik = $db->query($pobierz);


		 $i=1;
		 while ($row = $wynik->fetch_object()){
		    echo "<tr><th>$i</th>
                  <td>$row->nazwisko</td> 
                  <td>$row->imie</td>
                  <td>$row->telefon</td>
                  <td>$row->mail</td>
                  <td>$row->miasto</td>    
                  <td><form action='' method='get'>
                      <!-- <input name='edit$i' type='submit' value='edytuj' /> -->
                      <input name='del$i' type='submit' value='usuń' onclick=\"return potwierdz('Czy na pewno chcesz usunąć kontakt?')\" />
                      <input name = 'pages' value='show' type='hidden' /></form>
                  </td>
              </tr>";
              if (isset($_GET["del$i"])){
              
                  $usun = "DELETE FROM `kontakt` WHERE `id_k`= $row->id_k ;";
                  
                  $db->query($usun);
                  if ($db->affected_rows){echo "Usunięto kontakt: $row->nazwisko $row->imie";}
                  
              }
              /*if (isset($_GET["edit$i"])){
              
                  header('Location:pages/edit.php');
                  exit();
              }*/
		 		$i++;
		 }

?>
 
</table>


<hr />
<a href="?pages=start">Zarządznie kontaktami</a>
