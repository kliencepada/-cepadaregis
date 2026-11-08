<?php
session_start();
include '../config/db.php';

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        
        // Verify Password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['full_name'] = $user['full_name'];
            $_SESSION['role'] = $user['role'];

            header("Location: ../dashboard.php");
            exit();
        } else {
            echo "<script>alert('Invalid password!'); window.location.href='../index.php';</script>";
        }
    } else {
        echo "<script>alert('No account found with this email!'); window.location.href='../index.php';</script>";
    }
}
?>