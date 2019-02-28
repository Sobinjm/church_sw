<?php
session_start();
$username=SQLite3::escapeString($_POST['username']);
$pwd1=SQLite3::escapeString($_POST['pwd']);
$pwd=md5($pwd1);
include('db_info.php');
$i=1;
$sql="SELECT * from users where email='".$username."' AND password='".$pwd."'";
$results = $db->query($sql);

if($results)
{
while ($row = $results->fetchArray()) {
	 $_SESSION['username']=$row['username'];
	 $_SESSION['email']=$row['email'];
	 $_SESSION['mobile']=$row['mobile'];
     $_SESSION['login_error']='';
     // echo $sql;
   header('location:../home.php');

}
}else{
    $_SESSION['login_error']='Invalid Username/Password.';
    header('location:../index.php?e=0');
} 
//echo $sql;


// if($username=='jesus' && $pwd=='jesus' || 1==1)
// {
//      $_SESSION['username']=$username;
//      $_SESSION['login_error']='';
//     header('location:../home.php');
//  }
// else{
//     $_SESSION['login_error']='Invalid Username/Password.';
//     header('location:../index.php?e=0');
// } 

?>