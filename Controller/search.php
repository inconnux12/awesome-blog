<?php 

if($action=='pub' || $action=='cat'){
    $sql= "select * from categorie , publications where (title_pub LIKE '%".$q."%'or name_cat LIKE '%".$q."%') and publications.id_cat = categorie.id_cat";
    $res=$con->query($sql)  or die($con->error); 
    while($row=$res->fetch_assoc()){  
    echo'<tr>
    '.(($action=='pub')?'"<td>'.$row['title_pub'].'</td>"':"").
    '<td>'.$row['name_cat'].'</td>
    <td style="text-align:center;"><a href="'.HOST.'posts/mod/'.$action.'/'.(($action=='pub')?$row['id_pub']:$row['id_cat']).'" class="blue darken-4 waves-light btn-large clr-btn">modify</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.HOST.'private/supp/'.$action.'/'.(($action=='pub')?$row['id_pub']:$row['id_cat']).'" class="red accent-4 waves-light btn-large clr-btn">delete</a></td>
    </tr>';
    }
}
elseif($action=='q'){
    $sql= "select * from categorie , publications where (title_pub LIKE '%".$q."%'or name_cat LIKE '%".$q."%') and publications.id_cat = categorie.id_cat";
    $res=$con->query($sql)  or die($con->error);
    while($row=$res->fetch_assoc()){
    echo  '<div class="col s12 article" style="position: relative;">
            <div class="article_image">
                <img class="img" src="'.ASSETS.'img/img.png" alt=""/>
            </div>
            <div class="article_contenu">
                <div class="article_date" style="font-size:13px;">publier le '.$row['created_at'].'</div>
                <div class="atricle_titre">
                    <a href="'.HOST.'post/'.$row['slug'].'" style="font-size:24px;" id="'.$row['id_pub'].'">'.$row['title_pub'].'</a>
                </div>
                <div class="article_text" style="font-size:20px;">
        '.$row['desc_pub'].'
                </div>
            </div>
        </div>
        <div class="col s12 sidebar_contenu_separateur"><hr class="sidebar_separateur"></div>';
    }
}


?>