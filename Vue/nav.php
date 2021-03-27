<div class="navbar-fixed"> 
  <nav class="nav-extended #546e7a blue-grey darken-1">
    <div class="nav-wrapper">
      <a href="<?=HOST?>" class="brand-logo ">Welcome To Life Blog</a>

      <ul id="nav-mobile" class="right hide-on-med-and-down">    
      <?php if(!isset($_SESSION['login'])){ ?> 
        <li class="tab"><a  href="<?=HOST?>login" ><i class="material-icons left">edit</i>Sign In</a></li>
        <li class="tab"><a  href="<?=HOST?>register" ><i class="material-icons left">add</i>Sign Up</a> </li>
      <?php }else{?>
        <li class="tab"><a href="<?=HOST?>private/logout"><i class="material-icons left">exit_to_app</i>Logout</a></li>
        <?php }?>
      </ul>
    </div>
    <div class="nav-content">
      <ul class="tabs tabs-transparent">
        <?php
          if(isset($_SESSION['login'])){
            if(isset($_SESSION['role'])&&$_SESSION['role']){ ?>
        <li class="tab"><a href="<?=HOST?>posts/pub" id="list_pub">articles</a></li>
        <li class="tab"><a href="<?=HOST?>posts/cat" id="list_cat">categories</a></li>
        <?php } ?>
        <li class="tab"><a href="<?=HOST?>bookmarks">bookmarks</a></li>
        <?php }?>
        <li class="input-field col s4">
          <input id="search" type="search" required placeholder="Search" targget="<?=isset($action)?$action:"q"?>" onkeyup="search(this.value,this.getAttribute('targget'))">    
         </li>
      </ul>
    </div>
  </nav>
</div>
<div class="main"style="padding:60px 0">
    <div class="row">
      <div class="col s8 offset-s2 post" id="containe">
        <div class="row" id="posts">