<?php
$array1 = array('a', 'b', 'c', 'd', 's');
$array2 = array('c', 'd', 'e', 'f', 's');
$n = array(); 

$i = 0;

while ($i < count($array1)) {
    $j = 0;
    while ($j < count($array2)) {
        if ($array1[$i] == $array2[$j]) {
            $n[] = $array1[$i];
            break;
        }
        $j++;
    }
    $i++;
}

foreach ($n as $element) {
    echo $element . "<br>";
}
?>
