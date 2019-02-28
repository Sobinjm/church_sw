<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('breadcrumb.php');
include('db_info.php');
class MyDBb extends SQLite3{
    function __construct()
    {
        $this->open('church.db');
    }
}?>
<script type="text/javascript">
  $(document).ready(function()
    {


  });
</script>
<link rel="stylesheet" type="text/css" href="css/style-select.css">

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
              Family Head : <label id="edit_f_head"></label><br>
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

<div class="container">
<div class="columns flex-space-between">
	<h2>New Receipt</h2>
	<div class="h6">Receipt number:<span id="receipt_no"></span></div>
               
              
</div>
<div class="columns">
  <div class="column col-12 col-xs-12"><div class="columns flex-space-between">
    <?php
        $dbtotal = new MyDB();
$results = $dbtotal->query("SELECT distinct category from receipt where entry_date=date('now')  order by id DESC");
while ($row = $results->fetchArray()) {
    $category_name=getCategoryName($row['category']);
   $category_name_t=getCategoryName_t($row['category']);
  $category_amount=getCategoryAmount($row['category']);
  echo '<div class="col-3"><span class="tamil">'.$category_name_t.'</span>:<span>'.$category_amount.'</span></div>';
}

  ?>
  </div>

  </div>
<div class="column col-9 col-xs-12">
<!-- <form class="form" action="test.php" method="get"> -->
				<!-- form input control -->
				<div class="columns">
<div class="form-group column  col-3 ">
  <input class="form-input" type="text" id="input-barcode" placeholder="Enter barcode">
</div>
<div class="form-group column  col-3 ">
<input class="form-input" id="receipt_date" type="date"  placeholder="Receipt date" >  
<p class="form-input-hint">Receipt Date</p>
</div>
<div class="form-group column  col-2">
      <select class="form-select chosen " id="cat" name="cat">
        <option value="0">Default category</option>
        <?php echo getCategoryList(); ?>
      </select>
	</div>
	<div class="form-group column  col-2">
      <select class="form-select chosen" id="f_id" name="family_head">
         <option value="0">Select Family</option>
        <?php echo getFamilyList(); ?>
      </select>
    </div>
      <div class="form-group column  col-2">
      <select class="form-select chosen" id="m_id" name="member_head" style="visibility: hidden;">
         <option value="0">Select Family</option>
        <?php echo getMemberList(); ?>
      </select>
    </div>
</div>

<style type="text/css">
  #m_id_chosen{
/*visibility: hidden;*/
display: none;
  }
</style>


<div id="loader" class="receipt_panel">
<img src="img/loader.gif" height="200" width="200" class="center">
</div>
<div id="default_panel" class="receipt_panel">
  <div class="h6"><span id="receipt_title">Default Receipt</span></div>
<div class="columns">
<div class="form-group column  col-3 ">
  <input class="form-input clear default change_text1" type="number" id="monthly_amt" placeholder="Monthly">
</div>
<div class="form-group column  col-3 ">
  <input class="form-input clear default change_text1" type="number" id="msnry_amt" placeholder="Missionary">
</div>
<div class="form-group column  col-3 ">
  <input class="form-input clear default change_text1" type="number" id="rice_amt" placeholder="Rice">
</div>
<!-- <div class="form-group column  col-3 ">
  <input class="form-input" type="number" id="nerchai-amt" placeholder="Nerchai">
</div> -->
</div>
<div class="columns">
<div class="form-group column  col-3 ">
<textarea class="form-input clear default" id="monthly_desc" placeholder="Comments" rows="3" ></textarea>
</div>
<div class="form-group column  col-3 ">
<textarea class="form-input clear default" id="msnry_desc" placeholder="Comments" rows="3" ></textarea>
</div>
<div class="form-group column  col-3 ">
<textarea class="form-input clear default" id="rice_desc" placeholder="Comments" rows="3" ></textarea>
</div>
<!-- <div class="form-group column  col-3 ">
<textarea class="form-input" id="nerchai-desc" placeholder="Comments" rows="3" ></textarea>
</div> -->
<div class="form-group column  col-2 ">
<input type="button" id="default_submit" class="btn btn-primary" name="" value="Submit">
</div>
</div>
                <!-- </form> -->
