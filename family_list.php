<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('breadcrumb.php'); ?>
<?php include('db_info.php');  

?>

<div class="container">
<div class="columns search_section">

<div class="column col-4 ">
<div class="form-group">
<label class="form-label">Search by Barcode</label>
<form action="edit_family.php" method="get" id="bar_form">
  <input class="form-input" type="text" id="edit_family_bar" name="id" placeholder="Search by Barcode">
</form>
</div>
</div>
    <div class="column col-4 ">
    <div class="form-group">
    <label class="form-label">Search by name</label>
    <input id="text" type="text"  style="display: none;" placeholder=" bgau]">
    <form action="family_list.php" method="get" id="name_form">
  <input class="form-input  password-opener password tamil" type="text" name="name" id="family_list_name" placeholder="bgau]">
</form>
</div>
    </div>
    <div class="column col-4">
    <div class="form-group">
    <label class="form-label">Search by place</label>
  <!-- <input class="form-input" type="text" id="input-example-1" placeholder="Search by place"> -->
  <form action="family_list.php" method="get" id="place_form">
  <select class="form-input tamil" name="place" id="family_list_place" >
    <?php echo getPlace1();?>
  </select>
</form>
</div>
    </div>
  </div>
  <div class="divider mb-20" ></div>
  <div class="columns">
<?php
$i=1;

if(isset($_GET['place']) )
{
$sql="SELECT * from family_list where place='".$_GET['place']."' and family_status='1' order by family_type ASC";
}
elseif(isset($_GET['name']))
{
  $sql="SELECT * from family_list where family_head like '".urldecode($_GET['name'])."%' and family_status='1' order by family_type ASC";
}
elseif(isset($_GET['id']))
{
   $sql="SELECT * from family_list where family_id like '%".urldecode($_GET['id'])."%' and family_status='1' order by family_type ASC";
}
else{
  $sql="SELECT  * from family_list fl  inner join place p on p.id=fl.place where fl.family_status='1' order by family_type ASC, p.english ASC";
}

$results = $db->query($sql);
// echo $sql;
while ($row = $results->fetchArray()) {
  $title=getTitle($row['head_id']);
    ?>



    <div class="column col-xs-4 user_individual">
    <div class="tile tile-centered">
  
  
  <div class="tile-content">
    <div class="tile-title"> <figure class="avatar avatar-sm">
  <img src="avatar-2.png" alt="...">
</figure><span class="1 "><?php echo '<span>'.$title.' </span><span class="tamil">'.$row['family_head']; ?></span></span></div>
    <div class="tile-subtitle text-gray tamil"><?php echo getPlace($row['place']); ?></div>
    <div class="divider" ></div>
    <div>
<?php
$mem_result = $db->query("SELECT title,ini,member_name,member_id,status from family_members where family_id='".$row['family_id']."' and (status<>'Late')");
while($member = $mem_result->fetchArray())
{
   if($member['status']==='Late' || $member['status']==='late' )
    {  
        $status='Late';
        $sts_check=' checked="" ';

    }
    else{
      $status='';
    }
?>

      <span class="chip"><?php echo $status.' '.$member['title'].' '.str_replace('.',' ',strtoupper($member['ini'])).'  '.$member['member_name']; ?></span> 


<?php
}
      ?></div>
  </div>
  <div class="tile-action">
    <a class="btn btn-link" href="edit_family.php?id=<?php echo $row['family_id']; ?>">
    <i class="icon icon-edit"></i>  
    </a>
  </div>
</div></div>



    <?php
    if(($i%3)==0)
    {
      echo '

    </div>
    <div class="columns">

     ';
    }
  $i++;
  }
  ?>

  </div>
</div>

<?php include('footer.php'); ?>


<?php

function getPlace($id)
{
  $op='';

 if($id=='')
  {
    return '';
  }
    $db1 = new MyDB();
     $results1 = $db1->query("SELECT tamil from place where id=$id");
     // echo "SELECT tamil from place where id=".$id;
     while ($row1 = $results1->fetchArray()) {

        $op= $row1['tamil'];
     }
     $db1->close();
     return $op;
     // $db1->close();

}
function getPlace1()
{
    
    $db = new MyDB();
 $results = $db->query("SELECT distinct * from place ;");
  $op1='';
  while ($row = $results->fetchArray()) {
    $op1.='<option value="'.str_pad($row['id'], 2, '0', STR_PAD_LEFT).'">'.$row['tamil'].'</option>';
}
$db->close();
return $op1;
}

function getTitle($id)
{
  if($id=='')
  {
    return '';
  }
    $op='';
    $db1 = new MyDB();
     $results1 = $db1->query("SELECT * from family_members where member_id='$id'");
     while ($row1 = $results1->fetchArray()) {

        $op= $row1['title'].' '.$row1['ini'];
     }
     $db1->close();
     return $op;
     // $db1->close();

}
?>