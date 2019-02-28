<?php

include('db_info.php');

$sql="delete  from porul_receipt; ";


// echo $sql;
if($db->exec($sql))
{
    echo "Data deleted";
   // echo $sql;
}
else{
     echo "error";
 }
?>