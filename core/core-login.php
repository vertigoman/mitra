<?php

session_start();
include '../templates/initializedb.php';


if (!empty($_POST['password']) && !empty($_POST['isadmin'])) {

    $uname = $_POST['username'];
    $pwd = $_POST['password'];

    if ($_POST['isadmin'] == '1') {
        $query = "Select * from `pengguna` where username = '$uname' and password = SHA1('$pwd')";
        $result = mysqli_query($connection, $query);
        if ($connection != null) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    $_SESSION['myuser'] = $uname;
                    $_SESSION['myadmin'] = '1';
                    header("Location: ../home.php");
                    exit;
                }
            } else {
                header("Location: ../index.php");
                exit;
            }
        } else {
            echo "connection failed";
        }
    } else {
        $query = "Select * from `profilmitra` where username = '$uname' and password = SHA1('$pwd')";
        $result = mysqli_query($connection, $query);
        if ($connection != null) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    $_SESSION['myuser'] = $uname;
                    $_SESSION['myadmin'] = '0';
                    header("Location: ../home.php");
                    exit;
                }
            } else {
                header("Location: ../index.php");
                exit;
            }
        } else {
            echo "connection failed";
        }
    }
} else {
    echo 'error';
}
