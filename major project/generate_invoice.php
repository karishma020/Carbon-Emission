<?php
require('fpdf/fpdf.php'); // Download FPDF library and place it in the project folder

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carbon_emission_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_GET['email'];

$sql = "SELECT * FROM fines WHERE email = '$email'";
$result = $conn->query($sql);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 10, 'Carbon Emission Fine Invoice', 1, 1, 'C');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 10, 'Email:', 0, 0);
$pdf->Cell(140, 10, $email, 0, 1);

$pdf->Cell(50, 10, 'Date', 1, 0);
$pdf->Cell(50, 10, 'Ref. Number', 1, 0);
$pdf->Cell(50, 10, 'Amount', 1, 1);

$total = 0;
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(50, 10, $row['fine_date'], 1, 0);
    $pdf->Cell(50, 10, $row['ref_number'], 1, 0);
    $pdf->Cell(50, 10, $row['amount'], 1, 1);
    $total += $row['amount'];
}

$pdf->Cell(100, 10, 'Total Amount:', 1, 0);
$pdf->Cell(50, 10, $total, 1, 1);

$pdf->Output();
$conn->close();
?>
