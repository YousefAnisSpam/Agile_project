<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Get form data
$fullname = $_POST['fullname'];
$company_name = $_POST['CompanyName'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$location = $_POST['location'];
$shipping_address = $_POST['shipping_address']; // New field for the shipping address
$template_id = $_POST['template_id'] ?? 1; // Use POST for template_id instead of GET

// Structure data for saving
$order = [
    'fullname' => $fullname,
    'company_name' => $company_name,
    'phone' => $phone,
    'email' => $email,
    'location' => $location,
    'shipping_address' => $shipping_address,
    'template_id' => $template_id,
    'created_at' => date('Y-m-d H:i:s')
];

// Save to a JSON file
$file = 'orders.json';
$orders = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
$orders[] = $order; // Add the new order
file_put_contents($file, json_encode($orders, JSON_PRETTY_PRINT));

// Redirect to thank-you page
header("Location: thank_you.php");
exit();
