<?php
session_start();

$adminUser = "admin";
$adminPass = "admin123";   // change this later if you want

$username = $_POST['username'];
$password = $_POST['password'];

if ($username === $adminUser && $password === $adminPass) {
  $_SESSION['admin'] = true;
  header("Location: index.php");
} else {
  echo "Invalid login. <a href='login.php'>Try again</a>";
}
?>
