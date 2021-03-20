<?php
require "asset/php/index/display_publications.php";
require "asset/php/private/connection.php";
session_start();
if($_GET['type']=='pub'){
    $sql="select * from categorie";
    $res=$con->query($sql);
    $res2=$con->query("select * from publications where id_pub='".$_GET['id']."'");
    $row2=$res2->fetch_assoc();
}
elseif($_GET['type']=='cat'){
    $res2=$con->query("select * from categorie where id_cat='".$_GET['id']."'");
    $row2=$res2->fetch_assoc();
}
?>
   
<!DOCTYPE html>
<html lang="en">
<head>
<?php require "asset/php/index/header.php" ?>
  <title>acceuil</title>
  
</head>

<body style="background-color:#fbfbfb">
<?php require "asset/php/index/nav.php" ?>
<div class="main"style="padding:60px 0">
        <div class="row">
        <div class="col s8 offset-s2 post" id="containe">
              <div class="row" id="posts">
          <?php if($_GET['type']=='pub'){?>
          <form action="asset/php/private/mods_p.php?id=<?= $_GET['id']?>" method="post">
                    <div class="input-field col s6">
                        <input name="title_pub" id="title_pub" type="text" class="validate clr-inp" value=<?= $row2['title_pub']?>>
                        <label for="title_pub">title post</label>
                    </div>
                    <div class="input-field col s6">

                    <select class="browser-default" name='id_cat' value=<?= $row2['id_cat']?>>
                    <option selected disabled>select category</option>
                    <?php if($res->num_rows>0){
                        while($row=$res->fetch_assoc()){?>             
                                <option value="<?= $row['id_cat'] ?>" <?php if($row['id_cat']==$row2['id_cat']) echo'selected'; ?>><?= $row['name_cat'] ?></option>
                                <?php }}?>
                        </select>
                    </div>
                    <div class="input-field col s12">
                        <textarea name="desc_pub" id="desc_pub" class="materialize-textarea" cols="30" rows="30"><?= $row2['desc_pub']?></textarea>
                        <label for="desc_pub">description of post</label>
                    </div>
                    <div class="input-field col s12">
                    <textarea name="cont_pub" id="cont_pub" class="materialize-textarea" cols="30" rows="30" ><?= $row2['cont_pub']?></textarea>
                        <label for="cont_pub">containe of post</label>
                    </div>                  
                    <div class="input-field col s12 dv-btn">
                        <input type="submit" class=" waves-light btn-large btn clr-btn" value="modifier">
                    </div>    
                </form>
                <?php } elseif($_GET['type']=='cat'){ ?> 
                    <form action="asset/php/private/mods_c.php?id=<?= $_GET['id']?>" method="post">
                        <div class="input-field col s12">
                            <input name="name_cat" id="name_cat" type="text" class="validate clr-inp" value="<?= $row2['name_cat'] ?>">
                            <label for="name_cat">name of categorie</label>
                        </div>
                        <div class="input-field col s12 dv-btn">
                            <input type="submit" class=" waves-light btn-large btn clr-btn" value="modifier">
                        </div> 
                    </form>
                <?php } ?>
          </div>
      </div>
    </div>
  </div>
    <?php require "asset/php/index/footer.php" ?>
   <script src="js/main.js"></script> 
   <script src="materialize/js/materialize.min.js"></script>
</body>
</html>










