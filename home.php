<?php
session_start();
include 'templates/validasi.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Beranda - SiMitra BA</title>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <link href="custcss/mycss.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>

    </head>
    <body style="background: url(asset/bg.png)">

        <div class="container mycontainer mycard-huge my-bg-white mypaneldock">

            <?php include 'templates/header.php'; ?>

            <div class="container padbottom">

                <?php include 'templates/sidebar.php'; ?>

                <div class="col-lg-9 mysmallfont">
                    <h6><span class="glyphicon glyphicon-th-large"></span> Mitra Terbaru</h6>
                    <hr/>
                </div>
            </div>
            <?php include 'templates/footer.php'; ?>

        </div>
    </body>
</html>
