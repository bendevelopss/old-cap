<?php
require('mysql_table.php');
$_SESSION["date"] = date("Y-m-d");

class PDF extends PDF_MySQL_Table
{
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

	$this->SetFont('Arial','B',11);
	$this->Text(15,45,'___________________________________________________________________________________',0,0,'C');
	 $this->Ln(10); 
    $this->SetFont('Arial','B',20);
    $this->Text(80,54,'Inventory Report',0,0,'C');
	  $this->Ln(10); 
	  $this->SetFont('Arial','B',11);
	$this->Text(15,57,'___________________________________________________________________________________',0,0,'C');
  $this->SetFont('Arial','',11);
  $this->Text(15,65,'Date :',0,0,'C');
  $this->SetFont('Arial','u',11);
  $this->Text(32,65,''.$_SESSION['date'].'',0,0,'C');
  $this->Ln(50); 
}
function Footer()
{  
  // Position at 1.5 cm from bottom
  $this->SetY(-15);
  $this->SetFont('Arial','I',8);
  // Page number
  $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

//Connect to database
mysqli_connect('localhost','root','',);
mysql_select_db('projectmonitoring');


$pdf=new PDF();
$pdf->AddPage();
$pdf->AddCol('category',20,'','Category','C');
$pdf->AddCol('scategory_name',20,'Subcategory','C');
$pdf->AddCol('description',20,'','Description','C');
$pdf->AddCol('brand_name',20,'Brand','C');
$pdf->AddCol('color',20,'','Color','C');
$pdf->AddCol('package',20,'Package','C');
$pdf->AddCol('unit_measurement',20,'Measurement','C');
$pdf->AddCol('abbre',20,'Unit','C');
$pdf->AddCol('quantity',20,'','Quantity','C');
$pdf->AddCol('price',20,'Price','C');
//First table: put all columns automatically
$pdf->Table('select category, scategory_name, description, brand_name, color, package, unit_measurement, abbre, quantity, price from materials');
$pdf->SetFont('Arial','',10);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Output();

?>