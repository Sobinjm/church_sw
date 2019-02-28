<?php
//include connection file 
include("db_info.php");
include('libs/tfpdf.php');
$query_date="";
$query_cat="";
$query='';
$query_main="SELECT DISTINCT category from receipt ";

if(isset($_POST['from']) && $_POST['from']!='' &&  isset($_POST['to']) && $_POST['to']!='')
{
$from=$_POST['from'];
$to=$_POST['to'];
$query_date=" receipt_date>='".$from."' AND receipt_date<='".$to."'";
}
elseif (isset($_POST['from']) && $_POST['from']!='' &&  (!isset($_POST['to']) || $_POST['to']=='')) {
    # code...
    $from=$_POST['from'];

    $query_date=" receipt_date>='".$from."'";
 
}
elseif (isset($_POST['to']) && $_POST['to']!='' &&  (!isset($_POST['from']) || $_POST['from']=='')) {
    # code...
    $from=$_POST['to'];

    $query_date=" receipt_date='".$from."'";
 
}
else{
    $query_date="";
}

$query_type='';
if(isset($_POST['type']) && $_POST['type']!='' )
{
    $type=$_POST['type'];
    if($type=='Income')
    {
        $query_type= " status=0 ";

// echo $query_type;
    }
    elseif($type=='Expence')
    {
        $query_type= " status=1 ";
        
    }
   

}



 

$query_par='';
$add=0;

if($query_date!='' )
{
    $query=$query_main.' where ('.$query_date.')';
     $query_par=' where ('.$query_date.') ';
     $add=1;
}



// echo $query_par;
// echo $query_type;
// echo $_POST['type'];
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
    // $this->Cell(0,10,'rp.v!;.I. nrfu rig KGnfhL '.'     '.$_POST['from'].' - '.$_POST['to'],0);
   // iconv('UTF-8', 'windows-1252', $reportSubtitle);
    $this->Cell(0,10,"                              rp.v!;.I. nrfu rig KGnfhL ",0);
    // Line break
    $this->Ln(10);
    $this->SetFont('Arial','',12);
