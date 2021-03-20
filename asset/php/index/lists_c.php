<?php 
$sql="select * from categorie;";
$res=$con->query($sql);
?> 
    <div class="col s3 offset-s1">
      <a href="add.php?type=cat" class="green darken-4 waves-light btn-large clr-btn">ajouter</a>
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
            <td style="text-align:center;"><a href="mody.php?type=cat&id=<?=$row['id_cat']?>"  class="blue darken-4 waves-light btn-large clr-btn">modify</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="asset/php/private/supp_c.php?type=cat&id=<?=$row['id_cat']?>" class="red accent-4 waves-light btn-large clr-btn">delete</a></td>
          </tr> <?php }}?> 
    </tbody>
      </table>
        </div>
