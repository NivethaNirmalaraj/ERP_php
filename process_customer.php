<?php
// Connect to the database (replace 'your_host', 'your_username', 'your_password', and 'your_db_name' with actual credentials)
$connection = mysqli_connect('localhost','root','','erp');

// Check connection
if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Form validation
if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['contact_number']) || empty($_POST['district'])) {
    die("All fields are required.");
}

// Sanitize input data
$title = mysqli_real_escape_string($connection, $_POST['title']);
$first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
$last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
$contact_number = mysqli_real_escape_string($connection, $_POST['contact_number']);
$district = mysqli_real_escape_string($connection, $_POST['district']);

// Insert customer data into the database
$query = "INSERT INTO customers (title, first_name, last_name, contact_number, district) VALUES ('$title', '$first_name', '$last_name', '$contact_number', '$district')";

if (mysqli_query($connection, $query)) {
    echo "Customer data added successfully!";
} else {
    echo "Error: " . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
?>
