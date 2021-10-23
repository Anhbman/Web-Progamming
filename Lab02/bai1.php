<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .nhap{
        margin: 15px;
    }
    .pheptinh{
        margin-left: 15px;
    }

    button{
        margin-bottom: 15px;
        margin-top: 15px;
        margin-left: 70px;
    }
    h3{
        margin: 15px;
        display: inline;
    }
</style>
<body>
<form method="GET" >
    <input class="nhap" type="text" name="so1" value=""> <br/>
    <input class="pheptinh" type="radio" name="tinh" value="+">+
    <input class="pheptinh" type="radio" name="tinh" value="-">-
    <input class="pheptinh" type="radio" name="tinh" value="*">*
    <input class="pheptinh" type="radio" name="tinh" value="/">/  <br/>
    <input class="nhap" type="text" name="so2" value=""> <br/>
    <button type="submit" name="click">Submit</button>
</form>
<?php

echo "<h3>Resuilt: </h3>";
if (isset($_GET['click'])){
    if($_GET['tinh'] == '+'){
        echo "<h3> " .  $_GET['so1'] + $_GET['so2']. "</h3>";
    }else if($_GET['tinh'] == '-'){
        echo "<h3> " .  $_GET['so1'] - $_GET['so2']. "</h3>";
    }else if($_GET['tinh'] == '*'){
        echo "<h3> " .  $_GET['so1'] * $_GET['so2']. "</h3>";
    }else if($_GET['tinh'] == '/'){
        echo "<h3> " .  $_GET['so1'] / $_GET['so2']. "</h3>";
    }
}
?>
</body>
</html>