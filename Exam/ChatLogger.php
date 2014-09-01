<?php
date_default_timezone_set('Europe/Sofia');
$currentDate = strtotime($_GET['currentDate']);
$messages = explode("\n", $_GET['messages']);
$message = [];
$date = [];

foreach ($messages as $lines) {
    $messegeInfo = preg_split("/\s+\/\s+/", $lines, -1, PREG_SPLIT_NO_EMPTY);
    $message[] = $messegeInfo[0];
    $date[] = strtotime($messegeInfo[1]);
}
$messages = array_combine($date, $message);
ksort($messages);
$lastKey = end(array_keys($messages));

foreach ($messages as $value) {
    echo "<div>" . htmlspecialchars($value) . "</div>\n";
}
echo "<p>Last active: <time>" . difference($lastKey, $currentDate) . "</time></p>";
function difference($lastKey, $currentDate){
    $timeDiff = $currentDate - $lastKey;
    $timeMsg = "";
    $lastDay = date('z', $lastKey);
    $currentDay = date('z', $currentDate);
    if($lastDay == $currentDay){
        if($timeDiff < 60){
            $timeMsg = "a few moments ago";
        }
        else if($timeDiff < 60 * 60){
            $timeMsg = floor($timeDiff / 60) . " minute(s) ago";
        }
        else if ($timeDiff < 24 * 60 * 60) {
            $timeMsg = floor($timeDiff /  (60 * 60)) . " hour(s) ago";
        }
    }
    else if($currentDay - $lastDay == 1)    {
        $timeMsg = "yesterday";
    }
    else {
        $timeMsg = date("d-m-Y", $lastKey);
    }
return $timeMsg;
}
