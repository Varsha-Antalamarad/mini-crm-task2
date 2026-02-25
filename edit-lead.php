<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}
?>

<?php
include "db.php";

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM leads WHERE id = $id");
$lead = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Lead</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <h2>Edit Lead</h2>

  <form action="update-lead.php" method="POST" class="lead-form">
    <input type="hidden" name="id" value="<?php echo $lead['id']; ?>">

    <input type="text" name="name" value="<?php echo $lead['name']; ?>" required>
    <input type="email" name="email" value="<?php echo $lead['email']; ?>" required>
    <input type="text" name="source" value="<?php echo $lead['source']; ?>" required>


    <select name="status">
      <option <?php if($lead['status']=="New") echo "selected"; ?>>New</option>
      <option <?php if($lead['status']=="Contacted") echo "selected"; ?>>Contacted</option>
      <option <?php if($lead['status']=="Converted") echo "selected"; ?>>Converted</option>
    </select>

    <textarea name="notes"><?php echo $lead['notes']; ?></textarea>
    <textarea name="follow_up"><?php echo $lead['follow_up']; ?></textarea>


    <button type="submit">Update Lead</button>
  </form>

  <p><a href="index.php">← Back to Dashboard</a></p>

</body>
</html>
