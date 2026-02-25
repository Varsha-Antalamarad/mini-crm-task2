<?php
include "db.php";

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$source = $_POST['source'];

$status = $_POST['status'];
$notes = $_POST['notes'];
$follow_up = $_POST['follow_up'];


$sql = "UPDATE leads 
        SET name='$name', email='$email', source='$source', status='$status', 
            notes='$notes', follow_up='$follow_up' 
        WHERE id=$id";



if ($conn->query($sql) === TRUE) {
  header("Location: index.php");
} else {
  echo "Error updating record: " . $conn->error;
}
?>
