<?php

include('db_info.php');


$head 			= 	$_POST['head1'];


$cat = $_POST['category'];
$place       =   explode('-',$_POST['place']);

$t_name       =  $_POST['t_name'];

// $occupation 	= 	$_POST['occupation'];

$phone 			= 	SQLite3::escapeString($_POST['phone']);

$address 		= 	SQLite3::escapeString($_POST['address']);
$family_head 	= 	$_POST['family_head'];
$family_id  =   $_POST['family_id'];
$family_status  =   $_POST['family_status'];

$family_type=$_POST['category'];
$member_id=$_POST['member_id'];
$head_id='';
$count=count($_POST['member_id']);
$sql='';$head_id='';
$area 			= 	SQLite3::escapeString($place[1]);
$area_code=SQLite3::escapeString($place[0]);
$new_id=getFamilyId();
$family_id 		= 	str_pad($area_code, 3, '0', STR_PAD_LEFT).'/'.str_pad($new_id, 3, '0', STR_PAD_LEFT);
for($i=0;$i<$count;$i++)
{


   


// echo $head_sts.$_POST['head'];
//$status     = (isset($_POST['sts'][$i])) ? $_POST['sts'][$i] : 0;
if(isset($_POST['sts'.$i]))
{
  $status     =$_POST['sts'.$i];

}
else{
 $status     =0;
}

// echo $i." ==> ".$_POST['sts'.$i]." <br>";


$member_id = $_POST['member_id'][$i];
// if($family_head==$t_name[$i])
// {
//   $head_id=$member_id;
// }
 
    $head_id    .=  $member_id;
    //echo 'H'.$i.'==='.$_POST['head'];
    $head_sts=1;
 
// echo '<br>============<br>'.$family_head;
// echo '<br>Famil Head Old'.$family_head_old;
// echo '<br>Member_id'.$member_id;
$sql.=" update family_members set member_type='$head_sts', status='$status', family_id='$family_id' where member_id='$member_id'; ";
// echo '<br>'.$status;

}

$count=count($_POST['family_head']);


// if($family_head==$family_head_old)
// {
// $sql.="insert into family_list () values phone='$phone',place='$place',address='$address',family_type=$family_type,family_status=$family_status  ; ";
$sql.="insert into family_list (family_id,phone,place,t_area,address,family_head,family_type,head_id) values('".SQLite3::escapeString($family_id)."','$phone','".SQLite3::escapeString($place[0])."','".SQLite3::escapeString($place[1])."','$address','".SQLite3::escapeString($family_head)."',$cat,'$head_id'); ";

// }
// else{
//   $sql.="update family_list  set phone='$phone',place='$place',address='$address',family_head='".SQLite3::escapeString($family_head)."',family_type=$family_type,head_id='$head_id',family_status=$family_status where family_id='$family_id' ;  ";
// }
//update family_members set member_type=0 where member_id='$head_id';
$sql1='';
$sql=$sql.$sql1;
// echo $sql;
// echo '<br>'.$head_id;

if($db->exec($sql))
{
    header('location:../edit_family.php?id='.$family_id);
   // echo $sql;
}
else{
    echo 'data not inserted';
}

//echo $family_id;

function getFamilyId()
{
  
$db = new MyDB();
$result12=$db->query("SELECT id from family_list order by id DESC limit 1");
$row12=$result12->fetchArray();
$db->close();
return $row12['id']+1;


}

?>


