<?php
//include connection file 
include("db_info.php");
include('libs/tfpdf.php');
$query_date="";
$query_cat="";
$query='';
$query_main="SELECT r.*,p.english,p.tamil from receipt r inner join family_list fl on fl.family_id=r.family_id inner join place p on fl.place=p.id ";

if(isset($_GET['from']) && $_GET['from']!='' &&  isset($_GET['to']) && $_GET['to']!='')
{
$from=$_GET['from'];
$to=$_GET['to'];
$query_date=" receipt_date>='".$from."' AND receipt_date<='".$to."'";
 
 // echo "SELECT * from receipt where  receipt_date>=".$from." AND receipt_date<=".$to;
}
elseif (isset($_GET['from']) && $_GET['from']!='' &&  (!isset($_GET['to']) || $_GET['to']=='')) {
    # code...
    $from=$_GET['from'];

    $query_date=" receipt_date>='".$from."'";
 
}
elseif (isset($_GET['to']) && $_GET['to']!='' &&  (!isset($_GET['from']) || $_GET['from']=='')) {
    # code...
    $from=$_GET['to'];

    $query_date=" receipt_date='".$from."'";
 
}
else{
    $query_date="";
}

if(isset($_GET['category']) && $_GET['category']!='' && $_GET['category']=='0')
{
    $query_cat="";

}
elseif (isset($_GET['category']) && $_GET['category']!='' && $_GET['category']!='0') {
    $cat=$_GET['category'];
    $query_cat=" category='".$cat."'";
    // echo $query_cat;
}


 

if($query_cat!='' || $query_date!='' )
{
    $query=$query_main.' WHERE status<>6 AND ';

}
if($query_cat!='' && $query_date!='' )
{
    $query.=' ('.$query_date.') AND ('.$query_cat.')';
}
if($query_cat=='' && $query_date!='')
{
    $query.=$query_date;
}
if($query_cat!='' && $query_date=='')
{

    $query.=$query_cat;
}

if ($_GET['category']==25) {
    if(!isset($_GET['to'])||$_GET['to']=='')
    {
    header('location:porul_pdf.php?date='.$_GET['from']);
    }
    else{
    header('location:porul_pdf.php?from='.$_GET['from'].'&to='.$_GET['to']);
}
    # code...
}

// else{
//     $query=$query_main;
// }
// echo $query;

 // $query="SELECT * from receipt ";

// if(isset($_GET['type']))
// {
//     $type=$_GET['type'];
// }


