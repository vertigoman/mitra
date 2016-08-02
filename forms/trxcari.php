<?php
$q = filter_input(INPUT_GET, 'q');
include '../templates/initializedb.php';
if ($q != null || $q != "") {
    $queryselectusers = "select * from transaksi where nama like '%$q%' ORDER BY nama DESC LIMIT 10";
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
                        if ($row['imgurl'] != "") {
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
} else {
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
                        if ($row['imgurl'] != "") {
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
}


