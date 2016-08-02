<?php include 'templates/initializedb.php'; ?>
<?php
if ($connection != null) {
    $query = 'select trx.*, trx.nama as trxnama , mtr.nama as mtrnama, mtr.*  from transaksi trx join profilmitra mtr on trx.dataid = mtr.dataid where trx.trxid=' . $_POST['id'];
    $res = mysqli_query($connection, $query);
    $row = $res->fetch_assoc();
}
?>

<h3><?php echo $row['trxnama']; ?></h3>
<div class="row">
    <div class="col-sm-6">
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#upldgbr"><span class="glyphicon glyphicon-picture"></span> Upload gambar</button>
    </div>
    <div class="col-sm-6">
        <form id="delfoo" style="float: right">
            <input type="hidden" name="method" value="d"/>
            <input type="hidden" name="trxid" value="<?php echo $row['trxid']; ?>"/>
            <button class="btn btn-danger btn-sm" id="delete"><span class="glyphicon glyphicon-remove"></span> Hapus data transaksi</button>
        </form>
    </div>
</div>
<br/>
<!--SLIDESHOW-->
<?php
$imgurl = 'asset/img.jpg';
if ($row['imgurl'] != "") {
    $imgurl = $row['imgurl'];
}
?>

<p class="text-center"><img src="<?php echo $imgurl; ?>" style="background-size: cover; object-fit: cover; max-height: 300px; min-height: 200px; min-width: 100%; max-width: 100%" /></p>
<br/>
<div class="container">
    <div class="row">
        <div class="col-lg-6 details">
            <div class="panel panel-default my-bg-grey">
                <div class="panel-body">
                    <h4>Informasi Transaksi :</h4>

                    <p class="p-elps my-no-margin-topdown"><b>Nama Transaksi: </b> <?php echo $row['trxnama']; ?></p>
                    <p class="p-elps my-no-margin-topdown"><b>Jumlah Pinjaman: </b> Rp. <?php echo $row['pinjaman']; ?></p>
                    <p class="p-elps my-no-margin-topdown"><b>Jumlah Bunga: </b> <?php echo $row['bunga']; ?></p>
                    <p class="p-elps my-no-margin-topdown"><b>Jangka Waktu: </b> <?php echo $row['tenor']; ?> Bulan</p>
                    <p class="p-elps my-no-margin-topdown"><b>Tanggal Penarikan: </b> <?php echo $row['start']; ?></p>
                    <p class="p-elps my-no-margin-topdown"><b>Batas Terakhir Angsuran: </b> <?php echo $row['finish']; ?></p>
                    <p class="p-elps my-no-margin-topdown"><b>Jumlah Angsuran Perbulan: </b> Rp. <?php echo $row['angsuran']; ?></p>
                    <br/>
                    <p class="p-elps my-no-margin-topdown"><b>Nama Mitra: </b> <?php echo $row['mtrnama']; ?></p>
                    <p class="p-elps my-no-margin-topdown"><b>Alamat Mitra: </b> <?php echo $row['alamatjalan'] . ", " . $row['alamatkec'] . ", " . $row['alamatkab']; ?></p>
                    <p class="p-elps my-no-margin-topdown"><b>Kordinat: </b> <?php echo $row['lat'] . ', ' . $row['lng']; ?></p>
                    <br/>
                    <form action="mitra.php" method="POST">
                        <input type="hidden" value="<?php echo $row['dataid'] ?>" name="id" />
                        <button class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-user"></span> Lihat Data Mitra</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-lg-6 details">
            <div class="panel panel-default my-bg-grey">
                <div class="panel-body">
                    <h4>Operasi :</h4>
                    <form action="transaksi.php" method="POST">
                        <input name="vouch" type="hidden" value="1"/>
                        <input name="id" type="hidden" value="<?php echo $row['trxid']; ?>"/>
                        <button class="btn btn-block btn-danger "><span class="glyphicon glyphicon-paperclip"></span> Lihat Voucher Transaksi</button>
                    </form>
                    
                    <br/>
                    <form action="transaksi.php" method="POST">
                        <input name="input" type="hidden" value="1"/>
                        <input name="id" type="hidden" value="<?php echo $row['trxid']; ?>"/>
                        <button class="btn btn-block btn-danger"><span class="glyphicon glyphicon-calendar"></span> Input Data Angsuran</button>
                    </form>

                    <br/>
                    <form action="transaksi.php" method="POST">
                        <input name="monitor" type="hidden" value="1"/>
                        <input name="id" type="hidden" value="<?php echo $row['trxid']; ?>"/>
                        <button class="btn btn-block btn-danger"><span class="glyphicon glyphicon-menu-hamburger"></span> Lihat Data Monitoring</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="upldgbr" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Upload Gambar</h4>
            </div>
            <div class="modal-body">
                <form action="core/core-uploadgbr.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="trxid" value="<?php echo $row['trxid']; ?>" />
                    <p>Pilih Gambar:</p>
                    <div class="input-group">
                        <label class="input-group-btn">
                            <span class="btn btn-primary btn-xs">
                                Browse&hellip; <input name="uploaded" type="file" style="display: none;" accept=".jpg, .jpeg, .png">
                            </span>
                        </label>
                        <input type="text" class="form-control input-xs" readonly>
                    </div>
                    <br/>
                    <button type="submit" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-upload"></span> Upload</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    var request;
    $("#delete").click(function (event) {

        if (request) {
            request.abort();
        }
        var $form = $("#delfoo");
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


<script>
    $(function () {

        // We can attach the `fileselect` event to all file inputs on the page
        $(document).on('change', ':file', function () {
            var input = $(this),
                    numFiles = input.get(0).files ? input.get(0).files.length : 1,
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label]);
        });

        // We can watch for our custom `fileselect` event like this
        $(document).ready(function () {
            $(':file').on('fileselect', function (event, numFiles, label) {

                var input = $(this).parents('.input-group').find(':text'),
                        log = numFiles > 1 ? numFiles + ' files selected' : label;

                if (input.length) {
                    input.val(log);
                } else {
                    if (log)
                        alert(log);
                }

            });
        });

    });
</script>