<?php
session_start();

$host = "localhost";
$username = "root"; 
$password = ""; 
$database = "voting"; 
$conn = new mysqli($host, $username, $password, $database);
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        $_SESSION['registration_message'] = "Username already exists. Please choose a different username.";
        header("Location: register.php"); 
        exit; 
    }

    
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if($conn->query($sql) === TRUE) {
       
        header("Location: login.php");
        exit; 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
