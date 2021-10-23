<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    .chat{
        background-color: bisque;
        border: gray 3px solid;
    }
</style>
<body>
<div class="container">
<h1>
    Messages Board
</h1>
<p>
    <?php
    $value = array();
    if (isset($_POST['submited'])){
        $time = time();
        $file = "post/post_$time.txt";
        if ((empty($_POST['name']) && !isset($_POST['check'])) || empty($_POST['content'])){
            echo "Hãy nhập đầy đủ thông tin";
        }else if ((empty($_POST['name']) && isset($_POST['check']) && !empty($_POST['content'])) || (!empty($_POST['name']) && !empty($_POST['content']))){
            $fp = fopen($file,'x');
            fputs($fp,$_POST['name']."\n");
            fputs($fp,$_POST['content']."\n");
            fclose($fp);
            if (isset($_FILES['file'])){
                $target_dir = "post/";
                $imageFileType = pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION);
                $_FILES["file"]["name"] = "post_$time.$imageFileType";
                $target_file   = $target_dir.basename($_FILES["file"]["name"]);
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
                move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
            }
        }
    }
    $foler = new DirectoryIterator('post');
    //echo $foler->getSize();
    $filename = array();
    $i = 0;
    foreach ($foler as $fileInfo) {
        if($fileInfo->isDot()) continue;
        $i++;
        $tmp = $fileInfo->getFilename();
        list($a,$b) = explode(".",$tmp);
        if ($b == "txt" && !isset($filename[$a])){
            $filename[$a] = array('name' => $tmp);
        }elseif ($b == "txt" && isset($filename[$a])){
            $filename[$a] += array('name' => $tmp);
        }
        if ($b != "txt" && !isset($filename[$a])){
            $filename[$a] = array('img' => $tmp);
        }elseif ($b != "txt" && isset($filename[$a])){
            $filename[$a] += array('img' => $tmp);
        }
    }
    if ($i == 0){
        echo "Chưa có thông điệp nào được đăng <br>";
    }else
        foreach ($filename as $key=>$value){
            echo "<div class='chat'>";
            if (isset($value['img']))
                echo "<img height ='50px' src='post/".$value['img']."'>";
            if (isset($value['name'])) {
                $fp = fopen("post/" . $value['name'], 'r');
                $Username = fgets($fp);
                $content = fgets($fp);
                echo $Username . "says: " . $content;
                fclose($fp);
            }
            echo "</div><br>";
        }
    ?>
</p>


    <form enctype="multipart/form-data" method="post">
        <p>Đăng tải một thông điệp mới</p>
        <label>Tên người dùng:</label><br>
        <input name="name" type="text"> <br>
        <input type="checkbox" name="check" value="Anomy"> Đăng thông điệp vô danh <br>
        <br>
        Nội dung thông điệp:<br>
        <textarea name="content"></textarea>
        <br>
        <br>
        Hình ảnh kèm theo (tuỳ chọn):<br>
        <input type="file" name="file">
        <br>
        <br>
        <button type="submit" name="submited">Đăng thông điệp</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
</body>
