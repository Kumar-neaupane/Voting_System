<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$host = "localhost";
$username = "root";
$password = "";
$database = "voting";
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM votes WHERE user_id=$user_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "You have already voted.<br>";
    echo "Your vote for: ";
    while ($row = $result->fetch_assoc()) {
        echo $row['vote'] . "<br>";
    }
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $vote = $_POST['vote'];
        
        $sql = "INSERT INTO votes (user_id, vote) VALUES ('$user_id', '$vote')";
        if ($conn->query($sql) === TRUE) {
            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$sql = "SELECT vote, COUNT(*) as count FROM votes GROUP BY vote";
$result = $conn->query($sql);


$vote_counts = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $vote_counts[$row['vote']] = $row['count'];
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Vote</title>
    <style>
       
        body {
            background-image: url(voting.webp);
            background-size: cover; 
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: white; 
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            text-align: center;
        }

        form {
            text-align: center;
        }

        input[type="radio"] {
            margin: 5px 0;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            color: black;
        }

        th {
            background-color: #FF0000; 
        }

        td {
            border-bottom: 1px solid #FF0000; 
        }

        .success-message {
            color: white;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Vote for your Favorite Footballer</h2>
        <form action="voting.php" method="post">
            <input type="radio" name="vote" value="Ronaldo"> Ronaldo<br>
            <input type="radio" name="vote" value="Messi"> Messi<br>
            <input type="radio" name="vote" value="KDB"> KDB<br>
            <input type="radio" name="vote" value="Halland"> Halland<br><br>
            <input type="submit" value="Submit Vote">
            <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($vote)) {
                echo "<div class='success-message'>Vote submitted successfully!</div>";
            }
            ?>
        </form>
        
        <h3>Vote Counts:</h3>
        <table>
            <tr>
                <th>Footballer</th>
                <th>Votes</th>
            </tr>
            <?php
            
            foreach ($vote_counts as $vote => $count) {
                echo "<tr><td>$vote</td><td>$count</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
