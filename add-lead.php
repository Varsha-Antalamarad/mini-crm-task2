<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
<h2 class="page-title">Add New Lead</h2>

<div class="page-center">
  <div class="form-wrapper">
    <form action="save-lead.php" method="POST" class="lead-form">
      <input type="text" name="name" placeholder="Client Name" required>
      <input type="email" name="email" placeholder="Client Email" required>
      <input type="text" name="source" placeholder="Source (Website / LinkedIn / Referral)" required>

      <select name="status">
        <option value="New">New</option>
        <option value="Contacted">Contacted</option>
        <option value="Converted">Converted</option>
      </select>

      <textarea name="notes" placeholder="Notes"></textarea>
      <textarea name="follow_up" placeholder="Follow-up details (next call date, reminder, etc.)"></textarea>

      <button type="submit">Save Lead</button>
    </form>

    <!-- Back link EXACTLY below the box -->
    <div class="back-link">
      <a href="index.php">← Back to Dashboard</a>
    </div>
  </div>
</div>

</body>
</html>
