<?php
session_start();

// Ensure the user is an admin
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

// Read the data from the JSON file
$file = 'orders.json';
$orders = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

// Calculate order summary by template
$template_counts = [];
foreach ($orders as $order) {
    $template_id = $order['template_id'] ?? 1; // Default template ID if not set
    if (!isset($template_counts[$template_id])) {
        $template_counts[$template_id] = 0;
    }
    $template_counts[$template_id]++;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 1.5rem;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            text-align: center;
            color: #333;
            margin-bottom: 1.5rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            text-align: center;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        th {
            background: rgb(125, 125, 235);
            color: white;
            font-weight: 600;
        }

        td {
            background: #f9f9f9;
        }

        tr:nth-child(even) td {
            background: #f0f4f8;
        }

        .empty-state {
            text-align: center;
            color: #555;
            font-size: 1.2rem;
            margin-top: 2rem;
        }

        .logout-btn {
            display: inline-block;
            margin: 1rem auto;
            text-align: center;
            font-weight: bold;
            color: white;
            background-color: rgb(125, 125, 235);
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .logout-btn:hover {
            background-color: #07001f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <h2>Order Summary by Template</h2>
        <?php if (empty($orders)) : ?>
            <p class="empty-state">No orders have been placed yet.</p>
        <?php else : ?>
            <table>
                <thead>
                    <tr>
                        <th>Template ID</th>
                        <th>Total Orders</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($template_counts as $template_id => $count) : ?>
                        <tr>
                            <td><?= htmlspecialchars($template_id) ?></td>
                            <td><?= htmlspecialchars($count) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h2>Detailed Orders</h2>
            <table>
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Company Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Location</th>
                        <th>Shipping Address</th>
                        <th>Template ID</th>
                        <th>Order Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order) : ?>
                        <tr>
                            <td><?= htmlspecialchars($order['fullname']) ?></td>
                            <td><?= htmlspecialchars($order['company_name']) ?></td>
                            <td><?= htmlspecialchars($order['phone']) ?></td>
                            <td><?= htmlspecialchars($order['email']) ?></td>
                            <td><?= htmlspecialchars($order['location']) ?></td>
                            <td><?= htmlspecialchars($order['shipping_address']) ?></td>
                            <td><?= htmlspecialchars($order['template_id']) ?></td>
                            <td><?= htmlspecialchars($order['created_at']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <a class="logout-btn" href="logout.php">Logout</a>
    </div>
</body>
</html>
