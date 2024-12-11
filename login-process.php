<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if ($username === 'admin' && $password === 'admin') {
    $_SESSION['logged_in'] = true;
    header('Location: index.html');
} else {
    echo '<script>alert("Username atau Password salah!"); window.location.href = "login.html";</script>';
}
?>
