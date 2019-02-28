<?php
include('db_info.php');

$sql="";
// $sql1="insert into place (id,english,tamil) values";
$i=1;
   $file = fopen('new_member_list_new.csv', "r");
	       // $file = fopen($target_file,"r");
if(!$file)
{
 //header("location:hehherer.php");
  die('Error! File not found!');
}
$sql="";
while(! feof($file))
  {

    $csv_field = fgetcsv($file, 5000);
    // $ename=SQLite3::escapeString($csv_field[1]);
    // $tname=SQLite3::escapeString($csv_field[0]);
    // $sql1.="(".$i.",'".$ename."','".$tname."'),";
    // $i++;
$member_id    = uniqid();
$family_type 	=  SQLite3::escapeString($csv_field[0]);
$f_id 			=  SQLite3::escapeString($csv_field[1]);
$member_title 	=  SQLite3::escapeString($csv_field[3]);
$member_initial =  SQLite3::escapeString($csv_field[4]);
$ename 			=  SQLite3::escapeString($csv_field[5]);
$tname 			=  SQLite3::escapeString($csv_field[6]);
$member_type 	=  SQLite3::escapeString($csv_field[12]);
if($member_type==1)
{
	$head_id=$member_id;
	$head_name=$tname;
 $head_sts=1;
}
else{
	$head_id 		=	't';
	 $head_sts=0;

}
$relation 		=  SQLite3::escapeString($csv_field[7]);
$sex 			=  SQLite3::escapeString($csv_field[9]);
$area 			=  SQLite3::escapeString($csv_field[11]);
$place_id 		=  getPlaceID($area);
$t_area 		=  SQLite3::escapeString($csv_field[10]);
$phone 			=  SQLite3::escapeString($csv_field[13]);
$dob1     =  SQLite3::escapeString($csv_field[15]);
$dob=date("Y-m-d", strtotime($dob1));
$do_join1      =  SQLite3::escapeString($csv_field[14]);
$do_join = date("Y-m-d", strtotime($do_join1));
$do_baptism1      =  SQLite3::escapeString($csv_field[16]);
$do_baptism = date("Y-m-d", strtotime($do_baptism1));
$do_comm1      =  SQLite3::escapeString($csv_field[17]);
$do_comm = date("Y-m-d", strtotime($do_comm1));
$do_marriage1      =  SQLite3::escapeString($csv_field[18]);
$do_marriage = date("Y-m-d", strtotime($do_marriage1));
$do_dead1      =  SQLite3::escapeString($csv_field[19]);
$do_dead      =  date("Y-m-d", strtotime($do_dead1));
$area_code 		= 	str_pad($place_id, 2, '0', STR_PAD_LEFT);
if($family_type!='1')
{
 $cat_name=getCatName($family_type);
 if($family_type=='0')
 {
  $prefix='';
 }
 else{
  $prefix=substr($cat_name,0,2);
 }
 // echo $prefix.'=='.substr($cat_name,0,2).'<br>';
}
else{
  $prefix='';
}
$fty=getFamilyId($family_type);
$family_id1 		= $prefix.str_pad($area_code, 3, '0', STR_PAD_LEFT).'/'.str_pad($fty, 3, '0', STR_PAD_LEFT);
// echo getFamilyId($family_type).'<br>';
if(isset($old_fid) && $old_fid==$f_id)
{
	$family_id=$family_id;
}
else{
	$old_fid=$f_id;
	$family_id=$family_id1;
	$sql.=" insert into family_list (family_id,phone,place,t_area,family_head,family_type,head_id) values('$family_id','$phone','$place_id','$t_area','$tname','$family_type','$member_id'); ";

}


$sql.="insert into family_members (family_id,member_id,title,ini,member_name,m_name_t,gender,do_birth,do_baptism,relation,member_type,do_comm,do_death,do_marriage,do_join) values";
$sql.="('".$family_id."','".$member_id."','".$member_title."','".$member_initial."','".$ename."','".$tname."','".$sex."','".$dob."','".$do_baptism."','".$relation."',".$head_sts.",'".$do_comm."','".$do_dead."','".$do_marriage."','".$do_join."'); ";


// echo $old_fid.'------>'.$f_id.'---'.$family_id.'<br>';
$i++;
echo $family_id.'=='.'<br>';
echo $sql.'<br>';
    if($db->exec($sql))
{
	$sql='';
   // header('location:../list_family.php');
   // echo $sql;
}
else{
	die();
	echo $ename.'<br>';
    echo 'data not inserted';
}
    }

    

    //fclose($file_handle);
    //print_r($line_of_text);

function getPlaceID($place)
{


    $db = new MyDB();
 $results = $db->query("SELECT distinct * from place where english='".$place."';");
  $op1='';
  while ($row = $results->fetchArray()) {
    $op1 =$row['id'];
}
$db->close();
return $op1;

}

function getFamilyId($cat)
{
  
$db = new MyDB();
$result12=$db->query("SELECT id from family_list order by id DESC limit 1");
// echo "SELECT id from family_list where family_type='".$cat."' order by id DESC limit 1";
// die();
$row12=$result12->fetchArray();
$db->close();
return  $row12['id']+1;
// die();


}
function getCatName($cat)
{
   $db = new MyDB();
 $results = $db->query("SELECT distinct * from family_category where id='$cat'; ");
 //echo "SELECT distinct english from family_category where id=".$cat.";";
  $op1='';
  while ($row = $results->fetchArray()) {
    $op1 =$row['english'];
}
$db->close();
return $op1;
}
?>