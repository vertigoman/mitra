<?php
include 'templates/initializedb.php';
$query = 'select trx.*, trx.nama as trxnama , mtr.nama as mtrnama, mtr.*  from transaksi trx join profilmitra mtr on trx.dataid = mtr.dataid where trx.trxid=' . $_POST['id'];
$res = mysqli_query($connection, $query);
$row = $res->fetch_assoc();
?>

<div class="row">
    <div class="col-sm-6">
        <form action="transaksi.php" method="POST">
            <input name="id" type="hidden" value="<?php echo $row['trxid'] ?>"/>
            <button class="btn btn-primary btn-sm" type="submit"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</button>
        </form>
    </div>
    <div class="col-sm-6">
        <form action="transaksi.php" method="POST"  style="float: right">
            <input name="id" type="hidden" value="<?php echo $row['trxid'] ?>"/>
            <input name="input" type="hidden" value="1"/>
            <button class="btn btn-primary btn-sm" type="submit"><span class="glyphicon glyphicon-modal-window"></span> Input Data Monitoring</button>
        </form>
    </div>
</div>
<h1>Kartu Monitoring Angsuran</h1>
<div class="row">
    <div class="col-sm-5">
        <p class="p-elps my-no-margin-topdown"><b>Nama Transaksi: </b> <?php echo $row['trxnama']; ?></p>
        <p class="p-elps my-no-margin-topdown"><b>Nama Mitra: </b> <?php echo $row['mtrnama']; ?></p>
        <p class="p-elps my-no-margin-topdown"><b>Jumlah Pinjaman: </b>Rp. <?php echo $row['pinjaman']; ?></p>
        <p class="p-elps my-no-margin-topdown"><b>Jumlah Bunga: </b>Rp. <?php echo $row['bunga']; ?></p>
        <p class="p-elps my-no-margin-topdown"><b>Jumlah Angsuran Perbulan: </b>Rp. <?php echo $row['angsuran']; ?></p>
    </div>

    <div class="col-sm-5">
        <p class="p-elps my-no-margin-topdown"><b>Jangka Waktu Pinjaman: </b> <?php echo $row['tenor']; ?></p>
        <p class="p-elps my-no-margin-topdown"><b>Tanggal Penarikan: </b> <?php echo $row['start']; ?></p>
        <p class="p-elps my-no-margin-topdown"><b>Tanggal Jatuh Tempo: </b> Setiap tanggal <?php echo $row['deadline']; ?></p>
        <p class="p-elps my-no-margin-topdown"><b>Tanggal Akhir Angsuran: </b> <?php echo $row['finish']; ?></p>
        <p class="p-elps my-no-margin-topdown"><b>Masa Tenggang: </b> <?php echo $row['tenggang']; ?> Bulan</p>
    </div>
</div>
<p class="p-elps my-no-margin-topdown"><b>Alamat: </b> <?php echo $row['alamatjalan'] . ", " . $row['alamatkec'] . ", " . $row['alamatkab'] . ", " . $row['alamatprov']; ?></p>
<br/>

<table>
    <thead>
        <tr>
            <th>No</th> <th>Tgl Jatuh Tempo</th> <th>Jml Angsuran (Rencana)</th> <th>Tgl Angsuran</th> <th>Jml Angsuran (Realisasi)</th> <th>Sisa Pinjaman</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $querymonitor = 'select *, (select sum(jmlangsur) from monitor where trxid=' . $row['trxid'] . ') as total from monitor where trxid=' . $row['trxid'] . ' order by angsuranke';
        $resmonitor = mysqli_query($connection, $querymonitor);
        $sisa = intval($row['pinjaman']);
        if (mysqli_num_rows($resmonitor) > 0) {
            while ($rowmonitor = $resmonitor->fetch_assoc()) {
                $angsuranke = $rowmonitor['angsuranke'];
                $tgljatuhtemp = date("Y-m-" . $row['deadline'], strtotime("+$angsuranke months", strtotime($row['start'])));
                $jmlAngs1 = $row['angsuran'];
                $tglAngs = $rowmonitor['tglangsur'];
                $jmlAngs2 = $rowmonitor['jmlangsur'];
                $sisa = ($sisa - intval($rowmonitor['total']));
                ?> 
                <tr>
                    <td><?php echo $angsuranke; ?></td> <td><?php echo $tgljatuhtemp ?></td> <td>Rp. <?php echo $jmlAngs1 ?></td> <td><?php echo $tglAngs; ?></td> <td>Rp. <?php echo $jmlAngs2 ?></td> <td>Rp. <?php echo $sisa; ?></td>
                </tr>
                <?php
            }
        } else {
            echo '';
        }
        ?>
    </tbody>
</table>

<style>
    table { 
        width: 100%; 
        border-collapse: collapse; 
    }
    /* Zebra striping */
    tr:nth-of-type(odd) { 
        background: #eee; 
    }
    th { 
        background: #cccccc; 
        color: #000; 
        font-weight: bold; 
    }
    td, th { 
        padding: 6px; 
        border: 0.5px solid white; 
        text-align: left; 
    }
    /*
    Max width before this PARTICULAR table gets nasty
    This query will take effect for any screen smaller than 760px
    and also iPads specifically.
    */
    @media
    only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px)  {

        /* Force table to not be like tables anymore */
        table, thead, tbody, th, td, tr {
            display: block;
        }

        /* Hide table headers (but not display: none;, for accessibility) */
        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        tr { border: 1px solid #ccc; }

        td {
            /* Behave  like a "row" */
            border: none;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 50%;
        }

        td:before {
            /* Now like a table header */
            position: absolute;
            /* Top/left values mimic padding */
            top: 6px;
            left: 6px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
        }

        /*
        Label the data
        */
        td:nth-of-type(1):before { content: "No"; }
        td:nth-of-type(2):before { content: "Tgl Jatuh Tempo"; }
        td:nth-of-type(3):before { content: "Jml Angsuran (Rencana)"; }
        td:nth-of-type(4):before { content: "Tgl Angsuran"; }
        td:nth-of-type(5):before { content: "Jml Angsuran (Realisasi)"; }
        td:nth-of-type(6):before { content: "Sisa Pinjaman"; }
    }

    /* Smartphones (portrait and landscape) ----------- */
    @media only screen
    and (min-device-width : 320px)
    and (max-device-width : 480px) {
        body {
            padding: 0;
            margin: 0;
            width: 320px; }
    }

    /* iPads (portrait and landscape) ----------- */
    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
        body {
            width: 495px;
        }
    }

</style>