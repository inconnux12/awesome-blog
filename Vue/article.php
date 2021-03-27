<?php 
require VUE."header.php";
require VUE."nav.php";
$sql="select * from publications where slug='".$action."'";
$res=$con->query($sql);
if($res->num_rows>0){
    while($row=$res->fetch_assoc()){?>
        <div class="col s12 article">
            <div class="article_image">
                <img class="img" src="<?=ASSETS?>img/<?=$row['img_pub']?>" alt=""/>
            </div>
            <div class="article_contenu">
                <div class="article_date" style="font-size:13px;">publier le <?=$row['created_at']?></div>
                <div class="atricle_titre" style="font-size:24px;"><?=$row['title_pub']?></div>
                <div class="article_text" style="font-size:20px;"><?=$row['cont_pub']?></div>
            </div>
        </div>
    <?php }}
    require VUE."footer.php";
    ?>