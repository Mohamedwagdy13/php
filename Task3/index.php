<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaR1h8TLO6LwFv2TnK9RxDa+J2ziF9EJUk8F+QK2z5hNqE4J5+V7ibTw4dK" crossorigin="anonymous">
</head>
<body>
<form class="form-inline" method="post"action="./form.php">
<div class="form-group mb-2">
    <label for="firest name" class="sr-only">firest name</label>
    <input type="text" class="form-control" id="firest name" name="firest name" placeholder="Enter your firest name" >
  </div>
  <div class="form-group mb-2">
    <label for="last name" class="sr-only">last name</label>
    <input type="text" class="form-control" id="last name" name="last name" placeholder="Enter your last name">
  </div>
  <div class="form-group mb-2">
    <label for="Email" class="sr-only">Email</label>
    <input type="Email" class="form-control" id="Email" name="Email" placeholder="Enter your Email">
  </div>
  <div class="form-group mb-2">
    <label for="password" class="sr-only">password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
  </div>
  <button type="submit" class="btn btn-primary mb-2">Submit</button>
</form>

<?php
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
