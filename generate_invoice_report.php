<?php
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

// Generate Invoice Report
$query = "SELECT c.id AS customer_id, c.first_name, c.last_name, c.district, COUNT(i.id) AS item_count, SUM(i.quantity * i.unit_price) AS invoice_amount
          FROM customers c
          LEFT JOIN invoices inv ON c.id = inv.customer_id
          LEFT JOIN invoice_items i ON inv.id = i.invoice_id
          WHERE inv.invoice_date BETWEEN '$start_date' AND '$end_date'
          GROUP BY c.id, c.first_name, c.last_name, c.district";

$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Invoice Report</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Customer ID</th><th>Customer Name</th><th>District</th><th>Item Count</th><th>Invoice Amount</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['customer_id']."</td>";
        echo "<td>".$row['first_name']." ".$row['last_name']."</td>";
        echo "<td>".$row['district']."</td>";
        echo "<td>".$row['item_count']."</td>";
        echo "<td>".$row['invoice_amount']."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No data found for the selected date range.";
}

// Close the database connection
mysqli_close($connection);
?>
