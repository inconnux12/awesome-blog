<?php 
    require VUE."header.php";
    require VUE."nav.php";
?>
          <div class="container">
            <div class="row" style="padding-top:20px">
            <?php
                if($action=='pub'){
                    $sql="select * from categorie , publications where publications.id_cat = categorie.id_cat;";
                    $res=$con->query($sql);
                    ?>

    <div class="col s12">
      <a href="<?=HOST?>posts/add/pub" style="width:100%" class="green darken-4 waves-light btn-large clr-btn">ajouter</a>
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
            <td><a href="<?=HOST?>post/<?=$row['slug']?>" id="<?=$row['id_pub']?>"><?=$row['title_pub']?></a></td>
            <td><?= $row['name_cat']?></td>
            <td style="text-align:center;"><a href="<?=HOST?>posts/mod/pub/<?=$row['id_pub']?>" class="blue darken-4 waves-light btn-large clr-btn">modify</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=HOST?>private/supp/pub/<?=$row['id_pub']?>" class="red accent-4 waves-light btn-large clr-btn">delete</a></td>
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
      <a href="<?=HOST?>posts/add/cat" class="green darken-4 waves-light btn-large clr-btn">ajouter</a>
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
            <td style="text-align:center;"><a href="<?=HOST?>posts/mod/cat/<?=$row['id_cat']?>"  class="blue darken-4 waves-light btn-large clr-btn">modify</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=HOST?>private/supp/cat/<?=$row['id_cat']?>" class="red accent-4 waves-light btn-large clr-btn">delete</a></td>
          </tr> <?php }}?> 
    </tbody>
      </table>
        </div>

              <?php  }?>
                </div>
            </div>

            <?php require VUE."footer.php";?>
     