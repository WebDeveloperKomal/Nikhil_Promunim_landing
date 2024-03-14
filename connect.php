<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "php";

$conn = new mysqli($servername, $username,  $password, $database );
if ($conn->connect_error){
    die("connection failed". $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name =$_POST['name'];
    $number =$_POST['number'];
    $email =$_POST['email'];
    

$sql = "INSERT INTO info (name, number, email) VALUES('$name', '$number', '$email')";
if ($conn->query($sql) === TRUE){
    echo "new record create seccessefully";
}else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}


$conn ->close();

?>