header('Content-Type: text/html;charset=utf-8');
class PDF extends tFPDF
{
// Page header
function Header1()
{
    // Logo
    // $this->Image('logo.png',10,-1,70);
    // $this->SetFont('tamil');
    $this->AddFont('tamil','','tamil.ttf',true);
    $this->SetFont('tamil','',14);
    // Move to the right
    $this->Cell(80);
    $this->SetX(10);
    $this->SetFontSize(20);
    // Title
    if($_GET['from']!='' && $_GET['to'] !='')
    {
        $this->Cell(0,10,'        '.'rp.v!;.I. nrfu rig KGf;nfhL'.'     '.$_GET['from'].' - '.$_GET['to'],0);
    // Line break
       
    }
    elseif ($_GET['from']!='' && $_GET['to'] =='') {
        $this->Cell(0,10,'                         '.'rp.v!;.I. nrfu rig KGf;nfhL',0);

      
        # code...
    }
    elseif ($_GET['from']=='' && $_GET['to'] !='') {
        $this->Cell(0,10,'             '.'rp.v!;.I. nrfu rig KGf;nfhL'.'     '.$_GET['to'],0);
    // Line break
       
        # code...
    }
    else{
        $this->Cell(0,10,'                     '.'rp.v!;.I. nrfu rig KGf;nfhL'.'     ',0);
        $this->Cell(0,10,'Date : '.$_GET['from'].' - '.$_GET['to'],0);
    // Line break
       
    }
  $this->Ln();
    $cat_name=getCatName($_GET['category']);
    $this->Cell(0,10,'                           '.$cat_name,0);
$this->Ln(10);
    $this->SetFont('Arial','',12);
if(isset($_GET['from'])&&isset($_GET['to'])&&$_GET['to']!='')
{
         $this->Cell(0,10,'Date :   '.$_GET['from'].' - '.$_GET['to'],0,1,'R');
}
elseif(isset($_GET['from'])&&isset($_GET['to'])&&$_GET['to']==''){
 $this->Cell(0,10,'Date :   '.$_GET['from'],0,1,'R');
}
    // Line break
   
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

 // echo $query;
$results = $db->query($query.' order by r.id');
// $db = new dbObj();
// $connString =  $db->getConnstring();
// $display_heading = array('id'=>'ID', 'employee_name'=> 'Name', 'employee_age'=> 'Age','employee_salary'=> 'Salary',);
 
// $result = mysqli_query($connString, "SELECT id, employee_name, employee_age, employee_salary FROM employee") or die("database error:". mysqli_error($connString));
// $header = mysqli_query($connString, "SHOW columns FROM employee");
 $i=1;
 $total=0;
$pdf = new PDF();
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



 // Logo
    // $this->Image('logo.png',10,-1,70);
    // $this->SetFont('tamil');
    $pdf->AddFont('tamil','','tamil.ttf',true);
    $pdf->SetFont('tamil','',14);
    // Move to the right
    $pdf->Cell(80);
    $pdf->SetX(10);
    $pdf->SetFontSize(20);
    // Title
    if($_GET['from']!='' && $_GET['to'] !='')
    {
        $pdf->Cell(0,10,'                         '.'rp.v!;.I. nrfu rig KGf;nfhL'.'',0);
    // Line break
       
    }
    elseif ($_GET['from']!='' && $_GET['to'] =='') {
        $pdf->Cell(0,10,'                         '.'rp.v!;.I. nrfu rig KGf;nfhL',0);

      
        # code...
    }
    elseif ($_GET['from']=='' && $_GET['to'] !='') {
        $pdf->Cell(0,10,'             '.'rp.v!;.I. nrfu rig KGf;nfhL'.'     '.$_GET['to'],0);
    // Line break
       
        # code...
    }
    else{
        $pdf->Cell(0,10,'                     '.'rp.v!;.I. nrfu rig KGf;nfhL'.'     ',0);
        $pdf->Cell(0,10,'Date : '.$_GET['from'].' - '.$_GET['to'],0);
    // Line break
       
    }
  $pdf->Ln();
    $cat_name=getCatName($_GET['category']);
    $pdf->Cell(0,10,'                               '.$cat_name,0);
$pdf->Ln(10);
    $pdf->SetFont('Arial','',12);
if(isset($_GET['from'])&&isset($_GET['to'])&&$_GET['to']!='')
{
         $pdf->Cell(0,10,'Date :   '.$_GET['from'].' - '.$_GET['to'],0,1,'R');
}
elseif(isset($_GET['from'])&&isset($_GET['to'])&&$_GET['to']==''){
 $pdf->Cell(0,10,'Date :   '.$_GET['from'],0,1,'R');
}
  




   $pdf->AddFont('tamil','','tamil.ttf',true);
    $pdf->SetFont('tamil','',14);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(12,8,'S.No',1,0,'C');
// $pdf->Cell(17,8,'Rec.No',1,0,'C');
$pdf->SetFont('Arial','B',12);

$pdf->Cell(15,8,'','L,T,B');
$pdf->Cell(27,8,'Name','R,T,B');
$pdf->Cell(59,8,'Place',1,0,'C');
$pdf->Cell(40,8,'Item Name',1,0,'C');
$pdf->Cell(10,8,'',1,0,'C');
$pdf->Cell(25,8,'Amount',1,0,'C');

while ($row = $results->fetchArray()) {
    $ini=getInt($row['member_id']);
    $place =getPlace(ucfirst($row['family_id']));
// foreach($result as $row) {
$pdf->Ln();
// $pdf->Cell(10,6,'test','L,T,B');
// $pdf->SetFont('Arial','B',8);
// $pdf->Cell(10,6,$i,1);
// $pdf->Cell(15,6,$row['id'],1);
// $pdf->Cell(15,6,$row['receipt_date'],1);
// $pdf->SetFont('Arial','B',8);
$name=getName($row['member_id']);
// echo $name;
// // $pdf->Cell(30,6,$name,1);
// $pdf->Cell(10,6,$ini,'L,T,B');
// $pdf->SetFont('tamil','',14);
// $pdf->Cell(70,6,$name,'R,T,B');
// $pdf->SetFont('tamil','',14);
// $pdf->Cell(70,6,$row['t_area'],1);
// foreach($row as $column=>$item)
// {
//  if (is_int($column)) {
//      $pdf->Cell(30,6,$item,1);
//  }
// }
if(isset($_GET['to'])&&$_GET['to']!='')
{
$len=abs(strlen($ini));
if($len==0)
{
    $len=3;
}
$len2=12-($len*2);
}
else{
    $len=abs(strlen($ini));
if($len==0)
{
    $len=3;
}
$len2=15-($len*2);
}
$pdf->SetFont('Arial','',11);
$pdf->Cell(12,8,$i,1);
// $pdf->Cell(17,8,$row['id'],1);
$pdf->SetFont('Arial','',11);

$pdf->Cell($len*2,8,$ini,'L,T,B');
$pdf->SetFont('tamil','',11);
$pdf->Cell(30+abs($len2),8,' '.$name,',T,B');
$pdf->Cell(59,8,$place,1);

$pdf->SetFont('tamil','',11);
$pdf->Cell(40,8,$row['description'],1);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10,8,$row['months'],1);
$pdf->Cell(25,8,moneyFormatIndia($row['amount']).'.00',1,0,'R');
$total+=$row['amount'];

$i++;
}
$pdf->Ln();
$pdf->Cell(136,8,"",1,0,'R');
$pdf->Cell(30,8,"Total ",1,0,'R');
$pdf->Cell(25,8,moneyFormatIndia($total).'.00',1,0,'R');

$pdf->Ln(10);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(63.66,6,"Treasurer",0,0,'C');
$pdf->Cell(63.66,6,"Accountant",0,0,'C');
$pdf->Cell(63.66,6,"Secretary",0,0,'C');

$pdf->Output();
?>

<?php

function getInt($id)
{
    $db1 = new MyDB();
    $op='';
    $query="SELECT * from family_members where id=$id";
     $results1 = $db1->query($query);
     while ($row1 = $results1->fetchArray()) {

        $op.= $row1['title'].' '.$row1['ini'];
     }
     return $op;
     $db1->close();

}

function getName($id)
{
    $db1 = new MyDB();
    $op='';

    $query="SELECT * from family_members where id=$id";

     $results1 = $db1->query($query);
     while ($row1 = $results1->fetchArray()) {

        $op.= $row1['m_name_t'];
     }
     return $op;
     $db1->close();

}


function getPlace($id)
{
    $db1 = new MyDB();
    $op='';

    $query="SELECT * from family_list where family_id='$id'";

     $results1 = $db1->query($query);
     while ($row1 = $results1->fetchArray()) {

        $op.= $row1['t_area'];
     }
     // echo $query;
     return $op;
     $db1->close();

}
function getCatName($id)
{
    $db1 = new MyDB();
    $op='';

    $query="SELECT * from category where id=$id";

     $results1 = $db1->query($query);
     while ($row1 = $results1->fetchArray()) {

        $op.= $row1['cat_name_t'];
     }
     // echo $query;
     return $op;
     $db1->close();

}
function moneyFormatIndia($num) {
    $explrestunits = "" ;
    if(strlen($num)>3) {
        $lastthree = substr($num, strlen($num)-3, strlen($num));
        $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
        $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
        $expunit = str_split($restunits, 2);
        for($i=0; $i<sizeof($expunit); $i++) {
            // creates each of the 2's group and adds a comma to the end
            if($i==0) {
                $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
            } else {
                $explrestunits .= $expunit[$i].",";
            }
        }
        $thecash = $explrestunits.$lastthree;
    } else {
        $thecash = $num;
    }
    return $thecash; // writes the final format where $currency is the currency symbol.
}

?>