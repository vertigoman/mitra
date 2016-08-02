<?php

$kab = filter_input(INPUT_GET, 'kab');
if ($kab != null || $kab != "") {
    include '../templates/initializedb_city.php';
    $query = "SELECT * FROM `inf_lokasi` WHERE lokasi_propinsi = 18 and lokasi_kabupatenkota = (select lokasi_kabupatenkota from inf_lokasi where lokasi_propinsi = 18 and lokasi_nama like '%$kab%') and lokasi_kecamatan != 0 order by lokasi_nama";
    $res = mysqli_query($connection, $query);
    echo"<option selected value=''>Select Subdistrict..</option>";
    while ($d = $res->fetch_assoc()) {
        $bar = $d['lokasi_nama'];
        $bar = ucwords($bar);
        $bar = ucwords(strtolower($bar));
        echo "<option value='$bar'>$bar</option>";
    }
}
