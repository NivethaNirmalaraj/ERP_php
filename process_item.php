<?php
// Connect to the database (replace 'your_host', 'your_username', 'your_password', and 'your_db_name' with actual credentials)
$connection = mysqli_connect('localhost', 'root1', 'root', 'db');

// Check connection
if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Form validation
if (empty($_POST['item_code']) || empty($_POST['item_name']) || empty($_POST['item_category']) || empty($_POST['item_sub_category']) || empty($_POST['quantity']) || empty($_POST['unit_price'])) {
    die("All fields are required.");
}

// Sanitize input data
$item_code = mysqli_real_escape_string($connection, $_POST['item_code']);
$item_name = mysqli_real_escape_string($connection, $_POST['item_name']);
$item_category = mysqli_real_escape_string($connection, $_POST['item_category']);
$item_sub_category = mysqli_real_escape_string($connection, $_POST['item_sub_category']);
$quantity = (int)$_POST['quantity'];
$unit_price = (float)$_POST['unit_price'];

// Insert item data into the database
$query = "INSERT INTO items (item_code, item_name, item_category, item_sub_category, quantity, unit_price) VALUES ('$item_code', '$item_name', '$item_category', '$item_sub_category', $quantity, $unit_price)";

if (mysqli_query($connection, $query)) {
    echo "Item data added successfully!";
} else {
    echo "Error: " . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
?>
