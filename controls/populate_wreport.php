<?php
    include('db_info.php');
    $op='';
$i=1;
$id=$_POST['id'];
if(isset($_POST['date'])&&$_POST['date']!='')
{
	$date=$_POST['date'];
	$sql="SELECT * from receipt where status<>6 AND entry_date='".$date."' and category=".$id." order by id DESC";
}
else{
	$sql="SELECT * from receipt where status<>6 AND category=".$id." order by id DESC";
}
$results = $db->query($sql);
while ($row = $results->fetchArray()) {
  $family_head=getMemberName($row['member_id']);
  $category=getCategoryName($row['category']);
  
$op.='<tr >'.
  '<td>'. $row['id'].'</td><td>'.$row['receipt_date'] .'</td><td class="tamil">'.$family_head .'</td><td>'. $row['amount'] .'</td><td>'.$row['description'] .'</td><td><a href="#edit_modal" class="edit_receipt" data-date1="'. $row['receipt_date'].'" data-f_head="'.$family_head .'" data-f_id="'.$row['family_id'] .'" data-amt="'. $row['amount'].'" data-desc="'.$row['description'].'"  data-cat="'. $category.'"  data-id="'.$row['id'].'">Edit</a>/<a href="#delete_modal" class="delete_receipt" data-date1="'. $row['receipt_date'].'" data-f_head="'.$family_head .'" data-f_id="'.$row['family_id'] .'" data-amt="'. $row['amount'].'" data-desc="'.$row['description'].'"  data-cat="'. $category.'"  data-id="'.$row['id'].'"><span class="delete_receipt" data-id="'.$row['id'].'">Delete</span></a></td>'.
'</tr>';
 
}
echo $op;

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

?>