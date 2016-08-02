<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../templates/initializedb.php';
//get search term
$searchTerm = $_GET['term'];

//get matched data from skills table
$query = mysqli_query($connection, "SELECT * FROM datamitra WHERE nama LIKE '%" . $searchTerm . "%' ORDER BY nama ASC");
while ($row = $query->fetch_assoc()) {

}

//return json data
echo json_encode($data);
