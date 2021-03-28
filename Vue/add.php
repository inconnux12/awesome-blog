<?php
require VUE."header.php";
require VUE."nav.php";
if($action=='pub'){
    $sql="select * from categorie";
    $res=$con->query($sql);
?>
          <form enctype="multipart/form-data" action="<?=HOST?>private/add/pub" method="post">
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
                    <div class="input-field col s6">                        
                        <span style="cursor:pointer" onClick="tags()" class="green darken-4 waves-light btn-large clr-btn">ajouter</span>
                        <input name="tags_pub[]" id="tags" type="text" class="validate clr-inp" placeholder="tags">

                    </div>
                    <div class="input-field col s12">
                        <input type="file" name="img" id="">
                    </div>                
                    <div class="input-field col s12 dv-btn">
                        <input type="submit" class=" waves-light btn-large btn clr-btn" value="send">
                    </div> 
                </form>
                <?php } elseif($action=='cat'){ ?> 
                    <form action="<?=HOST?>private/add/cat" method="post">
                    <div class="input-field col s12">
                        <input name="name_cat" id="name_cat" type="text" class="validate clr-inp">
                        <label for="name_cat">name of categorie</label>
                    </div>
                    <div class="input-field col s12 dv-btn">
                        <input type="submit" class=" waves-light btn-large btn clr-btn" value="send">
                    </div> 
                </form>
                <?php } 
                require VUE."footer.php";
                ?>
