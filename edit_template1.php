<?php
session_start();

$imagep_1 = 'templates/template1.jpg';
$imagep_2 = 'templates/template2.jpg';
$imagep_3 = 'templates/template3.jpg';
$imagep_4 = 'templates/template4.jpg';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<style>
body {
    background-color: #f0f4f8; /* Light background color */
    font-family: 'Poppins', sans-serif;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 1.5rem;
    background: white; /* White background for the container */
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

h2.form-title {
    font-size: 1.8rem;
    color: #333;
    text-align: center;
    margin-bottom: 0.5rem;
}

h3 {
    font-size: 1.5rem;
    color: #555;
    text-align: center;
    margin-bottom: 1.5rem;
}

.template-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.template-item {
    flex: 1 1 calc(50% - 1rem); /* 2 columns with space */
    margin: 0.5rem;
    text-align: center;
}

.template-item img {
    width: 100%;
    height: 200px; /* Fixed height for uniformity */
    object-fit: cover; /* Cover maintains aspect ratio and fills the area */
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.template-link {
    display: inline-block;
    margin-top: 0.5rem;
    text-decoration: none;
    background: rgb(125, 125, 235);
    color: white;
    padding: 10px 15px;
    border-radius: 5px;
    transition: background 0.3s, transform 0.2s;
    font-weight: bold;
}

.template-link:hover {
    background: #07001f;
    transform: translateY(-2px);
}

.logout-btn {
    display: block;
    margin-top: 2rem;
    text-align: center;
    font-size: 1rem;
    font-weight: bold;
    color: rgb(125, 125, 235);
    text-decoration: none;
}

.logout-btn:hover {
    text-decoration: underline;
    color: blue;
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Template</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="form-title">Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</h2>
        <h3>Select a Template:</h3>
        <div class="template-grid">
            <div class="template-item">
                <img src="<?php echo $imagep_1; ?>" alt="Template 1">
                <a class="template-link" href="edit_template1.php?template=1">Select Template 1</a>
            </div>
            <div class="template-item">
                <img src="<?php echo $imagep_2; ?>" alt="Template 2">
                <a class="template-link" href="edit_template.php?template=2">Select Template 2</a>
            </div>
            <div class="template-item">
                <img src="<?php echo $imagep_3; ?>" alt="Template 3">
                <a class="template-link" href="edit_template.php?template=3">Select Template 3</a>
            </div>
            <div class="template-item">
                <img src="<?php echo $imagep_4; ?>" alt="Template 4">
                <a class="template-link" href="edit_template.php?template=4">Select Template 4</a>
            </div>
        </div>
        <a class="btn logout-btn" href="logout.php">Logout</a>
    </div>
</body>
</html>
