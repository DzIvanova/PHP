<?php
$text = $_GET['text'];
$hashValue = $_GET['hashValue'];
$fontSize = $_GET['fontSize'];
$fontStyle = $_GET['fontStyle'];

$cssStyle = "font-size:$fontSize;";
if($fontStyle == 'bold'){
    $cssStyle .= "font-weight:$fontStyle;";
}
if($fontStyle == 'italic' || $fontStyle == 'normal'){
    $cssStyle .= "font-style:$fontStyle;";
}
$encryptedText = encryptText($text, $hashValue);
echo "<p style=\"$cssStyle\">$encryptedText</p>" ;

function encryptText($text, $hashValue) {
    $result = '';
    for($i = 0; $i < strlen($text); $i++){
        $ch = $text[$i];
        if($i % 2 == 0){
            $newChar = chr(ord($ch) + $hashValue);
        }
        else {
            $newChar = chr(ord($ch) - $hashValue);
        }
        $result .= $newChar;
    }
    return $result;
}