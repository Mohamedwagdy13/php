<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaR1h8TLO6LwFv2TnK9RxDa+J2ziF9EJUk8F+QK2z5hNqE4J5+V7ibTw4dK" crossorigin="anonymous">
</head>
<body>
<form class="form-inline" method="GET">
  <div class="form-group mb-2">
    <label for="age" class="sr-only">Age</label>
    <input type="text" class="form-control" id="age" name="age" placeholder="Enter your age">
  </div>
  <button type="submit" class="btn btn-primary mb-2">Submit</button>
</form>

<?php
if (isset($_GET['age'])) {
    $age = (int)$_GET['age'];
    if ($age >= 18) {
        echo "<h2>can access</h2>";
    } else {
        echo "<h2>can't access</h2>";
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
