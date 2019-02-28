<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('breadcrumb.php'); 


include('db_info.php');
$i=1;
$id=$_GET['id'];
$results = $db->query("SELECT * from family_members where member_id='$id'");




?>
    <a href="home.php">Home </a>
    <script language="javascript">


</script>
    <script type="text/javascript" src="js/choosen.js"></script>
<script type="text/javascript">
$(".chosen").chosen();
</script>
<style type="text/css">
    
</style>

<input id="text" type="text"  style="display: none;" placeholder=" Enter something...">



        <table id="ttable" class="table table-striped table-hover">
            

            
                <?php
if($results)
{
    $i=1;
while ($row = $results->fetchArray()) {
    $status='';
    $i++;
    $title=$row['title'];
    $ini=$row['ini'];
    $ename=$row['member_name'];
    $tname=$row['m_name_t'];
    $gender=$row['gender'];
    $dob=$row['do_birth'];

   
    if($row['do_baptism']==='1970-01-01')
    {
        $do_baptism='';
    }
    else{
        $do_baptism=$row['do_baptism'];
    }
    $relation=$row['relation'];
    $occupation_e=$row['occupation'];
    $occupation_t=$row['occupation_t'];
    $family_id=$row['family_id'];
   if($row['status']==='late')
    {  
        $status='Late';

    }
    else{ 
     $status='';
 }
   // echo $row['status'];
   if($row['member_type']==1){   $head='Family Head';}else{  $head='Member';}
?> <input id="text" type="text"  style="display: none;" placeholder=" Enter something...">
<tr>
<td colspan=""><a style="" class="btn btn-primary btn-lg mt-2" href="#delete_modal">Delete Member</a></td>
<td colspan=""><a style="" class="btn btn-primary btn-lg mt-2" href="make_family.php?family=<?php echo $family_id.'&id='.$id;?>">Make Family</a></td>
<td colspan=""><form action="controls/change_family.php" method="post">
    <input type="hidden" name="member_id" value="<?php echo $id; ?>">
    <select class=" form-select tamil" name="new_family"><?php echo getNewFamily($family_id); ?></select></td>
<td colspan=""><button type="submit" style="" class="btn btn-primary btn-lg mt-2" href="#delete_modal">Change Family</button> </form></td>
</tr>

    <form action="controls/update_member.php" name="family_form" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="member_id" value="<?php echo $id; ?>">
         <tr>
             <td>Title</td><td>
                <input type="hidden" name="family_id" value="<?php echo $family_id; ?>">
            
                <select name="title">
                <option <?php if($title=='Mr'){echo' selected="" ';}?> value="Mr">Mr</option>
                <option <?php if($title=='Mrs'){echo' selected="" ';}?> value="Mrs">Mrs</option>
                <option <?php if($title=='Miss'){echo' selected="" ';}?> value="Miss">Miss</option>
            </select>
        </td>
        <td colspan="2"><input type="checkbox" name="marriedoff" value="marriedoff"> Married Off
        </td>
         </tr>
         <tr>
            <td>Initial</td>
            <td colspan="4"><input type="text" name="ini" value="<?php echo $ini; ?>"></td>
         </tr>
         <tr>
            <td>English Name</td>
            <td colspan="4"><input type="text" name="ename" value="<?php echo $ename; ?>"></td>
         </tr>
         <tr>
            <td>bgau;</td>
            <td colspan="3"><input type="text" name="tname" class=" password-opener password tamil" value="<?php echo $tname; ?>"></td>
         </tr>
         <tr>
             <td>Gender</td>
             <td colspan="4"><select name="gender">
                 <option <?php if($gender=='Male'){echo' selected="" ';}?> value="Male">Male</option>
                 <option <?php if($gender=='Female'){echo' selected="" ';}?> value="Female">Female</option>
             </select></td>
         </tr>
         <tr>
             <td>Date of Birth</td>
             <td colspan="3"><input type="date" name="do_birth" value="<?php echo $dob; ?>"></td>
         </tr>
          <tr>
             <td>Date of Baptism</td>
             <td><input type="date" name="do_baptism" value="<?php echo $do_baptism; ?>"></td>
         </tr>
         <tr>
             <td>Relation</td>
            
             <td colspan="3"><select name="relation">
                 <option <?php if($relation=='H/o'){echo' selected="" ';}?> value="H/o">H/o</option>
                 <option <?php if($relation=='W/o'){echo' selected="" ';}?> value="W/o">W/o</option>
                  <option <?php if($relation=='D/o'){echo' selected="" ';}?> value="D/o">D/o</option>
                   <option  <?php if($relation=='S/o'){echo' selected="" ';}?> value="S/o">S/o</option>
             </select></td>
         </tr>
          <tr>
            <td>Occupation English</td>
            <td colspan="4"><input type="text" name="occupation_e" class="" value="<?php echo $occupation_e; ?>"></td>
         </tr>
         <tr>
            <td>Occupation Tamil</td>
            <td colspan="3"><input type="text" name="occupation_t" class=" password-opener password tamil" value="<?php echo $occupation_t; ?>"></td>
         </tr>
         <tr>
             <td>Date of Communian</td>
             <?php $do_comm=$row['do_comm']; ?>
             <td colspan="3"><input type="date" name="do_comm" value="<?php echo $do_comm; ?>"></td>
         </tr>
         <tr>
             <td>Date of Marriage</td>
              <?php $do_marriage=$row['do_marriage']; ?>
             <td colspan="3"><input type="date" name="do_marriage" value="<?php echo $do_marriage; ?>"></td>
         </tr>
         <tr>
             <td>Date of Death</td>
              <?php $do_death=$row['do_death']; ?>
             <td colspan="3"><input type="date" name="do_death" value="<?php echo $do_death; ?>"></td>
         </tr>
         <tr>
             <td>Date of Join</td>
              <?php $do_join=$row['do_join']; ?>
             <td colspan="3"><input type="date" name="do_join" value="<?php echo $do_join; ?>"></td>
         </tr>
         




<?php
}
}
else{
    echo 'No Members Found';
}
?>
           
        </table>
      
      <div class="modal" id="delete_modal">
  <a href="#close" class="modal-overlay" aria-label="Close"></a>
  <div class="modal-container">
    <div class="modal-header">
      <a href="#close" class="btn btn-clear float-right" aria-label="Close"></a>
      <div class="modal-title h5">Edit</div>
    </div>
    <div class="modal-body">
      <div class="content">
     
        <div class="columns">
            <div class="form-group column  col-6 ">
             Do you realy want to Delte this Member..?
            
            </div>
          
              
              <div class="form-group column  col-2 ">
              <a href="coltrols/delete_member.php?id=<?php echo $id;?>&family_id=<?php echo $family_id; ?>" aria-label="Delete"></a>
              <a href="#close"  aria-label="Close"></a>
              </div>
            </div>

    
      </div>
    </div>
    <div class="modal-footer">
       <a href="controls/delete_member.php?id=<?php echo $id;?>&family_id=<?php echo $family_id; ?>" class="btn btn-primary btn btn-primary" aria-label="Delete"> Delete</a>
              <!-- <a href="#close"  aria-label="Close"></a> -->
              <a href="#close" class="btn btn-primary btn btn-primary" aria-label="Close">Close</a>
               <!-- <input type="button"  aria-label="Close" class="btn btn-primary" name="" value="Close"> -->
    </div>
  </div>
