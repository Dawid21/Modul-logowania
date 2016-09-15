<?php
  class session{

	 function __set($name, $value){
	 $_SESSION[__CLASS__][$name]=$value;
	 }

	 
	 function __get($name){
			if(isset($_SESSION[__CLASS__][$name])){
	    return $_SESSION[__CLASS__][$name];
	    }  
			else return null;
	 }
	 
	 	 
	 function __isset($name){
	 return isset($_SESSION[__CLASS__][$name]);
	 }

	}
?>
