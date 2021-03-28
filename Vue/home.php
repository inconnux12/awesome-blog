<?php 
require VUE."header.php";
require VUE."nav.php";
    $sql="select * from publications, categorie where categorie.id_cat=publications.id_cat";
    $resultat=$con->query($sql);
    if($resultat->num_rows>0){
        while($row=$resultat->fetch_assoc()){
            $tags=explode('-',$row['tags_pub']);
            $de = strtotime($row['created_at']);$created=$_SERVER['REQUEST_TIME']-$de+3600;?>
            <div class="col s12 article" style="position: relative;">
                <div class="article_image">
                    <img class="img" src="<?=ASSETS?>img/<?=$row['img_pub']?>" alt=""/>
                </div>
                <div class="article_contenu">
                   <div class="article_date" style="font-size:13px;">publier il y a <?= secondsToTime($created) ?><br> <span style="color:black">Categorie: <?=$row['name_cat']?></span></div>
                    <div class="atricle_titre">
                        <a href="<?=HOST?>post/<?=$row['slug']?>" style="font-size:24px;" id="<?=$row['id_pub']?>"><?=$row['title_pub']?></a>
                <?php if(isset($_SESSION['login'])&&$_SESSION['login']){
                     $sql2="SELECT COUNT(*) FROM markbook WHERE id_pub='".$row['id_pub']."' AND user_id='".$_SESSION['user_id']."'";
                     $resultat2=$con->query($sql2) or die($con->error);
                     while($row2=$resultat2->fetch_assoc()){?>
                        <i class=" medium material-icons fav<?=$row['id_pub']?>" id="<?=$row['id_pub']?>" fav="<?=$row['id_pub']?>" onclick="add(this.getAttribute('id'))" style="position: absolute;top:0;right:0;cursor:pointer;"><?=((int)$row2['COUNT(*)']>0)? "star":"star_border"?></i>
                <?php }}?>
                    </div>
                    <div class="article_text" style="font-size:20px;">
                        <?=$row['desc_pub']?>
                    </div>
                    <span style="color:black">tags: <?php foreach($tags as $tag):echo $tag.","; endforeach  ?></span>
                </div>
            </div>
        <div class="col s12 sidebar_contenu_separateur"><hr class="sidebar_separateur"></div>
        <?php } }
    require VUE."footer.php";?>