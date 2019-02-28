<?php
require('barcode-fpdf.php');
include('db_info.php');

$pdf=new PDF_Code39();
$pdf->AddPage();
// $pdf->Code39(80,40,'CODE 39',1,10);
// $pdf->Output();
$cat=$_GET['cat'];



 $results = $db->query("SELECT * from family_list where (family_type=0 OR family_type=1) and family_status=1");
// $db = new dbObj();
// $connString =  $db->getConnstring();
// $display_heading = array('id'=>'ID', 'employee_name'=> 'Name', 'employee_age'=> 'Age','employee_salary'=> 'Salary',);
 
// $result = mysqli_query($connString, "SELECT id, employee_name, employee_age, employee_salary FROM employee") or die("database error:". mysqli_error($connString));
// $header = mysqli_query($connString, "SHOW columns FROM employee");
 
// $pdf = new PDF();
//header
// $pdf->AddPage();
//foter page
// $pdf->AliasNbPages();
// $pdf->SetFont('Arial','B',8);
// $pdf->SetFont('tamil','',14);
// foreach($header as $heading) {
// $pdf->Cell(40,12,$display_heading[$heading['Field']],1);
// }
// $results->fetchArray();
// while ($result = $results->fetchArray()) {
// // $result = $results->fetchArray();
// print_r($result);
// }
// $pdf->SetFont('Arial','B',8);
// $pdf->Cell(10,6,'S.No',1);
// $pdf->SetFont('Arial','B',8);
// $pdf->Cell(20,6,'Family Id',1);
// $pdf->Cell(10,6,'','L,T,B');
// $pdf->Cell(50,6,'Family Head','R,T,B');
// $pdf->Cell(60,6,'Place',1);
$x=10;
$y=10;
$i=0;
$j=0;
$pdf->AddFont('tamil','','tamil.ttf',true);
    $pdf->SetFont('tamil','',9);
while ($row = $results->fetchArray()) {
    $ini=getInt($row['head_id']);
    $place=getPlace($row['place']);
    $pdf->SetFont('tamil','',9);
    //$pdf->Cell(50,6,$row['family_head']);
// foreach($result as $row) {


if($i==4)
{
	$i=0;
	$y+=31;
	$x=10;
}
if($j==36)
{
	$pdf->AddPage();
	$x=10;
$y=10;
$i=0;
$j=0;

}
else{


}
$pdf->SetXY($x, $y);
$pdf->SetFontSize(9);
$pdf->SetFont('arial','',9);
$len=strlen($ini);
if($len==0)
{
    $len=2;
}
$pdf->Cell($len*2,4,$ini,0);
$pdf->SetFont('tamil','',9);
$len2=strlen($row['family_head']);
$pdf->Cell($len2*2,4,$row['family_head'],0);
$pdf->SetXY($x, $y+3);
$pdf->SetFontSize(9);
$pdf->Cell(50,6,$place);

$pdf->Code39($x,$y+9,$row['family_id'].'-'.$cat,0.5,5);
// $x+=15;
$pdf->SetXY($x+15, $y+14);
$pdf->SetFont('Arial','',9);
$pdf->Cell(10,4,'f-id:'.$row['family_id']);


$i++;
$x+=50;

// foreach($row as $column=>$item)
// {
//  if (is_int($column)) {
//      $pdf->Cell(30,6,$item,1);
//  }
// }
$j++;
}

$fileout="default-cover-barcode.pdf";
$pdf->Output();
// $pdf->Output( $fileout,'D');
?>
<?php

function getInt($id)
{
    $op='';
    $db1 = new MyDB();
     $results1 = $db1->query("SELECT * from family_members where member_id='$id'");
     while ($row1 = $results1->fetchArray()) {

        $op= $row1['title'].' '.str_replace('.',' ',strtoupper($row1['ini'])).' ';
     }
     return $op;
     $db1->close();

}
function getPlace($id)
{
	$op='';
    $db1 = new MyDB();
    // echo "SELECT tamil from place where id=$id <br>" ;
     $results1 = $db1->query("SELECT tamil from place where id=$id");
     // echo "SELECT tamil from place where id=".$id;
     while ($row1 = $results1->fetchArray()) {

        $op= $row1['tamil'];
     }
     $db1->close();
     return $op;
     // $db1->close();

}


?>