<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}
?>

<?php include "db.php"; ?>
<?php
// Stats
$total = $conn->query("SELECT COUNT(*) AS c FROM leads")->fetch_assoc()['c'];
$newCount = $conn->query("SELECT COUNT(*) AS c FROM leads WHERE status='New'")->fetch_assoc()['c'];
$contacted = $conn->query("SELECT COUNT(*) AS c FROM leads WHERE status='Contacted'")->fetch_assoc()['c'];
$converted = $conn->query("SELECT COUNT(*) AS c FROM leads WHERE status='Converted'")->fetch_assoc()['c'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Mini CRM – Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="page-header">
<h1 class="page-title">📊 Client Lead Management</h1>

  <div class="top-bar">
    <a href="logout.php" class="logout-btn">Logout</a>
  </div>
</div>
  <div class="stats">
  <div class="stat-card">
    <span>Total Leads</span>
    <strong><?php echo $total; ?></strong>
  </div>
  <div class="stat-card">
    <span>New</span>
    <strong><?php echo $newCount; ?></strong>
  </div>
  <div class="stat-card">
    <span>Contacted</span>
    <strong><?php echo $contacted; ?></strong>
  </div>
  <div class="stat-card">
    <span>Converted</span>
    <strong><?php echo $converted; ?></strong>
  </div>
</div>
<form method="GET" class="filters">
  <input type="text" name="q" placeholder="Search by name, email or source"
         value="<?php echo isset($_GET['q']) ? htmlspecialchars($_GET['q']) : ''; ?>">

  <select name="status">
    <option value="">All Status</option>
    <option value="New" <?php if(($_GET['status'] ?? '')=='New') echo 'selected'; ?>>New</option>
    <option value="Contacted" <?php if(($_GET['status'] ?? '')=='Contacted') echo 'selected'; ?>>Contacted</option>
    <option value="Converted" <?php if(($_GET['status'] ?? '')=='Converted') echo 'selected'; ?>>Converted</option>
  </select>

  <button type="submit">Filter</button>
  <a href="index.php" style="margin-left:8px;">Reset</a>
</form>




  <p><a href="add-lead.php">➕ Add New Lead</a></p>

  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Source</th>

        <th>Status</th>
        <th>Notes</th>
        <th>Follow-up</th>
        <th>Created At</th>


        <th>Actions</th>
      </tr>
    </thead>
    <tbody>

      <?php
$where = "1=1";

if (!empty($_GET['q'])) {
  $q = $conn->real_escape_string($_GET['q']);
  $where .= " AND (name LIKE '%$q%' OR email LIKE '%$q%' OR source LIKE '%$q%')";
}

if (!empty($_GET['status'])) {
  $status = $conn->real_escape_string($_GET['status']);
  $where .= " AND status='$status'";
}

$result = $conn->query("SELECT * FROM leads WHERE $where ORDER BY created_at DESC");


      if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      ?>
        <tr>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['source']; ?></td>

<td>
  <span class="status <?php echo strtolower($row['status']); ?>">
    <?php echo $row['status']; ?>
  </span>
</td>
          <td><?php echo $row['notes']; ?></td>
          <td><?php echo $row['follow_up']; ?></td>
          <td><?php echo date("d M Y, h:i A", strtotime($row['created_at'])); ?></td>


          <td>
            <a href="edit-lead.php?id=<?php echo $row['id']; ?>" style="margin-right:8px;">Edit</a>
            <a href="delete-lead.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this lead?')">Delete</a>
          </td>
        </tr>
      <?php
        }
      } else {
        echo "<tr><td colspan='5'>No leads found.</td></tr>";
      }
      ?>
    </tbody>
  </table>

</body>
</html>
