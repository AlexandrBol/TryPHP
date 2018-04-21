<html>
<head>
    <title> Вывод всех записей таблицы </title>
</head>
<body>
<?php
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
    $sql = "SELECT * FROM `myTable`";
    if ($result = mysqli_query($link, $sql)) {
        $num_rows = mysqli_num_rows($result);
        echo "<p>There are currently" . $num_rows . " rows in the table</p>";
        echo "<a href='add.php'>ADD</a>";
        echo "<table border=1>";
        while ($a_row = mysqli_fetch_row($result)) {
            echo "<tr>";
            foreach ($a_row as $field) {
                echo "<td>$field</td>";
            }
            echo "<td><a href='edit.php?action=edit&id=" . $a_row[0] ."'>Edit</a> </td>";
            echo "<td>
                        <form action='delete.php' method='post'>
                            <input type='hidden' name='del' value='$a_row[0]' />
                            <input type='submit' value='delete'/>
                        </form>
                  </td>";
            echo "</tr>";

        }
        echo "</table>";

    } else {
        echo 'error';
    }
}
mysqli_close($link);
?>
</body>
</html>

