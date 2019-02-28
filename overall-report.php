<?php
//include connection file 
include("db_info.php");
include('libs/tfpdf.php');
$query_date="";
$query_cat="";
$query='';
$query_main="SELECT DISTINCT category from receipt ";

if(isset($_GET['from']) && $_GET['from']!='' &&  isset($_GET['to']) && $_GET['to']!='')
{
$from=$_GET['from'];
$to=$_GET['to'];
$query_date=" receipt_date>='".$from."' AND receipt_date<='".$to."'";
$porul_date=" pr.date>='".$from."' AND pr.date<='".$to."'";
}
elseif (isset($_GET['from']) && $_GET['from']!='' &&  (!isset($_GET['to']) || $_GET['to']=='')) {
    # code...
    $from=$_GET['from'];

    $query_date=" receipt_date>='".$from."'";
    $porul_date="pr.date>='".$from."'";
 
}
elseif (isset($_GET['to']) && $_GET['to']!='' &&  (!isset($_GET['from']) || $_GET['from']=='')) {
    # code...
    $from=$_GET['to'];

    $query_date=" receipt_date='".$from."'";
    $porul_date=" pr.date='".$from."'";
 
}
else{
    $porul_date='';
    $query_date="";
}

$query_type='';


 

$query_par='';
$add=0;

if($porul_date!='')
{
    $porul_date='where status<>6 AND '.$porul_date;
}
else{
    $porul_date='';
}
if($query_date!='' )
{
    $query=$query_main.' where (status<>6) AND ('.$query_date.')';
     $query_par=' where (status<>6) AND ('.$query_date.') ';
     $add=1;
}
else{
    $query=$query_main;
}

if($query_par!='' )
{
    $query2=$query.' AND type=1 AND status=0';
   $query_par2= $query_par.' AND type=1 AND status=0 ';
}
else
{
    $query2=$query.' where (status<>6) AND type=1 AND status=0';
    $query_par2=' where (status<>6) AND type=1 AND status=0 ';
}

if($query_par!='' )
{
    $query1=$query.' AND type=0 AND status=0';
   $query_par1= $query_par.' AND type=0 AND status=0 ';
}
else
{
    $query1=$query.' where (status<>6) AND type=0 AND status=0';
    $query_par1=' where (status<>6) AND type=0 AND status=0 ';
}



