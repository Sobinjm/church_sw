<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('db_info.php'); ?>
    <!-- off-screen content -->
    <h1>
    <?php
        echo "Welcome ". $_SESSION['username'];
?>
</h1>
<!-- <?php include('breadcrumb.php'); ?> -->
<div class="columns dashboard">
    <div class="column col-xs-3">
        <div class="card bg-primary">
 
  <div class="card-header">
    <div class="card-title h2">Rs. <?php echo getTotalIncome('income')+getPorul(); ?></div>
    <div class="card-subtitle text-gray">Total Income</div>
  </div>
  
</div></div>
<div class="column col-xs-3">
        <div class="card bg-primary">
 
  <div class="card-header">
    <div class="card-title h2">Rs. <?php echo getTotalIncome('exp'); ?></div>
    <div class="card-subtitle text-gray">Total Expence</div>
  </div>
  
</div></div>
    <div class="column col-xs-3">
    <div class="card bg-primary">
  
  <div class="card-header">
  <div class="card-title h2">Rs. <?php echo getTotalIncome('Monthly'); ?></div>
    <div class="card-subtitle text-gray">Monthly</div>
  </div>
  
  
</div>
    </div>
    <div class="column col-xs-3">
    <div class="card bg-primary">
 
  <div class="card-header">
  <div class="card-title h2">Rs. <?php echo getTotalIncome('Missionary'); ?></div>
    <div class="card-subtitle text-gray">Missionary</div>
  </div>
  
</div>
    </div>
     <div class="column col-xs-3">
    <div class="card bg-primary">
 
  <div class="card-header">
  <div class="card-title h2">Rs. <?php echo getTotalIncome('Rice'); ?></div>
    <div class="card-subtitle text-gray">Rice - <?php $mac = shell_exec("arp -a ".escapeshellarg($_SERVER['REMOTE_ADDR'])." | grep -o -E '(:xdigit:{1,2}:){5}:xdigit:{1,2}'"); echo $_SERVER['REMOTE_ADDR']; ?></div>
  </div>
  
</div>
    </div>
  </div>
<div class="columns mt-20 dashboard">
    <div class="column col-xs-3"><div class="card">
 
  <a href="receipt.php"><div class="card-header">
  <i class="icon icon-4x icon-flag"></i>
    <div class="card-title h5"> Accounts</div>
    <div class="card-subtitle text-gray">Receipt</div>
  </div>
</a>
  
</div></div>
    <div class="column col-xs-3">
    <div class="card">
  
  <a href="family_list.php"> <div class="card-header">
  <i class="icon icon-4x icon-mail"></i>
    <div class="card-title h5">Family</div>
    <div class="card-subtitle text-gray">Listing, Search</div>
  </div></a>
 
</div>
    </div>
    <div class="column col-xs-3">
    <div class="card">
  
  <a href="settings.php">
  <div class="card-header">
  <i class="icon icon-4x icon-apps"></i>
    <div class="card-title h5">Settings</div>
    <div class="card-subtitle text-gray">Listing, Search</div>
  </div>
</a>
 
</div>
    </div>
    <div class="column col-xs-3">
    <div class="card">
 
 <a href="reports.php">
  <div class="card-header">
  <i class="icon icon-4x icon-bookmark"></i>
    <div class="card-title h5">Reports</div>
    <div class="card-subtitle text-gray">Individual reports, aggregate reports</div>
  </div>
</a>

</div>
    </div>
    <div class="column col-xs-3">
    <div class="card">
 
 <a href="birthday-list.php">
  <div class="card-header">
  <i class="icon icon-4x icon-bookmark"></i>
    <div class="card-title h5">Birthday</div>
    <div class="card-subtitle text-gray">Individual reports, aggregate reports</div>
  </div>
</a>

</div>
    </div>
  </div>
   

<?php include('footer.php'); ?>

<?php 
function getTotalIncome($cat)
{

$db = new MyDB();
$op=0;
    if($cat=='income')
    {
       $results = $db->query("select * from receipt r INNER JOIN category c on r.category = c.id WHERE c.type='Income' ");
    }
    elseif ($cat=='exp') {
       $results = $db->query("select * from receipt r INNER JOIN category c on r.category = c.id WHERE c.type='Expence' ");
    }
    else
    {
       $results = $db->query("select * from receipt r INNER JOIN category c on r.category = c.id WHERE c.cat_name='$cat' ");
    }
    
    if($results)
    {
     while ($row1 = $results->fetchArray()) {

        $op+= $row1['amount'];
     }
   }
   else{
    $db->close();
      return $op;
   }
    
     $db->close();
      return $op;


}
function getPorul()
{

$db = new MyDB();
$op=0;
    $results = $db->query("select * from porul_receipt ");
    
    
    if($results)
    {
     while ($row1 = $results->fetchArray()) {
       $item_amount=explode('~', $row1['amount']);
      $length=sizeof($item_amount);
    
         for($i=1;$i<$length;$i++)
          {
            $op+= $item_amount[$i];
          }
     }
   }
   else{
    $db->close();
      return $op;
   }
    
     $db->close();
      return $op;


}

?>