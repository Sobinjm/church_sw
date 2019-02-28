<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('breadcrumb.php'); ?>

<?php include('db_info.php'); ?>

<div class="d-flex">
<h1>Settings</h1>

</div>

<div class="divider"></div>

<div class="p-centered mt-20">

    <form action="overall-report.php" target="_blank" id="report_form" name="family_form" method="GET" enctype="multipart/form-data">

        <table id="ttable" class="table table-striped table-hover">
<input type="hidden" id="from_date" name="from_date" style="display: none;">
<input type="hidden" id="to_date" name="to_date"style="display: none;">
            <tr>
            	<td></td>
            	<td>
            		<select name="category" id="category">
            			<option value="0">Over All</option>
            			<?php echo getCat(); ?>
            		</select>
            	</td>
            	<td>
            		<select name="type" id="report_type" style="">
            			<!-- <option value=''>Select Type</option> -->
            			<option value='Both'>Both</option>
            			<option value="Income">Income</option>
            			<option value="Expence">Expence</option>
            		</select>
            	</td>
              <td><p>From</p></td>
              <td >
                    <div class="form-group ">
                       <input type="date" name="from" />
                        
                    </div>
                </td>
                <td><p>To</p></td>
                 <td>
                    <div class="form-group">
                        <input type="date" name="to" />
                    </div>
                </td>
            </tr>
            
           
        </table>
        
        <input type="submit" class="btn btn-primary btn-lg mt-2 centered" name="" value="Submit">
    </form>
</div>
<script type="text/javascript">
	 $(document).ready(function() 
	 {
	 	$('#category').change(function(){

	 		var val=$(this).val();
	 		if(val==0)
	 		{
	 			$('#report_form').attr('action','overall-report.php');
	 			$('#report_type').show();
	 		}
	 		else{
	 			$('#report_form').attr('action','receipt-report.php');
	 			$('#report_type').hide();
	 		}
	 		//alert(val);
	 	});






		});
</script>
<?php
function getCat()
{
	$db = new MyDB();
$i=1;
$op='';
$results = $db->query("SELECT * from category ");
while ($row = $results->fetchArray()) {

$op.= '<option value="'.$row['id'].'">'.$row['cat_name'].'</option>';

}
return $op;
}


?>


