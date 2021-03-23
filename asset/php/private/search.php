<?php
require "connection.php";
require "const.php";
if($_GET['type']=='pub'){
    $sql="select id_pub, title_pub,name_cat from categorie , publications where title_pub LIKE '".$_GET['q']."%' and publications.id_cat = categorie.id_cat";
    $res=$con->query($sql)  or die($con->error);
    while($row=$res->fetch_assoc()){
        echo'<tr>
        <td>'.$row['title_pub'].'</td>
        <td>'.$row['name_cat'].'</td>
        <td style="text-align:center;"><a href="/'.DIR.'/posts/mod/pub/'.$row['id_pub'].'" class="blue darken-4 waves-light btn-large clr-btn">modify</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="asset/php/private/supp_p.php?type=pub&id='.$row['id_pub'].'" class="red accent-4 waves-light btn-large clr-btn">delete</a></td>
    </tr>';
    }
}
elseif($_GET['type']=='cat'){
    $sql="select * from categorie where name_cat like '".$_GET['q']."%'";
    $res=$con->query($sql)  or die($con->error);
    while($row=$res->fetch_assoc()){
        echo'<tr>
        <td>'.$row['name_cat'].'</td>
        <td style="text-align:center;"><a href="/'.DIR.'/posts/mod/cat/'.$row['id_cat'].'" class="blue darken-4 waves-light btn-large clr-btn">modify</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="asset/php/private/supp_p.php?type=cat&id='.$row['id_cat'].'" class="red accent-4 waves-light btn-large clr-btn">delete</a></td>
    </tr>';
    }
}
?>