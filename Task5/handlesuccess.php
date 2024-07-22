<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $address = htmlspecialchars($_POST['address']);
    $address2 = htmlspecialchars($_POST['address2']);
    $city = htmlspecialchars($_POST['city']);
    $state = htmlspecialchars($_POST['state']);
    $zip = htmlspecialchars($_POST['zip']);
    $checkmeout = isset($_POST['checkmeout']) ? 'Yes' : 'No';

    $error = [];

    if (empty($email)) {
        $error['email'] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "Email is not valid";
    }

    if (empty($zip)) {
        $error['zip'] = "Zip is required";
    } elseif (strlen($zip) < 4) {
        $error['zip'] = "Zip must be at least 4 characters";
    }

    if (empty($address)) {
        $error['address'] = "Address is required";
    }

    if (empty($address2)) {
        $error['address2'] = "Address 2 is required";
    } elseif (strlen($address2) < 2) {
        $error['address2'] = "Address 2 must be at least 2 characters";
    }

    if (empty($city)) {
        $error['city'] = "City is required";
    }

    if (count($error) > 0) {
        $_SESSION['error'] = $error;
        header("Location: ./success.php");
        exit();
    } else {
        $_SESSION['username'] = $email; // Assuming you want to store the email as the username
        header("Location: ./index.php");
        exit();
    }
}
?>