</div>
        <input type="submit" class="btn btn-primary btn-lg mt-2 centered" name="" value="Submit">
    </form>
<!--     <script type="text/javascript" src="js/choosen.js"></script>
<script type="text/javascript">
$(".chosen").chosen();
</script> -->

<?php include('footer.php'); ?>

<?php
function getPlace($place)
{
    
    $db = new MyDB();
 $results = $db->query("SELECT distinct * from place ;");
  $op1='';
  while ($row = $results->fetchArray()) {
    $check='';
    if($place==$row['id'])
    {
        $check=' selected="selected" ';
    }
    else
    {
        $check='';
    }
    $op1.='<option value="'.$row['id'].'-'.$row['english'].'">'.$row['tamil'].'</option>';
}
$db->close();
return $op1;
}
function getCategory($type)
{
    // include('db_info.php');
    $db = new MyDB();
 $results = $db->query("SELECT distinct * from family_category ;");
  $op1='';
  while ($row = $results->fetchArray()) {
    $check='';
    if($type==$row['id'])
    {
        $check=' selected="selected" ';
    }
    else
    {
        $check='';
    }
    $op1.='<option '. $check.' value="'.$row['id'].'">'.$row['english'].'</option>';
}
$db->close();
return $op1;
}



function getNewFamily($id)
{
    // include('db_info.php');
    $db = new MyDB();
 $results = $db->query("SELECT distinct family_id, family_head from family_list ;");
  $op1='';
  while ($row = $results->fetchArray()) {
    $check='';
    if($id==$row['family_id'])
    {
        $check=' selected="selected" ';
    }
    else
    {
        $check='';
    }
    $op1.='<option class="tamil" '. $check.' value="'.$row['family_id'].'">'.$row['family_head'].'</option>';
}
$db->close();
return $op1;
}
?>
