<?php
$input = array( "hello", 15, 1.234, array(1,2,3), (object)[2,34]);
$length = count($input);
for ($i = 0; $i < $length; $i++) {
    if(is_numeric($input[$i])){
        echo var_dump($input[$i]) ;
    }
    else {
        echo gettype($input[$i]) . "<br />";
    }
}
?>