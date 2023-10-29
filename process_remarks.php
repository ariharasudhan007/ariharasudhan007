<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    // Establish a database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "medical_report";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get data from the form
    // Your database connection code here

// Check for a successful connection

// Get data from the form
$patientID = $_POST["patientID"];
$remarkText = $_POST["remarkText"];
$remarkDate = $_POST["remarkDate"];

// Insert data into the patient_remarks table
$sql = "INSERT INTO patient_remarks (PatientID, RemarkText, RemarkDate) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("iss", $patientID, $remarkText, $remarkDate);

    if ($stmt->execute()) {
        header("Location: rem.php");
    } else {
        echo "Error executing the query: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error preparing the query: " . $conn->error;
}

$conn->close();
} else {
    header("Location: login.php"); // Redirect to the login page if the user is not logged in
    exit();
}
?>
