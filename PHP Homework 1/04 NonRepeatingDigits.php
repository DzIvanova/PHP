<?php
$n = 247;
if($n < 102){
    echo "no";
}
else if($n < 1000) {
    for($i = 102; $i <= $n; $i++)
    {
        $thirdDigit = $i % 10;
        $secondDigit = ($i / 10) % 10;
        $firstDigit = ($i / 100) % 10;
        if($firstDigit != $secondDigit && $firstDigit != $thirdDigit && $secondDigit != $thirdDigit ) {
            if ($i == 102){
                echo $i;
            }
            else{
                echo ", " . $i ;
            }
        }
    }
}
else {
    for($i = 102; $i <=997; $i++)
    {
        $thirdDigit = $i % 10;
        $secondDigit = ($i / 10) % 10;
        $firstDigit = ($i / 100) % 10;
        if($firstDigit != $secondDigit && $firstDigit != $thirdDigit && $secondDigit != $thirdDigit ) {
            if ($i == 102){
                echo $i;
            }
            else{
                echo ", " . $i ;
            }
        }
    }
}
?>