<?php
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
    <title>register</title>
</head>
<body>
<div class="container main ">
        <div class="row z-depth-1 lgn-cnt <?=(isset($errors))?"error":"" ?>">
            <div class="col s6 form-side">
            <?php if(!isset($errors['exist']) && isset($errors)&& count($errors) > 0): ?>
                <div class="alert text-danger" style="color:red;text-align:center;padding-top:20px">Please correct the errors!</div>
            <?php elseif(isset($errors['exist'])): ?>
                            <small class="alert text-danger"><?= $errors['exist'] ?></small>
            <?php endif;?>
                <div class="row col s12 lgn-tlt">REGISTER</div>
                <form action="<?=HOST?>private/register" method="post">
                    <div class="input-field col s6">
                        <input id="first_name" type="text" class="validate clr-inp" name="user_f_name">
                        <?php if(isset($errors['f_name'])): ?>
                            <small class="text-danger"><?= $errors['f_name'] ?></small>
                        <?php endif;?>
                        <label for="first_name">First Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="last_name" type="text" class="validate clr-inp" name="user_l_name">
                        <?php if(isset($errors['l_name'])): ?>
                            <small class="text-danger"><?= $errors['l_name'] ?></small>
                        <?php endif;?>
                        <label for="last_name">Last Name</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="email" type="email" class="validate clr-inp" name="mail">
                        <?php if(isset($errors['mail'])): ?>
                            <small class="text-danger"><?= $errors['mail'] ?></small>
                        <?php endif;?>
                        <label for="email">email</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="password" type="password" class="validate" name="password">
                        <?php if(isset($errors['password'])): ?>
                            <small class="text-danger"><?= $errors['password'] ?></small>
                        <?php endif;?>
                        <label for="password">Password</label>
                    </div>                   
                    <div class="input-field col s12 dv-btn">
                        <input type="submit" class=" waves-light btn-large btn clr-btn" value="send">
                    </div>
                    <div class="row col s12 fgt-pss">
                    <label>
                        <input type="checkbox" class="filled-in clr-cb"  name="role"/>
                        <span>i agree all terms and conditions</span>
                    </label>
                    <a href="#">terms and conditions</a>
                    </div>
                </form>
            </div>
            <div class="col s6 img-side">
                <h3>Welcome visitor</h3>
                <h5>already have an account?</h5>
                <a href="<?=HOST?>login" class=" waves-light btn-large clr-btn">login</a>
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
    <script src="<?=ASSETS?>materialize/js/materialize.min.js"></script>
</body>
</html>