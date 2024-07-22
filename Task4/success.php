<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaR1h8TLO6LwFv2TnK9RxDa+J2ziF9EJUk8F+QK2z5hNqE4J5+V7ibTw4dK" crossorigin="anonymous">
</head>
<body>
    <div class="w-75 m-auto">
<div class="container mt-5">
    <?php
    session_start();
    $email = $_SESSION['email'] ?? 'Unknown';
    session_unset();
    ?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading"><img src="./img/download.png" alt="img"></h4>
        <pspan>Your form has been submitted successfully with the email: <strong><?= htmlspecialchars($email)?></strong>.</span>
        <hr>
        <p >Thank you for your submission.</p>
    </div>
    <a href="index.html" class="btn btn-primary">Go back to the form</a>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
