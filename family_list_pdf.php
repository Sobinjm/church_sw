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
    $this->Cell(0,10,'                      '.'rp.v!;.I. nrfu rig KGf;nfhL  - cWg]gpdu] gl]loay]',0);
    // Line break
    $this->Ln(10);
    $this->SetFontSize(6);
    $this->SetFont('Arial','',8);
    $this->Cell(10,6,'S.No','L,T,B');
    $this->Cell(10,6,'F.No','T,B');
    $this->Cell(54,6,'Name','T,B');
    $this->Cell(44,6,'Place','T,B');
    $this->Cell(18,6,'Birth','T,B');
    $this->Cell(18,6,'Baptism','T,B');
    $this->Cell(18,6,'Communion','T,B');
    $this->Cell(18,6,'Marriage','T,B,R');
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
 $results = $db->query("SELECT * from family_list inner join place p on p.id=family_list.place where family_list.family_type=0 and family_list.family_status=1 order by p.english");

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

$j=1;
while ($row = $results->fetchArray()) {
    $ini=getInt($row['head_id']);
    
    $family_type=getFamilyType($row['family_type']);
    $family_id=$row['family_id'];
// foreach($result as $row) {

$pdf->SetFont('Arial','',8);
$pdf->Cell(15,6,$row['family_id'],1);
$pdf->SetFont('Arial','',8);
$pdf->Cell(25,6,'Family Head -','L,T,B');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,6,$ini,'T,B');
$pdf->SetFont('tamil','',12);
$pdf->Cell(50,6,$row['family_head'],'T,B,R');
$pdf->SetFont('Arial','',8);
// $pdf->Cell(10,6,'','L,T,B');
$pdf->SetFont('tamil','',10);
$pdf->Cell(60,6,$row['t_area'],'T,B,R');
$pdf->SetFont('Arial','',8);
// $pdf->Cell(7,6,'','L,T,B');
$pdf->Cell(30,6,$row['phone'],'R,T,B');
$pdf->Ln();

 $results2 = $db->query("SELECT * from family_members where family_id='".$family_id."'");
 while ($row2 = $results2->fetchArray()) {
    $place_e=getPlaceE($row['place']);
    // $ini=getInt($row['member_id']);
$pdf->SetFont('Arial','',8);
$pdf->Cell(10,5,$j,'L',0,'C');
$pdf->Cell(10,5,$family_type,0,0,'C');
$pdf->Cell(10,5,$row2['title'].' '.$row2['ini'],0);
$pdf->Cell(44,5,$row2['member_name'],0);
$pdf->Cell(44,5,$place_e,0);
if($row2['do_birth']=='1970-01-01')
{
    $do_birth='';
}
else{
     $do_birth=$row2['do_birth'];
}
if($row2['do_baptism']=='1970-01-01')
{
    $do_baptism='';
}
else{
     $do_baptism=$row2['do_baptism'];
}
if($row2['do_comm']=='1970-01-01')
{
    $do_comm='';
}
else{
     $do_comm=$row2['do_comm'];
}
if($row2['do_marriage']=='1970-01-01')
{
    $do_marriage='';
}
else{
     $do_marriage=$row2['do_marriage'];
}
$pdf->Cell(18,5,$do_birth,0);
$pdf->Cell(18,5,$do_baptism,0);
$pdf->Cell(18,5,$do_comm,0);
$pdf->Cell(18,5,$do_marriage,'R');
$pdf->Ln();
$pdf->Cell(10,5,'','L',0,'C');
$pdf->Cell(10,5,'',0,0,'C');
$pdf->Cell(10,5,$row2['title'].' '.$row2['ini'],0);
$pdf->SetFont('tamil','',10);
$pdf->Cell(44,5,$row2['m_name_t'],0);
$pdf->Cell(44,5,$row['t_area'],0);
$pdf->Cell(18,5,'',0);
$pdf->Cell(18,5,'',0);
$pdf->Cell(18,5,'',0);
$pdf->Cell(18,5,'','R');




$j++;
$pdf->Ln();

 }

}












 $results11 = $db->query("SELECT * from family_list inner join place p on p.id=family_list.place where family_list.family_type='1' and family_list.family_status=1 order by p.english");
// echo "SELECT * from family_list inner join place p on p.id=family_list.place where family_list.family_type='1' order by p.english";

