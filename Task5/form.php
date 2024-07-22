<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$old_data = $_SESSION['old_data'] ?? [];
session_unset();
?>
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
    <div class="container mt-5">
        <form class="form-inline" method="post" action="./profile.php">
            <div class="form-group mb-2">
                <label for="Email" class="sr-only">Email</label>
                <input type="email" class="form-control" id="Email" name="Email" placeholder="Enter your Email" value="<?= htmlspecialchars($old_data['Email'] ?? '') ?>">
                <div  class="text-danger">     <?php if (isset($errors['Email'])): ?>
                    <small><?= $errors['Email'] ?></small>
                <?php endif; ?>
                </div>  
            </div>
            <div class="form-group mb-2">
                <label for="password" class="sr-only">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
         <div  class="text-danger">     <?php if (isset($errors['password'])): ?>
                    <small><?= $errors['password'] ?></small>
                <?php endif; ?>
                </div>  
            </div>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
