<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('breadcrumb.php'); ?>
<?php

include('db_info.php');
$i=1;
$id=$_GET['id'];
$results = $db->query("SELECT * from place where id=$id");

if($results)
{
while ($row = $results->fetchArray()) {
    $ename=$row['english'];
    $tname=$row['tamil'];

   // echo $cat_name;

//echo '<a href="edit_category.php"><span class="chip">'.$row['cat_name'].'</span></a>';

}
}
else{
    echo 'testing';
}



?>
    <!-- <a href="home.php">Home </a> -->
    <script language="javascript">

</script>
<div class="d-flex">
<h1>Edit Area</h1>

</div>
<div class="divider"></div>
<div class="columns">
    <div class="column col-xs-12 col-12">
    <form action="controls/update_area.php" name="family_form" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $id; ?>">
 <input id="text" type="text"  style="display: none;" placeholder=" Enter something...">

<table id="ttable" class="table table-striped table-hover">
            <thead>
                <th></th>
                <th>Area name in English</th>
                <th>Area name in Tamil</th>
               
                
            </thead>
            <tbody id="tbody-place">
            <tr>
                <td>1</td>
                <td>
                    <div class="form-group">
                        <input class="form-input" id="head0" type="text" name="e_name"placeholder="Name"  value="<?php echo $ename;?>">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input class="form-input text password-opener password tamil" type="text" id="t_name1" name="t_name" value="<?php echo $tname;?>" placeholder=",lk]">
                    </div>
                </td>
               
            </tr>
            
            </tbody>
        </table>

<input type="submit" class="btn btn-primary btn-lg mt-2 centered" name="" value="Update">
</form>

    </div>
   
  </div>
   
<?php include('footer.php'); ?>