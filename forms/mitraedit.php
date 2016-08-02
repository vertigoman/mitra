<div class="mysmallfont">
    <?php include 'templates/initializedb.php'; ?>
    <?php
    $query = 'select * from profilmitra where dataid=' . $_POST['id'];
    $res = mysqli_query($connection, $query);
    $row = $res->fetch_assoc();
    ?>
    <div class="container">
        <div>
            <h1 class="text-center"><span class="glyphicon glyphicon-edit"></span> Edit Data Mitra</h1>
            <p class="text-center">PT. Bukit Asam (Persero) Tbk CSR Program</p>
            <center><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confdel"><span class="glyphicon glyphicon-remove-sign"></span> Hapus Mitra ini?</button></center>
            <br/><p class="text-center"><img src="asset/separator.png" width="200" alt=""/></p><br/>
            <div class="form-horizontal">



                <form id="foo">
                    <input type="hidden" name="method" value="u"/>
                    <input type="hidden" name="id" value="<?php echo $row['dataid']; ?>"/>
                    <div class="form-group">
                        <label class='control-label col-sm-3 input-xs' for="nama">Nama :</label>
                        <div class="col-sm-8">   
                            <input required name="nama" value="<?php echo $row['nama']; ?>" type="text" class="form-control my-no-hover input-xs" id="nama" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class='control-label col-sm-3 input-xs' for="nik">NIK :</label>
                        <div class="col-sm-8">   
                            <input required name='nik' value="<?php echo $row['nik']; ?>" type="text" class="form-control my-no-hover input-xs" id="nik" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class='control-label col-sm-3 input-xs' for="nik">Username :</label>
                        <div class="col-sm-8">   
                            <input required name='uname' value="<?php echo $row['username']; ?>" type="text" class="form-control my-no-hover input-xs" id="uname" />

                            <div id="message"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class='control-label col-sm-3 input-xs' for="nik">Password :</label>
                        <div class="col-sm-8">   
                            <input required name='pass' value="<?php echo $row['password']; ?>" type="password" class="form-control my-no-hover input-xs" id="pass" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class='control-label col-sm-3 input-xs' for="kab">Kabupaten/Kota :</label>
                        <div class="col-sm-8">   
                            <select required class="form-control input-xs my-no-hover" name="kab" id="kab" onchange="ajaxkec(this.value)">
                                <option value="">Pilih Kabupaten/Kota..</option>

                                <?php include 'templates/initializedb_city.php'; ?>
                                <?php
                                $queryKabupaten = "SELECT * FROM inf_lokasi where lokasi_kabupatenkota != 0 and lokasi_propinsi = 18 and lokasi_kecamatan = 0 order by lokasi_nama";
                                $resultKabupaten = mysqli_query($connection, $queryKabupaten);
                                while ($dataKab = $resultKabupaten->fetch_assoc()) {
                                    $bar = $dataKab[lokasi_nama];
                                    $bar = ucwords($bar);
                                    $bar = ucwords(strtolower($bar));
                                    if ($bar == $row['alamatkab']) {
                                        echo '<option selected value="' . $bar . '">' . $bar . '</option>';
                                    } else {
                                        echo '<option value="' . $bar . '">' . $bar . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class='control-label col-sm-3 input-xs' for="kec">Kecamatan :</label>
                        <div class="col-sm-8">   
                            <select required class="form-control input-xs my-no-hover" name="kec" id="kec">
                                <option value="1">Pilih Kecamatan..</option>
                                <?php
                                include 'templates/initializedb_city.php';
                                $querykec = "SELECT * FROM `inf_lokasi` WHERE lokasi_propinsi = 18 and lokasi_kabupatenkota = (select lokasi_kabupatenkota from inf_lokasi where lokasi_propinsi = 18 and lokasi_nama like '%" . $row['alamatkab'] . "%') and lokasi_kecamatan != 0 order by lokasi_nama";
                                $reskec = mysqli_query($connection, $querykec);
                                while ($d = $reskec->fetch_assoc()) {
                                    $bar = $d['lokasi_nama'];
                                    $bar = ucwords($bar);
                                    $bar = ucwords(strtolower($bar));
                                    if ($bar == $row['alamatkec']) {
                                        echo "<option selected value='$bar'>$bar</option>";
                                    } else {
                                        echo "<option value='$bar'>$bar</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class='control-label col-sm-3 input-xs' for="jln">Jalan :</label>
                        <div class="col-sm-8">   
                            <input required  name='jln' value="<?php echo $row['alamatjalan']; ?>" type="text" class="form-control my-no-hover input-xs" id="jln" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class='control-label col-sm-6 input-xs' for="lat">Latitude :</label>
                                <div class="col-sm-6">   
                                    <input required name='lat' value="<?php echo $row['lat']; ?>" type="text" class="form-control my-no-hover input-xs" id="lat" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class='control-label col-sm-6 input-xs' for="lng">Longitude :</label>
                                <div class="col-sm-6">   
                                    <input required name='lng' value="<?php echo $row['lng']; ?>" type="text" class="form-control my-no-hover input-xs" id="lng" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <p>Format Kordinat:<br/>
                                Latitude: -5.557225 | Longitude: 105.372398)</p>
                            <label>Gunakan map ini untuk mencari kordinat <span class='glyphicon glyphicon-arrow-right'></span> </label>
                            <button class="btn btn-default my-no-radius btn-xs" onclick="window.open('https://google-developers.appspot.com/maps/documentation/utils/geocoder/')"><span class='glyphicon glyphicon-map-marker'></span> Open Map</button>
                        </div>
                    </div>


                    <br/>
                    <p class="text-center"><img src="asset/separator.png" width="200" alt=""/></p>
                    <br/><br/>
                </form>
                <div class="col-sm-6">
                    <button id='cancel' class='btn btn-lg btn-primary' style="float: right !important;"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</button>
                </div>

                <div class="col-sm-6">
                    <button id='updatemitra' class='btn btn-lg btn-primary' style="float: left !important;"><span class="glyphicon glyphicon-save"></span> Perbaharui</button>
                </div>


                
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="confdel" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Hapus Mitra.</h4>
            </div>
            <div class="modal-body">
                <p>Setelah anda menghapus mitra ini, seluruh data mitra dan data transaksi yang berhubungan dengan mitra ini akan di hapus.</p>
                <p>Lanjutkan?</p>
                <form id="delete">
                    <input type="hidden" name="method" value="d"/>
                    <input type="hidden" name="id" value="<?php echo $row['dataid']; ?>"/>
                    <button id="btndel" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Tetap hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $("#cancel").click(function (event) {
        $.redirect("mitra.php", {id: '<?php echo $row['dataid']; ?>'});
    });
</script>
<script>
    var request;
    $("#updatemitra").click(function (event) {

        if (request) {
            request.abort();
        }
        var $form = $("#foo");
        var $inputs = $form.find("input, select, button, textarea");
        var serializedData = $form.serialize();
        $inputs.prop("disabled", true);
        request = $.ajax({
            url: "core/crud-partner.php",
            type: "post",
            data: serializedData
        });
        request.done(function (response, textStatus, jqXHR) {
            $.redirect("mitra.php", {id: response});
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
    var request;
    $("#btndel").click(function (event) {

        if (request) {
            request.abort();
        }
        var $form = $("#delete");
        var $inputs = $form.find("input, select, button, textarea");
        var serializedData = $form.serialize();
        $inputs.prop("disabled", true);
        request = $.ajax({
            url: "core/crud-partner.php",
            type: "post",
            data: serializedData
        });
        request.done(function (response, textStatus, jqXHR) {
            window.location.replace('mitra.php');
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
    $("#uname").keyup(function () {
        if ($("#uname").val().length > 0) {
            $.get("core/core-checkuname.php?u=" + $('#uname').val(), function (data, status) {
                var $form = $("#foo");
                var $inputs = $form.find("button");
                if (data == '0') {
                    if ($("#uname").val() !== '<?php echo $row['username'] ?>') {
                        $("#message").html('<p style="color:red; margin:0px">Username sudah ada!</p>');
                        $inputs.prop("disabled", true);
                    }

                } else {
                    $("#message").html('<p style="color:green; margin:0px">Username tersedia!</p>');
                    $inputs.prop("disabled", false);
                }
            });
        } else {
            $("#message").html('');
        }
    });
</script>