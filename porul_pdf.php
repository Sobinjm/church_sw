<?php
//include connection file 
include("db_info.php");
include('libs/tfpdf.php');

header('Content-Type: text/html;charset=utf-8');
class PDF extends tFPDF
{
// Page header
function Header()
{
    // Logo
    // $this->Image('logo.png',10,-1,70);
    // $this->SetFont('tamil');

    $this->AddFont('tamil','','tamil.ttf',true);
    $this->SetFont('tamil','',14);
    // Move to the right
    $this->Cell(80);
    $this->SetX(10);
    $this->SetY(5);
    $this->SetFontSize(16);
    // Title
    $this->Cell(0,10,'                  '.'rp.v!;.I. nrfu rig KGf;nfhL  - kndhfur; re;ij',0);
    $this->Ln();
     $this->SetFont('Arial','',14);
     if(isset($_GET['dat']))
     {
    $this->Cell(0,6,date('d-M-Y', strtotime($_GET['date'])),0,0,'C');
}elseif(isset($_GET['from'])&&isset($_GET['to']))
{
    $this->Cell(0,6,date('d-M-Y', strtotime($_GET['from'])).' - '.date('d-M-Y', strtotime($_GET['to'])),0,0,'C');
}
    // Line break
    $this->Ln(15);
    $this->SetFontSize(6);
    $this->SetFont('Arial','',8);
    $this->Cell(10,6,'R.No',1,0,'C');
    $this->Cell(65,6,'Name',1);
    $this->Cell(45,6,'Place',1);
    $this->Cell(35,6,'Item',1);
    $this->Cell(15,6,'Count',1,0,'C');
    $this->Cell(20,6,'Amount',1,0,'C');

    $this->Ln();
    
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
if(isset($_GET['date']))
{
 $results = $db->query("SELECT pr.*,fl.t_area,fl.family_head,fl.head_id from porul_receipt pr inner join family_list fl on pr.family_id=fl.family_id where pr.date>='".$_GET['date']."' order by fl.family_order ASC");
}
elseif (isset($_GET['from'])&&isset($_GET['to'])) {
    $results = $db->query("SELECT pr.*,fl.t_area,fl.family_head,fl.head_id from porul_receipt pr inner join family_list fl on pr.family_id=fl.family_id where pr.date>='".$_GET['from']."' AND  pr.date<='".$_GET['to']."' order by fl.family_order ASC");
}
// elseif(isset($_GET[]))

// $db = new dbObj();
// $connString =  $db->getConnstring();
// $display_heading = array('id'=>'ID', 'employee_name'=> 'Name', 'employee_age'=> 'Age','employee_salary'=> 'Salary',);
 
// $result = mysqli_query($connString, "SELECT id, employee_name, employee_age, employee_salary FROM employee") or die("database error:". mysqli_error($connString));
// $header = mysqli_query($connString, "SHOW columns FROM employee");
 
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',8);
// $pdf->Ln();
$old_fid='';

$j=0;
$total_amount=0;
while ($row = $results->fetchArray()) {
    $ini=getInt($row['head_id']);
    $j++;
    $item_name=explode('~', $row['item_name']);
    $item_count=explode('~', $row['item_count']);
    $item_amount=explode('~', $row['amount']);
    $length=sizeof($item_name);
    
    // $family_id=$row['family_id'];
// foreach($result as $row) {
    for($i=1;$i<$length;$i++)
    {


    
if($row['family_id']!=$old_fid)
{
$pdf->SetFont('Arial','',8);
$pdf->Cell(10,6,$j,'T L B R',0, 'C');
$pdf->SetFont('Arial','',8);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,6,$ini,'T,B');
$pdf->SetFont('tamil','',12);
$pdf->Cell(55,6,$row['family_head'],'T,B,R');
$pdf->SetFont('Arial','',8);
// $pdf->Cell(10,6,'','L,T,B');
$pdf->SetFont('tamil','',10);
$pdf->Cell(45,6,$row['t_area'],'T,B,R');
$pdf->Cell(35,6,str_replace("''", "'",$item_name[$i]),1);
$pdf->SetFont('Arial','',8);
$pdf->Cell(15,6,$item_count[$i],1,0,'C');
$pdf->Cell(20,6,$item_amount[$i].'.00',1,0,'R');
$pdf->Ln();
$old_fid=$row['family_id'];
$total_amount=$total_amount+$item_amount[$i];
}
else{
$pdf->SetFont('Arial','',8);
$pdf->Cell(10,6,'','L');
$pdf->SetFont('Arial','',8);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,6,'',0);
$pdf->SetFont('tamil','',12);
$pdf->Cell(55,6,'',0);
$pdf->SetFont('Arial','',8);
// $pdf->Cell(10,6,'','L,T,B');
$pdf->SetFont('tamil','',10);
$pdf->Cell(45,6,'',0);
$pdf->Cell(35,6,str_replace("''", "'",$item_name[$i]),'B R L');
$pdf->SetFont('Arial','',8);
$pdf->Cell(15,6,$item_count[$i],'B',0,'C');
$pdf->Cell(20,6,$item_amount[$i].'.00',1,0,'R');
$total_amount=$total_amount+$item_amount[$i];
// $pdf->Cell(7,6,'','L,T,B');
$pdf->Ln();
}
}

}

$pdf->Cell(125,8,"",'T L B',0,'R');
$pdf->Cell(45,8,"Total ",'T B',0,'R');
$pdf->Cell(20,8,$total_amount.'.00',1,0,'R');












$pdf->Output();
?>

<?php

function getInt($id)
{
    $op='';
    $db1 = new MyDB();
     $results1 = $db1->query("SELECT * from family_members where member_id='$id'");
     while ($row1 = $results1->fetchArray()) {

        $op= $row1['title'].' '.$row1['ini'];
     }
     $db1->close();
     return $op;
     // $db1->close();

}

function getFamilyType($id)
{
    $op='';
    $db1 = new MyDB();
     $results1 = $db1->query("SELECT * from family_category where id='$id'");
     while ($row1 = $results1->fetchArray()) {

        $op= substr($row1['english'], 0, 3);
     }
     $db1->close();
     return $op;
     

}

function getPlaceE($id)
{
    $op='';
    $db1 = new MyDB();
     $results1 = $db1->query("SELECT * from place where id='$id'");
     while ($row1 = $results1->fetchArray()) {

        $op= $row1['english'];
     }
     $db1->close();
     return $op;
     // $db1->close();

}
?>