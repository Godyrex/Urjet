<?php
//include connection file
include '../Controller/avionc.php';
include_once('fpdf.php');
 
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('logo.png',10,-1,70);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'avion List',1,0,'C');
    // Line break
    $this->Ln(20);
}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
 
$con = config::getConnexion();
$display_heading = array('id'=>'ID', 'nom'=> 'nom', 'prix'=> 'prix','photo'=> 'photo','idtype'=> 'idtype',);
 
$sql =  "SELECT id,nom,prix,photo,idtype From avion ";
$result=$con->prepare($sql);
$result->execute();
$sqll = "SHOW columns FROM avion";

$header = $con->prepare($sqll);
$header->execute();
 
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
foreach($header as $heading) {
$pdf->Cell(40,12,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(40,12,$column,1);
}
$pdf->Output();
?>