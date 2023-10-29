<!DOCTYPE html>
<html>
<head>
    <title>Add Patient Remarks</title>
    <style>
        /* Add your CSS styles for the page here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: #4287f5;
            color: white;
            padding: 10px;
            text-align: center;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        form {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4287f5;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #333;
        }
    </style>
</head>
<body>
    <h1>Add Patient Remarks</h1>
    
    <div class="navbar">
        <a href="home.php">Home</a>
        <a href="about.php">About</a>
        <a href="service.php">Services</a>
        <a href="contact.php">Contact</a>
    </div>
    
    <form action="process_remarks.php" method="post">
        <label for="patientID">Patient ID:</label>
        <input type="text" name="patientID" required><br><br>

        <label for="remarkText">Remark:</label>
        <textarea name="remarkText" rows="4" cols="50" required></textarea><br><br>

        <label for="remarkDate">Remark Date:</label>
        <input type="date" name="remarkDate" required><br><br>

        <input type="submit" value="Add Remark">
    </form>
</body>
</html>
