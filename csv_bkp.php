<?php
include('db_info.php');

$sql="";
$i=1;
   $file = fopen('family_bkp.csv', "r");

if(!$file)
{

  die('Error! File not found!');
}
$sql="";
while(! feof($file))
  {

    $csv_field = fgetcsv($file, 5000);
    $phone=SQLite3::escapeString($csv_field[1]);
    $family_id=SQLite3::escapeString($csv_field[0]);

	$sql.=" Update family_list set phone='$phone' where family_id='$family_id'; ";

}


if($db->exec($sql))
{
	echo 'Done';
  echo $sql;
}
else{
	die();
	echo $ename.'<br>';
    echo 'data not inserted';
}


    


?>