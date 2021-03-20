<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require "asset/php/index/header.php" ?>
    <title>My Blog | Life Blog</title>
</head>
<?php require "asset/php/index/display_publications.php";?>
<?php require "asset/php/private/connection.php";?>
<body>
  <?php require "asset/php/index/nav.php" ?>
  <div class="main"style="padding:60px 0">
    <div class="row">
      <div class="col s8 offset-s2 post" id="containe">
        <div class="row" id="posts">
          <?php $display_pub($con);?>
        </div>
      </div>
    </div>
  </div>   
 </div>
 <?php require "asset/php/index/footer.php" ?>
   <script src="js/main.js"></script> 
  <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
  <script type="text/javascript" src="js/style.js"></script>
</body>

</html>