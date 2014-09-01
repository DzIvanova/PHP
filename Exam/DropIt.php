<?php
$text = $_GET['text'];
$minFontSize = $_GET['minFontSize'];
$maxFontSize = $_GET['maxFontSize'];
$currentFontSize = $minFontSize;
$step = $_GET['step'];
$pattern = '/[a-zA-z]+^\[/';
$fontSize = "";
$isIncrementing = true;

for($i = 0; $i < strlen($text); $i++){
    $char = $text[$i];

    echo "<span style='font-size:$currentFontSize;" . textDecoration($char) . "'>" . htmlspecialchars($char) . "</span>";;
    if(ctype_alpha($char)){
        if($isIncrementing){
            $currentFontSize += $step;
        }
        else {
            $currentFontSize -= $step;
        }
    }
    if(ctype_alpha($char) && ($currentFontSize <= $minFontSize || $currentFontSize >= $maxFontSize)){
        $isIncrementing = !$isIncrementing;
    }

}
function textDecoration($char) {
    $decoration = "";
    if(ord($char) % 2 == 0){
        $decoration = "text-decoration:line-through;";
    }
    return $decoration;
}
