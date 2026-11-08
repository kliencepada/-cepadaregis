<?php
session_start();
include '../config/db.php';

if (isset($_POST['register'])) {
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Secure hashed password

    // Check if email already exists
    $check_email = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $check_email);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email already registered!'); window.location.href='../index.php';</script>";
    } else {
        $query = "INSERT INTO users (full_name, email, password, role) VALUES ('$full_name', '$email', '$password', 'buyer')";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Registration successful! Please sign in.'); window.location.href='../index.php';</script>";
        } else {
            echo "<script>alert('Error: Something went wrong.'); window.location.href='../index.php';</script>";
        }
    }
}
?>