if(isset($_POST['from'])&&isset($_POST['to'])&&$_POST['to']!='')
{
         $this->Cell(0,10,'Date :   '.$_POST['from'].' - '.$_POST['to'],0,1,'R');
}
elseif(isset($_POST['from'])&&isset($_POST['to'])&&$_POST['to']==''){
 $this->Cell(0,10,'Date :   '.$_POST['from'],0,1,'R');
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
if($type!='Income'&&$type!='Expence')
{
$pdf->Cell(60.75,8,'Income',1,0,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(28.75,8,'Amount ',1,0,'C');
$pdf->Cell(60.75,8,'Expence',1,0,'C');
$pdf->Cell(28.75,8,'Amount',1,0,'C');
}
elseif($type=='Income'){
$pdf->Cell(121.5,8,'Income',1,0,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(57.5,8,'Amount ',1,0,'C');
}
elseif ($type=='Expence') {
$pdf->SetFont('Arial','B',12);
$pdf->Cell(121.5,8,'Expence',1,0,'C');
$pdf->Cell(57.5,8,'Amount',1,0,'C');
}
// echo $query;
if($type=='Both' || $type=='Income')
{

if($query_type!='' || $add==0 )
{
    $query1=$query_main.' WHERE status=0';

    $query_par1=' where status=0';

}
elseif($query_type!='' || $add==1)
{
     $query1=$query.' AND status=0';

    $query_par1=$query_par.' AND status=0 ';

}
// echo $query;
$results = $db->query($query1);
while ($row = $results->fetchArray()) {
  
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->Cell(12,8,$i,1,0,'C');
$category_name=getCategoryName($row['category']);
$category_type=getCategoryType($row['category']);
if($type!='Income'&&$type!='Expence')
{

   if($category_type=='Income')
{
    $pdf->Cell(60.75,8,$category_name,1,0,'C');
$pdf->SetFont('Arial','',12);
$category_amount=getCategoryAmount($query_par1,$row['category'],0);
$pdf->Cell(28.75,8,moneyFormatIndia($category_amount).'.00',1,0,'R');
$income_total+=$category_amount;
$pdf->Cell(60.75,8,'',1,0,'C');
$pdf->Cell(28.75,8,'',1,0,'C');
}
elseif($category_type=='Expence'){
    $pdf->Cell(60.75,8,'',1,0,'C');
$pdf->Cell(28.75,8,'',1,0,'C');
$category_name=getCategoryName($row['category']);
$pdf->Cell(60.75,8,$category_name,1,0,'C');
$pdf->SetFont('Arial','',12);
$category_amount=getCategoryAmount($query_par1,$row['category'],0);
$pdf->Cell(28.75,8,moneyFormatIndia($category_amount).'.00',1,0,'R');
$expence_total+=$category_amount;

}
}
elseif($category_type=='Income')
{
    $pdf->Cell(121.5,8,$category_name,1,0,'C');
$pdf->SetFont('Arial','',12);
$category_amount=getCategoryAmount($query_par1,$row['category'],0);
$pdf->Cell(57.5,8,moneyFormatIndia($category_amount).'.00',1,0,'R');
$income_total+=$category_amount;
// $pdf->Cell(60.75,8,'',1,0,'C');
// $pdf->Cell(28.75,8,'',1,0,'C');
}
elseif($category_type=='Expence'){
//     $pdf->Cell(60.75,8,'',1,0,'C');
// $pdf->Cell(28.75,8,'',1,0,'C');
$category_name=getCategoryName($row['category']);
$pdf->Cell(121.5,8,$category_name,1,0,'C');
$pdf->SetFont('Arial','',12);
$category_amount=getCategoryAmount($query_par1,$row['category'],0);
$pdf->Cell(57.5,8,moneyFormatIndia($category_amount).'.00',1,0,'R');
$expence_total+=$category_amount;

}
else{
    $pdf->Cell(60.75,8,'',1,0,'C');
$pdf->Cell(28.75,8,'',1,0,'C');
$category_name=getCategoryName($row['category']);
$pdf->Cell(60.75,8,$category_name,1,0,'C');
$pdf->SetFont('Arial','',12);
$category_amount=getCategoryAmount($query_par1,$row['category'],0);
$pdf->Cell(28.75,8,moneyFormatIndia($category_amount).'.00',1,0,'R');
$expence_total+=$category_amount;
}


$i++;
}
}
if($type=='Both' || $type=='Expence')
{
    if($query_type!='' || $add==0 )
{
    $query2=$query_main.' WHERE status=1';

    $query_par2=' where status=1';

}
elseif($query_type!='' || $add==1)
{
     $query2=$query.' AND status=1';

   $query_par2= $query_par.' AND status=1 ';

}
// echo $query2;
$results = $db->query($query2);
while ($row = $results->fetchArray()) {
  
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->Cell(12,8,$i,1,0,'C');
$category_name=getCategoryName($row['category']);
$category_type=getCategoryType($row['category']);
if($category_type=='Income')
{
$pdf->Cell(121.5,8,$category_name,1,0,'C');
$pdf->SetFont('Arial','',12);
$category_amount=getCategoryAmount($query_par2,$row['category'],0);
$pdf->Cell(57.5,8,moneyFormatIndia($category_amount).'.00',1,0,'R');
$income_total+=$category_amount;

}
elseif($category_type=='Expence')
{
$pdf->Cell(121.5,8,$category_name,1,0,'C');
$pdf->SetFont('Arial','',12);
$category_amount=getCategoryAmount($query_par2,$row['category'],0);
$pdf->Cell(57.5,8,moneyFormatIndia($category_amount).'.00',1,0,'R');
$income_total+=$category_amount;

}
else{
//     $pdf->Cell(60.75,8,'',1,0,'C');
// $pdf->Cell(28.75,8,'',1,0,'C');
$category_name=getCategoryName($row['category']);
$pdf->Cell(121.5,8,$category_name,1,0,'C');
$pdf->SetFont('Arial','',12);
$category_amount=getCategoryAmount($query_par2,$row['category'],0);
$pdf->Cell(57.5,8,moneyFormatIndia($category_amount).'.00',1,0,'R');
$expence_total+=$category_amount;
}


$i++;
}
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
if($type=='Income'){
    $pdf->Cell(12,8,'',1,0,'C');
$pdf->Cell(121.5,8,'Total Income',1,0,'R');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(57.5,8,moneyFormatIndia($income_total).'.00',1,0,'R');
}
elseif($type=='Expence')
{
    $pdf->Cell(12,8,'',1,0,'C');
$pdf->Cell(121.5,8,'Total Expence',1,0,'R');
$pdf->Cell(57.5,8,moneyFormatIndia($expence_total).'.00',1,0,'R');
}
else{
    $pdf->Cell(12,8,'',1,0,'C');
    $pdf->Cell(60.75,8,'Total Income',1,0,'R');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(28.75,8,moneyFormatIndia($income_total).'.00',1,0,'R');
$pdf->Cell(60.75,8,'Total Expence',1,0,'R');
$pdf->Cell(28.75,8,moneyFormatIndia($expence_total).'.00',1,0,'R');
}
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

    $query="SELECT cat_name from category where id=$id";

     $results1 = $db1->query($query);
     while ($row1 = $results1->fetchArray()) {

        $op.= $row1['cat_name'];
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
// echo $query;
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