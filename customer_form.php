<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
    <title>Customer Form</title>
</head>
<body>
    <h2>Customer Registration</h2>
    <form action="process_customer.php" method="post">
        <!-- Fields for Customer Data -->
        <label>Title:</label>
        <select name="title">
            <option value="Mr">Mr</option>
            <option value="Mrs">Mrs</option>
            <option value="Miss">Miss</option>
            <option value="Dr">Dr</option>
        </select><br><br>
        <label>First Name:</label>
        <input type="text" name="first_name" required><br><br>
        <label>Last Name:</label>
        <input type="text" name="last_name" required><br><br>
        <label>Contact Number:</label>
        <input type="text" name="contact_number" required><br><br>
        <label>District:</label>
        <input type="text" name="district" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
