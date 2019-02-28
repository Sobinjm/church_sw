<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<!-- <?php include('breadcrumb.php'); ?> -->
<div class="modal" id="delete_modal">
  <a href="#close" class="modal-overlay" aria-label="Close"></a>
  <div class="modal-container">
    <div class="modal-header">
      <a href="#close" class="btn btn-clear float-right" aria-label="Close"></a>
      <div class="modal-title h5">Delete</div>
    </div>
    <div class="modal-body">
      <div class="content">
      <form method="POST" action="controls/delete_receipt.php">
        <div class="columns">
            <div class="form-group column  col-12 ">
              Receipt ID: <label id="label_receipt"></label><br>
              Family Id: <label id="delete_f_id"></label><br>
              Family Head : <label id="delete_f_head"></label><br>
              Category : <label id="delete_cat"></label>
            </div>
        </div>
        <div class="columns">
          <div class="form-group column  col-3 ">
              Date
            <input type="date" class="form-input clear" name="delete_date" id="delete_date"   >
            </div>
            <div class="form-group column  col-3 ">
              Amount
            <input type="number" class="form-input clear" name="delete_amt" id="delete_amt"   >
            </div>
            <div class="form-group column  col-6 ">
              Description
              <textarea class="form-input clear" id="delete_desc" name="delete_desc" placeholder="Comments" rows="3" ></textarea>
              </div>
              <input type="hidden" id="delete_receipt_id" name="receipt_no">
              
              <div class="form-group column  col-2 ">
              <input type="submit"  class="btn btn-primary" name="" value="Change">
              </div>
            </div>

      </form>
      </div>
    </div>
    <div class="modal-footer">
      ...
    </div>
  </div>
</div>


<div class="modal" id="edit_modal">
  <a href="#close" class="modal-overlay" aria-label="Close"></a>
  <div class="modal-container">
    <div class="modal-header">
      <a href="#close" class="btn btn-clear float-right" aria-label="Close"></a>
      <div class="modal-title h5">Edit</div>
    </div>
    <div class="modal-body">
      <div class="content">
      <form method="POST" action="controls/edit_receipt.php">
        <div class="columns">
            <div class="form-group column  col-12 ">
              Receipt ID: <label id="label_receipt"></label><br>
              Family Id: <label id="edit_f_id"></label><br>
              Family Head : <label class="tamil" id="edit_f_head"></label><br>
              Category : <label id="edit_cat"></label>
            </div>
        </div>

        <div class="columns">
          <div class="form-group column  col-3 ">
              Date
            <input type="date" class="form-input clear" name="edit_date" id="edit_date"   >
            </div>
            <div class="form-group column  col-3 ">
              Amount
            <input type="number" class="form-input clear" name="edit_amt" id="edit_amt"   >
            </div>
            <div class="form-group column  col-6 ">
              Description
              <textarea class="form-input clear" id="edit_desc" name="edit_desc" placeholder="Comments" rows="3" ></textarea>
              </div>
              <input type="hidden" id="edit_receipt_id" name="receipt_no">
              
              <div class="form-group column  col-2 ">
              <input type="submit"  class="btn btn-primary" name="" value="Change">
              </div>
            </div>

      </form>
      </div>
    </div>
    <div class="modal-footer">
      ...
    </div>
  </div>
</div>
<div class="d-flex">
<h1>Daily Report</h1>

</div>

<div class="divider"></div>
<div class="columns">
        <div class="form-group column  col-3 ">
          <form action="receipt-report.php" target="_blank" id="report_form" name="family_form" method="GET" enctype="multipart/form-data">
<!-- <input class="form-input" id="receipt_date2" name="to" type="hidden"  placeholder="Receipt date" >  -->
<input class="form-input" id="receipt_date" name="to" type="date"  placeholder="Receipt date" >  
<input type="hidden" name="category" id="category">
<input type="submit"  class="btn btn-primary" name="" value="Get PDF">
</form>
</div>
</div>
<div class="divider"></div>
<div class="btn-group btn-group-block">
 <?php 
  include('db_info.php');
    $op='';
$i=0;
$results = $db->query("SELECT * from category where type='Income' order by cat_order ASC");
while ($row = $results->fetchArray()) {
	$category=$row['cat_name_t'];
	$id=$row['id'];
	if($category!='')
	{
if($i<7)
{
	echo'<button class="btn tamil cat-button" data-id="'.$id.'">'.$category.'</button>';
	$i++;
}
else{ 
	$i=0;
	echo '</div><div class="btn-group btn-group-block">'.
  '<button class="btn tamil cat-button"  data-id="'.$id.'">'.$category.'</button>';
  $i++;
}
}
}
echo '</div>';

  ?>

<div class="columns mt-20 dashboard">
	<table class="table table-striped table-hover">
  <thead>
  <tr>
    <th>Receipt #</th>
    <th>Receipt Date</th>
    <th>Member Name</th>
    <th>Amount</th>
    <th>Description</th>
    <th></th>
  </tr>
</thead>
  <tbody id="wreport_table">
    
  </tbody>
</table>



	</div>

<script type="text/javascript">
   var date = new Date();
    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = year + "-" + month + "-" + day;
    document.getElementById('receipt_date').value = today;
    document.getElementById('receipt_date2').value = today;

     $(document).ready(function()
      {
        $('#input-barcode').focus();
        // $('#input-barcode').val('hello');


      });

</script>