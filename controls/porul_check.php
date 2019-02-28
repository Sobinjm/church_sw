<?php
include('db_info.php');

// $cat_id=SQLite3::escapeString($_POST['cat_id']);
$family_id = SQLite3::escapeString($_POST['family_id']);
$entry_date = date("Y-m-d");
$receipt_date = SQLite3::escapeString($_POST['receipt_date']);
$member_id=SQLite3::escapeString($_POST['member_id']);


$sql="insert into porul_receipt (family_id,item_name,item_count,amount,bid_by,date) values";
$sql1='';
$iname=$_POST['item'];
$icount=$_POST['item_count'];
$iamount=$_POST['item_amt'];
$bid=$_POST['bid_id'];
$itemsize=0;
$item_name='';
$item_count='';
$item_amount='';
$bid_id='';
for($i=0;$i<6;$i++)
{
   
   
if($iamount[$i]!='')
{
       $check='1';
    
    $item_name.='~'.SQLite3::escapeString($iname[$i]); 
    if($icount[$i]=='' || $icount[$i]==' ')
        {
            $count1=1;
        }
        else{
            $count1=$icount[$i];
        }
   $item_count.='~'.SQLite3::escapeString($count1);
   $item_amount.='~'.$iamount[$i];
   $bid_id.='~'.$bid[$i];
   
    $itemsize++;
}

     

}

 $sql.=" ('".$family_id."','".SQLite3::escapeString($item_name)."','".SQLite3::escapeString($item_count)."','".$item_amount."','".$bid_id."','".$entry_date."');";
   
// echo $sql;
if($itemsize!=0)
{
if($db->exec($sql))
{
	echo "inserted";
}
else{
    echo $sql;
}
}else{
    echo "error";
}




?>