<?php
// Connect to the database (replace 'your_host', 'your_username', 'your_password', and 'your_db_name' with actual credentials)
$connection = mysqli_connect('localhost', 'root1', 'root', 'db');

// Check connection
if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Generate Item Report
$query = "SELECT DISTINCT item_name, item_category, item_sub_category, SUM(quantity) AS total_quantity
          FROM items
          GROUP BY item_name, item_category, item_sub_category
          ORDER BY item_name, item_category, item_sub_category";

$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Item Report</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Item Name</th><th>Item Category</th><th>Item Sub Category</th><th>Item Quantity</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['item_name']."</td>";
        echo "<td>".$row['item_category']."</td>";
        echo "<td>".$row['item_sub_category']."</td>";
        echo "<td>".$row['total_quantity']."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No data found for the item report.";
}

// Close the database connection
mysqli_close($connection);
?>
