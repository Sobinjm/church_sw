<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('breadcrumb.php');
?>


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
              Family Head : <label id="edit_f_head" class="tamil"></label><br>
              Category : <label id="edit_cat"></label>
            </div>
        </div>
        <div class="columns">
            <div class="form-group column  col-6 ">
              Amount
            <input type="number" class="form-input clear" name="edit_amt" id="edit_amt"   ></textarea>
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
    include('db_info.php');
$i=1;
$results = $db->query("SELECT * from receipt order by id DESC");
while ($row = $results->fetchArray()) {
  $family_head=getMemberName($row['member_id']);
  $category=getCategoryName($row['category']);
  ?>
<tr >
  <td><?php  echo $row['id'] ?></td><td><?php  echo $row['receipt_date'] ?></td><td class="tamil"><?php  echo $family_head ?></td><td><?php  echo $category ?></td><td><?php  echo $row['amount'] ?></td><td><?php  echo $row['description'] ?></td><td><a href="#edit_modal" class="edit_receipt" data-f_head="<?php echo $family_head; ?>" data-f_id="<?php echo $row['family_id']; ?>" data-amt="<?php echo $row['amount']; ?>" data-desc="<?php echo $row['description']; ?>"  data-cat="<?php echo $category; ?>"  data-id="<?php echo $row['id']; ?>">Edit</a>/<span class="delete_receipt" data-id="<?php echo $row['id']; ?>">Delete</span></td>
</tr>
  <?php

}

    ?>
  </tbody>
</table>
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

  $results = $db1->query("SELECT distinct fl.family_id,family_head,member_name,ini from family_list fl inner join family_members fm ON fl.head_id=fm.member_id");
  $op='';
  while ($row = $results->fetchArray()) {
    $op.= '<option  value="'.$row['family_id'].'">'.$row['ini'].' '.$row['member_name'].'</option>';
}
$db1->close();
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

 ?>


