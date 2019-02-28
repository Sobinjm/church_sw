<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('breadcrumb.php'); ?>
    <!-- <a href="home.php">Home </a> -->
    <script language="javascript">

</script>
<div class="d-flex">
<h1>Add Category</h1>

</div>
<div class="divider"></div>
<div class="columns">
    <input id="text" type="text"  style="display: none;" placeholder=" Enter something...">

    <div class="column col-xs-8 col-8">
    <form action="controls/ctrl-add-cat.php" name="family_form" method="POST" enctype="multipart/form-data">

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
                <input class="form-input" id="head0" type="text" name="e_name[]"placeholder="In English">
            </div>
        </td>
        <td>
            <div class="form-group">
                <input class="form-input   password-opener password tamil" type="text" id="t_name1[]" name="t_name[]" placeholder="ml]il bgau]">
            </div>
        </td>
        <td>
            <div class="form-group">
                <input class="form-input text" type="text" id="desc[]" name=desc[]" placeholder="Description">
            </div>
        </td>
        <td>
            <div class="form-group">
                <input class="form-input text" type="number" id="freq[]" name=freq[]" placeholder="Frequency">
            </div>
        </td>
        <td>
            
            <div class="form-group">
               <select name="cat_type[]" class="form-select">
                   <option value="Income">Income</option>
                   <option value="Expence">Expence</option>
               </select>
            </div>
        </td>
       
    </tr>
    
    </tbody>
</table>
<button type="button" id="btAdd-cat" class="btn btn-primary btn-lg mt-2 centered"><i class="icon icon-plus"></i> Add</button>

<input type="submit" class="btn btn-primary btn-lg mt-2 centered" name="" value="Submit">
</form>

    </div>
    <div class="column col-xs-4">
    <div class="d-flex">
<h5>Category List</h5>

</div>
<div class="divider"></div>
<?php

include('db_info.php');
$i=1;
$results = $db->query("SELECT * from category ");
while ($row = $results->fetchArray()) {

echo '<a href="edit_category.php?id='.$row['id'].'"><span class="chip">'.$row['cat_name'].'</span></a>';

}


?>
    <!-- <span class="chip">Category name</span><span class="chip">Category name</span><span class="chip">Category name</span><span class="chip">Category name</span><span class="chip">Category name</span><span class="chip">Category name</span><span class="chip">Category name</span><span class="chip">Category name</span><span class="chip">Category name</span><span class="chip">Category name</span> -->

    </div>
  </div>
   
<?php include('footer.php'); ?>