<?php

include('db_info.php');
$username=SQLite3::escapeString($_POST['username']);
$pwd1=SQLite3::escapeString($_POST['password']);
$pwd=md5($pwd1);
$email=SQLite3::escapeString($_POST['email']);
$mobile=SQLite3::escapeString($_POST['mobile']);


$sql="insert into users (username,email,password,mobile) values('".$username."','".$email."','".$pwd."','".$mobile."'); ";


// echo $sql;
if($db->exec($sql))
{
    header('location:logout.php');
   // echo $sql;
}
else{
     header('location:../index.php?e=1');
}

?>
