<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>CSR Management</title>
        <link href="css/w3.css" rel="stylesheet" type="text/css"/>
        <link href="css/custcss.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>

    </head>
    <body style="background:url(asset/bg.png)">
        <ul class="w3-navbar w3-large ptba-red w3-left-align">
            <li class="w3-hide-medium w3-hide-large w3-small ptba-red w3-opennav w3-right">
                <a class="ptba-hover-orange" href="javascript:void(0);" onclick="navbar()">☰</a>
            </li>
            <li><a class="ptba-hover-orange w3-small" href="#">Home</a></li>
            <li class="w3-hide-small w3-small"><a class="ptba-hover-orange" href="http://www.ptba.co.id/en/csr#about-csr">About CSR</a></li>
            <li class="w3-hide-small w3-small"><a class="ptba-hover-orange" href="#">CSR Report</a></li>
        </ul>
        <div id="hiddennav" class="w3-hide w3-hide-large w3-hide-medium">
            <ul class="w3-navbar w3-left-align w3-large ptba-red">
                <li><a class="ptba-hover-orange w3-small" href="http://www.ptba.co.id/en/csr#about-csr">About CSR</a></li>
                <li><a class="ptba-hover-orange w3-small" href="#">CSR Report</a></li>
            </ul>
        </div>

        <div class="w3-content w3-card-4 ptba-dock" style="max-width:1000px;" id="maincontainer">
            <header id="header" class="w3-container w3-white" style="height:160px;">
                <div style="float: right" class="ptba-text-red">
                    <i class="material-icons w3-small">person</i> <a class="w3-small" href="#">Login</a> | <i class="material-icons w3-small">people</i> <a class="w3-small" href="#">Register</a>
                </div>
                <img style="margin-top: 20px" width="100" src="asset/logo.png" alt=""/>
            </header>

            <div class="w3-container ptba-red" style="height: 10px"/></div>

        <div class="w3-container w3-white" style="padding: 0px">
            <div class="w3-row">
                <div class="w3-quarter w3-container ">
                    <p><label class="w3-small">Menu</label>
                    <hr/>
                    <label class="w3-small">Search by ID</label>
                    <input class="w3-input w3-border w3-small" name="search" placeholder="Partner ID.." type="text"> <a class="w3-btn ptba-red ptba-hover-orange w3-small" style="width: 100%"><span>  <i class="material-icons w3-small">search</i> </span>Search</a></p>
                    <p> <a class="w3-btn ptba-red ptba-hover-orange w3-large" style="width: 100%; height: 40px">+ Add a partner</a></p>
                </div>

                <div class="w3-threequarter w3-container">

                    <p><label class="w3-small">Newest Partners</label></p>
                    <hr/>

                    <div class="w3-third w3-container">
                        <div class="w3-card-2">
                            <img src="asset/img.jpg" alt="" style="max-width: 100%"/>
                            <div class="w3-container">
                                <h3><a class="ptba-text-red" href="#">Partner 1</a></h3>
                                <p class="w3-small"><b>Business Type:</b> <br/>Lorem Ipsum</p>
                                <p class="w3-small"><b>Business Address:</b> <br/>St. Lorem</p>
                            </div>
                        </div>
                    </div>

                    <div class="w3-third w3-container">
                        <div class="w3-card-2">
                            <img src="asset/img.jpg" alt="" style="max-width: 100%"/>
                            <div class="w3-container">
                                <h3><a class="ptba-text-red" href="#">Partner 1</a></h3>
                                <p class="w3-small"><b>Business Type:</b> <br/>Lorem Ipsum</p>
                                <p class="w3-small"><b>Business Address:</b> <br/>St. Lorem</p>
                            </div>
                        </div>
                    </div>

                    <div class="w3-third w3-container">
                        <div class="w3-card-2">
                            <img src="asset/img.jpg" alt="" style="max-width: 100%"/>
                            <div class="w3-container">
                                <h3><a class="ptba-text-red" href="#">Partner 1</a></h3>
                                <p class="w3-small">Business Type: <br/>Lorem Ipsum</p>
                                <p class="w3-small">Business Address: <br/>St. Lorem</p>
                            </div>
                        </div>
                    </div>


                    <div class="w3-third w3-container">
                        <div class="w3-card-2">
                            <img src="asset/img.jpg" alt="" style="max-width: 100%"/>
                            <div class="w3-container">
                                <h3><a class="ptba-text-red" href="#">Partner 1</a></h3>
                                <p class="w3-small">Business Type: <br/>Lorem Ipsum</p>
                                <p class="w3-small">Business Address: <br/>St. Lorem</p>
                            </div>
                        </div>
                    </div>

                    <div class="w3-third w3-container">
                        <div class="w3-card-2">
                            <img src="asset/img.jpg" alt="" style="max-width: 100%"/>
                            <div class="w3-container">
                                <h3><a class="ptba-text-red" href="#">Partner 1</a></h3>
                                <p class="w3-small">Business Type: <br/>Lorem Ipsum</p>
                                <p class="w3-small">Business Address: <br/>St. Lorem</p>
                            </div>
                        </div>
                    </div>

                    <div class="w3-third w3-container">
                        <div class="w3-card-2">
                            <img src="asset/img.jpg" alt="" style="max-width: 100%"/>
                            <div class="w3-container">
                                <h3><a class="ptba-text-red" href="#">Partner 1</a></h3>
                                <p class="w3-small">Business Type: <br/>Lorem Ipsum</p>
                                <p class="w3-small">Business Address: <br/>St. Lorem</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="ptba-red" style="height: 30px"></div>
    </div>


    <script>
        function navbar() {
            var x = document.getElementById("hiddennav");

            if (x.className.indexOf("w3-show") === -1)) {
                x.className += " w3-show";

            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }

    </script>
</body>
</html>
