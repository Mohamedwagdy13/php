<?php

$films= array("Fast","Predestination","Pursuit","Prestige");
$keyword = "avatar";
$i = 0;

while ($i < count($films)) {
    switch ($films[$i]) {
        case "puresuite":
            echo "yes <br>";
            break;
        default:
            echo "no <br>";
            break;
    }
    $i++;
}
?>
