<?php
include('db_info.php');
$id=$_POST['member_id'];
$new_family=urldecode($_POST['new_family']);


$sql="Update family_members set family_id='$new_family' where member_id='$id'";
if($db->exec($sql))
{
    header('location:../edit_family.php?id='.$new_family);
   // echo $sql;
}
else{
    echo 'data not inserted';
}




?>