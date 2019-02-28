<?php
include('db_info.php');

// $cat_id=$_POST['cat_id'];
if(isset($_POST['cat_id']))
{
   $cat_id=$_POST['cat_id']; 
}
if(isset($_POST['cat_id2']))
{
   $cat_id=$_POST['cat_id2']; 
}
// echo $cat_id;
// $family_id = SQLite3::escapeString($_POST['family_id']);
if(isset($_POST['family_id']))
{
   $family_id =SQLite3::escapeString($_POST['family_id']);
}
if(isset($_POST['family_id2']))
{
   $family_id =SQLite3::escapeString($_POST['family_id2']);
}
$entry_date = date("Y-m-d");
// $receipt_date = SQLite3::escapeString($_POST['receipt_date']);
if(isset($_POST['receipt_date']))
{
   $receipt_date=SQLite3::escapeString($_POST['receipt_date']);
}
if(isset($_POST['receipt_date2']))
{
   $receipt_date=SQLite3::escapeString($_POST['receipt_date2']);
}
// $member_id=SQLite3::escapeString($_POST['member_id']);
if(isset($_POST['member_id']))
{
   $member_id=SQLite3::escapeString($_POST['member_id']);
}
if(isset($_POST['member_id2']))
{
   $member_id=SQLite3::escapeString($_POST['member_id2']);
}
$months = '1';

if($cat_id==0){
$monthly_amt 	= 	SQLite3::escapeString($_POST['monthly_amt']);
$monthly_desc 	= 	SQLite3::escapeString($_POST['monthly_desc']);
$msnry_amt 		= 	SQLite3::escapeString($_POST['msnry_amt']);
$msnry_desc 	= 	SQLite3::escapeString($_POST['msnry_desc']);
$rice_amt 		= 	SQLite3::escapeString($_POST['rice_amt']);
$rice_desc 		= 	SQLite3::escapeString($_POST['rice_desc']);
$months = SQLite3::escapeString($_POST['msnry_desc']);
if($months=='')
{
$months=1;
}
if(($monthly_amt==''||$monthly_amt==null||empty($monthly_amt))&&($msnry_amt==''||$msnry_amt==null||empty($msnry_amt))&&($rice_amt==''||$rice_amt==null||empty($rice_amt)))
{
    echo 'not inserted';
    die();
}
$s=0;
$sql="INSERT INTO receipt (family_id,member_id,receipt_date,category,description,amount,entry_date,type) values";
if($monthly_amt!=='' || $monthly_amt!=null)
{
    if($s==1)
    {
        $sql.=",";
    }
    $sql.="('".$family_id."',".$member_id.",'".$receipt_date."',3,'".$monthly_desc."',".$monthly_amt.",'".$entry_date."',0)";
    $s=1;
}
if($msnry_amt!=='' || $msnry_amt!=null)
{
    if($s==1)
    {
        $sql.=",";
    }
	$sql.=" ('".$family_id."',".$member_id.",'".$receipt_date."',4,'".$msnry_desc."',".$msnry_amt.",'".$entry_date."',0)";
    $s=1;
}
if($rice_amt!=='' || $rice_amt!=null)
{
    if($s==1)
    {
        $sql.=",";
    } 
	$sql.=" ('".$family_id."',".$member_id.",'".$receipt_date."',5,'".$rice_desc."',".$rice_amt.",'".$entry_date."',0)";
    $s=1;
}


}
else if($cat_id==6){

	$bday_amt 	= 	SQLite3::escapeString($_POST['bday_amt']);
	$bday_desc 	= 	SQLite3::escapeString($_POST['bday_desc']);
    $months = SQLite3::escapeString($_POST['bday_desc']);
if($months=='')
{
$months=1;
}
	$sql="INSERT INTO receipt (family_id,member_id,receipt_date,category,description,amount,entry_date,type) values('".$family_id."',".$member_id.",'".$receipt_date."',6,'".$bday_desc."',".$bday_amt.",'".$entry_date."',0)";

}
else if($cat_id==39)
{
    $receipt_type=getReceiptType($cat_id);
    // $cat_id=SQLite3::escapeString($_POST['cat_id']);
$family_id = SQLite3::escapeString($_POST['family_id2']);
$entry_date = date("Y-m-d");
$receipt_date = SQLite3::escapeString($_POST['receipt_date2']);
$member_id=SQLite3::escapeString($_POST['member_id2']);

$s=0;
$sql="INSERT INTO receipt (family_id,member_id,receipt_date,category,description,amount,months,entry_date,type) values";
$sql1='';
$iname=$_POST['item'];
$icount=$_POST['item_count'];
$iamount=$_POST['item_amt'];

$itemsize=0;
$item_name='';
$item_count='';
$item_amount='';

for($i=0;$i<4;$i++)
{
   
   
if($iamount[$i]!='')
{
       $check='1';
    
    $item_name=SQLite3::escapeString($iname[$i]); 
    if($icount[$i]=='' || $icount[$i]==' ')
        {
            $count1=1;
        }
        else{
            $count1=$icount[$i];
        }
   $item_count=SQLite3::escapeString($count1);
   $item_amount=$iamount[$i];
 
    if($s==1)
    {
        $sql.=",";
    }
    $sql.="('".$family_id."',".$member_id.",'".$receipt_date."',39,'".SQLite3::escapeString($item_name)."',".$item_amount.",".$item_count.",'".$entry_date."',".$receipt_type.")";
    $s=1;

   
    $itemsize++;
}


//for
}



}
else{
	$receipt_type=getReceiptType($cat_id);

		$receipt_amt 	= 	SQLite3::escapeString($_POST['receipt_amt']);
	$receipt_desc 	= 	SQLite3::escapeString($_POST['receipt_desc']);
    $months = SQLite3::escapeString($_POST['receipt_desc']);
if($months=='')
{
$months=1;
}
	$sql="INSERT INTO receipt (family_id,member_id,receipt_date,category,description,amount,entry_date,type) values('".$family_id."',".$member_id.",'".$receipt_date."',".$cat_id.",'".$receipt_desc."',".$receipt_amt.",'".$entry_date."',".$receipt_type.")";

}

// echo $sql;

if($db->exec($sql))
{
	echo "inserted";
}

function getReceiptType($id)
{
    $db1 = new MyDB();
    $op='';

    $query="SELECT * from category where id=$id";

     $results1 = $db1->query($query);
     while ($row1 = $results1->fetchArray()) {
     	if($row1['type']=='Income')
     	{
     		$op.= 0;
     	}
     	else if($row1['type']=='Expence'){
     		$op.= 1;
     	}
        else{
            $op.= 22;
        }
        
     }
     // echo $query;
     return $op;
     $db1->close();

}



?>