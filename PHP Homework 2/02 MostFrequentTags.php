<!DOCTYPE html>
<html>
<head>
    <title>Print tags</title>
</head>
<body>
<form action="" method="GET">
    <p>Enter tags: </p><br>
    <input type="text" name="input" />
    <input type="submit" name="submit" />
</form>

<?php
if( isset($_GET['submit']) )
{
    $input = explode(", ", $_GET['input']);
    $output = array_count_values($input);
    $mostFrequent = array_search(max($output),$output);
    arsort($output);
    foreach ($output as $key => $value) {
        echo $key . " : " . $value . " times" . "<br />";
    }
    echo "Most frequent tag is : " . $mostFrequent;
}
?>
</body>
</html>