$j=1;
while ($row = $results11->fetchArray()) {
    $ini=getInt($row['head_id']);
    $family_type=getFamilyType($row['family_type']);
    $family_id=$row['family_id'];
// foreach($result as $row) {

$pdf->SetFont('Arial','',8);
$pdf->Cell(15,6,$row['family_id'],1);
$pdf->SetFont('Arial','',8);
$pdf->Cell(25,6,'Family Head -','L,T,B');
$pdf->SetFont('Arial','B',8);
$len=abs(strlen($ini));
if($len==0)
{
    $len=3;
}
$len2=10-($len*2);
$pdf->Cell($len*2,6,$ini,'T,B');
$pdf->SetFont('tamil','',12);
$pdf->Cell(50+abs($len2),6,$row['family_head'],'T,B,R',0);
// echo ($e=abs($len)*2).'==='.$b=(50+abs($len2)).'===='.$e+$b.'<br>';
$pdf->SetFont('Arial','',8);
// $pdf->Cell(10,6,'','L,T,B');
$pdf->SetFont('tamil','',10);
$pdf->Cell(60,6,$row['t_area'],'T,B,R');
$pdf->SetFont('Arial','',8);
// $pdf->Cell(7,6,'','L,T,B');
$pdf->Cell(30,6,$row['phone'],'R,T,B');
$pdf->Ln();

 $results2 = $db->query("SELECT * from family_members where family_id='".$family_id."' and (status != 'Late' and status != 'late') and (status != 'MarriedOff' and status != 'marriedOff')");
 // echo "SELECT * from family_members where family_id='".$family_id."' and (status != 'Late' and status != 'late') and (status != 'MarriedOff' and status != 'marriedOff')<br>";
 while ($row2 = $results2->fetchArray()) {
    $place_e=getPlaceE($row['place']);
    // $ini=getInt($row['member_id']);
$pdf->SetFont('Arial','',8);
$pdf->Cell(10,5,$j,'L',0,'C');
$pdf->Cell(10,5,$family_type,0,0,'C');
$pdf->Cell(10,5,$row2['title'].' '.$row2['ini'],0);
$pdf->Cell(44,5,$row2['member_name'],0);
$pdf->Cell(44,5,$place_e,0);
if($row2['do_birth']=='1970-01-01')
{
    $do_birth='';
}
else{
     $do_birth=$row2['do_birth'];
}
if($row2['do_baptism']=='1970-01-01')
{
    $do_baptism='';
}
else{
     $do_baptism=$row2['do_baptism'];
}
if($row2['do_comm']=='1970-01-01')
{
    $do_comm='';
}
else{
     $do_comm=$row2['do_comm'];
}
if($row2['do_marriage']=='1970-01-01')
{
    $do_marriage='';
}
else{
     $do_marriage=$row2['do_marriage'];
}
$pdf->Cell(18,5,$do_birth,0);
$pdf->Cell(18,5,$do_baptism,0);
$pdf->Cell(18,5,$do_comm,0);
$pdf->Cell(18,5,$do_marriage,'R');
$pdf->Ln();
$pdf->Cell(10,5,'','L',0,'C');
$pdf->Cell(10,5,'',0,0,'C');
$pdf->Cell(10,5,$row2['title'].' '.$row2['ini'],0);
$pdf->SetFont('tamil','',10);
$pdf->Cell(44,5,$row2['m_name_t'],0);
$pdf->Cell(44,5,$row['t_area'],0);
$pdf->Cell(18,5,'',0);
$pdf->Cell(18,5,'',0);
$pdf->Cell(18,5,'',0);
$pdf->Cell(18,5,'','R');




$j++;
$pdf->Ln();

 }

}



 $results11 = $db->query("SELECT * from family_list inner join place p on p.id=family_list.place where family_list.family_type='2' OR family_list.family_type='3' and family_list.family_status=1 order by family_list.family_type");


$j=1;
while ($row = $results11->fetchArray()) {
    $ini=getInt($row['head_id']);
    $family_type=getFamilyType($row['family_type']);
    $family_id=$row['family_id'];
// foreach($result as $row) {

$pdf->SetFont('Arial','',8);
$pdf->Cell(15,6,$row['family_id'],1);
$pdf->SetFont('Arial','',8);
$pdf->Cell(25,6,'Family Head -','L,T,B');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,6,str_replace('.',' ',strtoupper($ini)),'T,B');
$pdf->SetFont('tamil','',12);
$pdf->Cell(50,6,$row['family_head'],'T,B,R');
$pdf->SetFont('Arial','',8);
// $pdf->Cell(10,6,'','L,T,B');
$pdf->SetFont('tamil','',10);
$pdf->Cell(60,6,$row['t_area'],'T,B,R');
$pdf->SetFont('Arial','',8);
// $pdf->Cell(7,6,'','L,T,B');
$pdf->Cell(30,6,$row['phone'],'R,T,B');
$pdf->Ln();

 $results2 = $db->query("SELECT * from family_members where family_id='".$family_id."'");
 while ($row2 = $results2->fetchArray()) {
    $place_e=getPlaceE($row['place']);
    // $ini=getInt($row['member_id']);
$pdf->SetFont('Arial','',8);
$pdf->Cell(10,5,$j,'L',0,'C');
$pdf->Cell(10,5,$family_type,0,0,'C');
$pdf->Cell(10,5,$row2['title'].' '.$row2['ini'],0);
$pdf->Cell(44,5,$row2['member_name'],0);
$pdf->Cell(44,5,$place_e,0);
if($row2['do_birth']=='1970-01-01')
{
    $do_birth='';
}
else{
     $do_birth=$row2['do_birth'];
}
if($row2['do_baptism']=='1970-01-01')
{
    $do_baptism='';
}
else{
     $do_baptism=$row2['do_baptism'];
}
if($row2['do_comm']=='1970-01-01')
{
    $do_comm='';
}
else{
     $do_comm=$row2['do_comm'];
}
if($row2['do_marriage']=='1970-01-01')
{
    $do_marriage='';
}
else{
     $do_marriage=$row2['do_marriage'];
}
$pdf->Cell(18,5,$do_birth,0);
$pdf->Cell(18,5,$do_baptism,0);
$pdf->Cell(18,5,$do_comm,0);
$pdf->Cell(18,5,$do_marriage,'R');
$pdf->Ln();
$pdf->Cell(10,5,'','L',0,'C');
$pdf->Cell(10,5,'',0,0,'C');
$pdf->Cell(10,5,$row2['title'].' '.$row2['ini'],0);
$pdf->SetFont('tamil','',10);
$pdf->Cell(44,5,$row2['m_name_t'],0);
$pdf->Cell(44,5,$row['t_area'],0);
$pdf->Cell(18,5,'',0);
$pdf->Cell(18,5,'',0);
$pdf->Cell(18,5,'',0);
$pdf->Cell(18,5,'','R');




$j++;
$pdf->Ln();

 }

}







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