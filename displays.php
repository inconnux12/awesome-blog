<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require "asset/php/index/header.php" ?>
  <title>listes</title>
  
</head>
<?php require "asset/php/index/display_publications.php";?>
<?php require "asset/php/private/connection.php";?>
<body style="background-color:#fbfbfb">
<?php require "asset/php/index/nav.php" ?>
<div class="main"style="padding:60px 0">
        <div class="row">
        <div class="col s8 offset-s2 post" id="containe">
              <div class="row" id="posts">
          <div class="container">
            <div class="row" style="padding-top:20px">
              <div class="col s8">
                <input type="text" plachholder="search" targget="<?=$_GET['type']?>" onfocus="focus()" onkeyup="search(this.value,this.getAttribute('targget'))">
            </div>
            <?php
                if($_GET['type']=='pub')
                    require "asset/php/index/lists_p.php";
                elseif ($_GET['type']=='cat') {
                    require "asset/php/index/lists_c.php";
                }
            ?>
                </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  <?php require "asset/php/index/footer.php"?>
</body>
</html>