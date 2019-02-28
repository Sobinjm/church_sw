<?php

include('db_info.php');

$id=$_GET['id'];
$family_id=$_GET['family_id'];


$sql1="Delete from family_members where member_id='$id'; ";

if($db->exec($sql1))
{
   
     header('location:../edit_family.php?id='.$family_id);
   // echo $sql;
}
else{
    header('location:../edit_member.php?id='.$id);
   // echo $sql;
}

//echo $family_id;



?>