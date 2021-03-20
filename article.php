<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require "asset/php/index/header.php" ?>
  <title>acceuil</title>
  
</head>
<?php require "asset/php/index/article.php";?>
<?php require "asset/php/private/connection.php";?>
<body style="background-color:#fbfbfb">
<?php require "asset/php/index/nav.php" ?>
<div class="main"style="padding:60px 0">
        <div class="row">
        <div class="col s8 offset-s2 post" id="containe">
              <div class="row" id="posts">
            <?php $article($con,$_GET['id']);?>
          </div>
      </div>
    </div>
  </div>
  <?php require "asset/php/index/footer.php" ?>
   <script src="js/main.js"></script> 
   <script src="materialize/js/materialize.min.js"></script>
</body>
</html>