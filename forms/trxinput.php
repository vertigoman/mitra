<div class="mysmallfont">
    <?php include 'templates/initializedb.php'; ?>
    <div class="container">
        <div>
            <h1 class="text-center"><span class="glyphicon glyphicon-paste"></span> Input Data Monitoring</h1>
            <p class="text-center">PT. Bukit Asam (Persero) Tbk CSR Program</p>
            <p class="text-center"><img src="asset/separator.png" width="200" alt=""/></p>

            <?php
            $starter = 0;
            $querycheck = 'select * from monitor where trxid = ' . $_POST['id'];
            $rescheck = mysqli_query($connection, $querycheck);
            if (mysqli_num_rows($rescheck) > 0) {
                $querystarter = 'select * from monitor where trxid = ' . $_POST['id'] . ' order by angsuranke desc LIMIT 1';
                $resstarter = mysqli_query($connection, $querystarter);
                $rowstarter = $resstarter->fetch_assoc();

                $starter = intval($rowstarter['angsuranke']) + 1;
            } else {
                $starter = 1;
            }
            ?>

            <div class="form-horizontal">
                <form id="foo">
                    <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>"/>
                    <input type="hidden" name="method" value="c"/>
                    <div class="form-group">
                        <label class='control-label col-sm-4 input-xs' for="ke">Angsuran Ke :</label>
                        <div class="col-sm-1">   
                            <input required name="angsuranke" value="<?php echo $starter; ?>" type="text" class="form-control my-no-hover input-xs" id="ke" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class='control-label col-sm-4 input-xs' for="tgl">Tanggal Angsur :</label>
                        <div class="col-sm-5">   
                            <input required name="tglangsur" type="text" class="form-control my-no-hover input-xs" id="tgl" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class='control-label input-xs col-sm-4' for="jml">Jumlah Angsuran :</label>
                        <div class="col-sm-1" style="padding-left:0px !important; margin: 0px !important">
                            <h4 class="text-right" style="margin: 0px">Rp.</h4>
                        </div>
                        <div class="col-sm-4" style="padding-left: 0px !important;">   
                            <input required name='jmlangsur' type="text" class="form-control my-no-hover input-xs" id="jml" />
                        </div>
                    </div>

                    <br/>
                    <p class="text-center"><img src="asset/separator.png" width="200" alt=""/></p>
                    <br/><br/>

                    <div class="col-sm-6">
                        <button id='back' class='btn btn-lg btn-primary' style="float: right !important;"><span class="glyphicon glyphicon-arrow-left"></span>  Kartu Monitoring</button>
                    </div>
                    <div class="col-sm-6">
                        <button id='submitsaja' class='btn btn-lg btn-primary' style="float: left !important;"><span class="glyphicon glyphicon-check"></span> Selesai</button>
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
            url: "core/crud-monitor.php",
            type: "post",
            data: serializedData
        });
        request.done(function (response, textStatus, jqXHR) {
            $.redirect("transaksi.php", {id: '<?php echo $_POST['id']; ?>', monitor: '1'});
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
    $("#back").click(function (event) {
        $.redirect("transaksi.php", {id: '<?php echo $_POST['id']; ?>', monitor: '1'});
    });
</script>