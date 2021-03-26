<?php
require VUE."header.php";
require VUE."nav.php";
$sql="select * from publications,markbook where user_id='".$_SESSION['user_id']."' and publications.id_pub=markbook.id_pub";
$res=$con->query($sql);

if($res->num_rows>0){
  while($row=$res->fetch_assoc()){?>
  <div class="col s12 article" style="position: relative;">
<div class="article_image">
<img class="img" src="<?=ASSETS?>img/img.png" alt=""/>
</div>
<div class="article_contenu">
<div class="article_date" style="font-size:13px;">publier le <?=$row['created_at']?></div>
<div class="atricle_titre"><a href="post/<?=$row['slug']?>" style="font-size:24px;" id="<?=$row['id_pub']?>"><?=$row['title_pub']?></a><i class=" medium material-icons" id="<?=$row['id_pub']?>" onclick="add(this.getAttribute('id'))" style="position: absolute;top:0;right:0;cursor:pointer;">star_border</i></div>
<div class="article_text" style="font-size:20px;">
<?=$row['desc_pub']?>
</div>
</div>
</div>
<div class="col s12 sidebar_contenu_separateur"><hr class="sidebar_separateur"></div>
<?php } } 
require VUE."footer.php";
?>
