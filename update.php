<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form</title>
</head>
<body>
    <h2>Update Record</h2>
    <form action="update.php" method="POST">
        <label for="id">Record ID:</label><br>
        <input type="text" id="id" name="id"><br> <!-- Input field for record ID -->
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="number">Number:</label><br>
        <input type="number" id="number" name="number"><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email"><br>
        <input type="submit" value="Update">
    </form>
    <?php
// Database connection
$conn = new mysqli("localhost", "root", "", "php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];

    // SQL query to update record
    $sql = "UPDATE info SET name='$name', number='$number', email='$email' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>


</body>
</html>
