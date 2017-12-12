<?php
require('../fpdf.php');
session_start();
require_once("dbcontroller.php");

if(isset($_GET['payment_no'])   && isset($_GET['customer'])  && isset($_GET['amountopay'])  && isset($_GET['amount'])  )
{
	$payment_no=$_GET['payment_no'];
$customer = $_GET['customer'];
$amountopay= $_GET['amountopay'];
$amount=$_GET['amount'];



}

class PDF extends FPDF
{
// Load data
function LoadData($file)
{
	// Read file lines
	$lines = file($file);
	$data = array();
	foreach($lines as $line)
		$data[] = explode(';',trim($line));
	return $data;
}

function Header()
{

	// Logo
	//$this->Image('logo.png',10,6,30);
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Move to the right
	$this->Cell(80);
	// Title
	$this->Cell(35,10,'Fareal Builders Inc.',0,0,'C');
    $this->SetFont('Arial','',9);
	$this->Cell(-35,25,'1208 K8th., East Kamias',0,0,'C');
	$this->Cell(35,35,'Quezon City',0,0,'C');
	// Line break
	$this->Ln(10); 
	$this->SetFont('Arial','',10);
	$this->SetX($this->lMargin);
	$this->Text(148,37,'Payment No.',0,0,'l');
	$this->SetFont('Arial','u',11);
	$this->Text(170,37,''.$_GET['payment_no'].'',0,0,'l');

	$this->Ln(30); 
	$this->SetFont('Arial','B',11);
	$this->Text(15,45,'___________________________________________________________________________________',0,0,'C');
	 $this->Ln(10); 
    $this->SetFont('Arial','B',20);
    $this->Text(90,54,'Payment',0,0,'C');
	  $this->Ln(10); 
	  $this->SetFont('Arial','B',11);
	$this->Text(15,57,'___________________________________________________________________________________',0,0,'C');
	$this->SetFont('Arial','',11);
	$this->Text(15,68,'Customer :',0,0,'C');
	$this->SetFont('Arial','u',11);
$this->Text(35,68,''.$_GET['customer'].'',0,0,'C');
	$this->SetFont('Arial','',11);

}


// Simple table
function BasicTable($header, $data)
{


	// Column widths
	$w = array(20,90,80);
	// Header
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],8,$header[$i],1,0,'C');
	$this->Ln();
	// Data
	
	$this->Cell($w[0],6,''.$_GET['payment_no'].'',1,0,'C');
	$this->Cell($w[1],6,''.$_GET['amountopay'].'',1,0,'C');
	$this->Cell($w[2],6,''.$_GET['amount'].'',1,0,'C');




}


function Footer()
{  $item_total = 0;

	$a= $_GET['amountopay'];
	$b= $_GET['amount'];
	$item_total= $a - $b;
    $c = '&#8369;';
    $d = iconv('UTF-8', 'ISO-8859-1', $c);
	// Position at 1.5 cm from bottom
	$this->SetY(-15);


	$this->SetFont('Arial','',11);
	$this->Text(135,130,'Total Amount :',0,0,'C');
	$this->SetFont('Arial','u',11);
	$this->Text(165,130,'Php'.number_format((float)$b, 2, '.', '').'',0,0,'l');

	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Page number
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
// Column headings
$header = array('Payment No.', 'Total Cost', 'Amount to Pay');
// Data loading
$data = $pdf->LoadData('countries.txt');
$pdf->SetFont('Arial','',10);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->BasicTable($header,$data);
$pdf->Output();

?>
 