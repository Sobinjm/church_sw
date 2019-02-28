<?php
include('header.php');
include('db_info.php');


$results = $db->query("SELECT id,family_id,place,family_head from family_list ");
?>
<div class="barcode_container">
<?php
while ($row = $results->fetchArray()) {
    echo '<div class="col-lg-1 barcode"><div class="name tamil">'.$row['family_head'].'</div><div class="place">'.$row['place'].'</div><div><img alt="'.$row['family_id'].'-0" src="/controls/barcode.php?codetype=Code39&size=40&text='.$row['family_id'].'-0&print=true" /></div></div>';
}


?>
</div>
