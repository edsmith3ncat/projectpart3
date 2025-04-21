<?php
// Connect to the database
$servername = "localhost";
$username = "root";  // Adjust if necessary
$password = "";  // Adjust if necessary
$dbname = "create_gym";  // Adjust if necessary

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching data from the Members table
$sql = "SELECT * FROM Members";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Database - Gym Membership System</title>
  <link rel="stylesheet" href="../css/styles.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
      padding: 20px;
    }

    table {
      width: 80%;
      margin: 20px auto;
      border-collapse: collapse;
      border: 1px solid #ddd;
    }

    th, td {
      padding: 12px;
      text-align: left;
      border: 1px solid #ddd;
    }

    th {
      background-color: #f4f4f4;
    }

    td {
      background-color: #f9f9f9;
    }

    h1 {
      font-size: 2em;
      margin-bottom: 20px;
    }

    nav {
      margin-bottom: 20px;
    }

    nav ul {
      list-style-type: none;
      padding: 0;
    }

    nav ul li {
      display: inline;
      margin-right: 20px;
    }

    nav ul li a {
      text-decoration: none;
      color: white;
    }

    nav ul li a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <nav>
    <ul>
      <li><a href="index.html">Home</a></li>
      <li><a href="view_database.php">View Database</a></li>
      <li><a href="add_members.php">View Member</a></li>
      <li><a href="add_plans.php">View Plan</a></li>
      <li><a href="add_subscriptions.php">View Subscription</a></li>
      <li><a href="add_payments.php">View Payment</a></li>
      <li><a href="add_attendance.php">View Attendance</a></li>
    </ul>
  </nav>

  <h1>Gym Membership Database</h1>

  <?php
  if ($result->num_rows > 0) {
      // Output data of each row
      echo "<table>
              <tr>
                <th>MemID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Join Date</th>
                <th>Status</th>
              </tr>";

      while($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>" . $row["MemID"]. "</td>
                  <td>" . $row["Name"]. "</td>
                  <td>" . $row["Email"]. "</td>
                  <td>" . $row["JoinDate"]. "</td>
                  <td>" . $row["MemStatus"]. "</td>
                </tr>";
      }

      echo "</table>";
  } else {
      echo "0 results";
  }

  $conn->close();
  ?>
</body>
</html>
