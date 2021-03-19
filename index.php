<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">

    
    <link rel="stylesheet" href="assets/css/main.css">
     <!--Import Google Icon Font-->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="assets/materialize/css/materialize.min.css"  media="screen,projection"/>
    <title>My Blog | Life Blog</title>
</head>

<body>
  <div class="container-fluid ">


         <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">
          <li><a href="#">Category - 1 -</a></li>
          <li><a href="#">Category - 2 - </a></li>
          <li><a href="#">Category - 3 - </a></li>
        </ul>
      <div class="navbar-fixed"> 
      <nav class="nav-extended #546e7a blue-grey darken-1">
        <div class="nav-wrapper">
          <a href="#" class="brand-logo ">Welcome To Life Blog</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li> 
             <form>
               <div class="input-field ">
                  <input id="search" type="search" required placeholder="Search">
                  <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                  <i class="material-icons">close</i>
               </div>
             </form>
            </li>         
            <li><a  href="#" ><i class="material-icons left">edit</i>Sign In</a></li>
            <li><a  href="#" ><i class="material-icons left">add</i>Sign Up</a> </li>
          </ul>
        </div>
        <div class="nav-content">
          <ul class="tabs tabs-transparent">
            <li class="tab"><a href="#">Home</a></li>
            <li class="tab"><a href="#">About</a></li>
            <li class="tab"><a class="dropdown-trigger" data-target="dropdown1" href="#">Cateories<i class="material-icons right">arrow_drop_down</i></a></li>
          </ul>
        </div>
      </nav>
      </div>   
      


      <div class="col">
        <img src="assets/img/bg.jpg" alt="" class="responsive-img"> 
      </div>


 </div>





 <footer class="page-footer  #546e7a blue-grey darken-1">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Life Blog</h5>
                <p class="grey-text text-lighten-4">Built By</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Contact Us</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#"><i class="tiny material-icons">email</i>E-mail</a></li>
                  <li><a class="grey-text text-lighten-3" href="#"><i class="tiny material-icons">facebook</i>Facebook</a></li>
                  <li><a class="grey-text text-lighten-3" href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                  <li><a class="grey-text text-lighten-3" href="#"><i class="fa fa-github"></i>GitHub</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            ©2021 Copyright
            
            </div>
          </div>
        </footer>








 
 
  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="assets/materialize/js/materialize.min.js"></script>
  <script type="text/javascript" src="assets/JS/style.js"></script>
</body>

</html>