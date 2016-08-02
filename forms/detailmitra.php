<?php include 'templates/initializedb.php'; ?>
<?php
if ($connection != null) {
    $query = 'select * from profilmitra where dataid=' . $_POST['id'];
    $res = mysqli_query($connection, $query);
    $row = $res->fetch_assoc();
}
?>
<script
    src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCGsgQkHpMITcp0zyxpFoDB9leLbgMcVEo">
</script>
<script>
    var myCenter = new google.maps.LatLng(<?php echo $row['lat']; ?>, <?php echo $row['lng']; ?>);
    function initialize()
    {
        var mapProp = {
            center: myCenter,
            zoom: 16,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        var marker = new google.maps.Marker({
            position: myCenter,
            title: 'Lokasi Mitra Binaan'
        });
        marker.setMap(map);
        var infowindow = new google.maps.InfoWindow({
            content: "Lokasi Mitra Binaan"
        });
        map.setCenter(marker.getPosition());
        google.maps.event.addListener(marker, 'click', function () {
            map.setCenter(marker.getPosition());
            infowindow.open(map, marker);
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div class="row">
    <div class="col-sm-6">
        <h1><span class="glyphicon glyphicon-user"></span> Detail Mitra</h1>
        <form action="mitra.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>" />
            <input type="hidden" name="edit" value="1" />
            <button class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-edit"></span> Edit data mitra ini</button>
        </form>
        <br/>
        <div class="form-horizontal">

            <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>"/>
            <div class="form-group my-no-margin-topdown">
                <label class='control-label input-xs col-sm-2' for="penerima">Nama :</label>
                <div class="col-sm-5 input-group">   
                    <p class='input-xs p-elps'><?php echo $row['nama']; ?></p>
                </div>  
            </div>
            <div class="form-group my-no-margin-topdown">
                <label class='control-label input-xs col-sm-2' for="penerima">NIK :</label>
                <div class="col-sm-5 input-group">   
                    <p class='input-xs p-elps'><?php echo $row['nik']; ?></p>
                </div>  
            </div>
            <div class="form-group my-no-margin-topdown">
                <label class='control-label input-xs col-sm-2' for="penerima">Alamat :</label>
                <div class="col-sm-5 input-group">   
                    <p class='input-xs p-elps'><?php echo $row['alamatjalan'] . ", " . $row['alamatkec'] . ", " . $row['alamatkab']; ?></p>
                </div>  
            </div>
            <div class="form-group my-no-margin-topdown">
                <label class='control-label input-xs col-sm-2' for="penerima">Kordinat :</label>
                <div class="col-sm-5 input-group">   
                    <p class='input-xs p-elps'><?php echo $row['lat'] . ", " . $row['lng']; ?></p>
                </div>  
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <h1><span class="glyphicon glyphicon-map-marker"></span> Lokasi Mitra</h1>
        <div id="googleMap" style="width:100%;height:200px;"></div>
    </div>
</div>
<div class='row'>
    <div class='container'>
        <h1><span class='glyphicon glyphicon-briefcase'></span> Usaha Mitra</h1>
        <?php
        $querytrx = 'select * from transaksi where dataid=' . $_POST['id'];
        $restrx = mysqli_query($connection, $querytrx);
        if (mysqli_num_rows($restrx) > 0) {
            while ($rowx = $restrx->fetch_assoc()) {
                ?>
                <div class="panel panel-default my-bg-grey">
                    <div class="panel-body">
                        <div class="col-sm-6">
                            <h4><?php echo $rowx['nama']; ?></h4>
                        </div>
                        <div class="col-sm-6">
                            <form action="transaksi.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $rowx['trxid']; ?>"/>
                                <button class="btn btn-danger" style="float: right">
                                    Lihat Transaksi
                                </button>
                            </form>

                        </div>

                    </div>
                </div>
                <?php
            }
        }
        ?>

    </div>
</div>
