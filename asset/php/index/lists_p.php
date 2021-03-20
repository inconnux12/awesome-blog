<?php 
$sql="select id_pub, title_pub,name_cat from categorie , publications where publications.id_cat = categorie.id_cat;";
$res=$con->query($sql);
?>

    <div class="col s3 offset-s1">
      <a href="add.php?type=pub" class="green darken-4 waves-light btn-large clr-btn">ajouter</a>
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
            <td style="text-align:center;"><a href="mody.php?type=pub&id=<?=$row['id_pub']?>" class="blue darken-4 waves-light btn-large clr-btn">modify</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="asset/php/private/supp_p.php?type=pub&id=<?=$row['id_pub']?>" class="red accent-4 waves-light btn-large clr-btn">delete</a></td>
          </tr>
          <?php }} ?> 
      </tbody>
      </table>
        </div>
