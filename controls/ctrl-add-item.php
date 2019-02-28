<?php

include('db_info.php');

$ename			= 	$_POST['e_name'];
$tname			= 	$_POST['t_name'];


$sql1="insert into item_list (item_name,tamil_name) values";
$count=count($_POST['e_name']);
for($i=0;$i<$count;$i++)
{
	

	$sql1.="('".$ename[$i]."','".SQLite3::escapeString($tname[$i])."')";
	if($count>($i+1))
	{
		$sql1.=', ';
	}
	else{
		$sql1.='; ';
	}

     

}

// $sql=$sql.$sql1;
echo $sql1;
if($db->exec($sql1))
{
    header('location:../add-porul.php');
   // echo $sql;
}
else{
    echo 'data not inserted';
}

//echo $family_id;



?>
    