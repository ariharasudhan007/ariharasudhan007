<?php
// Database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "medical_report";

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables to store form data
$firstName = "";
$lastName = "";
$dateOfBirth = "";
$gender = "";
$contactNumber = "";
$address = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $firstName = mysqli_real_escape_string($conn, $_POST["firstName"]);
    $lastName = mysqli_real_escape_string($conn, $_POST["lastName"]);
    $dateOfBirth = $_POST["dateOfBirth"];
    $gender = $_POST["gender"];
    $contactNumber = mysqli_real_escape_string($conn, $_POST["contactNumber"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);

    // Insert data into the database
    $sql = "INSERT INTO patients (FirstName, LastName, DateOfBirth, Gender, ContactNumber, Address) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $firstName, $lastName, $dateOfBirth, $gender, $contactNumber, $address);

    if ($stmt->execute()) {
        echo "Patient data inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>