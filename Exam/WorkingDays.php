<?php
date_default_timezone_set('UTC');

$startDatetext = $_GET['dateOne'];
$endDateText = $_GET['dateTwo'];
$holidayDatesText = preg_split('/\s+/', $_GET['holidays'],-1, PREG_SPLIT_NO_EMPTY);

$holidays = [];
foreach ($holidayDatesText as $holidayText) {
    $holiday = parseDateString($holidayText);
    $holidays[] = $holiday;
}
$startDate = parseDateString($startDatetext);
$endDate = parseDateString($endDateText);

$workingDays = [];
$date = $startDate;
while($date <= $endDate) {
    if(isWorkingDay($date, $holidays)){
        //$dateCopy = clone $date;
        array_push($workingDays, clone $date);
    }
    $date = $date->add(DateInterval::createFromDateString('1 day'));
}
if(count($workingDays) == 0){
    echo "<h2>No workdays</h2>";
}
else {
    echo "<ol>";
    foreach ($workingDays as $workingDay) {
        echo "<li>";
        echo $workingDay->format("d-m-Y");
        echo "</li>";
    }
    echo "</ol>";
}
function parseDateString($dateText) {
    $dateObj = DateTime::createFromFormat("d-m-Y", $dateText);
    $dateObj->setTime(0,0);
    return $dateObj;
}

function isWorkingDay(DateTime $date, array $holidays) {
    $tempDate = $date->format("d-m-Y");
    $dayOfWeek = date('w', strtotime($tempDate));
    if($dayOfWeek == 0 || $dayOfWeek == 6){
        return false;
    }
    if(in_array($date, $holidays)){
        return false;
    }
    return true;
}

