<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System</title>
    <style>
        body {
            background-image: url(onlinevoting.png);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .nav {
            background-color: rgba(51, 51, 51, 0.7);
            padding: 10px;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1;
        }

        .nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        .nav ul li {
            margin: 0 10px;
        }

        .nav ul li a {
            text-decoration: none;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .nav ul li a:hover {
            background-color: #555;
        }

        .first {
            padding: 100px;
            margin-top: 60px;
        }

        .first h1 {
            margin: 0;
            color: black;
            opacity: 0;
            animation: slideInRight 1.5s forwards;
        }

        @keyframes slideInRight {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="nav">
        <ul>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
        </ul>
    </div>
    <div class="first">
        <h1>Welcome to Online Voting System</h1>
    </div>
</body>
</html>
