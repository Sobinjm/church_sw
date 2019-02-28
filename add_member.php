<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('breadcrumb.php'); 
include('db_info.php');?>
    <a href="home.php">Home </a>
    <script language="javascript">


</script>
<?php 
$family_id=$_GET['id'];

?>
<style type="text/css">
    
</style>
<input id="text" type="text"  style="display: none;" placeholder=" Enter something...">


    <form action="controls/add_member_check.php" name="family_form" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="family_id" value="<?php echo $family_id; ?>">

        <table id="ttable" class="table table-striped table-hover">
            <thead>
                <th></th>
                <th>Sir Name</th>
                <th>Initial</th>
                <th>Member Name</th>
                <th>bgau;</th>
                <th>Date of Birth</th>
                <th>Date of Baptism</th>
                <th></th>
                <th>Relation</th>
                <th>Gender</th>
                <th>Occupation</th>
                <th>Status</th>
                
            </thead>
            <tbody id="tbody">
            <tr>
                <td>1</td>
                <td>
                    <div class="form-group">
                        <select class="form-select"  name="sir_name[]">
                            <option value="Mr">Mr.</option>
                            <option value="Mrs">Mrs.</option>
                            <option value="Miss">Miss</option>
                            
                        </select>
                    </div>
                </td>
                <td>

                    <div class="form-group">
                        <input class="form-input" id="ini0" type="text" name="ini[]"placeholder="Initial">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input class="form-input"  type="text" name="e_name[]"placeholder="Name">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input class="form-input password-opener password tamil" type="text" id="head0" name="t_name[]" placeholder="bgau;">
                    </div>
                </td>
                <td> 
                    <div class="form-group">
                        <input class="form-input"  type="date" name="dob[]" placeholder="Date of birth">
                    </div>
                <td>
                    <div class="form-group">
                        <input class="form-input" type="date" name="dobp[]" placeholder="Date of baptism">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <label class="form-radio form-inline">
                            <input type="radio" name="head" value="H0" class="head" data-id="head0" ><i class="form-icon"></i> Head
                        </label>
                    </div>              
                </td>
                <td>
                    <div class="form-group">
                        <select class="form-select"  name="relation[]">
                            <option value="W/o">W/o</option>
                            <option value="S/o">S/o</option>
                            <option value="D/o">D/o</option>
                            <option value="H/o">H/o</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <label class="form-radio form-inline">
                            <input type="radio" name="sex[0]" value="Male" checked=""><i class="form-icon"></i> Male
                        </label>
                        <label class="form-radio form-inline">
                            <input type="radio" name="sex[0]" value="Female"><i class="form-icon"></i> Female
                        </label>
                    </div>
                </td>    
                <td>
                    <div class="form-group">
                        <input class="form-input" type="file" name="m_photo[]">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <label class="form-checkbox form-inline">
                            <input type="checkbox" name="sts[]" value="Late" ><i class="form-icon"></i> Late
                        </label>
                        <!-- <label class="form-checkbox form-inline" style="display: none;">
                            <input type="radio" name="sts[0]" value="1" checked=""><i class="form-icon"></i> Live
                        </label> -->
                    </div>
                </td>
            </tr>
            
            </tbody>
        </table>
        <button type="button" id="btAdd" class="btn btn-primary btn-lg mt-2 centered"><i class="icon icon-plus"></i> Add</button>
        
        <input type="hidden" name="family_head" id="family_head"/>
        <input type="submit" class="btn btn-primary btn-lg mt-2 centered" name="" value="Submit">
    </form>

<?php include('footer.php'); ?>

