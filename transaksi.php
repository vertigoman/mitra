<?php
session_start();
include 'templates/validasi.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Data Mitra - SiMitra BA</title>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <link href="custcss/mycss.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery.redirect.js" type="text/javascript"></script>
        <link href="custcss/uploadfile.css" rel="stylesheet" type="text/css"/>
        <link href="custcss/uploadfile.custom.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery.uploadfile.js" type="text/javascript"></script>
        <script src="js/jquery.uploadfile.min.js" type="text/javascript"></script>
    </head>
    <body style="background: url(asset/bg.png)">

        <div class="container mycontainer mycard-huge my-bg-white mypaneldock">

            <?php include 'templates/header.php'; ?>

            <div class="container padbottom">

                <?php include 'templates/sidebar.php'; ?>

                <div class="col-lg-9 mysmallfont">
                    <h6><span class="glyphicon glyphicon-th-large"></span> Data Transaksi</h6>
                    <hr/>
                    <div id="place">
                        <?php
                        if (!empty($_POST['id']) && !empty($_POST['input'])) {
                            include 'forms/trxinput.php';
                        }elseif (!empty($_POST['id']) && !empty($_POST['vouch'])) {
                            include 'forms/trxvoucher.php';
                        }elseif(!empty($_POST['id']) && !empty($_POST['monitor'])){
                            include 'forms/trxmonitoring.php';
                        }elseif (!empty($_POST['id'])) {
                            include 'forms/detailtrx.php';
                        }
                        else {
                            ?>
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class='control-label col-sm-2' for="cari"><span class="glyphicon glyphicon-search"></span> Cari transaksi :</label>
                                    <div class="col-sm-5" style="padding-left: 0px; padding-right: 0px">   
                                        <input type="text" class="form-control my-no-hover" id="cari" />
                                    </div>
                                </div>
                            </div>

                            <br/>
                            <div id="result">
                                <?php
                                include 'templates/initializedb.php';
                                $queryselectusers = 'select * from transaksi ORDER BY trxid DESC LIMIT 6';
                                $result = mysqli_query($connection, $queryselectusers);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $dataid = $row['dataid'];
                                        ?>
                                        <div class="col-lg-4 ">
                                            <div class="panel panel-default my-bg-grey">
                                                <div class="panel-body">
                                                    <h5 class="p-elps"><?php echo $row['nama']; ?></h5>
                                                    <?php
                                                    $image = "asset/img.jpg";
                                                    if($row['imgurl'] != ""){
                                                        $image = $row['imgurl'];
                                                    }
                                                    $querygetid = "select * from profilmitra where dataid=" . $row['dataid'];
                                                    $resid = mysqli_query($connection, $querygetid);
                                                    $rowid = $resid->fetch_assoc();
                                                    ?>
                                                    <img src="<?php echo $image; ?>" alt="" class="my-content-image"/>
                                                    <hr/>
                                                    <label>Nama Mitra:</label>
                                                    <p class="p-elps"><?php echo $rowid['nama']; ?></p>
                                                    <label>Alamat Mitra:</label>
                                                    <p class="p-elps"><?php echo $rowid['alamatjalan'] . ", " . $rowid['alamatkec'] . ", " . $rowid['alamatkab']; ?></p>
                                                    <form action="transaksi.php" method="POST">
                                                        <input type="hidden" name="id" value="<?php echo $row['trxid']; ?>" />
                                                        <button class="btn btn-sm btn-danger">Lihat Detail</button>
                                                    </form>
                                                    <br/>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <p>Mitra tidak ditemukan!</p>
                                    <?php
                                }
                                ?>
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
                $("#cari").keyup(function () {
                    $.get("forms/trxcari.php?q=" + $("#cari").val(), function (data, status) {
                        $("#result").html(data);
                    });
                });
            });
        </script>
    </body>
</html>
