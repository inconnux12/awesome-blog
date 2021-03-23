<?php 
    require "asset/php/index/header.php";
    require "asset/php/index/nav.php";
?>
          <div class="container">
            <div class="row" style="padding-top:20px">
              <div class="col s8">
                <input type="text" plachholder="search" targget="<?=$action?>" onfocus="focus()" onkeyup="search(this.value,this.getAttribute('targget'))">
            </div>
            <?php
                if($action=='pub'){
                    $sql="select id_pub, title_pub,name_cat from categorie , publications where publications.id_cat = categorie.id_cat;";
                    $res=$con->query($sql);
                    ?>

    <div class="col s3 offset-s1">
      <a href="add/pub" class="green darken-4 waves-light btn-large clr-btn">ajouter</a>
    </div>
    </div>
    <div class="row">
        <div class="col s12">
        <table>
        <thead>
          <tr>
              <th>Name</th>
              <th>Categorie</th>
              <th></th>
          </tr>
        </thead>
      <tbody>
        <?php
          if($res->num_rows>0){
             while($row=$res->fetch_assoc()){?>
           <tr>
            <td> <?= $row['title_pub']?></td>
            <td><?= $row['name_cat']?></td>
            <td style="text-align:center;"><a href="/awesome-blog/mod/pub/<?=$row['id_pub']?>" class="blue darken-4 waves-light btn-large clr-btn">modify</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="asset/php/private/supp_p.php?type=pub&id=<?=$row['id_pub']?>" class="red accent-4 waves-light btn-large clr-btn">delete</a></td>
          </tr>
          <?php }} ?> 
      </tbody>
      </table>
        </div>
                <?php }
                   
                elseif ($action=='cat') {
                    $sql="select * from categorie;";
                    $res=$con->query($sql);
                    ?> 
    <div class="col s3 offset-s1">
      <a href="add/cat" class="green darken-4 waves-light btn-large clr-btn">ajouter</a>
    </div>
    </div>
    <div class="row">
        <div class="col s12">
        <table>
        <thead>
          <tr>
              <th>Name</th>
              <th></th>
          </tr>
        </thead>
        <tbody><?php
              if($res->num_rows>0){
                while($row=$res->fetch_assoc()){?>
                  <tr>
            <td><?= $row['name_cat']?></td>
            <td style="text-align:center;"><a href="mod/cat/<?=$row['id_cat']?>"  class="blue darken-4 waves-light btn-large clr-btn">modify</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="asset/php/private/supp_c.php?type=cat&id=<?=$row['id_cat']?>" class="red accent-4 waves-light btn-large clr-btn">delete</a></td>
          </tr> <?php }}?> 
    </tbody>
      </table>
        </div>

              <?php  }?>
                </div>
            </div>

            <?php require "asset/php/index/footer.php";?>
     