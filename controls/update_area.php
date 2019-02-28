<?php

include('db_info.php');

 $id=$_POST['id'];
 $ename= SQLite3::escapeString($_POST['e_name']);
 $tname= SQLite3::escapeString($_POST['t_name']);


$sql="update place  set english='$ename',tamil='$tname' where id=$id";


// echo $sql;
if($db->exec($sql))
{
    header('location:../add-area.php');
   // echo $sql;
}
else{
    echo 'data not updated';
}





?>
