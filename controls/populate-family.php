<?php

include('db_info.php');

$data=$_GET['id'];
$data=explode('-', $data);
$id= strtolower($data[0]);
$id=$data[0];
$length=sizeof($data);
//echo $id;
 $prop = new stdClass();
// $id=$_GET['id'];
$member=array();
//$member[]=array();
$result=$db->query("SELECT * FROM  family_members where family_id='".ucfirst($id)."' ");
// echo "SELECT * FROM  family_members where family_id='".SQLite3::escapeString(ucfirst($id))."' ";
$i=0;
// $prop = new stdClass();
// $prop=array();
$test='';
while($row=$result->fetchArray())
{
	 $var=array();
	 // $val=array();
	 
	$val=array('id'=>$row['id'],'name'=>$row['member_name'],'member_id'=>$row['member_id'],'member_type'=>$row['member_type']);
	//array_push($var,$val);
// $test.=;
	// $member[$i]['member_id']=$row['member_id'];
	// $member[$i]['member_type']=$row['member_type'];
	// $i++;
	array_push($member, $val);
	//print_r($row);
	//exit();
}

// echo "hello";
$place=getPlace($id);
$placeName=getPlaceName($place);
$recipt=getRecipt();
if($length>2)
{
	$member_id=$data[2];
}
else{
	$member_id=0;
}
 echo json_encode(array('member_id'=>$member_id,'receipt'=>$recipt,'family_id'=>$id,'place'=>$placeName,'cat'=>$data[1],'member'=>$member));
 // echo json_encode(array('getprops'=>true,'test1'=>$prop->address, 'test'=>$query,'category'=>$sort_category,'props'=>$props));

// print_r($member);

function getPlace($id){
	
$db = new MyDB();
// $id=ltrim($id, '0');
$result1=$db->query("SELECT place FROM  family_list where family_id='".$id."' ");
$row1=$result1->fetchArray();
$db->close();
return $row1['place'];




}
function getPlaceName($id=1){
	
$db = new MyDB();
$id=str_replace('Fl', '', $id);
$id=ltrim($id, '0');
$result1=$db->query("SELECT english FROM  place where id=".$id);
$row1=$result1->fetchArray();
$db->close();
// echo "SELECT english FROM  place where id=".$id;
return $row1['english'];




}
function getRecipt()
{
	
$db = new MyDB();
$result12=$db->query("SELECT id from receipt order by id DESC limit 1");
$row12=$result12->fetchArray();
$db->close();
return $row12['id'];


}
?>