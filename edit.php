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
$url = "edit.php?action=save";
$action = "add";

if (!$link) {
    print_r($link);
    print_r("Couldn't connect to MySQL");
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset ($_GET["action"]) && $_GET["action"] == "save") {
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
    $sql = "UPDATE `myTable` SET `Name` = '" . $Name . "', `Email` = '" . $Email . "', `DOB` = '" . $DOB . "', `Salary` = '" . $Salary . "' WHERE `myTable`.`id` = " . $_POST["id"];
    $result = mysqli_query($link, $sql);
    if ($result = 'true') {
        $id = $_POST["id"];
        echo "Изменения сохранены - ". $_POST["id"];
        echo "</br>";
        echo "<a href='index.php'>Back</a>";
        echo "</br>";
        echo "<a href='add.php'>Add</a>";
        $url = "edit.php?action=save";

    } else {
        echo "Изменения не сохранены";
        echo "<a href='index.php'>Back</a>";
    }
} else if (isset ($_GET["id"])) {
    $sql = "SELECT * FROM `myTable` WHERE `id` = " . $_GET["id"];
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
      //  print_r($row);
        $id = $row["id"];
        $Name = $row["Name"];
        $Email = $row["Email"];
        $DOB = $row["DOB"];
        $Salary = $row["Salary"];
    }
}
?>
<form action="<?php echo $url; ?>" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
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
    <button type="submit" name="submit" value="save">save</button>
    <a href='index.php'>go to main page</a>
</form>

</body>
</html>