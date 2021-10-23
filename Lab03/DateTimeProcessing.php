<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    .date span:first-child {
        margin-left: 39px;
    }
    .time span:first-child {
        margin-left: 35px;
    }
    div{
        margin-top: 5px;
    }

    button{
        margin-top: 5px;
    }
</style>

<body>
    <p>Enter your name and select date and time for the appointment</p>
    <form action="DateTimeProcessing.php" method="get">
        Your name: <input type="text" name="name" value="<?php echo isset($_GET['name']) ? $_GET['name'] : "" ?>"> <br>
        <div class="date">
            Date:
            <span>
          <select name="day">
            <?php
            $start_date = 1;
            $end_date   = 31;
            for( $j=$start_date; $j<=$end_date; $j++ ) {
                if (isset($_GET['day'])) {
                    if ($_GET['day'] == $j)
                        echo '<option selected value=' . $j . '>' . $j . '</option>';
                    else
                        echo '<option value=' . $j . '>' . $j . '</option>';
                } else{
                    echo '<option value=' . $j . '>' . $j . '</option>';
                }
            }
            ?>
          </select>
        </span>
            <span>
          <select name="month">
            <?php for( $m=1; $m<=12; ++$m ) {
                if (isset($_GET['month'])) {
                    if ($_GET['month'] == $m)
                        echo '<option selected value=' . $m . '>' . $m . '</option>';
                    else
                        echo '<option value=' . $m . '>' . $m . '</option>';
                } else{
                    echo '<option value=' . $m . '>' . $m . '</option>';
                }
            } ?>
          </select>
        </span>
            <span>
          <select name="year">
            <?php
            $year = date('Y');
            $min = $year - 100;
            $max = $year;
            for( $i=$max; $i>=$min; $i-- ) {
                if (isset($_GET['year'])) {
                    if ($_GET['year'] == $i)
                        echo '<option selected value=' . $i . '>' . $i . '</option>';
                    else
                        echo '<option value=' . $i . '>' . $i . '</option>';
                } else{
                    echo '<option value=' . $i . '>' . $i . '</option>';
                }
            }
            ?>
          </select>
        </span>
        </div>
        <div class="time">
            Time:
            <span>
          <select name="gio">
            <?php
            $start_date = 0;
            $end_date   = 23;
            for( $j=$start_date; $j<=$end_date; $j++ ) {
                if (isset($_GET['gio'])) {
                    if ($_GET['gio'] == $j)
                        echo '<option selected value=' . $j . '>' . $j . '</option>';
                    else
                        echo '<option value=' . $j . '>' . $j . '</option>';
                } else{
                    echo '<option value=' . $j . '>' . $j . '</option>';
                }
            }
            ?>
          </select>
        </span>
            <span>
          <select name="phut">
            <?php for( $m=0; $m<=59; ++$m ) {
                if (isset($_GET['phut'])) {
                    if ($_GET['phut'] == $m)
                        echo '<option selected value=' . $m . '>' . $m . '</option>';
                    else
                        echo '<option value=' . $m . '>' . $m . '</option>';
                } else{
                    echo '<option value=' . $m . '>' . $m . '</option>';
                }
            } ?>
          </select>
        </span>
            <span>
          <select name="giay">
            <?php
            $min = 0;
            $max = 59;
            for( $i=$min; $i<=$max; $i++ ) {
                if (isset($_GET['giay'])) {
                    if ($_GET['giay'] == $i)
                        echo '<option selected value=' . $i . '>' . $i . '</option>';
                    else
                        echo '<option value=' . $i . '>' . $i . '</option>';
                } else{
                    echo '<option value=' . $i . '>' . $i . '</option>';
                }
            }
            ?>
          </select>
        </span>
        </div>
        <button type="submit" name="submit">Submit</button>
        <button type="reset">Reset</button>
    </form>
    <br>
<?php

if (isset($_GET['submit'])){
    $name = $_GET['name'];
    $dateDay = $_GET['day'];
    $dateMonth = $_GET['month'];
    $dateYear = $_GET['year'];
    $timeGio = $_GET['gio'];
    $timePhut = $_GET['phut'];
    $timeGiay = $_GET['giay'];

    echo "Hi $name! <br>";
    echo "You have choose to have an appointment on $timeGio:$timePhut:$timeGiay, $dateDay/$dateMonth/$dateYear<br>";
    echo "<br> More information<br><br>";
    echo "In 12 hours, the time and date is ";
    ($timeGio < 12) ? print $timeGio . ":$timePhut:$timeGiay AM, $dateDay/$dateMonth/$dateYear <br><br>" : print $timeGio - 12 . ":$timePhut:$timeGiay PM, $dateDay/$dateMonth/$dateYear <br><br>";

    switch ($dateMonth){
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            echo "This month has 31 days";
            break;
        case 4:
        case 6:
        case 9:
        case 11:
            echo "This month has 30 days";
            break;
        case 2:
            echo $dateYear % 4;
            if (($dateYear % 100 == 0 && $dateYear % 400 == 0) || ($dateYear % 100 != 0 && $dateYear % 4 == 0)){
                echo "This month has 29 days";
            }else{
                echo "This month has 28 days";
            }
            break;
    }
}
?>
</body>
</html>