</div>
<!-- end of DEfault panel -->

<!-- Manoharachanthai Porul kaanikai -->
<form name="porul_form" id="porul_form" method="post">
<!--=========== Hidden Variables ===========-->
<input type="hidden" name="category_id" id="category_id">
<input type="hidden" name="member_id" id="member_id">
<input type="hidden" id="family_id" name="family_id">
<input type="hidden" id="receipt_date1" name="receipt_date" >  


 <div id="porul_panel-out" style="visibility: hidden;">
 <div class="h6"><span id="receipt_title">Christmas Manohara Chanthai</span></div>
<div id="porul_panel" class="receipt_panel1" >

<div class="columns" >
<div class="form-group column  col-3 ">
  <select class="form-select chosen porul_input " id="item[]" name="item[]">
    <option value="0">Select Item</option>
        <?php 
        $db = new MyDBb(); 
        $results = $db->query("SELECT distinct * from item_list");
  $op='';
  while ($row = $results->fetchArray()) {
    $op.= '<option  value="'.$row['tamil_name'].'">'.$row['item_name'].'</option>';
}
$db->close();
echo  $op; ?>
  </select>
</div>
<div class="form-group column  col-3 ">
  <input class="form-input clear porul_input" type="number" name="item_count[]" id="item_count[]" placeholder="Count">
</div>
<div class="form-group column  col-3 ">
  <input class="form-input clear first_item porul_input" type="number" name="item_amt[]" id="item_amt[]" placeholder="Bid Amount">
</div>
<div class="form-group column  col-3 ">
 <select class="form-select chosen tamil porul_input" name="bid_id[]" id="bid_id[]" >
         <option value="0">Select Family</option>
        <?php 
        $db = new MyDBb(); 
        $results = $db->query("SELECT distinct fl.family_id,family_head,member_name from family_list fl inner join family_members fm ON fl.head_id=fm.member_id");
  $op='';
  while ($row = $results->fetchArray()) {
    $op.= '<option  value="'.$row['family_id'].'">'.$row['member_name'].'</option>';
}
$db->close();
echo  $op; ?>
      </select>
</div>

</div>
<div class="columns" >
<div class="form-group column  col-3 ">
  <select class="form-select chosen porul_input "  id="item[]" name="item[]">
    <option value="0">Select Item</option>
        <?php 
        $db = new MyDBb(); 
        $results = $db->query("SELECT distinct * from item_list");
  $op='';
  while ($row = $results->fetchArray()) {
    $op.= '<option  value="'.$row['tamil_name'].'">'.$row['item_name'].'</option>';
}
$db->close();
echo  $op; ?>
  </select>
</div>
<div class="form-group column  col-3 ">
  <input class="form-input clear porul_input" type="number" name="item_count[]" id="item_count[]" placeholder="Count">
</div>
<div class="form-group column  col-3 ">
  <input class="form-input clear porul_input" type="number" name="item_amt[]" id="item_amt[]" placeholder="Bid Amount">
</div>
<div class="form-group column  col-3 ">
 <select class="form-select chosen tamil porul_input" id="bid_id" name="bid_id[]">
         <option value="0">Select Family</option>
        <?php
        $db = new MyDBb();
          $results = $db->query("SELECT distinct fl.family_id,family_head,member_name from family_list fl inner join family_members fm ON fl.head_id=fm.member_id");
  $op='';
  while ($row = $results->fetchArray()) {
    $op.= '<option  value="'.$row['family_id'].'">'.$row['member_name'].'</option>';
}
$db->close();
echo  $op; ?>
      </select>
</div>

</div>
<div class="columns" >
<div class="form-group column  col-3 ">
  <select class="form-select chosen porul_input " name="item[]" id="item" name="item">
    <option value="0">Select Item</option>
        <?php 
        $db = new MyDBb(); 
        $results = $db->query("SELECT distinct * from item_list");
  $op='';
  while ($row = $results->fetchArray()) {
    $op.= '<option  value="'.$row['tamil_name'].'">'.$row['item_name'].'</option>';
}
$db->close();
echo  $op; ?>
  </select>
