<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css">
    <title>Item Form</title>
</head>
<body>
    <h2>Item Registration</h2>
    <form action="process_item.php" method="post">
        <!-- Fields for Item Data -->
        <label>Item Code:</label>
        <input type="text" name="item_code" required><br><br>
        <label>Item Name:</label>
        <input type="text" name="item_name" required><br><br>
        <label>Item Category:</label>
        <select name="item_category">
            <option value="Category 1">Category 1</option>
            <option value="Category 2">Category 2</option>
            <!-- Add more categories here -->
        </select><br><br>
        <label>Item Sub Category:</label>
        <select name="item_sub_category">
            <option value="Sub Category 1">Sub Category 1</option>
            <option value="Sub Category 2">Sub Category 2</option>
            <!-- Add more subcategories here -->
        </select><br><br>
        <label>Quantity:</label>
        <input type="number" name="quantity" required><br><br>
        <label>Unit Price:</label>
        <input type="number" name="unit_price" step="0.01" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
