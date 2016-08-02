<?php

include '../templates/initializedb.php';

if($connection != null){
    $check = filter_input(INPUT_GET, 'u');
    $query = "select * from profilmitra where username = '$check'";
    $res = mysqli_query($connection, $query);
    if(mysqli_num_rows($res) > 0){
        echo '0';
    }
    else{
        echo '1';
    }
}