</div>
<div class="form-group column  col-3 ">
  <input class="form-input clear porul_input" type="number" name="item_count[]" id="item_count[]" placeholder="Count">
</div>
<div class="form-group column  col-3 ">
  <input class="form-input clear porul_input" type="number" name="item_amt[]" id="item_amt[]" placeholder="Bid Amount">
</div>
<div class="form-group column  col-3 ">
 <select class="form-select chosen tamil porul_input" id="bid_id" name="bid_id[]">
         <option value="0">Select Family</option>
        <?php 
        $db = new MyDBb(); 
        $results = $db->query("SELECT distinct fl.family_id,family_head,member_name from family_list fl inner join family_members fm ON fl.head_id=fm.member_id");
  $op='';
  while ($row = $results->fetchArray()) {
    $op.= '<option  value="'.$row['family_id'].'">'.$row['member_name'].'</option>';
}
$db->close();
echo  $op; ?>
      </select>
</div>

</div>
<div class="columns" >
<div class="form-group column  col-3 ">
  <select class="form-select chosen porul_input " name="item[]" id="item[]">
    <option value="0">Select Item</option>
        <?php 
        $db = new MyDBb(); 
        $results = $db->query("SELECT distinct * from item_list order by item_name");
  $op='';
  while ($row = $results->fetchArray()) {
    $op.= '<option  value="'.$row['tamil_name'].'">'.$row['item_name'].'</option>';
}
$db->close();
echo  $op; ?>
  </select>
</div>
<div class="form-group column  col-3 ">
  <input class="form-input clear porul_input" type="number" name="item_count[]" id="item_count[]" placeholder="Count">
</div>
<div class="form-group column  col-3 ">
  <input class="form-input clear porul_input" type="number" name="item_amt[]" id="item_amt[]" placeholder="Bid Amount">
</div>
<div class="form-group column  col-3 ">
 <select class="form-select chosen tamil porul_input" id="bid_id" name="bid_id[]">
         <option value="0">Select Family</option>
        <?php 
        $db = new MyDBb(); 
        $results = $db->query("SELECT distinct fl.family_id,family_head,member_name from family_list fl inner join family_members fm ON fl.head_id=fm.member_id");
  $op='';
  while ($row = $results->fetchArray()) {
    $op.= '<option  value="'.$row['family_id'].'">'.$row['member_name'].'</option>';
}
$db->close();
echo  $op; ?>
      </select>
</div>

</div>
<div class="columns" >
<div class="form-group column  col-3 ">
  <select class="form-select chosen porul_input " name="item[]" id="item" name="item">
    <option value="0">Select Item</option>
        <?php 
        $db = new MyDBb(); 
        $results = $db->query("SELECT distinct * from item_list");
  $op='';
  while ($row = $results->fetchArray()) {
    $op.= '<option  value="'.$row['tamil_name'].'">'.$row['item_name'].'</option>';
}
$db->close();
echo  $op; ?>
  </select>
</div>
<div class="form-group column  col-3 ">
  <input class="form-input clear porul_input" type="number" name="item_count[]" id="item_count[]" placeholder="Count">
</div>
<div class="form-group column  col-3 ">
  <input class="form-input clear porul_input" type="number" name="item_amt[]" id="item_amt[]" placeholder="Bid Amount">
</div>
<div class="form-group column  col-3 ">
 <select class="form-select chosen tamil porul_input" id="bid_id" name="bid_id[]">
         <option value="0">Select Family</option>
        <?php 
        $db = new MyDBb(); 
        $results = $db->query("SELECT distinct fl.family_id,family_head,member_name from family_list fl inner join family_members fm ON fl.head_id=fm.member_id");
  $op='';
  while ($row = $results->fetchArray()) {
    $op.= '<option  value="'.$row['family_id'].'">'.$row['member_name'].'</option>';
}
$db->close();
echo  $op; ?>
      </select>
</div>

