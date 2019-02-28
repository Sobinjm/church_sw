<?php

include('db_info.php');

 $id=$_POST['id'];
 $ename= SQLite3::escapeString($_POST['e_name']);
 $tname= SQLite3::escapeString($_POST['t_name']);
 $description= SQLite3::escapeString($_POST['desc']);
 $freq= SQLite3::escapeString($_POST['freq']);
 $type= SQLite3::escapeString($_POST['cat_type']);

$sql="update category  set cat_name='$ename',cat_name_t='$tname',desc='$description',freq='$freq' where id=$id";


// echo $sql;

if($db->exec($sql))
{
    header('location:../add-category.php');
   // echo $sql;
}
else{
    echo 'data not updated';
}





?>
