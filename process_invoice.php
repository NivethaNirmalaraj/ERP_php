<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
// Connect to the database (replace 'your_host', 'your_username', 'your_password', and 'your_db_name' with actual credentials)
$connection = mysqli_connect('localhost', 'root1', 'root', 'db');

// Check connection
if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Form validation
if (empty($_POST['invoice_date']) || empty($_POST['customer_id']) || empty($_POST['item_id'])) {
    die("Invoice date, customer, and items are required.");
}

// Sanitize input data
$invoice_date = $_POST['invoice_date'];
$customer_id = (int)$_POST['customer_id'];
$item_ids = $_POST['item_id'];

// Insert invoice data into the database
$query = "INSERT INTO invoices (customer_id, invoice_date) VALUES ($customer_id, '$invoice_date')";
if (mysqli_query($connection, $query)) {
    $invoice_id = mysqli_insert_id($connection); // Get the auto-generated invoice ID

    // Insert invoice items data into the database
    foreach ($item_ids as $item_id) {
        $query = "INSERT INTO invoice_items (invoice_id, item_id) VALUES ($invoice_id, $item_id)";
        mysqli_query($connection, $query);
    }

    echo "Invoice created successfully!";
} else {
    echo "Error: " . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
?>

