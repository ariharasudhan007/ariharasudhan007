<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    if (isset($_GET['PatientID'])) {
        $patientID = $_GET['PatientID'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle form submission
            $remarks = $_POST['remarks'];

            $host = "localhost";
            $username = "root";
            $password = "";
            $database = "medical_report";

            $conn = new mysqli($host, $username, $password, $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO patient_remarks (PatientID, Remarks) VALUES ($patientID, '$remarks')";

            if ($conn->query($sql) === TRUE) {
                echo "Remarks added successfully.";
            } else {
                echo "Error adding remarks: " . $conn->error;
            }

            $conn->close();
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Patient Remarks</title>
</head>
<body>
    <h1>Add Patient Remarks</h1>
    <form action="" method="post">
        <label for="remarks">Remarks:</label>
        <textarea id="remarks" name="remarks" required></textarea><br>

        <input type="submit" value="Add Remarks">
    </form>
</body>
</html>
