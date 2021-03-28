<?php
require VUE."header.php";
require VUE."nav.php";
$sql="select * from publications,markbook,categorie where categorie.id_cat=publications.id_cat and user_id='".$_SESSION['user_id']."' and publications.id_pub=markbook.id_pub";
$res=$con->query($sql);

if($res->num_rows>0){
  while($row=$res->fetch_assoc()){$de = strtotime($row['created_at']);$created=$_SERVER['REQUEST_TIME']-$de+3600;
    $tags=explode('-',$row['tags_pub']);
    ?>
  <div class="col s12 article" style="position: relative;">
<div class="article_image">
<img class="img" src="<?=ASSETS?>img/<?=$row['img_pub']?>" alt=""/>
</div>
<div class="article_contenu">
<div class="article_date" style="font-size:13px;">publier il y a <?= secondsToTime($created) ?><br> <span style="color:black">Categorie: <?=$row['name_cat']?></span></div>
<div class="atricle_titre"><a href="post/<?=$row['slug']?>" style="font-size:24px;" id="<?=$row['id_pub']?>"><?=$row['title_pub']?></a><i class=" medium material-icons fav<?=$row['id_pub']?> " id="<?=$row['id_pub']?>" onclick="add(this.getAttribute('id'))" style="position: absolute;top:0;right:0;cursor:pointer;">star</i></div>
<div class="article_text" style="font-size:20px;">
<?=$row['desc_pub']?>
</div>
<span style="color:black">tags: <?php foreach($tags as $tag):echo $tag.","; endforeach  ?></span>
</div>
</div>
<div class="col s12 sidebar_contenu_separateur"><hr class="sidebar_separateur"></div>
<?php } } 
require VUE."footer.php";
?>
