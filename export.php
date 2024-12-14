<?php
session_start();
include ('con1.php');
require_once('TCPDF/tcpdf.php');

// export.php
if(isset($_GET["export"])) 
{  
    $cla = $_SESSION['cla'];
    // Use prepared statement to prevent SQL injection
    $query = "SELECT  `regno`,`name`,`classname`,`did` FROM nmeclass WHERE classname = ?";  
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $cla);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename='.$cla.'.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('SNo', 'Register Number', 'Student Name', 'NME class', 'Department ID'));  

    $serialNumber = 1;

    while($row = mysqli_fetch_assoc($result))  
    {  
        fputcsv($output, array($serialNumber, $row['regno'], $row['name'], $row['classname'], $row['did']));  
        $serialNumber++;
    }  

    fclose($output);  
    exit; 
}  

if(isset($_GET["export1"])) 
{  
    $cla = $_SESSION['cla'];
    // Use prepared statement to prevent SQL injection
    $query = "SELECT  `regno`,`name`,`classname`,`did` FROM nmeclass WHERE classname = ?";  
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $cla);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $pdf = new TCPDF();
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf->AddPage();

    // Set column widths
    $colWidths = array(20, 40, 50, 40, 40);

    // Set table headers
    $pdf->SetFont('times', 'B', 12);
    $pdf->Cell($colWidths[0], 10, 'SNo', 1, 0, 'C');
    $pdf->Cell($colWidths[1], 10, 'Register Number', 1, 0, 'C');
    $pdf->Cell($colWidths[2], 10, 'Student Name', 1, 0, 'C');
    $pdf->Cell($colWidths[3], 10, 'NME class', 1, 0, 'C');
    $pdf->Cell($colWidths[4], 10, 'Department ID', 1, 1, 'C');

    // Set table data
    $serialNumber = 1;

    while ($row = mysqli_fetch_assoc($result)) {
        $pdf->Cell($colWidths[0], 10, $serialNumber, 1, 0, 'C');
        $pdf->Cell($colWidths[1], 10, $row['regno'], 1, 0, 'C');
        $pdf->Cell($colWidths[2], 10, $row['name'], 1, 0, 'C');
        $pdf->Cell($colWidths[3], 10, $row['classname'], 1, 0, 'C');
        $pdf->Cell($colWidths[4], 10, $row['did'], 1, 1, 'C');
        $serialNumber++;
    }

    // Output PDF to browser for download
    $pdf->Output($cla.'.pdf', 'D');
    exit;
}
?>
