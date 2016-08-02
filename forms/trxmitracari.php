<?php
$q = filter_input(INPUT_GET, 'q');
include '../templates/initializedb.php';
if ($q != null || $q != "") {
    $queryselectusers = "select * from profilmitra where nama like '%$q%' or nik like '%$q%' ORDER BY nama DESC LIMIT 10";
    $result = mysqli_query($connection, $queryselectusers);
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_assoc()) {
            $dataid = $row['dataid'];
            ?>
            <div class="col-lg-4">
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
} else {
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
}

