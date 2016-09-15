<?php
  class form{
    function __construct($method, $action=''){
       echo "<form action='$action' method='$method'><div>\n";
    }
    function __destruct(){
       echo "</div></form>\n";   
    }

    function input($name, $label, $type, $others=''){
       echo "<label><input name = '$name' id = '$name' type='$type'  $others/> $label</label><br />\n" ;
    }

    function inputsl($name, $label, $type, $others=''){
       echo "<label><input name = '$name' id = '$name' type='$type'  $others/> $label</label>\n" ;
    }

    function klawisz($name, $value, $type='submit', $others=''){
       echo "<input name = '$name' type='$type' value='$value' $others class='klawisz'/><br />\n" ;  
    }

    function textarea($name){
       echo "<textarea name='$name' ></textarea>\n";
    }

  }
?>

