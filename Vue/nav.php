<div class="navbar-fixed"> 
  <nav class="nav-extended #546e7a blue-grey darken-1">
    <div class="nav-wrapper">
      <a href="<?=HOST?>" class="brand-logo center">Welcome To Life Blog</a>

      <ul id="nav-mobile" class="right">    
      <?php if(!isset($_SESSION['login'])){ ?> 
        <li class="tab"><a  href="<?=HOST?>login" ><i class="material-icons left">edit</i>Sign In</a></li>
        <li class="tab"><a  href="<?=HOST?>register" ><i class="material-icons left">add</i>Sign Up</a> </li>
      <?php }else{?>
        <li class="tab"><a href="<?=HOST?>private/logout"><i class="material-icons left">logout</i>Logout</a></li>
        <?php }?>
      </ul>
    </div>
    <div class="nav-content">
      <ul class="tabs tabs-transparent" style="display: flex;justify-content: space-evenly;">
        
        <li class="input-field col s10" style="flex:30%;">
          <input id="search" type="search" required placeholder="Search" targget="<?=isset($action)?$action:"q"?>" onkeyup="search(this.value,this.getAttribute('targget'))">    
         </li>
        <?php
          if(isset($_SESSION['login'])){?>
        <li class="tab" style="flex:10%;"><a href="<?=HOST?>">Home</a></li>
        <li class="tab" style="flex:10%;"><a href="<?=HOST?>bookmarks">bookmarks</a></li>
           <?php if(isset($_SESSION['role'])&&$_SESSION['role']){ ?>
        <li class="tab" style="flex:10%;"><a href="<?=HOST?>posts/pub" id="list_pub">articles</a></li>
        <li class="tab" style="flex:10%;"><a href="<?=HOST?>posts/cat" id="list_cat">categories</a></li>
        <?php }}?> 
        
         
      </ul>
    </div>
  </nav>
</div>
<div class="main"style="padding:60px 0">
    <div class="row">
      <div class="col s9 offset-s1 post" id="containe">
        <div class="row" id="posts">