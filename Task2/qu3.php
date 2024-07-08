<?php
$films = array("avatar", "predistnation", "avatar", "prestigr");
$f = 0;
$i = 0;

while ($i < count($films)) {
    switch ($films[$i]) {
        case "avatar":
            $f++;
            break;
    }
    $i++;
}

echo " 'avatar' appears in array: $f";
?>
