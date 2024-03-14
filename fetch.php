<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from database
$sql = "SELECT * FROM info";
$result = $conn->query($sql);

echo "<style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
      </style>";

if ($result->num_rows > 0) {
    // Output table header
    echo "<table>";
    echo "<tr><th>Name</th><th>Number</th><th>Email</th><th>Actions</th></tr>";
    
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["name"]."</td><td>".$row["number"]."</td><td>".$row["email"]."</td>";
        echo "<td><a href='update.php?id=".$row["id"]."'>Update</a> | <a href='delete.php?id=".$row["id"]."'>Delete</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
