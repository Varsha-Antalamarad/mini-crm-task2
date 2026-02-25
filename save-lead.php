<?php
include "db.php";

$name = $_POST['name'];
$email = $_POST['email'];
$source = $_POST['source'];
$status = $_POST['status'];
$notes = $_POST['notes'];
$follow_up = $_POST['follow_up'];   // NEW

$sql = "INSERT INTO leads (name, email, source, status, notes, follow_up) 
        VALUES ('$name', '$email', '$source', '$status', '$notes', '$follow_up')";

if ($conn->query($sql) === TRUE) {
  header("Location: index.php");
} else {
  echo "Error: " . $conn->error;
}
?>
