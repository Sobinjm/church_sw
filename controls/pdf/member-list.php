
<?php
//include connection file 
include_once("../../db_info.php");
$results = $db->query("SELECT * from family_list ");
?>
<table>
    <tr>
        <th>Family ID</th>
        <th>Family Head </th>
        <th>Area</th>
        
    </tr>
<?php
while ($row = $results->fetchArray()) {
    echo '<tr>'.
            '<td>'.$row['family_id'].'</td><td>'.$row['family_head'].'</td><td>'.$row['place'].'</td>'.
         '<tr>';
}

?>
</table>


