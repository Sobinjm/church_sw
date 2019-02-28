<?php

include('db_info.php');

$place			= 	explode('-', $_POST['place']);

$ename			= 	$_POST['e_name'];
$tname			= 	$_POST['t_name'];
$dob 			= 	$_POST['dob'];
$dobt 			= 	$_POST['dobp'];
$relation 		= 	$_POST['relation'];
$head 			= 	isset($_POST['head'])?$_POST['head']:'';
$sex 			= 	$_POST['sex'];
$ini      = $_POST['ini'];
$title    = $_POST['sir_name'];

$cat = $_POST['category'];
$place1       =   SQLite3::escapeString($_POST['place']);
$place     =explode('-',$place1);
// $occupation 	= 	$_POST['occupation'];
$area_code 		= 	str_pad($place[0], 3, '0', STR_PAD_LEFT);
$area 			= 	$place[1];
$new_id=getFamilyId();
$family_id 		= 	str_pad($area_code, 3, '0', STR_PAD_LEFT).'/'.str_pad($new_id, 3, '0', STR_PAD_LEFT);
$phone 			= 	SQLite3::escapeString($_POST['phone']);

$address 		= 	SQLite3::escapeString($_POST['address']);
$family_head 	= 	SQLite3::escapeString($_POST['family_head']);
$image_file=$_FILES['m_photo'];

if(empty($ename[0]))
{
 // echo '<script>alert("Please enter required fields."); window.location.href="../add_family.php";</script>';
 header('location:../add_family.php?e=0');
 die();
}

$head_id='';

$sql1="insert into family_members (family_id,member_id,title,ini,member_name,m_name_t,gender,do_birth,do_baptism,relation,member_type,status) values";
$count=count($_POST['e_name']);
for($i=0;$i<$count;$i++)
{
	
  $member_id 		=	uniqid();
	if($_POST['head']=='H'.$i)
	{
		$head_id 		.=	$member_id;
		//echo 'H'.$i.'==='.$_POST['head'];
    $head_sts=1;
	}
	else{
		$head_id 		.=	't';
     $head_sts=0;

	}
$status     = (isset($_POST['sts'][$i])) ? $_POST['sts'][$i] : 0;

	$ename[$i];
	$sql1.="('".$family_id."','".$member_id."','".$title[$i]."','".$ini[$i]."','".$ename[$i]."','".$tname[$i]."','".$sex[$i]."','".$dob[$i]."','".$dobt[$i]."','".$relation[$i]."',".$head_sts.",'".$status."')";
	if($count>($i+1))
	{
		$sql1.=', ';
	}
	else{
		$sql1.='; ';
	}

if ($_FILES['m_photo']['size'][$i] == 0 && $_FILES['m_photo']['error'] == 0)
{
      if ($_FILES['m_photo'] ['error'] > UPLOAD_ERR_OK){
          $imagename = $_FILES['m_photo']['name'][$i];
          $source = $_FILES['m_photo']['tmp_name'][$i];
          $target = "uploads/".$imagename;
          $ext = (explode(".", $imagename));
          $ext=end($ext);
          move_uploaded_file($source, $target);
          $new_name= $member_id.'.'.$ext;

          $imagepath = $imagename;
          $save = "uploads/" . $new_name; //This is the new file you saving
          $file = "uploads/" . $imagepath; //This is the original file

          list($width, $height) = getimagesize($file) ; 


          $tn = imagecreatetruecolor($width, $height) ; 
          $image = imagecreatefromjpeg($file) ; 
          imagecopyresampled($tn, $image, 0, 0, 0, 0, $width, $height, $width, $height) ; 

          imagejpeg($tn, $save, 100) ; 

          $save = "uploads/sml_" . $new_name; //This is the new file you saving
          $file = "uploads/" . $imagepath; //This is the original file

          list($width, $height) = getimagesize($file) ; 

          $modwidth = 160; 

          $diff = $width / $modwidth;

          $modheight = 185; 
          $tn = imagecreatetruecolor($modwidth, $modheight) ; 
          $image = imagecreatefromjpeg($file) ; 
          imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ; 

          imagejpeg($tn, $save, 100) ; 
          unlink('uploads/'.$imagepath);
        // echo "Large image: <img src='uploads/".$imagepath."'><br>"; 
        // echo "Thumbnail: <img src='uploads/sml_".$imagepath."'>"; 

      }
      else{
      	echo "image error";
      	die();
      }
    }



}
$sql="insert into family_list (family_id,phone,place,t_area,address,family_head,family_type,head_id) values('$family_id','$phone','$place[0]','$area','$address','$family_head',$cat,'$head_id'); ";

$sql=$sql.$sql1;
// echo $sql;
if($db->exec($sql))
{
    header('location:../family_list.php');
   // echo $sql;
}
else{
    echo 'data not inserted';
}

//echo $family_id;

function getFamilyId()
{
  
$db = new MyDB();
$result12=$db->query("SELECT id from family_list order by id DESC limit 1");
$row12=$result12->fetchArray();
$db->close();
return $row12['id']+1;


}

?>
