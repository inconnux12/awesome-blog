<?php
require "asset/php/index/header.php";
require "asset/php/index/nav.php";
if($action=='pub'){
    $sql="select * from categorie";
    $res=$con->query($sql);
}
?>
          <?php if($action=='pub'){?>
          <form action="<?=DIR?>asset/php/private/adds_p.php" method="post">
                    <div class="input-field col s6">
                        <input name="title_pub" id="title_pub" type="text" class="validate clr-inp">
                        <label for="title_pub">title post</label>
                    </div>
                    <div class="input-field col s6">
                        <select class="browser-default" name='id_cat'>
                        <option selected disabled>select category</option>
                    <?php if($res->num_rows>0){
                        while($row=$res->fetch_assoc()){?>             
                                <option value="<?= $row['id_cat'] ?>"><?= $row['name_cat'] ?></option>
                                <?php }}?>
                        </select>
                    </div>
                    <div class="input-field col s12">
                        <textarea name="desc_pub" id="desc_pub" class="materialize-textarea" cols="30" rows="30"></textarea>
                        <label for="desc_pub">description of post</label>
                    </div>
                    <div class="input-field col s12">
                    <textarea name="cont_pub" id="cont_pub" class="materialize-textarea" cols="30" rows="30"></textarea>
                        <label for="cont_pub">containe of post</label>
                    </div> 
                                    
                    <div class="input-field col s12 dv-btn">
                        <input type="submit" class=" waves-light btn-large btn clr-btn" value="send">
                    </div> 
                </form>
                <?php } elseif($action=='cat'){ ?> 
                    <form action="asset/php/private/adds_c.php" method="post">
                    <div class="input-field col s12">
                        <input name="name_cat" id="name_cat" type="text" class="validate clr-inp">
                        <label for="name_cat">name of categorie</label>
                    </div>
                    <div class="input-field col s12 dv-btn">
                        <input type="submit" class=" waves-light btn-large btn clr-btn" value="send">
                    </div> 
                </form>
                <?php } 
                require "asset/php/index/footer.php";
                ?>
