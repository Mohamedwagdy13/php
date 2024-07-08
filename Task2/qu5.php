<?php
$tests = array(6, 4, 9, 3, 12, 8, 7);
$sort = array();
$number = $tests[0]; 
$i = 0;

do {
    if ($number > $tests[$i]) {
        $sort[] = $tests[$i + 1];
        $number = $tests[$i + 1]; 
    }
    $i++;
} while ($i < count($tests) - 1);

foreach ($sort as $value) {
    echo "$value<br>";
}
?>
