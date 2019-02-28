<?php


include('db_info.php');

$sql="select * from family_members where member_type='1'";

$results = $db->query($sql);
$update_sql='';
while ($row = $results->fetchArray()) {
	$place=substr($row['family_id'], 2,2);
$t_place=getTplace($place);
   
$update_sql.="Update family_list set place='".$place."',t_area='".SQLite3::escapeString($t_place)."' where family_id='".$row['family_id']."'; ";
   }


   if($db->exec($update_sql))
{
   echo "Updated ";
   // echo $sql;
}
else{
    echo 'data not updated';
    echo '<br>'.$update_sql;
}

function getTplace($id)
{
  $op='';
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

?>