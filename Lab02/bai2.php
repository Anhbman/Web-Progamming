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
<div class="container">
    <form method="GET" >
        <input class="nhap" type="text" name="xau" value=""> <br/>
        <input class="pheptinh" type="radio" name="tinh" value="strlen">strlen
        <input class="pheptinh" type="radio" name="tinh" value="strtolower" style="margin-left: 35px">strtolower <br/>
        <input class="pheptinh" type="radio" name="tinh" value="trim">trim
        <input class="pheptinh" type="radio" name="tinh" value="strtoupper" style="margin-left: 44px">strtoupper  <br/>
        <button type="submit" name="click">Submit</button>
    </form>
    <?php

    echo "<h3>Resuilt: </h3>";
    if (isset($_GET['click'])){
        $str = $_GET['xau'];
        if($_GET['tinh'] == 'strlen'){
            echo "<h3> ". strlen($str) ."</h3>";
        }else if($_GET['tinh'] == 'strtolower'){
            echo "<h3>" . strtolower($str) . "</h3>";
        }else if($_GET['tinh'] == 'trim'){
            echo "<h3>" . trim($str) . "</h3>";
        }else if($_GET['tinh'] == 'strtoupper'){
            echo "<h3>" . strtoupper($str) . "</h3>";
        }
    }
    ?>
</div>
</body>
</html>