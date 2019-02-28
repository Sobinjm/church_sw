<?php
if (!isset($_SESSION )) {
  # code...
  session_start();
}

?>
<!DOCTYPE html> 
<html>
<head>
<?php

$path = $_SERVER['REQUEST_URI'];        // $file is set to "index.php"
$file = basename($path, ".php"); // $file is set to "index"

?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Church <?php echo '| '.$file; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" charset="utf-8"/>
    <link rel="stylesheet" type="text/css" media="screen" href="css/spectre.css" charset="utf-8"/>
    <link rel="stylesheet" type="text/css" media="screen" href="css/spectre-exp.css" charset="utf-8"/>
    <link rel="stylesheet" type="text/css" media="screen" href="css/spectre-icons.css" charset="utf-8"/>
      <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
      <!-- <script type="text/javascript" src="js/choosen.js"></script> -->
      <script language="JavaScript" src="js/service.js" type="text/JavaScript"></script>
      <script type="text/javascript">
       
    </script>





<!--Keyboard -->


  <link href="keyboard/docs/css/jquery-ui.min.css" rel="stylesheet">
  <script src="keyboard/docs/js/jquery-latest.min.js"></script>
  <script src="keyboard/docs/js/jquery-ui.min.js"></script>

  <link href="keyboard/css/keyboard.css" rel="stylesheet">
  <script src="keyboard/js/jquery.keyboard.js"></script>

  <script src="keyboard/docs/js/demo.js"></script>


<!--End Keyboard -->
  
    <body>
        