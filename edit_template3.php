<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Get the selected template number
$template_id = isset($_GET['template']) ? (int)$_GET['template'] : 1; // Default to 1 if not set
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Template</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <style>
        body {
            background-color: #f0f4f8;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 1.5rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 1rem;
        }

        .template-preview {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .template-preview img {
            width: 100%;
            border-radius: 10px;
        }

        .template-info {
            position: absolute;
            top: 60%;
            left: 60%;
            transform: translate(-50%, -50%);
            color: white;
            text-align: right;
        }

        .template-info h3 {
            margin: 0.5rem 0;
            font-weight: 600;
            color: #f0f4f8;
            font-size: 20px;
        }

        input[type="text"], input[type="email"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 0.5rem 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: rgb(125, 125, 235);
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #07001f;
        }

        .logout-btn {
            display: block;
            margin-top: 1rem;
            text-align: center;
            font-weight: bold;
            color: rgb(125, 125, 235);
            text-decoration: none;
        }

        .logout-btn:hover {
            text-decoration: underline;
            color: blue;
        }
    </style>
    <script>
        function updatePreview() {
            const fullName = document.getElementById('fullname').value;
            const CompanyName = document.getElementById('CompanyName').value;
            const phone = document.getElementById('phone').value;
            const email = document.getElementById('email').value;
            const location = document.getElementById('location').value;

            document.getElementById('previewFullName').innerText = fullName || "Full Name";
            document.getElementById('previewCompanyName').innerText = CompanyName || "Company Name";
            document.getElementById('previewPhone').innerText = "Phone: " + (phone || "[Your Phone Number]");
            document.getElementById('previewEmail').innerText = "Email: " + (email || "[Your Email]");
            document.getElementById('previewLocation').innerText = "Location: " + (location || "[Your Location]");
        }

        function downloadCard() {
            html2canvas(document.querySelector('.template-preview')).then(canvas => {
                const link = document.createElement('a');
                link.href = canvas.toDataURL('image/png'); // Convert the canvas to a PNG image
                link.download = 'template_card.png'; // Set the default filename
                link.click(); // Trigger the download
            }).catch(error => {
                console.error('Error generating the image:', error);
            });
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Edit Your Template</h2>
        <h3>Template ID: <?= htmlspecialchars($template_id) ?></h3>
        <div class="template-preview" id="image">
            <img src="templates/template3.jpg" alt="Template Image">
            <div class="template-info">
                <h3 id="previewFullName">Full Name</h3>
                <h3 id="previewCompanyName">Company Name</h3>
                <h3 id="previewPhone">Phone: [Your Phone Number]</h3>
                <h3 id="previewEmail">Email: [Your Email]</h3>
                <h3 id="previewLocation">Location: [Your Location]</h3>
            </div>
        </div>
        
        <form action="save_template.php" method="POST" oninput="updatePreview()">
            <input type="text" id="fullname" name="fullname" placeholder="Full Name" required>
            <input type="text" id="CompanyName" name="CompanyName" placeholder="Company Name" required>
            <input type="text" id="phone" name="phone" placeholder="Phone" required>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="text" id="location" name="location" placeholder="Location" required>
            <button type="submit">Order Now</button>
            <button type="button" onclick="downloadCard()">Download</button>
        </form>
        
        <a class="logout-btn" href="logout.php">Logout</a>
    </div>
</body>
</html>
