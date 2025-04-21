<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "create_gym");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query Attendance table
$sql = "SELECT attend_id, MemID, check_in, check_out FROM Attendance";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Attendance Records</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
  <nav>
    <ul>
      <li><a href="index.html">Home</a></li>
      <li><a href="add_member.php">Add Member</a></li>
      <li><a href="add_plan.php">Add Plan</a></li>
      <li><a href="add_subscription.php">Add Subscription</a></li>
      <li><a href="add_payments.php">Add Payment</a></li>
      <li><a href="add_attendance.php">Add Attendance</a></li>
      <li><a href="view_database.php">View Database</a></li>
    </ul>
  </nav>

  <h1>Attendance Records</h1>

  <?php
  if ($result->num_rows > 0) {
      echo "<table border='1' cellpadding='10'>";
      echo "<tr><th>Attendance ID</th><th>Member ID</th><th>Check In</th><th>Check Out</th></tr>";
      while($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['attend_id']}</td>
                  <td>{$row['MemID']}</td>
                  <td>{$row['check_in']}</td>
                  <td>{$row['check_out']}</td>
                </tr>";
      }
      echo "</table>";
  } else {
      echo "<p>No attendance records found.</p>";
  }

  $conn->close();
  ?>
</body>
</html>
