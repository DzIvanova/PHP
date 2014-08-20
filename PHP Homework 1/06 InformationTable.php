<?php
$name = "Gosho";
$phone = "0882-321-423";
$age = 24;
$address = "Hadji Dimitar";
?>
<html>
<head>
    <title>Information Table</title>
    <link rel="stylesheet" type="text/css" href="./table.css">
</head>
<body>
<table>
    <tr>
        <td id="atr">Name</td>
        <td> <?php echo $name ?></td>
    </tr>
    <tr>
        <td id="atr">Phone number</td>
        <td><?php echo $phone ?></td>
    </tr>
    <tr>
        <td id="atr">Age</td>
        <td><?php echo $age ?></td>
    </tr>
    <tr>
        <td id="atr">Address</td>
        <td><?php echo $address ?></td>
    </tr>
</table>
</body>
</html>