// echo $query_par;
// echo $query_type;
// echo $_GET['type'];
header('Content-Type: text/html;charset=utf-8');
class PDF extends tFPDF
{
// Page header
function Header()
{
     $this->Ln();
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
    // $this->Cell(0,10,'rp.v!;.I. nrfu rig KGnfhL '.'     '.$_GET['from'].' - '.$_GET['to'],0);
   // iconv('UTF-8', 'windows-1252', $reportSubtitle);
    $this->Cell(0,10,"                              rp.v!;.I. nrfu rig KGnfhL ",0);
    // Line break
    $this->Ln(10);
    $this->SetFont('Arial','',12);
if(isset($_GET['from'])&&isset($_GET['to'])&&$_GET['to']!='')
{
         $this->Cell(0,10,'Date :   '.$_GET['from'].' - '.$_GET['to'],0,1,'R');
}
elseif(isset($_GET['from'])&&isset($_GET['to'])&&$_GET['to']==''){
 $this->Cell(0,10,'Date :   '.$_GET['from'],0,1,'R');
}
 
    // $this->Ln(20);
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



 $i=1;
 $total=0;
 $income_total=0;
 $expence_total=0;
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',8);


   $pdf->AddFont('tamil','','tamil.ttf',true);
    $pdf->SetFont('tamil','',14);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(12,8,'S.No',1,0,'C');

$pdf->Cell(60.75,8,'Income',1,0,'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(28.75,8,'Amount ',1,0,'C');
$pdf->Cell(60.75,8,'Expence',1,0,'C');
$pdf->Cell(28.75,8,'Amount',1,0,'C');
$income_total=0;
// echo $query_main;
$results = $db->query($query1);
while ($row = $results->fetchArray()) {
$category_name=getCategoryName($row['category']);
if($category_name!='Poor Fund')    
{
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->Cell(12,8,$i,1,0,'C');
$category_type=getCategoryType($row['category']);
$category_amount=getCategoryAmount($query_par1,$row['category'],0);
$pdf->SetFont('tamil','',12);
$pdf->Cell(60.75,8,$category_name,1,0,'L');
$pdf->SetFont('Arial','',12);
$pdf->Cell(28.75,8,moneyFormatIndia($category_amount).'.00',1,0,'R');
$pdf->Cell(60.75,8,'',1,0,'C');
$pdf->Cell(28.75,8,'',1,0,'C');
$income_total+=$category_amount;
$i++;}
}
//Porul Income//
$old_fid='';

$j=0;
$porul_amount=0;
$results = $db->query("SELECT pr.*,fl.t_area,fl.family_head,fl.head_id from porul_receipt pr inner join family_list fl on pr.family_id=fl.family_id ".$porul_date." order by id");
while ($row = $results->fetchArray()) {
$var=12;

    $j++;
    $item_name=explode('~', $row['item_name']);
    $item_amount=explode('~', $row['amount']);
    $length=sizeof($item_name);
    
    // $family_id=$row['family_id'];
// foreach($result as $row) {
    for($i=1;$i<$length;$i++)
    {


    
if($row['family_id']!=$old_fid)
{
$old_fid=$row['family_id'];
$porul_amount=$porul_amount+$item_amount[$i];
}
else{

$porul_amount=$porul_amount+$item_amount[$i];


}
}
$var++;

}
if(isset($var)&&$var>12)
{
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->Cell(12,8,$i,1,0,'C');
$pdf->SetFont('tamil','',12);
$pdf->Cell(60.75,8,'kndhfur; re;ij',1,0,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(28.75,8,moneyFormatIndia($porul_amount).'.00',1,0,'R');
$pdf->Cell(60.75,8,'',1,0,'C');
$pdf->Cell(28.75,8,'',1,0,'C');

$income_total+=$porul_amount;
$i++;
}
// die();
//End of Porul Income

$expence_total=0;
$results = $db->query($query2);
while ($row = $results->fetchArray()) {
$category_name=getCategoryName($row['category']);
if($category_name!='Poor Fund')    
{
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->Cell(12,8,$i,1,0,'C');
$category_type=getCategoryType($row['category']);
$category_amount=getCategoryAmount($query_par2,$row['category'],0);
$pdf->Cell(60.75,8,'',1,0,'C');
$pdf->Cell(28.75,8,'',1,0,'C');
$pdf->SetFont('tamil','',12);
$pdf->Cell(60.75,8,$category_name,1,0,'L');
$pdf->SetFont('Arial','',12);
$pdf->Cell(28.75,8,moneyFormatIndia($category_amount).'.00',1,0,'C');
$expence_total+=$category_amount;
$i++;}
}

// $pdf->Ln();
// $pdf->Cell(12,8,'',1,0,'C');
// $pdf->Cell(60.75,8,'',1,0,'C');
// $pdf->Cell(28.75,8,' ',1,0,'C');
// $pdf->Cell(60.75,8,'',1,0,'C');
// $pdf->Cell(28.75,8,'',1,0,'C');
// $pdf->Ln();
// $pdf->Cell(12,8,'',1,0,'C');
// $pdf->Cell(60.75,8,'',1,0,'C');
// $pdf->Cell(28.75,8,' ',1,0,'C');
// $pdf->Cell(60.75,8,'',1,0,'C');
// $pdf->Cell(28.75,8,'',1,0,'C');


$pdf->Ln();
$pdf->SetFont('Arial','B',12);

    $pdf->Cell(12,8,'',1,0,'C');
    $pdf->Cell(60.75,8,'Total Income',1,0,'R');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(28.75,8,moneyFormatIndia($income_total).'.00',1,0,'R');
$pdf->Cell(60.75,8,'Total Expence',1,0,'R');
$pdf->Cell(28.75,8,moneyFormatIndia($expence_total).'.00',1,0,'R');

$total=$income_total-$expence_total;

$pdf->Ln();
// $pdf->Cell(136,8,"",1,0,'R');
$pdf->Cell(162.4,8,"Closing Balance ",1,0,'R');
$pdf->Cell(28.75,8,moneyFormatIndia($total).'.00',1,0,'R');

$pdf->Ln(25);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(63.66,6,"Treasurer",0,0,'C');
$pdf->Cell(63.66,6,"Accountant",0,0,'C');
$pdf->Cell(63.66,6,"Secretary",0,0,'C');

$pdf->Output();
?>

<?php



function getCategoryName($id)
{
    $db1 = new MyDB();
    $op='';

    $query="SELECT cat_name,cat_name_t from category where id=$id";

     $results1 = $db1->query($query);
     while ($row1 = $results1->fetchArray()) {

        $op.= $row1['cat_name_t'];
     }
     // echo $query;
     return $op;
     $db1->close();

}
function getCategoryType($id)
{
    $db1 = new MyDB();
    $op='';

    $query="SELECT type from category where id=$id";

     $results1 = $db1->query($query);
     while ($row1 = $results1->fetchArray()) {

        $op.= $row1['type'];
     }
     // echo $query;
     return $op;
     $db1->close();

}
function getCategoryAmount($query_par,$cat)
{
    $db1 = new MyDB();
    $op=0;
    if($query_par!='')
    {
        $query="SELECT amount from receipt ".$query_par." AND category='".$cat."'";
    }
    elseif($query_par=='')
    {
         $query="SELECT amount from receipt where category='".$cat."'";
    }
// echo $query_par;
     $results1 = $db1->query($query);
     while ($row1 = $results1->fetchArray()) {

        $op+= $row1['amount'];
     }
     // echo $query;
     $db1->close();

     return $op;

}
function moneyFormatIndia($num) {
    $explrestunits = "" ;
    if(strlen($num)>3) {
        $lastthree = substr($num, strlen($num)-3, strlen($num));
        $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
        $restunits = (strlen($restunits)%2 == 1)?' '.$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
        $expunit = str_split($restunits, 2);
        for($i=0; $i<sizeof($expunit); $i++) {
            // creates each of the 2's group and adds a comma to the end
            if($i==0) {
                $explrestunits .= $expunit[$i].","; // if is first value , convert into integer
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