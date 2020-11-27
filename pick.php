<?php
$names = file("names.txt", FILE_IGNORE_NEW_LINES);
$index = substr($_GET['q'],-1);
$name= $names[$index];
file_put_contents("done.txt", $name."\n", FILE_APPEND);
unset($names[$index]);
$text = "";
foreach ($names as $key => $value) {
    $text .= $value . "\n";
}
file_put_contents("names.txt", $text);
echo $name;
?>