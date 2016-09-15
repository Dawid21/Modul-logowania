<?php
  function oczysc ($ciag){
    $wejscie = array('ż','ź','ć','ą','ę','ś','ó','ń', 'ł');
    $wyjscie = array('z','z','c','a','e','s','o','n', 'l');
    for($i=0; $i<count($wejscie); $i++){
       $c=str_replace($wejscie,$wyjscie,$ciag);
    }
    return $c;
  } 

  function ciastka ($klawisz, $name, $nameC, $time=120){
    $v='';
    if (isset($_POST["$klawisz"]) && !empty($_POST["$name"])){    
       setcookie("$nameC", $_POST["$name"], time()+$time);
       $v= $_POST["$name"];
    }
    else if (!empty($_COOKIE["$nameC"])) {
	  	$v = $_COOKIE["$nameC"];
	 	}
    return $v;
  }

function ciastkaCh ($klawisz, $name, $nameC, $time=120){
    $v='';
    if (isset($_POST["$klawisz"]) && !empty($name)){    
       setcookie("$nameC", $name, time()+$time);
       $v= $name;
    }
    else if (!empty($_COOKIE["$nameC"])) {
	  	$v = $_COOKIE["$nameC"];
	 	}
    return $v;
  }
 
?>

