<?php
if (isset($_GET['PatientID'])) {
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "medical_report";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use the PatientID from the URL to delete the patient
    $patientID = $_GET['PatientID'];

    $sql = "DELETE FROM patients WHERE PatientID = $patientID";
    if ($conn->query($sql) === TRUE) {
        echo "Patient deleted successfully.";
    } else {
        echo "Error deleting patient: " . $conn->error;
    }
    header("Location: home.php");
    $conn->close();
}
?>
