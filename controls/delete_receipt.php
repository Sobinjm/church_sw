<?php
include('db_info.php');
$receipt_id 	= 	SQLite3::escapeString($_POST['receipt_no']);

$sql="Update receipt set status='6' where id=".$receipt_id;
if($db->exec($sql))
{
	$db->close();
	echo '<script>alert("Receipt Deleted.");window.location.href = "../weekly-report.php"; </script>';
    // header('location:../weekly-report.php');
   // echo $sql;
}
else{
	$db->close();
    echo 'data not deleted<br>';
    echo $sql;
}




?>