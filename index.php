<?php
session_start();

// Hardcoded accounts
$accounts = [
    "admin" => "admin1",
    "Yousef Anis" => "192100029",
    "Ahmed Essam" => "192100088",
    "Yousef Gabr" => "192100069"
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($accounts[$username]) && $accounts[$username] === $password) {
        $_SESSION['username'] = $username;
        header("Location: templates.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body {
    background-color: #c9d6ff;
    background: linear-gradient(to right, #e2e2e2, #c9d6ff);
}

.container {
    background: #fff;
    width: 450px;
    padding: 1.5rem;
    margin: 50px auto;
    border-radius: 10px;
    box-shadow: 0 20px 35px rgba(0, 0, 1, 0.9);
}

form {
    margin: 0 2rem;
}

.form-title {
    font-size: 1.5rem;
    font-weight: bold;
    text-align: center;
    padding: 1.3rem;
    margin-bottom: 0.4rem;
}

input {
    color: inherit;
    width: 100%;
    background-color: transparent;
    border: none;
    border-bottom: 1px solid #757575;
    padding-left: 1.5rem;
    font-size: 15px;
}

.input-group {
    padding: 1% 0;
    position: relative;
}

.input-group i {
    position: absolute;
    color: black;
}

input:focus {
    background-color: transparent;
    outline: transparent;
    border-bottom: 2px solid hsl(327, 90%, 28%);
}

input::placeholder {
    color: transparent;
}

label {
    color: #757575;
    position: relative;
    left: 1.2em;
    top: -1.3em;
    cursor: auto;
    transition: 0.3s ease all;
}

input:focus ~ label,
input:not(:placeholder-shown) ~ label {
    top: -3em;
    color: hsl(327, 90%, 28%);
    font-size: 15px;
}

.recover {
    text-align: right;
    font-size: 1rem;
    margin-bottom: 1rem;
}

.recover a {
    text-decoration: none;
    color: rgb(125, 125, 235);
}

.recover a:hover {
    color: blue;
    text-decoration: underline;
}

.btn {
    font-size: 1.1rem;
    padding: 8px 0;
    border-radius: 5px;
    outline: none;
    border: none;
    width: 100%;
    background: rgb(125, 125, 235);
    color: white;
    cursor: pointer;
    transition: 0.9s;
}

.btn:hover {
    background: #07001f;
}

.or {
    font-size: 1.1rem;
    margin-top: 0.5rem;
    text-align: center;
}

.icons {
    text-align: center;
}

.icons i {
    color: rgb(125, 125, 235);
    padding: 0.8rem 1.5rem;
    border-radius: 10px;
    font-size: 1.5rem;
    cursor: pointer;
    border: 2px solid #dfe9f5;
    margin: 0 15px;
    transition: 1s;
}

.icons i:hover {
    background: #07001f;
    font-size: 1.6rem;
    border: 2px solid rgb(125, 125, 235);
}

.links {
    display: flex;
    justify-content: space-around;
    padding: 0 4rem;
    margin-top: 0.9rem;
    font-weight: bold;
}

button {
    color: rgb(125, 125, 235);
    border: none;
    background-color: transparent;
    font-size: 1rem;
    font-weight: bold;
}

button:hover {
    text-decoration: underline;
    color: blue;
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="form-title">Login</h2>
        <?php if (isset($error)) : ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
        <form method="POST">
            <div class="input-group">
                <input type="text" name="username" required placeholder=" " />
                <label>Username</label>
            </div>
            <div class="input-group">
                <input type="password" name="password" required placeholder=" " />
                <label>Password</label>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
        <div class="recover">
            <a href="#">Forgot Password?</a>
        </div>
    </div>
</body>
</html>