<!DOCTYPE html>
<html>
<head>
    <title>Print tags</title>
</head>
<body>
<form action="" method="GET">
    Enter tags: <br>
    <input type="text" name="input" />
    <input type="submit" name="submit" />
</form>

<?php
if( isset($_GET['submit']) )
{
    $input = $_GET['input'];
    $output = explode(", ", $input);
    $length = count($output);
    for($i = 0; $i < $length; $i++){
        echo $i . ": " . $output[$i] . "<br>";
    }

}
?>
</body>
</html>
