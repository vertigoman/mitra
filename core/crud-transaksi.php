<?php

include '../templates/initializedb.php';
if ($_POST['method'] == 'c') {

    $dataid = $_POST['dataid'];
    $nama = $_POST['nama'];
    $pinjaman = $_POST['pinjaman'];
    $bunga = $_POST['bunga'];
    $tenor = $_POST['tenor'];
    $angsuran = round((intval($pinjaman) + intval($bunga)) / intval($tenor));
    $start = $_POST['start'];
    $deadline = $_POST['deadline'];
    $finish = date("Y-m-d", strtotime("+$tenor months", strtotime("$start")));
    $tenggang = $_POST['tenggang'];

    if ($connection != null) {
        $insert = "insert into transaksi values(0, '$dataid', '$nama', '$pinjaman', '$bunga', '$tenor', '$angsuran', '$start', '$deadline', '$finish', '$tenggang', '')";
        if ($connection->query($insert) === TRUE) {
            echo $connection->insert_id;
        } else {
            echo "Error: " . $insert . "<br>" . $connection->error;
        }
    }
}

if ($_POST['method'] == 'd') {
    $trxid = $_POST['trxid'];
    if ($connection != null) {
        $delete = "delete from monitor where trxid=$trxid;";
        $delete .= "delete from transaksi where trxid=$trxid";
        if ($connection->multi_query($delete) === TRUE) {
            echo 'deleted';
        } else {
            echo "Error: " . $delete . "<br>" . $connection->error;
        }
    }
}


