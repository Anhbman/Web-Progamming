<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

</style>
<body>
<div class="container">
    <form method="GET"  >
        Nhâp vào Radian hoặc Degree: <br><br>
        <input class="nhap" type="text" name="so" value=""> <br/> <br>
        <input type="radio" name="tinh" value="radian"> Radian
        <input type="radio" name="tinh" value="degree" checked> Degree <br> <br>
        <button type="submit" name="clickTinh">Submit</button> <br> <br>
    </form>
    <?php

    echo "Result: ";
    if (isset($_GET['clickTinh'])){
        if (!is_numeric($_GET['so'])){
            echo "Hãy nhập 1 số vào";
        } else{
            if ($_GET['tinh'] == 'radian'){
                echo deg2rad($_GET['so']);
            }else{
                echo rad2deg($_GET['so']);
            }
        }
    }
    ?>
    <form method="GET"  >
        <br><br>
        Nhập người thứ 1:<br>
        <input class="nhap" type="text" name="ten1" value="<?php echo isset($_GET['ten1'])? $_GET['ten1'] : "" ?>"> <br>
        <input type="date" name="day1" value="<?php echo isset($_GET['day1'])? $_GET['day1'] : "" ?>"  ><br><br>
        Nhập người thứ 2:<br>
        <input class="nhap" type="text" name="ten2" value="<?php echo isset($_GET['ten2'])? $_GET['ten2'] : "" ?>"> <br>
        <input type="date" name="day2" value="<?php echo isset($_GET['day2'])? $_GET['day2'] : "" ?>"><br><br>
        <button type="submit" name="click2">Submit</button> <br><br>
    </form>
    <?php

    function DateTimeFuntion($date1,$date2,$date,$name1,$name2){
        $date1Diff = date_create($date1);
        $date2Diff = date_create($date2);
        $dateDiff = date_create($date);
        $d1 = date("l, F n, Y",strtotime($date1));
        $d2 = date("l, F n, Y",strtotime($date2));
        $date_diff = date_diff($date1Diff,$date2Diff)->format("%a");
        $age_date1 = date_diff($date1Diff,$dateDiff)->y;
        $age_date2 = date_diff($date2Diff,$dateDiff)->y;
        echo "$name1 : $d1 <br>";
        echo "$name2 : $d2 <br>";
        echo "<br> the difference in days between two dates: " . $date_diff;
        echo "<br> $name1 : $age_date1 age";
        echo "<br> $name2 : $age_date2 age";
        echo "<br>The difference years between two persons: ". date_diff($date1Diff, $date2Diff)->y;

    }

    if (isset($_GET['click2'])){
        $date = date('Y-m-d');
        $date1 = $_GET['day1'];
        $date2 = $_GET['day2'];
        $name1 = $_GET['ten1'];
        $name2 = $_GET['ten2'];
        if ($date1 > $date || $date2 > $date){
            echo "Validate";
            die();
        }
        DateTimeFuntion($date1,$date2,$date,$name1,$name2);

    }

    ?>


</div>
</body>
</html>