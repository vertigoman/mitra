<?php

include '../templates/initializedb.php';


if ($_POST['method'] == 'c') {

    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $prov = 'Lampung';
    $kab = $_POST['kab'];
    $kec = $_POST['kec'];
    $jln = $_POST['jln'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    if ($connection != null) {
        $insert = "insert into profilmitra values(0, '$nama', '$nik', '$jln', '$kec', '$kab', '$prov', '$lat', '$lng', '$uname', '$pass')";
        if ($connection->query($insert) === TRUE) {
            echo $connection->insert_id;
        } else {
            echo "Error: " . $insert . "<br>" . $connection->error;
        }
    }
}

if ($_POST['method'] == 'u') {

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $prov = 'Lampung';
    $kab = $_POST['kab'];
    $kec = $_POST['kec'];
    $jln = $_POST['jln'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    if ($connection != null) {
        $update = "update profilmitra set nama='$nama', nik='$nik', alamatjalan='$jln', alamatkec='$kec', alamatkab='$kab', lat='$lat', lng='$lng', username='$uname', password='$pass' where dataid=$id";
        if ($connection->query($update) === TRUE) {
            echo $id;
        } else {
            echo "Error: " . $insert . "<br>" . $connection->error;
        }
    }
}

if ($_POST['method'] == 'd') {

    $id = $_POST['id'];

    if ($connection != null) {
        $delete = "delete from profilmitra where dataid=$id;";
        $delete .= "delete from transaksi where dataid=$id";
        if ($connection->multi_query($delete) === TRUE) {
            echo 'deleted';
        } else {
            echo "Error: " . $insert . "<br>" . $connection->error;
        }
    }
}