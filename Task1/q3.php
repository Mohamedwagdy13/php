<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</head>
<body>

<?php
$N1 = 3;
$N2 = 30;
$N3 = 33; 

if ($N1 > $N2 && $N1 > $N3) {
    echo "<h1>Number one is the greatest</h1>";
} elseif ($N2 > $N3 && $N2 > $N1) {
    echo "<h1>Number two is the greatest</h1>";
} else {
    echo "<h1>Number three is the greatest</h1>";
}

if ($N1 < $N2 && $N1 < $N3) {
    echo "<h1>Number one is the smallest</h1>";
} elseif ($N2 < $N3 && $N2 < $N1) {
    echo "<h1>Number two is the smallest</h1>";
} else {
    echo "<h1>Number three is the smallest</h1>";
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
