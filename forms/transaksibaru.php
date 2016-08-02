<div class="mysmallfont">
    <div class="container">
        <h1 class="text-center"><span class="glyphicon glyphicon-transfer"></span> Transaski Baru</h1>
        <p class="text-center">PT. Bukit Asam (Persero) Tbk CSR Program</p>
        <p class="text-center"><img src="asset/separator.png" width="200" alt=""/></p>
        <form id="trxform">
            <div class="form-horizontal">

                <input type="hidden" name="method" value="c"/>
                <?php
                if (!empty($_POST['id'])) {
                    include 'templates/initializedb.php';
                    $queryselectuser = 'select * from profilmitra where dataid=' . $_POST['id'];
                    $resultselectuser = mysqli_query($connection, $queryselectuser);
                    $rowuser = $resultselectuser->fetch_assoc();
                    ?>
                    <input type="hidden" name="dataid" value="<?php echo $rowuser['dataid']; ?>"/>
                    <div class="form-group">
                        <label class='control-label input-xs col-sm-4' for="nama">Penerima :</label>
                        <div class="col-sm-5">  
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <p class="p-elps my-no-margin-topdown"><b>Nama:</b> <?php echo $rowuser['nama']; ?></p>
                                    <p class="p-elps my-no-margin-topdown"><b>NIK:</b> <?php echo $rowuser['nik']; ?></p>
                                    <p class="p-elps my-no-margin-topdown"><b>Alamat:</b> <?php echo $rowuser['alamatjalan'] . ", " . $rowuser['alamatkec'] . ", " . $rowuser['alamatkab']; ?></p>
                                    <p class="p-elps my-no-margin-topdown"><b>Kordinat:</b> <?php echo $rowuser['lat'] . ", " . $rowuser['lng']; ?></p>
                                    <p class="p-elps my-no-margin-topdown"><b>Username:</b> <?php echo $rowuser['username']; ?></p>
                                    <br/>
                                    <button class="btn btn-xs btn-link" data-toggle="modal" data-target="#browse"><span class="glyphicon glyphicon-user"></span> Cari Mitra Lain</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php
                } else {
                    ?><div class="form-group">
                        <label class='control-label input-xs col-sm-4' for="nama">Penerima :</label>
                        <div class="col-sm-5">  
                            <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#browse"><span class="glyphicon glyphicon-user"></span> Cari Penerima</button>
                        </div>
                    </div><?php
                }
                ?>

                <div class="form-group">
                    <label class='control-label input-xs col-sm-4' for="nama">Nama Transaksi :</label>
                    <div class="col-sm-5">   
                        <input required name='nama' type="text" class="form-control my-no-hover input-xs" id="nama" />
                    </div>
                </div>
                <p class="text-center"><img src="asset/separator.png" width="200" alt=""/></p>
                <div class="form-group">
                    <label class='control-label input-xs col-sm-4' for="pinjaman">Jumlah Pinjaman :</label>
                    <div class="col-sm-1" style="padding-left:0px !important; margin: 0px !important">
                        <h4 class="text-right" style="margin: 0px">Rp.</h4>
                    </div>
                    <div class="col-sm-4" style="padding-left: 0px !important;">   
                        <input required name='pinjaman' type="text" class="form-control my-no-hover input-xs" id="pinjaman" />
                    </div>
                </div>
                <div class="form-group">
                    <label class='control-label input-xs col-sm-4' for="bunga">Jumlah Bunga :</label>
                    <div class="col-sm-1" style="padding-left:0px !important; margin: 0px !important">
                        <h4 class="text-right" style="margin: 0px">Rp.</h4>
                    </div>
                    <div class="col-sm-4" style="padding-left: 0px !important;">   
                        <input required name='bunga' type="text" class="form-control my-no-hover input-xs" id="bunga" />
                    </div>
                </div>
                <div class="form-group">
                    <label class='control-label input-xs col-sm-4' for="tenor">Tenor :</label>
                    <div class="col-sm-2" style="padding-right: 0px !important;">   
                        <input required name='tenor' type="text" class="form-control my-no-hover input-xs" id="tenor" />
                    </div>
                    <div class="col-sm-1">
                        <h4 style="margin: 0px">Bulan</h4>
                    </div>
                </div>
                <p class="text-center"><img src="asset/separator.png" width="200" alt=""/></p>
                <div class="form-group">
                    <label class='control-label input-xs col-sm-4' for="start">Tanggal Terima :</label>
                    <div class="col-sm-5">   
                        <input required name='start' type="text" class="form-control my-no-hover input-xs" id="start" />
                    </div>
                </div>
                <div class="form-group">
                    <label class='control-label input-xs col-sm-4' for="deadline">Tanggal Jatuh Tempo :</label>
                    <div class="col-sm-5">   
                        <input required name='deadline' type="text" class="form-control my-no-hover input-xs" id="deadline" />
                    </div>
                </div>
                <div class="form-group">
                    <label class='control-label input-xs col-sm-4' for="tenggang">Tenggang Waktu :</label>
                    <div class="col-sm-5">   
                        <input required name='tenggang' type="text" class="form-control my-no-hover input-xs" id="tenggang" />
                    </div>
                </div>
                <br/>
                <br/>
                <div class="col-sm-5 center-col">
                    <button id="savetrx" class="btn btn-primary btn-block btn-lg"><span class="glyphicon glyphicon-print"></span> Cetak dan Simpan Voucher</button>
                </div>
            </div>
        </form>

        <div class="modal fade" id="browse" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Cari Mitra</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class='control-label col-sm-2' for="cari"><span class="glyphicon glyphicon-search"></span> Cari data mitra :</label>
                                <div class="col-sm-5" style="padding-left: 0px; padding-right: 0px">   
                                    <input type="text" class="form-control my-no-hover" id="trxcari" />
                                </div>
                            </div>
                        </div>

                        <div id="trxpanelcari">
                            <?php
                            if (!empty($_POST['id'])) {
                                include 'templates/initializedb.php';
                            } else {
                                include '../templates/initializedb.php';
                            }
                            $queryselectusers = 'select * from profilmitra ORDER BY dataid DESC LIMIT 6';
                            $result = mysqli_query($connection, $queryselectusers);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $dataid = $row['dataid'];
                                    ?>
                                    <div class="col-lg-4 ">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <p class="p-elps my-no-margin-topdown"><b>Nama:</b> <?php echo $row['nama']; ?></p>
                                                <p class="p-elps my-no-margin-topdown"><b>NIK:</b> <?php echo $row['nik']; ?></p>
                                                <p class="p-elps my-no-margin-topdown"><b>Alamat:</b> <?php echo $row['alamatjalan'] . ", " . $row['alamatkec'] . ", " . $row['alamatkab']; ?></p>
                                                <p class="p-elps my-no-margin-topdown"><b>Kordinat:</b> <?php echo $row['lat'] . ", " . $row['lng']; ?></p>
                                                <p class="p-elps my-no-margin-topdown"><b>Username:</b> <?php echo $row['username']; ?></p>
                                                <br/>
                                                <form action="buat.php" method="POST">
                                                    <input type="hidden" name="id" value="<?php echo $dataid; ?>" />
                                                    <input type="hidden" name="trx" value="1" />
                                                    <button class="btn btn-sm btn-danger">Pilih Mitra</button>
                                                </form>
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
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    $("#trxcari").keyup(function () {
        $.get("forms/trxmitracari.php?q=" + $("#trxcari").val(), function (data, status) {
            $("#trxpanelcari").html(data);
        });
    });
</script>
<script>
    var request;
    $("#savetrx").click(function (event) {
        if (request) {
            request.abort();
        }
        var $form = $("#trxform");
        var $inputs = $form.find("input, select, button, textarea");
        var serializedData = $form.serialize();
        $inputs.prop("disabled", true);
        request = $.ajax({
            url: "core/crud-transaksi.php",
            type: "post",
            data: serializedData
        });
        request.done(function (response, textStatus, jqXHR) {
            window.location.replace('transaksi.php');
        });
        request.fail(function (jqXHR, textStatus, errorThrown) {
            alert(
                    "The following error occurred: " +
                    textStatus, errorThrown
                    );
        });
        request.always(function () {
            $inputs.prop("disabled", false);
        });
        event.preventDefault();
    });
</script>