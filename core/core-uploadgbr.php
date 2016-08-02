<?php

$file_path = "../asset/";

include '../templates/initializedb.php';

$trxid = $_POST['trxid'];

if ($connection != null) {
    $type = pathinfo($_FILES['uploaded']['name'], PATHINFO_EXTENSION);
    $file_name = $trxid . "." . $type;
    $file_path = $file_path . $file_name;
    if(unlink($file_path)) echo "Deleted file ";
    if (move_uploaded_file($_FILES['uploaded']['tmp_name'], $file_path)) {
        $query3 = "update transaksi set imgurl = 'asset/$trxid.$type' where trxid = $trxid";
        if ($connection->query($query3) === true) {
            header("location: ../transaksi.php?id=$trxid");
            exit;
        }
    } else {
        echo "fail";
    }
}
?>