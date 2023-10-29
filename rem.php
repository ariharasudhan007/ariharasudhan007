<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>
<!DOCTYPE html>
<html>
<head>
    <title>Jayam Hospital Medical Records</title>
    <style>
        /* Add your CSS styles for the page here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #4287f5;
            color: white;
            padding: 10px;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4287f5;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
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

        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            position: bottom;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Jayam Hospital</h1>
    </header>
    
    <div class="navbar">
        <a href="home.php">Home</a>
        <a href="about.php">About</a>
        <a href="service.php">Services</a>
        <a href="contact.php">Contact</a>
        <a href="regform.php">Add new Patient</a>
        <a href="logout.php">Logout</a>
        <a>Hello chief, <?php echo $_SESSION['name']; ?></a>
    </div>
    <br><br>

    <div class="container">
        <h2>Patients at Jayam Hospital</h2>
        <?php
        // Your PHP code to connect to the database and retrieve patient data here
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "medical_report";

        $conn = new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM patient_remarks";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>
            <th>Remark ID</th>
            <th>PatientID</th>
            <th>RemarkText</th>
            <th>RemarkDate</th>
        </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["RemarkID"] . "</td>";
            echo "<td>" . $row["PatientID"] . "</td>";
            echo "<td>" . $row["RemarkText"] . "</td>";
            echo "<td>" . $row["RemarkDate"] . "</td>";
            echo "</tr>";
        }

            echo "</table>";
       } else {
        echo "<tr><td>No remarks found.</td></tr>";
    }

        $conn->close();
        ?>
    </div>
<br><br><br><br>
    <div class="footer">
        Designed & Developed by ARIHARASUDHAN, KESAVAN.
    </div>
</body>
</html>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
