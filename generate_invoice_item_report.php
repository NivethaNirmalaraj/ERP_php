<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connect to the database (replace 'your_host', 'your_username', 'your_password', and 'your_db_name' with actual credentials)
$connection = mysqli_connect('localhost', 'root1', 'root', 'db');

// Check connection
if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Form validation
if (empty($_POST['start_date']) || empty($_POST['end_date'])) {
    die("Both start date and end date are required.");
}

// Sanitize input data
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

// Generate Invoice Item Report
$query = "SELECT inv.id AS invoice_number, inv.invoice_date AS invoiced_date, CONCAT(c.first_name, ' ', c.last_name) AS customer_name, i.item_name, i.item_code, i.item_category, i.unit_price
          FROM invoices inv
          LEFT JOIN customers c ON inv.customer_id = c.id
          LEFT JOIN invoice_items ii ON inv.id = ii.invoice_id
          LEFT JOIN items i ON ii.item_id = i.id
          WHERE inv.invoice_date BETWEEN '$start_date' AND '$end_date'";

$result = mysqli_query($connection, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($connection));
}

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Invoice Item Report</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Invoice Number</th><th>Invoiced Date</th><th>Customer Name</th><th>Item Name</th><th>Item Code</th><th>Item Category</th><th>Item Unit Price</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['invoice_number']."</td>";
        echo "<td>".$row['invoiced_date']."</td>";
        echo "<td>".$row['customer_name']."</td>";
        echo "<td>".$row['item_name']."</td>";
        echo "<td>".$row['item_code']."</td>";
        echo "<td>".$row['item_category']."</td>";
        echo "<td>".$row['unit_price']."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No data found for the selected date range.";
}

// Close the database connection
mysqli_close($connection);
?>
