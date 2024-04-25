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


    
    $sql = "SELECT id FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        header("Location: voting.php");
    } else {
        echo "Invalid username or password";
    }
}

$conn->close();
?>
