<?php
require('barcode-fpdf.php');
include('db_info.php');



$pdf=new PDF_Code39();
$pdf->AddPage();
// $pdf->Code39(80,40,'CODE 39',1,10);
// $pdf->Output();
$cat=6;
$from=$_GET['from'];
$to=$_GET['to'];



$results = $db->query("SELECT * from family_members where  ((strftime('%m-%d',do_birth) > strftime('%m-%d','".$from."')) and (strftime('%m-%d',do_birth) < strftime('%m-%d','".$to."')))");

// $results = $db->query("SELECT * from family_members");
// echo "SELECT * from family_members where  ((strftime('%m-%d',do_birth) > strftime('%m-%d','".$from."')) and (strftime('%m-%d',do_birth) < strftime('%m-%d','".$to."')))";
// echo "SELECT * from family_members where  ((strftime('%m-%d',do_birth) > strftime('%m-%d','".$from."')) and (strftime('%m-%d',do_birth) < strftime('%m-%d','".$to."')))";

$x=5;
$y=5;
$i=0;
$j=0;
$pdf->AddFont('tamil','','tamil.ttf',true);
    $pdf->SetFont('tamil','',10);
while ($row = $results->fetchArray()) {
    // $ini=getInt($row['member_id']);
     $place_id=getPlaceId($row['family_id']);

    $place=getPlace($place_id);
      // echo ' ====<span class="tamil">'.$place.'</span>====='.$row['member_name'].'<br> ';
    $pdf->SetFont('tamil','',10);
    //$pdf->Cell(50,6,$row['family_head']);
// foreach($result as $row) {


if($i==4)
{
	$i=0;
	$y+=32;
	$x=5;
}
if($j==36)
{
	$pdf->AddPage();
	$x=5;
$y=5;
$i=0;
$j=0;

}
else{


}
$pdf->SetXY($x, $y);
$pdf->SetFont('Arial','',10);
$pdf->Cell(10,6,$row['title'].' '.$row['ini']);
$pdf->SetFont('tamil','',10);
$pdf->SetXY($x+11, $y);
$pdf->Cell(39,6,$row['m_name_t']);
$pdf->SetXY($x, $y+4);
$pdf->Cell(50,6,$place);
$pdf->Code39($x,$y+10,$row['family_id'].'-'.$cat.'-'.$row['id'],0.5,5);
// $pdf->Cell(60,6,$x.$y,1);
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
$fileout="Birthday-barcode.pdf";
$pdf->Output( $fileout,'D');
?>
<?php


function getPlace($id)
{
	$op='';
    $db1 = new MyDB();
    if($id!='')
    {
     $results1 = $db1->query("SELECT tamil from place where id=$id");
     // echo "<br>SELECT tamil from place where id=".$id;
     while ($row1 = $results1->fetchArray()) {

        $op= $row1['tamil'];
     }
     $db1->close();
     return $op;
 }
 else{
    return 0;
 }
     
     // $db1->close();

}
function getPlaceId($id)
{
    $op='';
    $db11 = new MyDB();
     $results12 = $db11->query("SELECT place from family_list where family_id='$id'");
     // echo "SELECT tamil from place where id=".$id;
     while ($row1 = $results12->fetchArray()) {

        $op= $row1['place'];
     }
     $db11->close();
     return $op;
     // $db1->close();

}


?>