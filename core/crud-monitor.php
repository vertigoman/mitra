<?php

include '../templates/initializedb.php';
if ($_POST['method'] == 'c') {

    $trxid = $_POST['id'];
    $angsuranke = $_POST['angsuranke'];
    $tglAngs = $_POST['tglangsur'];
    $jmlAngs = $_POST['jmlangsur'];

    if ($connection != null) {
        $insert = "insert into monitor values(0, '$trxid', '$angsuranke', '$tglAngs', '$jmlAngs')";
        if ($connection->query($insert) === TRUE) {
            echo $connection->insert_id;
        } else {
            echo "Error: " . $insert . "<br>" . $connection->error;
        }
    }
}