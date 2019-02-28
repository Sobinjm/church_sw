<?php
include('db_info.php');

$cat_id=$_POST['cat_id'];
$family_id = SQLite3::escapeString($_POST['family_id']);
$entry_date = date("Y-m-d");
$receipt_date = SQLite3::escapeString($_POST['receipt_date']);
$member_id=SQLite3::escapeString($_POST['member_id']);
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

$sql="INSERT INTO receipt (family_id,member_id,receipt_date,category,description,amount,months,entry_date,type) values('".$family_id."',".$member_id.",'".$receipt_date."',3,'".$monthly_desc."',".$monthly_amt.",".$months.",'".$entry_date."',0)";

if($msnry_amt!=='' || $msnry_amt!=null)
{
	$sql.=", ('".$family_id."',".$member_id.",'".$receipt_date."',4,'".$msnry_desc."',".$msnry_amt.",".$months.",'".$entry_date."',0)";
}
if($rice_amt!=='' || $rice_amt!=null)
{
	$sql.=", ('".$family_id."',".$member_id.",'".$receipt_date."',5,'".$rice_desc."',".$rice_amt.",".$months.",'".$entry_date."',0)";
}


}
else if($cat_id==6){

	$bday_amt 	= 	SQLite3::escapeString($_POST['bday_amt']);
	$bday_desc 	= 	SQLite3::escapeString($_POST['bday_desc']);
    $months = SQLite3::escapeString($_POST['bday_desc']);
    $receipt_type=getReceiptType($cat_id);
if($months=='')
{
$months=1;
}
	$sql="INSERT INTO receipt (family_id,member_id,receipt_date,category,description,amount,months,entry_date,type) values('".$family_id."',".$member_id.",'".$receipt_date."',6,'".$bday_desc."',".$bday_amt.",".$months.",'".$entry_date."',".$receipt_type.")";

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
	$sql="INSERT INTO receipt (family_id,member_id,receipt_date,category,description,amount,months,entry_date,type) values('".$family_id."',".$member_id.",'".$receipt_date."',".$cat_id.",'".$receipt_desc."',".$receipt_amt.",".$months.",'".$entry_date."',".$receipt_type.")";

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