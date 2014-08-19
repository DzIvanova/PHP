<?php
if( isset($_GET['submit']) )
{
    if(!intval($_GET['amount']) && !intval($_GET['interestAmount'])){
        echo "Wrong input!";
    }
    else{
        $amount = intval($_GET['amount']);
        $interestAmount = intval($_GET['interestAmount']);
        $time = 0;
        switch($_GET['time']){
            case 'sixMonths':
                $time = 6;
                break;
            case 'oneYear':
                $time = 12;
                break;
            case 'twoYears':
                $time = 24;
                break;
            case 'fiveYears':
                $time = 60;
                break;
        }

        $result =round(($amount * pow(1 + (($interestAmount/100)/12), $time / 12 * 12)), 2);

    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Calculate Interest</title>
</head>
<body>
<form action="" method="GET">
    Enter amount:
    <input type="text" name="amount" /><br>
    <input type="radio" name="currency" value="USD" id="USD"><label for="USD">USD</label>
    <input type="radio" name="currency" value="EUR" id="EUR"><label for="EUR">EUR</label>
    <input type="radio" name="currency" value="BGN" id="BGN"><label for="BGN">BGN</label><br>
    Compound Interest Amount
    <input type="text" name="interestAmount" /><br>
    <select name="time">
        <option value="sixMonths" >6 Months</option>}
        <option value="oneYear">1 Year</option>
        <option value="twoYears">2 Years</option>
        <option value="fiveYears">5 Years</option>
    </select>
    <input type="submit" name="submit" value="Calculate"/>
    <?php
    switch($_GET['currency']){
        case 'USD':
            echo("$ " . $result);
            break;
        case 'EUR':
            echo "€ " . $result;
            break;
        case 'BGN':
            echo $result . " лв.";
    }
    ?>
</form>


</body>
</html>