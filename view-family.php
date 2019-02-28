<?php
include('db_info.php');
$results = $db->query("SELECT * from family_members where family_id='".$_GET['id']."';");
while ($row = $results->fetchArray()) {
    print_r($row).'<br>';
}
?>