</div>
<div class="columns" >
<div class="form-group column  col-3 ">
  <select class="form-select chosen porul_input " name="item[]" id="item" name="item">
    <option value="0">Select Item</option>
        <?php 
        $db = new MyDBb(); 
        $results = $db->query("SELECT distinct * from item_list");
  $op='';
  while ($row = $results->fetchArray()) {
    $op.= '<option  value="'.$row['tamil_name'].'">'.$row['item_name'].'</option>';
}
$db->close();
echo  $op; ?>
  </select>
</div>
<div class="form-group column  col-3 ">
  <input class="form-input clear porul_input" type="number" id="item_count[]" placeholder="Count">
</div>
<div class="form-group column  col-3 ">
  <input class="form-input clear porul_input" type="number" name="item_amt[]" id="item_amt[]" placeholder="Bid Amount">
</div>
<div class="form-group column  col-3 ">
 <select class="form-select chosen tamil porul_input" id="bid_id" name="bid_id[]">
         <option value="0">Select Family</option>
        <?php 
        $db = new MyDBb(); 
        $results = $db->query("SELECT distinct fl.family_id,family_head,member_name from family_list fl inner join family_members fm ON fl.head_id=fm.member_id");
  $op='';
  while ($row = $results->fetchArray()) {
    $op.= '<option  value="'.$row['family_id'].'">'.$row['member_name'].'</option>';
}
$db->close();
echo  $op; ?>
      </select>
</div>

</div>
<div class="columns" >
<div class="form-group column  col-3 ">
  <select class="form-select chosen porul_input " name="item[]" id="item" name="item">
    <option value="0">Select Item</option>
        <?php 
        $db = new MyDBb(); 
        $results = $db->query("SELECT distinct * from item_list");
  $op='';
  while ($row = $results->fetchArray()) {
    $op.= '<option  value="'.$row['tamil_name'].'">'.$row['item_name'].'</option>';
}
$db->close();
echo  $op; ?>
  </select>
</div>
<div class="form-group column  col-3 ">
  <input class="form-input clear porul_input" type="number" name="item_count[]" id="item_count[]" placeholder="Count">
</div>
<div class="form-group column  col-3 ">
  <input class="form-input clear porul_input" type="number" name="item_amt[]" id="item_amt[]" placeholder="Bid Amount">
</div>
<div class="form-group column  col-3 ">
 <select class="form-select chosen tamil porul_input" id="bid_id" name="bid_id[]">
         <option value="0">Select Family</option>
        <?php 
        $db = new MyDBb(); 
        $results = $db->query("SELECT distinct fl.family_id,family_head,member_name from family_list fl inner join family_members fm ON fl.head_id=fm.member_id");
  $op='';
  while ($row = $results->fetchArray()) {
    $op.= '<option  value="'.$row['family_id'].'">'.$row['member_name'].'</option>';
}
$db->close();
echo  $op; ?>
      </select>
</div>

</div>
 <div class="columns">

<!-- <button type="button" id="btAdd-porul" class="btn btn-primary btn-lg mt-2 centered"><i class="icon icon-plus"></i> Add</button> -->
<!-- <div class="form-group column  col-3 ">
<textarea class="form-input" id="nerchai-desc" placeholder="Comments" rows="3" ></textarea>
</div> -->
<div class="form-group column  col-2 ">
<input type="button" id="porul_submit" class="btn btn-primary" name="" value="Submit">
</div>
</div>
                <!-- </form> -->
</div>
</div>
<!-- end of Porul kaanikai -->
</form>

<!-- sunday Porul kaanikai -->
<form name="porul_form2" id="porul_form2" method="post">
<!--=========== Hidden Variables ===========-->
<input type="hidden" name="category_id" id="category_id2">
<input type="hidden" name="cat_id2" id="cat_id2" value="39">
<input type="hidden" name="member_id2" id="member_id2">
<input type="hidden" id="family_id2" name="family_id2">
<input type="hidden" id="receipt_date2" name="receipt_date2" >  

 <div id="porul2_panel-out" style="visibility: hidden;">
  <div id="porul_panel1" class="receipt_panel1" >
    <div class="columns" >
<div class="form-group column  col-3 ">
  <select class="form-select chosen porul_input " id="item[]" name="item[]">
    <option value="0">Select Item</option>
        <?php 
        $db = new MyDBb(); 
        $results = $db->query("SELECT distinct * from item_list");
  $op='';
  while ($row = $results->fetchArray()) {
    $op.= '<option  value="'.$row['tamil_name'].'">'.$row['item_name'].'</option>';
}
$db->close();
echo  $op; ?>
  </select>
