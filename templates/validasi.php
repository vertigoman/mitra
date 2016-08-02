<?php

if (count(get_included_files()) == 1) {
exit("No direct scripting");
}

if (!isset($_SESSION['myuser']) &&!isset($_SESSION['myadmin'])) {
header('location: index.php');
exit;
} elseif ($_SESSION['myadmin'] == "0") {
header('location: konfirmasi.php');
exit;
}
