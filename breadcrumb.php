<?php 
$crumbs = explode("/",$_SERVER["REQUEST_URI"]);
?>


<ul class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Home</a>
  </li>
  <li class="breadcrumb-item">
    <a href="#">Settings</a>
  </li>
  <li class="breadcrumb-item">
    <?php 
    foreach($crumbs as $crumb){
      echo ucfirst(str_replace(array(".php","_","?id="),array(""," "," "),$crumb) . ' ');
  }
    ?> 
  </li>
</ul>