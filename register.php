<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body {
            background-image: url(registerimg.svg);
            background-size: cover;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2; 
        }

        .container {
            width: 100%;
            max-width: 400px;
            margin: 50px auto; 
            padding: 20px;
            background-color: #fff;
            border-radius: 8px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            animation: fadeIn 1s ease forwards; 
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            text-align: center;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc; 
            border-radius: 4px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease; 
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="register_process.php" method="post">
            <label for="username">Student ID :</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Register">
        </form>
        <?php
       
        if(isset($_SESSION['registration_message'])) {
            
            echo '<div class="error-message">' . $_SESSION['registration_message'] . '</div>';
            
            unset($_SESSION['registration_message']);
        }
        ?>
    </div>
</body>
</html>
