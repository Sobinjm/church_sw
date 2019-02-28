<?php

include('db_info.php');

$id=$_GET['id'];


$sql1="Delete from family_members where family_id='$id'; Delete from family_list where family_id='$id';";

// $sql=$sql.$sql1;
//echo $sql;
if($db->exec($sql1))
{
    header('location:../family_list.php');
   // echo $sql;
}
else{
    header('location:../edit_family.php?id=$id');
   // echo $sql;
}

//echo $family_id;



?>