</div>
<div class="form-group column  col-3 ">
  <input class="form-input clear porul_input" type="number" name="item_count[]" id="item_count[]" placeholder="Count">
</div>
<div class="form-group column  col-3 ">
  <input class="form-input clear first_item2 porul_input" type="number" name="item_amt[]" id="item_amt[]" placeholder="Bid Amount">
</div>


</div>
<div class="columns" >
<div class="form-group column  col-3 ">
  <select class="form-select chosen porul_input " id="item[]" name="item[]">
    <option value="0">Select Item</option>
        <?php 
        $db = new MyDBb(); 
        $results = $db->query("SELECT distinct * from item_list");
  $op='';
  while ($row = $results->fetchArray()) {
    $op.= '<option  value="'.$row['tamil_name'].'">'.$row['item_name'].'</option>';
}
$db->close();
echo  $op; ?>
  </select>
</div>
<div class="form-group column  col-3 ">
  <input class="form-input clear porul_input" type="number" name="item_count[]" id="item_count[]" placeholder="Count">
</div>
<div class="form-group column  col-3 ">
  <input class="form-input clear first_item porul_input" type="number" name="item_amt[]" id="item_amt[]" placeholder="Bid Amount">
</div>

</div>
<div class="columns" >
<div class="form-group column  col-3 ">
  <select class="form-select chosen porul_input " id="item[]" name="item[]">
    <option value="0">Select Item</option>
        <?php 
        $db = new MyDBb(); 
        $results = $db->query("SELECT distinct * from item_list");
  $op='';
  while ($row = $results->fetchArray()) {
    $op.= '<option  value="'.$row['tamil_name'].'">'.$row['item_name'].'</option>';
}
$db->close();
echo  $op; ?>
  </select>
</div>
<div class="form-group column  col-3 ">
  <input class="form-input clear porul_input" type="number" name="item_count[]" id="item_count[]" placeholder="Count">
</div>
<div class="form-group column  col-3 ">
  <input class="form-input clear first_item porul_input" type="number" name="item_amt[]" id="item_amt[]" placeholder="Bid Amount">
</div>


</div>
<div class="columns" >
<div class="form-group column  col-3 ">
  <select class="form-select chosen porul_input " id="item[]" name="item[]">
    <option value="0">Select Item</option>
        <?php 
        $db = new MyDBb(); 
        $results = $db->query("SELECT distinct * from item_list");
  $op='';
  while ($row = $results->fetchArray()) {
    $op.= '<option  value="'.$row['tamil_name'].'">'.$row['item_name'].'</option>';
}
$db->close();
echo  $op; ?>
  </select>
</div>
<div class="form-group column  col-3 ">
  <input class="form-input clear porul_input" type="number" name="item_count[]" id="item_count[]" placeholder="Count">
</div>
<div class="form-group column  col-3 ">
  <input class="form-input clear first_item porul_input" type="number" name="item_amt[]" id="item_amt[]" placeholder="Bid Amount">
</div>

</div>
</div>
 <div class="columns">

<!-- <button type="button" id="btAdd-porul" class="btn btn-primary btn-lg mt-2 centered"><i class="icon icon-plus"></i> Add</button> -->
<!-- <div class="form-group column  col-3 ">
<textarea class="form-input" id="nerchai-desc" placeholder="Comments" rows="3" ></textarea>
</div> -->
<div class="form-group column  col-2 ">
<input type="button" id="porul_submit2" class="btn btn-primary" name="" value="Submit">
</div>
</div>
 </div>
 
<!-- end of Porul kaanikai -->
</form>

<div id="common_panel" class="receipt_panel">
  <div class="h6"><span id="receipt_title">Receipt Title</span></div>
<div class="columns">
<div class="form-group column  col-6 ">
  <input class="form-input clear common_bill" type="text" id="common_amt" placeholder="Amount">
</div>

