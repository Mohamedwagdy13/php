<?php
$tests = array(1, "tarig", 1.5, true, "true", false);
$i = 0;

// Using while loop
while ($i < count($tests)) {
    if ($tests[$i] === true || $tests[$i] === false) {
        echo "no";
    } else {
        echo "yes";
    }
    $i++;
}

echo "<br>";

// Using foreach loop
foreach ($tests as $value) {
    if ($value === true || $value === false) {
        echo "no";
    } else {
        echo "yes";
    }
}
?>
