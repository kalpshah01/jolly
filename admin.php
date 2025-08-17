<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "jollyganpati";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM submissions ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin - Jolly Forms</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <h2>📋 All Submissions</h2>
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Tower</th>
        <th>Flat No</th>
        <th>Games</th>
        <th>Submitted At</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['tower']) ?></td>
        <td><?= htmlspecialchars($row['flatno']) ?></td>
        <td><?= htmlspecialchars($row['games']) ?></td>
        <td><?= $row['created_at'] ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>
<?php $conn->close(); ?>
