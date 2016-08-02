<?php 
if(isset($_SESSION['myuser']) && isset($_SESSION['myadmin'])){
    header('location: home.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8"/>
        <meta name = "viewport" content = "width=device-width, initial-scale=1"/>

        <title>Login - SiMitra BA</title>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <link href="custcss/mycss.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <link href="custcss/logincss.css" rel="stylesheet" type="text/css"/>
    </head>
    <body style="background: url('asset/bg.png')">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <div class="account-wall">
                        <p class='text-center'><img src="asset/logo.png" width='150' alt=""/></p>
                        <form class="form-signin" action="core/core-login.php" method="POST">
                            <input name='isadmin' type='hidden' value='0'/>
                            <input name='username' type="text" class="form-control my-no-hover" placeholder="Username User.." required autofocus>
                            <input name='password' type="password" class="form-control my-no-hover" placeholder="Password User.." required>
                            <button class="btn btn-lg btn-primary my-no-radius btn-block" type="submit">
                                <span class='glyphicon glyphicon-user'></span> Masuk</button>
                        </form>

                        <a href="#user" class="btn btn-link btn-xs btn-block" data-toggle="collapse">Login sebagai admin</a>
                        <div id="user" class="collapse">
                            <form class="form-signin" action="core/core-login.php" method="POST">
                                <input name='isadmin' type='hidden' value='1'/>
                                <input name='username' type="text" class="form-control my-no-hover" placeholder="Username Admin.." required autofocus>
                                <input name='password' type="password" class="form-control my-no-hover" placeholder="Username Admin.." required>
                                <button class="btn btn-lg btn-danger my-no-radius btn-block" type="submit">
                                    <span class='glyphicon glyphicon-user'></span> Masuk</button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </body>
</html>