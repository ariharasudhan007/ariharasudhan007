<?php
// Include the PHPExcel library
require_once('PHPExcel/Classes/PHPExcel.php');

// Your database connection code here
$host = "localhost";
$username = "root";
$password = "";
$database = "medical_report";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create a new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Your Name")
    ->setLastModifiedBy("Your Name")
    ->setTitle("Patient Details with Remarks")
    ->setSubject("Patient Details with Remarks")
    ->setDescription("Patient details and remarks exported from Jayam Hospital")
    ->setKeywords("excel export patient remarks")
    ->setCategory("Patient Data");

// Create a new worksheet
$objPHPExcel->setActiveSheetIndex(0);
$worksheet = $objPHPExcel->getActiveSheet();

// Define the columns
$worksheet->setCellValue('A1', 'Patient ID');
$worksheet->setCellValue('B1', 'First Name');
$worksheet->setCellValue('C1', 'Last Name');
$worksheet->setCellValue('D1', 'Date of Birth');
$worksheet->setCellValue('E1', 'Gender');
$worksheet->setCellValue('F1', 'Contact Number');
$worksheet->setCellValue('G1', 'Address');
$worksheet->setCellValue('H1', 'Remarks');

// Fetch patient details and remarks from the database
$sql = "SELECT patients.*, patient_remarks.RemarkText FROM patients
        LEFT JOIN patient_remarks ON patients.PatientID = patient_remarks.PatientID";
$result = $conn->query($sql);

$rowNum = 2; // Start from the second row

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $worksheet->setCellValue('A' . $rowNum, $row["PatientID"]);
        $worksheet->setCellValue('B' . $rowNum, $row["FirstName"]);
        $worksheet->setCellValue('C' . $rowNum, $row["LastName"]);
        $worksheet->setCellValue('D' . $rowNum, $row["DateOfBirth"]);
        $worksheet->setCellValue('E' . $rowNum, $row["Gender"]);
        $worksheet->setCellValue('F' . $rowNum, $row["ContactNumber"]);
        $worksheet->setCellValue('G' . $rowNum, $row["Address"]);
        $worksheet->setCellValue('H' . $rowNum, $row["RemarkText"]);

        $rowNum++;
    }
}

// Set the content type and file name
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="patient_details_with_remarks.xlsx"');

// Write the Excel file to the browser
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');

// Clean up and close the database connection
$conn->close();

// Exit the script
exit();
?>
