<?php
require('../fpdf.php');
session_start();
require_once("dbcontroller.php");


$_SESSION["date"] = date("Y-m-d");



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

$db_handle = new DBController();

//$productByCode = $db_handle->runQuery("SELECT * FROM quotation_cart where quote_no= ".$_GET['id']." ");

$content2=mysql_query("SELECT * FROM quotation where quote_no= ".$_GET['id']." ");
$row=mysql_fetch_array($content2);

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
	$this->Text(145,37,'Purchase Order No.',0,0,'l');
	$this->SetFont('Arial','u',11);
	$this->Text(180,37,''.$_GET['po_no'].'',0,0,'l');

	$this->Ln(30); 
	$this->SetFont('Arial','B',11);
	$this->Text(15,45,'___________________________________________________________________________________',0,0,'C');
	 $this->Ln(10); 
    $this->SetFont('Arial','B',16);
    $this->Text(78,54,'Purchase Order',0,0,'C');
	  $this->Ln(10); 
	  $this->SetFont('Arial','B',11);
	$this->Text(15,57,'___________________________________________________________________________________',0,0,'C');

	$this->SetFont('Arial','',11);
	$this->Text(15,74,'Supplier :',0,0,'C');
	$this->SetFont('Arial','u',11);
	$this->Text(32,74,''.$_GET['customer'].'',0,0,'C');
	$this->SetFont('Arial','',11);
	$this->Text(162,74,'Date :',0,0,'C');
	$this->SetFont('Arial','u',11);
	$this->Text(174,74,''.$_GET['date'].'',0,0,'C');
	$this->SetFont('Arial','',11);
	$this->Ln(20); 
}


// Simple table
function BasicTable($header, $itemArray)
{


    $this->Ln(10);
  // Column widths
  $w = array(30,30,23,77,25);
  // Header
  for($i=0;$i<count($header);$i++)
    $this->Cell($w[$i],7,$header[$i],1,0,'C');
  $this->Ln();
  // Data


$db_handle = new DBController();

$productByCode = $db_handle->runQuery("SELECT * , SUM(quantity) as total FROM purchase_cart where po_no= ".$_GET['po_no']." group by material_no");
/*$itemArray = array($productByCode[1]["code"]=>array('category'=>$productByCode[1]["category"], 'scategory_name'=>$productByCode[1]["scategory_name"], 'brand_name'=>$productByCode[1]["brand_name"], 'description'=>$productByCode[1]["description"], 'color'=>$productByCode[1]["color"], 'package'=>$productByCode[1]["package"], 'unit_measurement'=>$productByCode[1]["unit_measurement"], 'abbre'=>$productByCode[1]["abbre"], 'price'=>$productByCode[1]["price"], 'quantity'=>$productByCode[1]["quantity"]));*/


  foreach($productByCode as $item)
  {

    $this->Cell($w[0],6,''.$item['brand_name'].'',1);
    $this->Cell($w[1],6,''.$item['category'].'',1);
    $this->Cell($w[2],6,''.$item['scategory_name'].'',1);
    $this->Cell($w[3],6,''.$item['description'].' / '.$item['color'].' / '.$item['package'].' / '.$item['unit_measurement'].''.$item['abbre'].'',1);
    $this->Cell($w[4],6,''.$item['total'].'',1);

    $this->Ln();
  }
  $this->Cell(array_sum($w),0,'','T');
}



function Footer()
{  $item_total = 0;
	
    $this->SetY(-15);
    $this->SetFont('Arial','',11);
	$this->Text(15,250,'Prepared by :',0,0,'C');
	$this->SetFont('Arial','u',11);
	$this->Text(15,260,''.$_GET['prepared'].'',0,0,'l');
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Page number
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
// Column headings
$header = array('Brand','Category', 'Sub-category','Description(Color, Package, Unit Measurement)','Quantity');
// Data loading
$data = $pdf->LoadData('countries.txt');
$pdf->SetFont('Arial','',10);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->BasicTable($header,$data);
$pdf->Output();

?>
 