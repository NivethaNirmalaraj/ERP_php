<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
    <title>Invoice Report</title>
</head>
<body>
    <h2>Invoice Report</h2>
    <form action="generate_invoice_report.php" method="post">
        <label>Start Date:</label>
        <input type="date" name="start_date" required><br><br>
        <label>End Date:</label>
        <input type="date" name="end_date" required><br><br>
        <input type="submit" value="Generate Report">
    </form>
</body>
</html>
