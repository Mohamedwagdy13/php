<?php
$tests = array(5, 4, 9, 3, 1, 7, 5, 8, 6);
$max = 0;
$i = 0;

while ($i < count($tests)) {
    switch (true) {
        case ($tests[$i] > $max):
            $max = $tests[$i];
            break;
    }
    $i++;
}

echo "The max value: $max";
?>
