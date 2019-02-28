<?php


include('db_info.php');

$sql="select * from family_members where member_type='1'";

$results = $db->query($sql);
$update_sql='';
while ($row = $results->fetchArray()) {
   
$update_sql.="Update family_list set family_head='".SQLite3::escapeString($row['m_name_t'])."',head_id='".$row['member_id']."' where family_id='".$row['family_id']."'; ";
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


?>