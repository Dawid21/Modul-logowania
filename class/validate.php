<?php
  class validate {
     function __construct(){
        $this->error='';
     }
		 
		 function CzyPuste($wartosc, $pole){
		    if (empty(trim($wartosc))){
		 		   $this->error.="Pole $pole nie może być puste<br />";
		 		}
		 }
		 
		 function CharPl($wartosc, $pole){
		    if (preg_match('/[ęąśćżźłóńĘŚĄŻŹĆŃŁÓ]/i', $wartosc))
					 $this->error.="$pole nie może zawierać polskich znaków<br />";
		 }

		 function CharBad($wartosc, $pole){
		    if (preg_match('/[<>!?*@#$()%^&:;,.|\'\"\[\]\{\}\\\+\= ]/i', $wartosc))
					 $this->error.="$pole nie może zawierać znaków specjalnych<br />";
		 }

		 /*function CharOK($wartosc, $pole){
		    if (!(preg_match('/[A-Za-z_-0-9 ]/i', $wartosc)))
					 $this->error.="$pole nie może zawierać znaków specjalnych<br />";
		 }*/

		 function CharMin($wartosc, $pole, $min){
		    if ((strlen(trim($wartosc))) < $min)
					 $this->error.="$pole musi zawierać min. $min znaków<br />";
		 }

		 function CzyRowne($wartosc1, $wartosc2){
		    if ($wartosc1!=$wartosc2) $this->error.="Hasła różnią się od siebie<br />";
		 }

     function verifyMail($mail,$pole){
        if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) $this->error.= "$pole nie jest poprawny.<br />";
     }





     function __destruct(){
        if (!empty($this->error)) echo "<div class='error'>Wystąpiły błędy:<br /> $this->error </div>";
     }
  }
?>
