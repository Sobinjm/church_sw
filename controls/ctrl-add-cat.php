<?php

include('db_info.php');

$ename			= 	$_POST['e_name'];
$tname			= 	$_POST['t_name'];
$desc 			= 	$_POST['desc'];
$freq 			= 	$_POST['freq'];
$cat_type 		= 	$_POST['cat_type'];


$sql1="insert into category (cat_name,cat_name_t,desc,freq,type) values";
$count=count($_POST['e_name']);
for($i=0;$i<$count;$i++)
{
	

	$sql1.="('".$ename[$i]."','".SQLite3::escapeString($tname[$i])."','".$desc[$i]."','".$freq[$i]."','".$cat_type[$i]."')";
	if($count>($i+1))
	{
		$sql1.=', ';
	}
	else{
		$sql1.='; ';
	}

     

}

// $sql=$sql.$sql1;
//echo $sql;
if($db->exec($sql1))
{
    header('location:../add-category.php');
   // echo $sql;
}
else{
    echo 'data not inserted';
}

//echo $family_id;



?>
    