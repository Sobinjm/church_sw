<?php

include('db_info.php');

$family_id=$_POST['family_id'];
$member_id=$_POST['member_id'];
$title=$_POST['title'];
$ini=$_POST['ini'];
$ename=$_POST['ename'];
$tname=SQLite3::escapeString($_POST['tname']);
$gender=$_POST['gender'];
$do_birth=$_POST['do_birth'];
$do_baptism=$_POST['do_baptism'];
$relation=$_POST['relation'];
$occupation_e=$_POST['occupation_e'];
$occupation_t=SQLite3::escapeString($_POST['occupation_t']);
$do_comm=$_POST['do_comm'];
$do_death=$_POST['do_death'];
$do_marriage=$_POST['do_marriage'];
$do_join=$_POST['do_join'];  

$sql="update family_members  set title='$title',ini='$ini',member_name='$ename',m_name_t='$tname',gender='$gender',do_birth='$do_birth',do_baptism='$do_baptism',relation='$relation',occupation='$occupation_e',occupation_t='$occupation_t',do_comm='$do_comm',do_death='$do_death',do_marriage='$do_marriage',do_join='$do_join'";

if(isset($_POST['marriedoff']))
{
	 $sql.=",status='MarriedOff' ";
}



  $sql.=" where member_id='$member_id'; ";


// echo $sql;
if($db->exec($sql))
{
    header('location:../edit_family.php?id='.$family_id);
   // echo $sql;
}
else{
    echo 'data not inserted';
}





?>
