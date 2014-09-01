<?php
$text = $_GET['text'];
$pattern = "/^\s*([\w\s\-]+)\s*\%\s*([\w\s\.\-]+)\s*;\s*[\d]{2}\-([\d]{2})\-[\d]{4}\s*-\s*(.{0,100})/m";
preg_match_all($pattern, $text, $matches);
$articles = [];
for ($i = 0; $i < count($matches[0]); $i++) {
    $topic = htmlspecialchars(trim($matches[1][$i]));
    $author = htmlspecialchars(trim($matches[2][$i]));
    //$dateOne = strtotime(trim($matches[3][$i]));
    $trimMonth = trim($matches[3][$i]);
    $date = getMonth($trimMonth);
       // date('F', $dateOne);
    $details = htmlspecialchars(trim($matches[4][$i]));
    $articles[] = "<div>\n" .
        "<b>Topic:</b> <span>$topic</span>\n" .
        "<b>Author:</b> <span>$author</span>\n" .
        "<b>When:</b> <span>$date</span>\n" .
        "<b>Summary:</b> <span>$details" . "...</span>\n" .
        "</div>";
}
function getMonth($month) {
    if($month == "01"){
        $month = "January";
    }
    if($month == "02"){
        $month = "February";
    }
    if($month == "03"){
        $month = "March";
    }
    if($month == "04"){
        $month = "April";
    }
    if($month == "05"){
        $month = "May";
    }
    if($month == "06"){
        $month = "June";
    }
    if($month == "07"){
        $month = "July";
    }
    if($month == "08"){
        $month = "August";
    }
    if($month == "09"){
        $month = "September";
    }
    if($month == "10"){
        $month = "October";
    }
    if($month == "11"){
        $month = "November";
    }
    if($month == "12"){
        $month = "December";
    }
    return $month;
}
echo implode("\n", $articles);

