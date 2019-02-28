<?php
//include connection file 
//include("db_info.php");
//include("../libs/tfpdf.php")
include('fpdf-barcode.php');

header('Content-Type: text/html;charset=utf-8');
// class PDF extends tFPDF
// {
// // Page header
// function Header()
// {
//     // Logo
//     // $this->Image('logo.png',10,-1,70);
//     // $this->SetFont('tamil');
//     $this->AddFont('tamil','','tamil.ttf',true);
//     $this->SetFont('tamil','',14);
//     // Move to the right
//     $this->Cell(80);
//     // Title
//     $this->Cell(80,10,'ghij',1,0,'C');
//     // Line break
//     $this->Ln(20);
// }
 
// // Page footer
// function Footer()
// {
//     // Position at 1.5 cm from bottom
//     $this->SetY(-15);
//     // Arial italic 8
//     $this->SetFont('Arial','I',8);
//     // Page number
//     $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
// }
// }
// $results = $db->query("SELECT * from family_list ");
// $db = new dbObj();
// $connString =  $db->getConnstring();
// $display_heading = array('id'=>'ID', 'employee_name'=> 'Name', 'employee_age'=> 'Age','employee_salary'=> 'Salary',);
 
// $result = mysqli_query($connString, "SELECT id, employee_name, employee_age, employee_salary FROM employee") or die("database error:". mysqli_error($connString));
// $header = mysqli_query($connString, "SHOW columns FROM employee");
 
$pdf = new PDF_BARCODE('P','mm','A4');
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',8);
// $pdf->SetFont('tamil','',14);
// foreach($header as $heading) {
// $pdf->Cell(40,12,$display_heading[$heading['Field']],1);
// }
// $results->fetchArray();
// while ($result = $results->fetchArray()) {
// // $result = $results->fetchArray();
// print_r($result);
// }
$pdf->EAN13(10,10,'1234-0',5,1,9);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,6,'S.No',1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(20,6,'Family Id',1);
$pdf->Cell(10,6,'','L,T,B');
$pdf->Cell(50,6,'Family Head','R,T,B');
$pdf->Cell(60,6,'Place',1);
// while ($row = $results->fetchArray()) {
//     $ini=getInt($row['head_id']);
// // foreach($result as $row) {
// $pdf->Ln();
// $pdf->SetFont('Arial','B',8);
// $pdf->Cell(10,6,$row['id']-1,1);
// $pdf->SetFont('Arial','B',8);
// $pdf->Cell(20,6,$row['family_id'],1);
// $pdf->Cell(10,6,$ini,'L,T,B');
// $pdf->SetFont('tamil','',14);
// $pdf->Cell(50,6,$row['family_head'],'R,T,B');
// $pdf->SetFont('tamil','',14);
// $pdf->Cell(60,6,$row['t_area'],1);
// // foreach($row as $column=>$item)
// // {
// //  if (is_int($column)) {
// //      $pdf->Cell(30,6,$item,1);
// //  }
// // }
// }

$pdf->Output();
?>

<?php

// function getInt($id)
// {
//     $db1 = new MyDB();
//      $results1 = $db1->query("SELECT * from family_members where member_id='$id'");
//      while ($row1 = $results1->fetchArray()) {

//         $op= $row1['title'].' '.$row1['ini'];
//      }
//      return $op;
//      $db1->close();

// }


?>