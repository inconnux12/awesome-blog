<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/awesome-blog/asset/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="/awesome-blog/asset/css/ico.min.css">
    <link rel="stylesheet" href="/awesome-blog/asset/css/login.css">
    <title>register</title>
</head>
<body>
<div class="container main">
        <div class="row z-depth-1 lgn-cnt">
            <div class="col s6 form-side">
                <div class="row col s12 lgn-tlt">REGISTER</div>
                <form action="/awesome-blog/asset/php/private/register.php" method="post">
                    <div class="input-field col s6">
                        <input id="first_name" type="text" class="validate clr-inp" name="user_f_name">
                        <label for="first_name">First Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="last_name" type="text" class="validate clr-inp" name="user_l_name">
                        <label for="last_name">Last Name</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="email" type="email" class="validate clr-inp" name="mail">
                        <label for="email">email</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="password" type="password" class="validate" name="password">
                        <label for="password">Password</label>
                    </div>
                    <div class="input-field col s6 ">
                        <input id="re-password" type="password" class="validate" name="re_password">
                        <label for="re-password">retape your Password</label>
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
                <a href="login.php" class=" waves-light btn-large clr-btn">login</a>
            </div>
        </div>
    </div>
    <script src="/awesome-blog/asset/materialize/js/materialize.min.js"></script>
</body>
</html>