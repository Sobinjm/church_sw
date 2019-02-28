<?php
require('barcode-fpdf.php');
include('db_info.php');

$pdf=new PDF_Code39();
$pdf->AddPage();
// $pdf->Code39(80,40,'CODE 39',1,10);
// $pdf->Output();
$cat=22;



 $results = $db->query("SELECT *,fm.id as m_id from family_members fm inner join family_list fl on fm.family_id=fl.family_id inner join place p on p.id=fl.place where fl.family_status=1 and (fl.family_type=0 or fl.family_type=1) order by fl.family_type,p.english" );

// echo "SELECT * from family_members where  ((strftime('%m-%d',do_birth) > strftime('%m-%d','".$from."')) and (strftime('%m-%d',do_birth) < strftime('%m-%d','".$to."')))";
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
$y=5;
$i=0;
$j=0;
$pdf->AddFont('tamil','','tamil.ttf',true);
    $pdf->SetFont('tamil','',9);
while ($row = $results->fetchArray()) {
    // $ini=getInt($row['member_id']);
    $place_id=getPlaceId($row['family_id']);
    $place=getPlace($place_id);
    $pdf->SetFont('tamil','',9);
    //$pdf->Cell(50,6,$row['family_head']);
// foreach($result as $row) {


if($i==4)
{
    $i=0;
    $y+=25;
    $x=10;
}
if($j==44)
{
    $pdf->AddPage();
    $x=10;
$y=5;
$i=0;
$j=0;

}
else{


}
$pdf->SetXY($x, $y);
$pdf->SetFont('Arial','',9);
$len=strlen($row['title'].' '.str_replace('.',' ',strtoupper($row['ini'])).' ');
// echo str_replace('.',' ',strtoupper($row['ini']));
// echo '<br>';
$pdf->Cell($len*2,6,$row['title'].' '.str_replace('.',' ',strtoupper($row['ini'])).' ');
$pdf->SetFont('tamil','',9);
$pdf->SetXY($x+($len*2), $y);
$len2=strlen($row['m_name_t']);
$pdf->Cell($len2*2,6,$row['m_name_t']);
$pdf->SetXY($x, $y+4);
$pdf->Cell(50,6,$place);
$pdf->SetXY($x, $y+4);
// $pdf->SetFont('Arial','',9);
// $pdf->Cell(50,6,'f-id:'.$row['family_id']);
$pdf->Code39($x,$y+10,$row['family_id'].'-'.$cat.'-'.$row['m_id'],0.4,4);
// $pdf->Cell(60,6,$x.$y,1);
$i++;
$j++;
$x+=50;

// foreach($row as $column=>$item)
// {
//  if (is_int($colu 
}

$fileout="xmas-barcode.pdf";
// $pdf->Output( $fileout,'D');
$pdf->Output();
?>
<?php


function getPlace($id)
{
    $op='';
    $db1 = new MyDB();
     $results1 = $db1->query("SELECT tamil from place where id=$id");
     // echo "SELECT tamil from place where id=".$id;
     while ($row1 = $results1->fetchArray()) {

        $op= $row1['tamil'];
     }
     $db1->close();
     return $op;
     // $db1->close();

}
function getPlaceId($id)
{
    $op='';
    $db1 = new MyDB();
     $results1 = $db1->query("SELECT place from family_list where family_id='$id'");
     // echo "SELECT tamil from place where id=".$id;
     while ($row1 = $results1->fetchArray()) {

        $op= $row1['place'];
     }
     $db1->close();
     return $op;
     // $db1->close();

}


?>