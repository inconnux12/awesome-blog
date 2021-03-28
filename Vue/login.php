<?php
 if(isset($_SESSION['login'])){
    header('Location: '.HOST);
    exit();
 }
 if(isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=ASSETS?>materialize/css/materialize.min.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/ico.min.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/login.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div class="container main">
    
        <div class="row z-depth-1 lgn-cnt">
            <div class="col s12 m7 form-side">
                <?php if(isset($_SESSION['register'])&& $_SESSION['register']){?>
                    <div style="color:green;text-align:center;">register successfully you can login now</div>
                    <?php }?>
            <?php if(isset($errors['false'])&&$errors['false']){?>
                <small style="color:red;text-align:center;">error please retry</small>
                <?php  }  ?>
                <div class="row col s12 lgn-tlt">LOGIN</div>
                <form action="<?=HOST?>private/login" method="post">
                    <div class="input-field col s12">
                        <input id="email" type="text" class="validate clr-inp" name="user_l_name">
                        <?php if(isset($errors['l_name'])): ?>
                            <small class="text-danger"><?= $errors['l_name'] ?></small>
                        <?php endif;?>
                        <label for="email">Last Name</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="password" type="password" class="validate" name="password">
                        <?php if(isset($errors['password'])): ?>
                            <small class="text-danger"><?= $errors['password'] ?></small>
                        <?php endif;?>
                        <label for="password">Password</label>
                    </div>
                    <div class="input-field col s4 offset-s3 ">
                        <button class="btn grey darken-3 waves-effect waves-light btn-large" type="submit" name="action" value="send" >Sign In
                        <i class="material-icons left">navigate_next</i>
                        </button>
                    </div>
                    
                    <div class="row col s12 fgt-pss">
                        <a href="#"><u>forgot your password?</u></a>
                    </div>
                </form>
            </div>
            <div class="col m5 img-side">
                <h3>Welcome to Login</h3>
                <h5>don't have an account?</h5>
                <!-- <a href="register.php" class=" waves-light btn-large clr-btn">register</a> -->

                
                   <button class="btn grey darken-3 waves-effect waves-light btn-large " type="submit" name="action" style="width: 50%;">
                    <a href="<?=HOST?>register" style="color:white;"> Sign Up<i class="material-icons left">add</i></a>
                    </button>

            </div>
        </div>
        <div class="row">
            <div class="col s4 ">
                <a href="<?=HOST?>" style="color:white;"><button class="btn grey darken-3 waves-effect waves-light btn-large " type="submit" name="" style="margin-top: 2px;">  Return Home 
                    <i class="material-icons left">arrow_back</i></button>
                </a>
            </div>
        </div>
    </div>
    <?php unset($_SESSION['errors']);unset($_SESSION['register']);$_SESSION['register']=false; $errors=[];?>
    <script src="<?=ASSETS?>materialize/js/materialize.min.js"></script>
</body>
</html>