<?php
 $display_pub=function($con){
    $sql="SELECT * from publications";
    $resultat = $con->query($sql);
    if($resultat->num_rows>0){
        while($row=$resultat->fetch_assoc()){?>
            <div class="col s12 article" style="position: relative;">
                <div class="article_image">
                    <img class="img" src="asset/img/img.png" alt=""/>
                </div>
                <div class="article_contenu">
                    <div class="article_date" style="font-size:13px;">publier le <?=$row['created_at']?></div>
                    <div class="atricle_titre">
                        <a href="article.php?id=<?= $row['id_pub'] ?>" style="font-size:24px;" id="<?=$row['id_pub']?>"><?=$row['title_pub']?></a>
                <?php if(isset($_SESSION['login'])&&$_SESSION['login']){?>
                        <i class=" medium material-icons fav<?=$row['id_pub']?>" id="<?=$row['id_pub']?>" fav="<?=$row['id_pub']?>" onclick="add(this.getAttribute('id'))" style="position: absolute;top:0;right:0;cursor:pointer;">star_border</i>
                <?php }?>
                    </div>
                    <div class="article_text" style="font-size:20px;">
            <?=$row['desc_pub']?>
                    </div>
                </div>
            </div>
        <div class="col s12 sidebar_contenu_separateur"><hr class="sidebar_separateur"></div>
        <?php } 
    }
}?>