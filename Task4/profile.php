<?php
session_start();

$mail = $_POST['Email'] ?? '';
$pass = $_POST['password'] ?? '';
$error = [];

function clean($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}

$mail = clean($mail);
$pass = clean($pass);

if (empty($mail)) {
    $error['Email'] = "Email is invalid";
} else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    $error['Email'] = "Email is invalid";
}

if (empty($pass)) {
    $error['password'] = "Password is invalid";
} else if (strlen($pass) < 8) {
    $error['password'] = "Password must be at least 8 characters";
}


if (!empty($error)) {
    $_SESSION['errors'] = $error;
    $_SESSION['old_data'] = ['Email' => $mail];
    header("Location: ./form.php"); 
    exit;
} else {
    $_SESSION['email'] = $mail;
    header("Location: ./success.php");
    exit;
}
?>

