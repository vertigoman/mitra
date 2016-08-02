<div class="mysmallfont">
    <?php include '../templates/initializedb_city.php'; ?>
    <div class="container">
        <div>
            <h1 class="text-center"><span class="glyphicon glyphicon-paste"></span> Data Mitra Baru</h1>
            <p class="text-center">PT. Bukit Asam (Persero) Tbk CSR Program</p>
            <p class="text-center"><img src="asset/separator.png" width="200" alt=""/></p>

            <div class="form-horizontal">
                <form id="foo">
                    <input type="hidden" name="method" value="c"/>
                    <div class="form-group">
                        <label class='control-label col-sm-3 input-xs' for="nama">Nama :</label>
                        <div class="col-sm-8">   
                            <input required name="nama" type="text" class="form-control my-no-hover input-xs" id="nama" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class='control-label col-sm-3 input-xs' for="nik">NIK :</label>
                        <div class="col-sm-8">   
                            <input required name='nik' type="text" class="form-control my-no-hover input-xs" id="nik" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class='control-label col-sm-3 input-xs' for="nik">Username :</label>
                        <div class="col-sm-8">   
                            <input required name='uname' type="text" class="form-control my-no-hover input-xs" id="uname" />

                            <div id="message"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class='control-label col-sm-3 input-xs' for="nik">Password :</label>
                        <div class="col-sm-8">   
                            <input required name='pass' type="password" class="form-control my-no-hover input-xs" id="pass" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class='control-label col-sm-3 input-xs' for="kab">Kabupaten/Kota :</label>
                        <div class="col-sm-8">   
                            <select required class="form-control input-xs my-no-hover" name="kab" id="kab" onchange="ajaxkec(this.value)">
                                <option value="">Pilih Kabupaten/Kota..</option>
                                <?php
                                $queryKabupaten = "SELECT * FROM inf_lokasi where lokasi_kabupatenkota != 0 and lokasi_propinsi = 18 and lokasi_kecamatan = 0 order by lokasi_nama";
                                $resultKabupaten = mysqli_query($connection, $queryKabupaten);
                                while ($dataKab = $resultKabupaten->fetch_assoc()) {
                                    $bar = $dataKab[lokasi_nama];
                                    $bar = ucwords($bar);
                                    $bar = ucwords(strtolower($bar));
                                    echo '<option value="' . $bar . '">' . $bar . '</option>';
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
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class='control-label col-sm-3 input-xs' for="jln">Jalan :</label>
                        <div class="col-sm-8">   
                            <input required  name='jln' type="text" class="form-control my-no-hover input-xs" id="jln" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class='control-label col-sm-6 input-xs' for="lat">Latitude :</label>
                                <div class="col-sm-6">   
                                    <input required name='lat' type="text" class="form-control my-no-hover input-xs" id="lat" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class='control-label col-sm-6 input-xs' for="lng">Longitude :</label>
                                <div class="col-sm-6">   
                                    <input required name='lng' type="text" class="form-control my-no-hover input-xs" id="lng" />
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

                    <div class="col-sm-6">
                        <button id='submitsaja' class='btn btn-lg btn-primary' style="float: right !important;">Selesai</button>
                    </div>


                    <div class="col-sm-6">
                        <input id="trxid" name="trx" value="1" type="hidden"/>
                        <button id='submitlanjut' class='btn btn-lg btn-primary' style="float: left !important;">Selesai dan Lanjutkan</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<script>
    var request;
    $("#submitsaja").click(function (event) {

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
    var request;
    $("#submitlanjut").click(function (event) {
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
            $.redirect("buat.php", {trx: $("#trxid").val(), id: response});
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
                    $("#message").html('<p style="color:red; margin:0px">Username sudah ada!</p>');
                    $inputs.prop("disabled", true);
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