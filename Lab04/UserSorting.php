<?php
function user_sort($a, $b) {
    // smarts is all-important, so sort it first
    if($b == 'smarts') {
        return 1;
    }
    else if($a == 'smarts') {
        return -1;
    }
    return ($a == $b) ? 0 : (($a < $b) ? -1 : 1);
}
$values = array('name' => 'Buzz Lightyear',
    'email_address' => 'buzz@starcommand.gal',
    'age' => 32,
    'smarts' => 'some');
$tmp = $values;
if (isset($_POST['submitted']))
if($_POST['submitted']) {
    if($_POST['sort_type'] == 'usort' || $_POST['sort_type'] == 'uksort' || $_POST['sort_type'] == 'uasort') {
        $_POST['sort_type']($values, 'user_sort');
    }
    else {
        $_POST['sort_type']($values);
    }
}
?>
<form action="UserSorting.php" method="post">
    <p>
        <input type="radio" name="sort_type" value="sort" <?php echo isset($_POST['submitted'])? ($_POST['sort_type'] == "sort" ? "checked" : "" ): "" ?> />
        Standard sort<br />
        <input type="radio" name="sort_type" value="rsort" <?php echo isset($_POST['submitted'])? ($_POST['sort_type'] == "rsort" ? "checked" : "") : "" ?>/>   Reverse sort<br />
        <input type="radio" name="sort_type" value="usort" <?php echo isset($_POST['submitted'])? ($_POST['sort_type'] == "usort" ? "checked" : "") : "" ?>/>   User-defined sort<br />
        <input type="radio" name="sort_type" value="ksort" <?php echo isset($_POST['submitted'])? ($_POST['sort_type'] == "ksort" ? "checked" : "") : "" ?>/>   Key sort<br />
        <input type="radio" name="sort_type" value="krsort" <?php echo isset($_POST['submitted'])? ($_POST['sort_type'] == "krsort" ? "checked" : "") : "" ?>/>  Reverse key sort<br />
        <input type="radio" name="sort_type" value="uksort" <?php echo isset($_POST['submitted'])? ($_POST['sort_type'] == "uksort" ? "checked" : "") : "" ?>/>  User-defined key sort<br />
        <input type="radio" name="sort_type" value="asort" <?php echo isset($_POST['submitted'])? ($_POST['sort_type'] == "asort" ? "checked" : "") : "" ?>/>  Value sort<br />
        <input type="radio" name="sort_type" value="arsort" <?php echo isset($_POST['submitted'])? ($_POST['sort_type'] == "arsort" ? "checked" : "") : "" ?>/> Reverse value sort<br />
        <input type="radio" name="sort_type" value="uasort" <?php echo isset($_POST['submitted'])? ($_POST['sort_type'] == "uasort" ? "checked" : "") : "" ?>/> User-defined value sort<br />
    </p>
    <p align="center">
        <input type="submit" value="Sort" name="submitted" />
    </p>
    <p>
        Values unsorted (before sort):
    </p>
    <ul>
        <?php
        //echo "Values unsorted (before sort)";
        foreach($tmp as $key=>$value) {
            echo "<li><b>$key</b>: $value</li>";
        }
        ?>
    </ul>
    <p>
        <?= isset($_POST['submitted']) ? "Values sorted by " .$_POST['sort_type'] . " " : ""; ?>:
    </p>
    <ul>
        <?php
        if (isset($_POST['submitted']))
            foreach($values as $key=>$value) {
                echo "<li><b>$key</b>: $value</li>";
            }
        ?>
    </ul>
</form>