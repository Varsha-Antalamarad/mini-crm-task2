<?php
$conn = new mysqli("localhost", "root", "", "crm_task2");

if ($conn->connect_error) {
  die("Database connection failed: " . $conn->connect_error);
}
?>
