<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('breadcrumb.php'); ?>
<?php include('db_info.php');?>
    <a href="home.php">Home </a>
    <script language="javascript">

</script>


    <form action="pdf/birthday-pdf.php" name="family_form" method="get" enctype="multipart/form-data">

        <table id="ttable" class="table table-striped table-hover">
<input type="hidden" id="from_date" name="from_date" style="display: none;">
<input type="hidden" id="to_date" name="to_date"style="display: none;">
            <tr>
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

<?php include('footer.php'); ?>

<?php
function getCategory()
{
$op='';
    $db1 = new MyDB();
     $results1 = $db1->query("SELECT * from category where type='Income'");
     // echo "SELECT tamil from place where id=".$id;
     while ($row1 = $results1->fetchArray()) {

        $op.= '<option value="'.$row1['id'].'"> '.$row1['cat_name'].' ('.$row1['cat_name_t'].')</option>';
     }
     $db1->close();
     return $op;
     
}

?>