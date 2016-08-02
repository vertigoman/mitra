<?php
session_start();
include 'templates/validasi.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Transaksi - SiMitra BA</title>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <link href="custcss/mycss.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/ajax_city.js" type="text/javascript"></script>
        <script src="js/jquery.redirect.js" type="text/javascript"></script>
    </head>
    <body style="background: url(asset/bg.png)">

        <div class="container mycontainer mycard-huge my-bg-white mypaneldock">

            <?php include 'templates/header.php'; ?>

            <div class="container padbottom">

                <?php include 'templates/sidebar.php'; ?>

                <div class="col-lg-9">
                    <h6><span class="glyphicon glyphicon-th-large"></span> Data Baru</h6>
                    <hr/>
                    <div id="place">
                        <?php
                        if (!empty($_POST['trx'])) {
                            include 'forms/transaksibaru.php';
                        } else {
                            ?>
                            <div class="col-sm-6 center-col">

                                <div class="panel panel-default container">
                                    <h2 class="text-center">Halo..<br/>
                                        <img src="asset/separator.png" width="200" alt=""/>
                                    </h2>
                                    <p class="mysmallfont">Anda akan membuat sebuah data baru. Silahkan pilih data yang akan di buat:</p>
                                    <button id="new" class="btn btn-link">1. Buat data mitra.</button>
                                    <button id="exists" class="btn btn-link">2. Buat data transaksi.</button>
                                    <br/><br/>
                                    <b><p class="mysmallfont">Ragu pilih yang mana?</p></b>
                                    <p class="mysmallfont">Pilih nomor 1 jika mitra belum punya akun, anda akan di berikan formulir data mitra untuk membuat akun mitra tersebut.</p>
                                    <p class="mysmallfont">Pilih nomor 2 jika mitra sudah punya akun, anda akan langsung di berikan formulir data transaksi.</p>
                                    <br/>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
            
            <?php include 'templates/footer.php'; ?>
        </div>

        <script>
            $(document).ready(function () {
                $("#new").click(function () {
                    $.get("forms/mitrabaru.php", function (data, status) {
                        $("#place").html(data);
                    });
                });
            });

            $(document).ready(function () {
                $("#exists").click(function () {
                    $.get("forms/transaksibaru.php", function (data, status) {
                        $("#place").html(data);
                    });
                });
            });
        </script>
    </body>
</html>
