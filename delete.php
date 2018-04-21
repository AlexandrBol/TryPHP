<?php
if (!isset($_POST['del'])) {
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: /lab/index.php");
    exit();
} else {
    $host = "localhost:8889";
    $user = "root";
    $pass = "root";
    $db = "lab1";
    $link = mysqli_connect($host, $user, $pass, $db);
    if (!$link) {
        print_r($link);
        print_r("Couldn't connect to MySQL");
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } else {
        $id = $_POST["del"];
        $sql = "DELETE FROM `myTable` WHERE `myTable`.`id` = " . $id;
        if ($result = mysqli_query($link, $sql)) {
            echo "Запись удалена    ";
            echo "<a href='index.php'>Back</a>";
            echo "</br>";
            echo "<a href='add.php'>Add</a>";
        }
    }
}
