<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="02 CarRandomizer.css" />
    <title>Car Randomizer</title>
</head>
<body>
    <form action="" method="post">
        Enter cars: <input type="text" name="cars">
        <input type="submit" value="Show result">
    </form>
    <?php
    if(isset($_POST['cars']) && !empty($_POST['cars'])) :
        $carsList = $_POST['cars'];
        $cars = explode(', ',$carsList);
        ?>
    <table>
        <tr>
            <th>Car</th>
            <th>Color</th>
            <th>Count</th>
        </tr>
        <?php
            $colors = ['red', 'green', 'blue', 'black', 'white', 'aquamarine'];
            foreach ($cars as $carName) :
                $count = rand(1, 5);
                $randColor = array_rand($colors);
        ?>
            <tr>
                <td><?=$carName?></td>
                <td><?=$colors[$randColor]?></td>
                <td><?=$count;?></td>
            </tr>
        <?php
            endforeach;
        ?>
        </table>
    <?php endif ?>
</body>
</html>