<div class="form-group column  col-4 ">
<textarea class="form-input clear common_bill" id="common_desc" placeholder="Comments" rows="3" ></textarea>
</div>
<div class="form-group column  col-2 ">
<input type="button" id="common_submit" class="btn btn-primary" name="" value="Submit">
</div>
</div>
                <!-- </form> -->
</div>
<div id="bday_panel" class="receipt_panel">
  <div class="h6"><span id="receipt_title">Birthday Receipt</span></div>
<div class="columns">
<div class="form-group column  col-6 ">
  <input class="form-input clear bday_bill" type="text" id="bday_amt" placeholder="Amount">
</div>
<div class="form-group column  col-4 ">
<textarea class="form-input clear bday_bill" id="bday_desc" placeholder="Comments" rows="3" ></textarea>
</div>
<div class="form-group column  col-2 ">
<input type="button" id="bday_submit" class="btn btn-primary" name="" value="Submit">
</div>
</div>
                <!-- </form> -->
</div>
<div id="test">
</div>
<div id="receipt_list" class="receipt_panel2">
<table class="table table-striped table-hover">
  <thead>
  <tr>
    <th>Receipt #</th>
    <th>Receipt Date</th>
    <th>Family Head</th>
    <th>Category</th>
    <th>Amount</th>
    <th>Description</th>
    <th></th>
  </tr>
</thead>
  <tbody id="last_receipt">
    <?php
    // include('db_info.php');
    $db=new MyDB();
$i=1;
$results = $db->query("SELECT * from receipt where entry_date=date('now') order by id DESC");
while ($row = $results->fetchArray()) {
  $family_head=getMemberName($row['member_id']);
  $category=getCategoryName($row['category']);
  ?>
<tr >
  <td><?php  echo $row['id'] ?></td><td><?php  echo $row['receipt_date'] ?></td><td class="tamil"><?php  echo $family_head ?></td><td><?php  echo $category ?></td><td><?php  echo $row['amount'] ?></td><td><?php  echo $row['description'] ?></td><td><a href="#edit_modal" class="edit_receipt" data-date1="<?php echo $row['receipt_date']; ?>" data-f_head="<?php echo $family_head; ?>" data-f_id="<?php echo $row['family_id']; ?>" data-amt="<?php echo $row['amount']; ?>" data-desc="<?php echo $row['description']; ?>"  data-cat="<?php echo $category; ?>"  data-id="<?php echo $row['id']; ?>">Edit</a>/<span class="delete_receipt" data-id="<?php echo $row['id']; ?>">Delete</span></td>
</tr>
  <?php

}

    ?>
  </tbody>
</table>



  </div>

</div> <!-- cust panel--->
<div class="column col-3 col-xs-12">
                <div class="panel">
                  <div class="panel-header text-center">
                    <figure class="avatar avatar-lg"><img src="avatar-2.png" alt="Avatar"></figure>
                    <div class="panel-title h5 mt-10" id="family_head_title">CSI District Church  <!-- <i class="ml-2 icon icon-edit"></i> --></div>
					<!-- <div class="panel-subtitle" id="family_id_title">CH001</div> -->
					<div class="panel-subtitle" id="family_place_title">Muzhucode</div>
				  </div>
				  <div class="divider"></div>
                  <!-- <nav class="panel-nav">
                    <ul class="tab tab-block">
                      <li class="tab-item active"><a href="#panels">Profile</a></li>
                      <li class="tab-item"><a href="#panels">Files</a></li>
                      <li class="tab-item"><a href="#panels">Tasks</a></li>
                    </ul>
                  </nav> -->
                  <div class="panel-body " id="member_list">
                    
                    
                    
                  </div>
                  <!-- <div class="panel-footer">
                    <button class="btn btn-primary btn-block">Save</button>
                  </div> -->
                </div>
              </div>

</div>
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
    document.getElementById('receipt_date1').value = today;
    document.getElementById('receipt_date2').value = today;
     // document.getElementsByClassName('receipt_date1').value = today;

     $(document).ready(function()
      {
        $('#input-barcode').focus();
        // $('#input-barcode').val('hello');


      });

