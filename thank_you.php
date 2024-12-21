<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4f8;
            text-align: center;
            padding: 50px;
        }
        .message {
            background: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        h1 {
            color: #333;
        }
        p {
            font-size: 16px;
            color: #666;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: white;
            background-color: rgb(125, 125, 235);
            padding: 10px 20px;
            border-radius: 5px;
        }
        a:hover {
            background-color: #07001f;
        }
    </style>
</head>
<body>
    <div class="message">
        <h1>Thank You for Your Order!</h1>
        <p>Your order has been placed successfully. It will arrive soon at your shipping address.</p>
        <a href="templates.php">Go Back to Templates</a>
    </div>
</body>
</html>
