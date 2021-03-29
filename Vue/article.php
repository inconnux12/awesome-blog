<?php 
require VUE."header.php";
require VUE."nav.php";
$sql="select * from publications, categorie  where categorie.id_cat=publications.id_cat and slug='".$action."'";
$res=$con->query($sql);
if($res->num_rows>0){
    while($row=$res->fetch_assoc()){$de = strtotime($row['created_at']);$created=CURRENT_TIME-$de;
        $tags=explode('-',$row['tags_pub']);
        ?>
        <div class="col s12 article">
            <div class="article_image">
                <img class="img" src="<?=ASSETS?>img/<?=$row['img_pub']?>" alt=""/>
            </div>
            <div class="article_contenu">
                <div class="article_date" style="font-size:13px;">publier il y a <?=secondsToTime($created); ?><br> <span style="color:black">Categorie: <?=$row                        ['name_cat']?></span>
                </div>
                <div class="atricle_titre" style="font-size:24px;"><?=$row['title_pub']?></div>
                <div class="article_text" style="font-size:20px;"><?=$row['cont_pub']?><br><div style="color:#546e7a;margin-top:20px;">tags: <?php $end_of=count($tags)-1;foreach($tags as $tag):echo $tag;?><?=($end_of)?",":"";$end_of-=1;endforeach?></div></div>
                
            </div>
            
        </div>
    <?php }}
    require VUE."footer.php";
    ?>