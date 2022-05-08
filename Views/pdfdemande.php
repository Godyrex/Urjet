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
    $this->Cell(80,10,'Demande list',1,0,'C');
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
$display_heading = array('IDdemande'=>'IDdemande', 'diagnostic'=> 'diagnostic', 'urgence'=> 'urgence','type'=> 'type','descriptionpanne'=> 'descriptionpanne','id_avion'=> 'id_avion',);
 
$sql =  "SELECT IDdemande,diagnostic,urgence,type,descriptionpanne,id_avion From demande ";
$result=$con->prepare($sql);
$result->execute();
$sqll = "SHOW columns FROM demande";

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