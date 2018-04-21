<html>
<head>
    <title> Запись в файл и добавление в его конец </title>
</head>
<body>
<?php
{
    $filename = "file.txt";
}
echo "Writing to $filename";
echo "</br>";
$fp = fopen($filename, "w") or die("Couldn't open $filename");
fwrite($fp, "Hello world\n");
fclose($fp);
echo "Write to the end of the $filename";
echo "</br>";
$fp = fopen($filename, "a") or die("Couldn't open $filename");
fputs($fp, "And Oter String\n");
fclose($fp);
$fp = fopen($filename, "r") or die("Couldn't open $filename");
echo "text from file:";
echo "</br>";
echo "<table border=1'><tr><td>";
while (!feof($fp)) {
    $line = fgets($fp, 1023);
    echo "$line<br>";
}
echo "</td></tr></table>";
fclose($fp);
?>
</body>
</html>
