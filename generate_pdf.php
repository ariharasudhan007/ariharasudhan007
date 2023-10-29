<?php
// Include the FPDF library
require('fpdf/fpdf.php');

if (isset($_GET['PatientID'])) {
    $patientID = $_GET['PatientID'];

    // Your database connection code here
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "medical_report";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch patient details from the database based on $patientID
    $sql = "SELECT * FROM patients WHERE PatientID = $patientID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Create a PDF
        $pdf = new FPDF();
        $pdf->AddPage();

        // Set font and size for the title
        $pdf->SetFont('Arial', 'B', 16);

        // Set text color for the title (e.g., blue)
        $pdf->SetTextColor(0, 0, 255);

        // Output the title with a centered alignment
        $pdf->Cell(0, 10, 'Patient Details', 0, 1, 'C');

        // Set the background color for the title (e.g., light gray)
        $pdf->SetFillColor(192, 192, 192);

        // Output a filled rectangle to act as a background for the title
        $pdf->Cell(0, 10, '', 0, 1, 'C', true);

        // Set the text color back to black for content
        $pdf->SetTextColor(0, 0, 0);

        // Output patient details with a left alignment
        $pdf->Cell(0, 10, 'Patient ID: ' . $row['PatientID'], 0, 1);
        $pdf->Cell(0, 10, 'First Name: ' . $row['FirstName'], 0, 1);
        $pdf->Cell(0, 10, 'Last Name: ' . $row['LastName'], 0, 1);
        $pdf->Cell(0, 10, 'Date of Birth: ' . $row['DateOfBirth'], 0, 1);
        $pdf->Cell(0, 10, 'Gender: ' . $row['Gender'], 0, 1);
        $pdf->Cell(0, 10, 'Contact Number: ' . $row['ContactNumber'], 0, 1);
        $pdf->Cell(0, 10, 'Address: ' . $row['Address'], 0, 1);

        // Add some spacing
        $pdf->Ln(10);

        // Set font and size for the invoice section
        $pdf->SetFont('Arial', 'B', 14);

        // Set text color for the invoice section (e.g., green)
        $pdf->SetTextColor(0, 128, 0);

        // Output the invoice section title with a left alignment
        $pdf->Cell(0, 10, 'Hospital Invoice', 0, 1, 'L');

        // Set the text color back to black for content
        $pdf->SetTextColor(0, 0, 0);

        // Output invoice details with a left alignment
        $pdf->Cell(0, 10, 'Invoice Date: ' . date('Y-m-d'), 0, 1);
        $pdf->Cell(0, 10, 'Due Date: ' . date('Y-m-d', strtotime('+30 days')), 0, 1);

        // Add some spacing
        $pdf->Ln(10);

        // Retrieve patient remarks from the database based on $patientID
        $remarksSql = "SELECT RemarkText, RemarkDate FROM patient_remarks WHERE PatientID = $patientID";
        $remarksResult = $conn->query($remarksSql);

        if ($remarksResult->num_rows > 0) {
            // Set font and size for the remarks section
            $pdf->SetFont('Arial', 'B', 14);

            // Set text color for the remarks section (e.g., orange)
            $pdf->SetTextColor(255, 128, 0);

            // Output the remarks section title with a left alignment
            $pdf->Cell(0, 10, 'Patient Remarks', 0, 1, 'L');

            // Set the text color back to black for content
            $pdf->SetTextColor(0, 0, 0);

            // Output patient remarks with a left alignment
            while ($remarkRow = $remarksResult->fetch_assoc()) {
                $pdf->Cell(0, 10, 'Remark Date: ' . $remarkRow['RemarkDate'], 0, 1);
                $pdf->MultiCell(0, 10, 'Remark Text: ' . $remarkRow['RemarkText'], 0, 'L');
            }
        }

        // Calculate and output the total
        $pdf->SetXY(150, 190); // Adjust the X and Y coordinates as needed
        $pdf->Cell(0, 10, 'Consulted by Ariharasudhan P', 0, 1, 'R');

        // Output the PDF
        $pdf->Output('Patient_Invoice.pdf', 'D'); // 'D' to force download
    } else {
        echo "Patient not found.";
    }

    $conn->close();
}
?>
