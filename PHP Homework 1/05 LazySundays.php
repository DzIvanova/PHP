<?php
$month = date("F");
$monthDays = date("t");
$year = date('Y');

for($i =1; $i <= $monthDays; $i++)
{
    $date = strtotime("$i $month $year");
    if(date('w',$date) == 0){
        echo date('jS F, Y', $date) . "<br />";
    }
}
?>