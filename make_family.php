<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('breadcrumb.php'); 
include('db_info.php');
$i=1;
$m_id=$_GET['id'];
$results = $db->query("SELECT * from family_members fm inner join family_list fl on fm.family_id=fl.family_id  where fm.member_id='$m_id'");




?>
   
    <script language="javascript">


</script>
<style type="text/css">
    
</style>
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
             Do you realy want to Delte this family..?
            
            </div>
          
              
              <div class="form-group column  col-2 ">
              <a href="coltrols/delete_family.php?id=<?php echo $id;?>" aria-label="Delete"></a>
              <a href="#close"  aria-label="Close"></a>
              </div>
            </div>

    
      </div>
    </div>
    <div class="modal-footer">
       <a href="controls/delete_family.php?id=<?php echo $id;?>" class="btn btn-primary btn btn-primary" aria-label="Delete"> Delete</a>
              <!-- <a href="#close"  aria-label="Close"></a> -->
              <a href="#close" class="btn btn-primary btn btn-primary" aria-label="Close">Close</a>
               <!-- <input type="button"  aria-label="Close" class="btn btn-primary" name="" value="Close"> -->
    </div>
  </div>
</div>
<input id="text" type="text"  style="display: none;" placeholder=" Enter something...">


    <form action="controls/make_family.php" name="family_form" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="family_id" value="<?php echo $id; ?>">

        <table id="ttable" class="table table-striped table-hover">
            <thead>
                <th></th>
                <th>Member Name</th>
                <th>bgau;</th>
                <th>Date of Birth</th>
                <th>Date of Baptism</th>
                <th>Member Type</th>
                <th>Relation</th>
                <th>Gender</th>
                <th>Member Status</th>
                <th>Action</th>                
            </thead>
            <tbody id="tbody">
                <?php
if($results)
{
    $i=1;
    $ii=0;
while ($row = $results->fetchArray()) {
    $status='';
    $i++;
    $family_status=$row['family_status'];
    $title=$row['title'];
    $ini=$row['ini'];
    $ename=$row['member_name'];
    $tname=$row['m_name_t'];
    $gender=$row['gender'];
    $dob=$row['do_birth'];
    $place=$row['place'];
    $mobile=$row['phone'];
    $member_id=$row['member_id'];
    $family_type=$row['family_type'];
    if($row['do_baptism']==='1970-01-01')
    {
        $do_baptism='';
    }
    else{
        $do_baptism=$row['do_baptism'];
    }
    $relation=$row['relation'];
    $occupation=$row['occupation'];
    $sts_check='';
   if($row['status']==='Late' || $row['status']==='late' )
    {  
        $status='Late';
        $sts_check=' checked="" ';

    }
    else{ 
        $sts_check='';
     $status='';
 }
 $head_check='';
   // echo $row['status'];
   if($row['member_type']==1)
    {   
        echo '<input type="hidden"  value="'.$tname.'" name="family_head_old"/>';
       echo '<input type="hidden" value="'.$tname.'" name="family_head" id="family_head"/>';
        $head_check=' checked="" ';
        $head='Family Head';
    }
    else{  

        $head_check='';
        $head='Member';
    }
     echo '<input type="hidden" id="head'.$ii.'" value="'.$tname.'" name="head1" />';
      echo '<input type="hidden" value="'.$tname.'" name="family_head" id="family_head"/>';
    echo '<input class="form-input" id="t_name'.$i.'" type="hidden"  name="t_name[]" value="'.$tname.'">';
      
?><input id="text" type="text"  style="display: none;" placeholder=" Enter something...">

            <tr>
                <td><?php echo $i; ?></td>
                
                <td>
                   <span><?php echo $status.' '.$title.' '.$ini.' '.$ename; ?></span>
                </td>
                <td>
                   <span> <?php echo $status.' '.$title.' '.$ini.' <span class="tamil">'.$tname;?> </span></span>
                </td>
                <td> 
                    <span><?php echo $dob; ?></span>
                <td>
                    <span><?php echo $do_baptism; ?></span>
                </td>
                <td>
                    <input type="hidden" name="member_id[]" value="<?php echo $member_id; ?>">
                    <div class="form-group">
                        <label class="form-radio form-inline">
                            <input type="radio" class="head" name="head" <?php echo $head_check; ?>  value="H<?php echo $ii; ?>" data-id="head<?php echo $ii; ?>"><i class="form-icon"></i> Head
                        </label>
                    </div>              
                </td>
                <td>
                    <span><?php echo $relation;?></span>
                </td>
                <td>
                    <span><?php echo $gender;?></span>
                </td>    
                <td>
                    <div class="form-group">
                        <label class="form-checkbox form-inline">
                            <input <?php echo $sts_check; ?> type="checkbox" data-id="<?php echo $row['status'];?>" name="sts<?php echo $ii; ?>" value="Late" ><i class="form-icon"></i> Late
                        </label>
                        <!-- <label class="form-checkbox form-inline" style="display: none;">
                            <input type="radio" name="sts[0]" value="1" checked=""><i class="form-icon"></i> Live
                        </label> -->
                    </div>
                </td>
                <td>
                   <span><?php echo '<a href="edit_member.php?id='.$member_id.'">Edit</a> '; ?></span>
                </td>
            </tr>
            



<?php
$ii++;
}
}
else{
    echo 'No Members Found';
}
?>
            </tbody>
        </table>
        
        <!-- <a  class="btn  mt-2 col-lg-2 centered" href="delete_family.php?<?php echo $$id; ?>">Delete Family</a> -->
        <table class="table table-striped mt-2">
            <tr>
                <th>Status</th>
                <th>Category</th>
                <th>Area</th>
                <th>Phone Number</th>
                <th>Address</th>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        <select class="form-select"  name="family_status">
                            <option value="1" <?php if($family_status==1){echo' selected="" ';} ?>>Active Family</option>
                            <option value="2" <?php if($family_status==2){echo' selected="" ';} ?>>Transfered Family</option>
                             
                        </select>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <select class="form-select"  name="category">
                             <?php  echo getCategory($family_type); ?>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <select class="form-select tamil"  name="place">
                           <?php  echo getPlace($place); ?>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input class="form-input" value="<?php echo $mobile; ?>" type="text" name="phone" placeholder="Phone number">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <textarea class="form-input" id="input-example-3" placeholder="Textarea" rows="3" name="address"></textarea>
                    </div>
                </td>
            </tr>
        </table>
        
        <input type="submit" class="btn btn-primary btn-lg mt-2 centered" name="" value="Create Family">
    </form>

<?php include('footer.php'); ?>

<?php
function getPlace($place)
{
    
    $db = new MyDB();
 $results = $db->query("SELECT distinct * from place ;");
  $op1='';
   // $op1.='<option value="'.$place.'">'.$place.'</option>';
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
    $op1.='<option '.$check.' value="'.$row['id'].'-'.$row['tamil'].'">'.$row['tamil'].'</option>';
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
?>