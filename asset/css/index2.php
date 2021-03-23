<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require "php/index/header.php" ?>
  <title>acceuil</title>
  
</head>
<?php require "php/index/display_publications.php";?>
<?php require "php/private/connection.php";?>
<body style="background-color:#fbfbfb">
<?php require "php/index/nav.php" ?>
  <div class="main" style="padding:20px 50px">
    <div class="row">
      <div class="col s9 post" id="containe">
          <div class="row" id="posts">
            <?php $display_pub($con);?>
          </div>
      </div>
      <?php require "php/index/sidebar.php" ?>
    </div>
  </div>
  <?php require "php/index/footer.php" ?>
   <script src="js/main.js"></script> 
   <script src="materialize/js/materialize.min.js"></script>
</body>
</html>