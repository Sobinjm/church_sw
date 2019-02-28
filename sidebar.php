
<?php
$currentFile = $_SERVER["PHP_SELF"];
$parts = Explode('/', $currentFile);
$parts = $parts[count($parts) - 1];
$parts = Explode('.', $parts);
$pageName = $parts[0];
?>
<div class="off-canvas off-canvas-sidebar-show">
  <!-- off-screen toggle button -->
  <a class="off-canvas-toggle btn btn-primary btn-action" href="#sidebar-id">
    <i class="icon icon-menu"></i>
  </a>

  <div id="sidebar-id" class="off-canvas-sidebar">
    <!-- off-screen sidebar -->

<ul class="menu">
                  <li class="menu-item">
                    <div class="tile tile-centered">
                      <div class="tile-icon"><i class="icon icon-people"></i></div>
                      <div class="tile-content"><?php echo $_SESSION['username']; ?></div>
                    </div>
                  </li>
                  <li class="divider"></li>
                  <li class="menu-item">
                    <a href="home.php" class="<?php if($pageName=='home'){echo 'active';}?>">Home</a>
                  </li>
                  <li class="menu-item"><a href="data_entry.php" class="<?php if($pageName=='data_entry'){echo 'active';}?>">Accounts</a></li>
<li class="menu-item"><a href="add_family.php" class="<?php if($pageName=='add_family'){echo 'active';}?>" > Add Family</a></li>
<li class="menu-item"><a href="family_list.php" class="<?php if($pageName=='family_list'){echo 'active';}?>" >Family List</a></li>
<li class="menu-item"><a href="settings.php" class="<?php if($pageName=='settings'){echo 'active';}?>">Settings</a></li>
<li class="menu-item"><a href="index.php">Logout</a></li>
                </ul>
  </div>
  <a class="off-canvas-overlay" href="#close"></a>

  <div class="off-canvas-content">