</script>
<?php
include('footer.php');
?>
<?php
function getFamilyList()
{
  class MyDB1 extends SQLite3{
    function __construct()
    {
        $this->open('church.db');
    }
}
  $db1 = new MyDB1();

  $results = $db1->query("SELECT distinct fl.family_id,family_head,member_name,ini from family_list fl inner join family_members fm ON fl.head_id=fm.member_id order by member_name ");
  $op='';
  while ($row = $results->fetchArray()) {
    $op.= '<option  value="'.$row['family_id'].'">'.$row['member_name'].' '.$row['ini'].'</option>';
}
$db1->close();
return $op;

}
function getMemberList()
{
  class MyDB12 extends SQLite3{
    function __construct()
    {
        $this->open('church.db');
    }
}
  $db12 = new MyDB12();

  $results = $db12->query("SELECT distinct * from  family_members order by member_name");
  $op='';
  while ($row = $results->fetchArray()) {
    $op.= '<option  value="'.$row['family_id'].'">'.$row['member_name'].' '.$row['ini'].'</option>';
}
$db12->close();
return $op;

}

function getCategoryList()
{
  class MyDB2 extends SQLite3{
    function __construct()
    {
        $this->open('church.db');
    }
}
  $db2 = new MyDB2();

  $results = $db2->query("SELECT distinct id,cat_name from category ");
  $op1='';
  while ($row = $results->fetchArray()) {
    $op1.= '<option value="'.$row['id'].'">'.$row['cat_name'].'</option>';
}
$db2->close();
return $op1;

}

function getMemberName($id)
{
  //$db->close();
//   class MyDB2 extends SQLite3{
//     function __construct()
//     {
//         $this->open('../church.db');
//     }
// }
  $db = new MyDB();

  $results = $db->query("SELECT distinct m_name_t from family_members where id=".$id."");
  $op1='';
  while ($row = $results->fetchArray()) {
    $op1.= $row['m_name_t'];
}
$db->close();
return $op1;

}

function getCategoryName($id)
{
//   class MyDB4 extends SQLite3{
//     function __construct()
//     {
//         $this->open('../church.db');
//     }
// }
  $db = new MyDB();

  $results = $db->query("SELECT distinct id,cat_name from category where id=".$id.";");
  $op1='';
  while ($row = $results->fetchArray()) {
    $op1.= $row['cat_name'];
}
$db->close();
return $op1;

}


function getCategoryName_t($id)
{
    $db1 = new MyDB();
    $op='';

    $query="SELECT cat_name_t from category where id=$id";

     $results1 = $db1->query($query);
     while ($row1 = $results1->fetchArray()) {

        $op.= $row1['cat_name_t'];
     }
     // echo $query;
     return $op;
     $db1->close();

}
function getCategoryType($id)
{
    $db1 = new MyDB();
    $op='';

    $query="SELECT type from category where id=$id";

     $results1 = $db1->query($query);
     while ($row1 = $results1->fetchArray()) {

        $op.= $row1['type'];
     }
     // echo $query;
     return $op;
     $db1->close();

}
function getCategoryAmount($cat)
{
    $db1 = new MyDB();
    $op=0;
    
        $query="SELECT amount from receipt where entry_date=date('now') AND category='".$cat."'";
   
// echo $query_par;
     $results1 = $db1->query($query);
     while ($row1 = $results1->fetchArray()) {

        $op+= $row1['amount'];
     }
     // echo $query;
     $db1->close();

     return $op;

}
function moneyFormatIndia($num) {
    $explrestunits = "" ;
    if(strlen($num)>3) {
        $lastthree = substr($num, strlen($num)-3, strlen($num));
        $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
        $restunits = (strlen($restunits)%2 == 1)?' '.$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
        $expunit = str_split($restunits, 2);
        for($i=0; $i<sizeof($expunit); $i++) {
            // creates each of the 2's group and adds a comma to the end
            if($i==0) {
                $explrestunits .= $expunit[$i].","; // if is first value , convert into integer
            } else {
                $explrestunits .= $expunit[$i].",";
            }
        }
        $thecash = $explrestunits.$lastthree;
    } else {
        $thecash = $num;
    }
    return $thecash; // writes the final format where $currency is the currency symbol.
}
 ?>


