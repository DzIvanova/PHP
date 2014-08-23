<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="SquareRootSum.css" />
    </head>
    <body>
        <table>
            <tr><th>Number</th><th>Square root</th></tr>
            <?php
            $sum = 0;
            for($i = 0; $i <= 100; $i += 2) :
                    $sqrt = sqrt($i);
                    $sqrtRounded = round($sqrt,2);
                    $sum += $sqrt;
                    ?>
                    <tr>
                        <td><?=$i;?></td>
                        <td><?=round($sqrtRounded,2)?></td>
                    </tr><?php endfor?><tr id="total"><td>Total:</td><td><?=round($sum,2)?></td></tr>
        </table>
    </body>
</html>
