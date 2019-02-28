<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('breadcrumb.php'); ?>
<?php

include('db_info.php');
$i=1;
$id=$_GET['id'];
$results = $db->query("SELECT * from category where id=$id");

if($results)
{
while ($row = $results->fetchArray()) {
    $ename=$row['cat_name'];
    $tname=$row['cat_name_t'];
    $desc=$row['desc'];
    $freq=$row['freq'];
    $type=$row['type'];
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
<h1>Edit Category</h1>

</div>
<div class="divider"></div>
<div class="columns">
    <div class="column col-xs-12 col-12">
    <form action="controls/Update_category.php" name="family_form" method="POST" enctype="multipart/form-data">
        <input id="text" type="text"  style="display: none;" placeholder=" Enter something...">

<input type="hidden" name="id" value="<?php echo $id; ?>">
<table id="ttable" class="table table-striped table-hover">
    <thead>
        <th></th>
        <th>Category Name</th>
        <th>Category Name</th>
        <th>Category Description</th>
        <th>Category Frequency</th>
        <th></th>
        
    </thead>
    <tbody id="tbody-cat">
    <tr>
        <td>1</td>
        <td>
            <div class="form-group">
                <input class="form-input" id="head0" type="text" value="<?php echo $ename; ?>"  name="e_name"placeholder="In English">
            </div>
        </td>
        <td>
            <div class="form-group">
                <input class="form-input tamil    password-opener password tamil" type="text" value="<?php echo $tname; ?>"  id="t_name1" name="t_name" placeholder="In Tamil">
            </div>
        </td>
        <td>
            <div class="form-group">
                <input class="form-input text" type="text"  value="<?php echo $desc; ?>" id="desc" name="desc" placeholder="Description">
            </div>
        </td>
        <td>
            <div class="form-group">
                <input class="form-input text" type="number" value="<?php echo $freq; ?>"  id="freq" name="freq" placeholder="Frequency">
            </div>
        </td>
        <td>
            
            <div class="form-group">
               <select name="cat_type" class="form-select">
                   <option value="Income" <?php if($type=='Income'){ echo 'selected="selected"'; } ?>>Income</option>
                   <option value="Expence" <?php if($type=='Expence'){ echo 'selected="selected"'; } ?>>Expence</option>
               </select>
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