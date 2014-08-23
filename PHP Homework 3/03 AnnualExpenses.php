<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="03 AnnualExpenses.css" />
    <title>Annual Expenses</title>
</head>
<body>
    <form action="post">
        Enter number of years: <input type="text" name="year"/>
        <input type="submit" value="Show costs">
    </form>
    <?php
   if(isset($_POST['year']) && !empty($_POST['year'])):
       $year = $_POST['year'];   
    ?>
    <table>
        <tr>
            <th>Year</th>
            <th>January</th>
            <th>February</th>
            <th>March</th>
            <th>April</th>
            <th>May</th>
            <th>June</th>
            <th>July</th>
            <th>August</th>
            <th>September</th>
            <th>October</th>
            <th>November</th>
            <th>December</th>
            <th>Total:</th>
        </tr>
    </table>
    <?php
    endif;
    ?>
</body>
</html>
