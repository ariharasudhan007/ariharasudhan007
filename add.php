<!DOCTYPE html>
<html>
<head>
    <title>Insert Patient Data</title>
</head>
<body>
    <h1>Insert Patient Data</h1>
    
    <form action="add_p.php" method="post">
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" required><br><br>

        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" required><br><br>

        <label for="dateOfBirth">Date of Birth:</label>
        <input type="date" name="dateOfBirth" required><br><br>

        <label for="gender">Gender:</label>
        <select name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br><br>

        <label for="contactNumber">Contact Number:</label>
        <input type="text" name="contactNumber" required><br><br>

        <label for="address">Address:</label>
        <textarea name="address" rows="4" required></textarea><br><br>

        <input type="submit" value="Insert Patient">
    </form>
</body>
</html>