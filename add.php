<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php
$id = "";
$Name = "";
$Email = "";
$DOB = "";
$Salary = "";

$host = "localhost:8889";
$user = "root";
$pass = "root";
$db = "lab1";
$link = mysqli_connect($host, $user, $pass, $db);
$url = "add.php?action=add";
$action = "add";

if (!$link) {
    print_r($link);
    print_r("Couldn't connect to MySQL");
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    if (isset ($_POST["submit"]) && $_POST["action"] == "add") {
        $Name = $_POST["Name"];
        if (empty($_POST["Name"])) {
            $Name = "";
        }
        $Email = $_POST["Email"];
        if (empty($_POST["Name"])) {
            $Email = "";
        }
        $DOB = $_POST["DOB"];
        if (empty($_POST["DOB"])) {
            $DOB = "";
        }
        $Salary = $_POST["Salary"];
        if (empty($_POST["Name"])) {
            $Salary = "";
        }

        $sql = "INSERT INTO `myTable` (`id`, `Name`, `Email`, `DOB`, `Salary`) VALUES (NULL,'" . $Name . "','" . $Email . "','" . $DOB . "','" . $Salary . "')";


        if (mysqli_query($link, $sql)) {
            echo "Информация занесена в базу данных     ";
            echo " <a href='index.php'>Главная      </a> ";
            echo " <a href='add.php'>   Добавить запись</a> ";
            $url = "edit.php?action=save";
?>
            <?php
        } else {
            echo "Информация не занесена в базу данных";
        }
        mysqli_close($link);
    }
}
?>
<form method="post">
    <input type="hidden" name="action" value="add">
    <input type="hidden" name="id" value=" <?php echo $id; ?>">
    <div>
        <input type="text" placeholder="Name" name="Name" value="<?php echo $Name; ?>">
    </div>
    <div>
        <input type="text" placeholder="Email" name="Email" value="<?php echo $Email; ?>">
    </div>
    <div>
        <input type="text" placeholder="DOB" name="DOB" value="<?php echo $DOB; ?>">
    </div>
    <div>
        <input type="text" placeholder="Salary" name="Salary" value="<?php echo $Salary; ?>">
    </div>

    <button type="submit" name="submit" value="add" id="add">add</button>

</form>

</body>
</html>
