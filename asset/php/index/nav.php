
  
         <!-- Dropdown Structure -->
        
<div class="navbar-fixed"> 
  <nav class="nav-extended #546e7a blue-grey darken-1">
    <div class="nav-wrapper">
      <a href="/<?=DIR?>" class="brand-logo ">Welcome To Life Blog</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
            <!--li> 
            SEARCH FIELD
             <form>
               <div class="input-field ">
                  <input id="search" type="search" required placeholder="Search">
                  <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                  <i class="material-icons">close</i>
               </div>
             </form>
            </li-->    
      <?php if(!isset($_SESSION['login'])){ ?> 
        <li class="tab"><a  href="/<?=DIR?>/login" ><i class="material-icons left">edit</i>Sign In</a></li>
        <li class="tab"><a  href="/<?=DIR?>/register" ><i class="material-icons left">add</i>Sign Up</a> </li>
      <?php } ?>
      </ul>
    </div>
    <div class="nav-content">
      <ul class="tabs tabs-transparent">
        <?php
          if(isset($_SESSION['login'])){
            if(isset($_SESSION['role'])&&$_SESSION['role']){ ?>
        <li class="tab"><a href="<?=DIR?>posts/pub" id="list_pub">articles</a></li>
        <li class="tab"><a href="<?=DIR?>posts/cat" id="list_cat">categories</a></li>
        <?php } ?>
        <li class="tab"><a href="<?=DIR?>bookmarks">bookmarks</a></li>
        <li class="tab"><a href="<?=DIR?>asset/php/private/logout.php">logout</a></li>
        <?php }?>
        
        <li class="tab"><a class="dropdown-trigger" data-target="dropdown1" href="#">Cateories<i class="material-icons right">arrow_drop_down</i></a></li>
      </ul>
    </div>
  </nav>
</div>
<div class="main"style="padding:60px 0">
    <div class="row">
      <div class="col s8 offset-s2 post" id="containe">
        <div class="row" id="posts">