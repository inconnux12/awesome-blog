<?php 

if($action=='pub' || $action=='cat'){
    if($action=='pub')
        $sql= "select * from categorie , publications where title_pub LIKE '%".$q."%' and publications.id_cat=categorie.id_cat";
    else
        $sql= "select * from categorie where name_cat LIKE '%".$q."%'";
    $res=$con->query($sql)  or die($con->error); 
    while($row=$res->fetch_assoc()){  
    echo'<tr>
    '.(($action=='pub')?'"<td>'.$row['title_pub'].'</td>"':"").
    '<td>'.$row['name_cat'].'</td>
    <td style="text-align:center;"><a href="'.HOST.'posts/mod/'.$action.'/'.(($action=='pub')?$row['id_pub']:$row['id_cat']).'" class="blue darken-4 waves-light btn-large clr-btn">modify</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.HOST.'private/supp/'.$action.'/'.(($action=='pub')?$row['id_pub']:$row['id_cat']).'" class="red accent-4 waves-light btn-large clr-btn">delete</a></td>
    </tr>';
    }
}
else{
    if($action=='q'){
        $sql= "select * from categorie , publications where (title_pub LIKE '%".$q."%'or name_cat LIKE '%".$q."%' or desc_pub LIKE '%".$q."%'or cont_pub LIKE '%".$q."%' or tags_pub LIKE '%".$q."%') and publications.id_cat = categorie.id_cat";
    }
    else{
        $sql="select * from publications,markbook,categorie where (title_pub LIKE '%".$q."%'or name_cat LIKE '%".$q."%' or desc_pub LIKE '%".$q."%'or cont_pub LIKE '%".$q."%' or tags_pub LIKE '%".$q."%') and publications.id_cat = categorie.id_cat and user_id='".$_SESSION['user_id']."' and publications.id_pub=markbook.id_pub";
    }
    $res=$con->query($sql)  or die($con->error);
    while($row=$res->fetch_assoc()){$de = strtotime($row['created_at']);$created=$_SERVER['REQUEST_TIME']-$de+3600;
        $tags=explode('-',$row['tags_pub']);
    echo  '<div class="col s12 article" style="position: relative;">
            <div class="article_image">
                <img class="img" src="'.ASSETS.'img/'.$row['img_pub'].'" alt=""/>
            </div>
            <div class="article_contenu">
                <div class="article_date" style="font-size:13px;">publier il y a  '.secondsToTime($created).'<br> <span style="color:black">Categorie: '.$row['name_cat'].'</span></div>
                <div class="atricle_titre">
                    <a href="'.HOST.'post/'.$row['slug'].'" style="font-size:24px;" id="'.$row['id_pub'].'">'.$row['title_pub'].'</a>';
                    if(isset($_SESSION['login'])&&$_SESSION['login']){
                        $sql2="SELECT COUNT(*) FROM markbook WHERE id_pub='".$row['id_pub']."' AND user_id='".$_SESSION['user_id']."'";
                        $resultat2=$con->query($sql2) or die($con->error);
                        while($row2=$resultat2->fetch_assoc()){
                            echo '<i class=" medium material-icons fav'.$row['id_pub'].'" id="'.$row['id_pub'].'" onclick="add(this.getAttribute(\'id\'))" style="position: absolute;top:0;right:0;cursor:pointer;">'.(((int)$row2['COUNT(*)']>0)? "star":"star_border").'</i>';
                        }
                    }
                echo'</div>
                <div class="article_text" style="font-size:20px;">
                    '.$row['desc_pub'].'
                </div>
                <div style="color:#546e7a;margin-top:20px;">tags:';$end_of=count($tags)-1;foreach($tags as $tag):echo $tag;?><?=($end_of)?",":"";$end_of-=1; endforeach; echo '</div>
            </div>
        </div>
        <div class="col s12 sidebar_contenu_separateur"><hr class="sidebar_separateur"></div>';
    }
}


?>