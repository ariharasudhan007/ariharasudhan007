<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the form
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $dateOfBirth = $_POST["dateOfBirth"];
    $gender = $_POST["gender"];
    $contactNumber = $_POST["contactNumber"];
    $address = $_POST["address"];

    // Perform database connection (replace with your database credentials)
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "medical_report";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL INSERT statement
    $sql = "INSERT INTO patients (FirstName, LastName, DateOfBirth, Gender, ContactNumber, Address) 
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $firstName, $lastName, $dateOfBirth, $gender, $contactNumber, $address);

    if ($stmt->execute()) {
        echo "Registration successful.";
    } else {
        echo "Error: " . $conn->error;
    }
    header("Location: home.php");
    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
