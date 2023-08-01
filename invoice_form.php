<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css">
    <title>Invoice Form</title>
</head>
<body>
    <h2>Create Invoice</h2>
    <form action="process_invoice.php" method="post">
        <!-- Fields for Invoice Data -->
        <label>Invoice Date:</label>
        <input type="date" name="invoice_date" required><br><br>
        <label>Customer:</label>
        <select name="customer_id">
            <?php
            // Connect to the database (replace 'your_host', 'your_username', 'your_password', and 'your_db_name' with actual credentials)
            $connection = mysqli_connect('localhost', 'root1', 'root', 'db');

            // Check connection
            if (mysqli_connect_errno()) {
                die("Database connection failed: " . mysqli_connect_error());
            }

            // Fetch customers from the database
            $query = "SELECT id, CONCAT(title, ' ', first_name, ' ', last_name) AS customer_name FROM customers";
            $result = mysqli_query($connection, $query);

            // Create options for the dropdown
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='".$row['id']."'>".$row['customer_name']."</option>";
            }

            // Close the database connection
            mysqli_close($connection);
            ?>
        </select><br><br>
        <label>Items:</label>
        <select name="item_id[]" multiple required>
            <?php
            // Connect to the database (replace 'your_host', 'your_username', 'your_password', and 'your_db_name' with actual credentials)
            $connection = mysqli_connect('localhost', 'root1', 'root', 'db');

            // Check connection
            if (mysqli_connect_errno()) {
                die("Database connection failed: " . mysqli_connect_error());
            }

            // Fetch items from the database
            $query = "SELECT id, item_name FROM items";
            $result = mysqli_query($connection, $query);

            // Create options for the dropdown
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='".$row['id']."'>".$row['item_name']."</option>";
            }

            // Close the database connection
            mysqli_close($connection);
            ?>
        </select><br><br>
        <input type="submit" value="Create Invoice">
    </form>
</body>
</html>
