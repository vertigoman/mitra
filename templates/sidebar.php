<?php
if (count(get_included_files()) == 1) {
    exit("No direct scripting");
}
?>

<div class="col-lg-3">
    <h6><a href='home.php'><span class="glyphicon glyphicon-home"></span> Beranda</a></h6>
    <hr/>
    <form action="buat.php">
        <button class="btn btn-block btn-lg btn-danger" type='submit'><span class="glyphicon glyphicon-plus-sign"></span> Buat Data Baru</button>
    </form>
    
    <br/>
    <form action="mitra.php">
        <button class="btn btn-block btn-warning" type='submit'><span class="glyphicon glyphicon-user"></span> Data Mitra</button>
    </form>
    
    <br/>
    <form action='transaksi.php'>
        <button class="btn btn-block btn-warning" type='submit'><span class="glyphicon glyphicon-briefcase"></span> Data Transaksi</button>
    </form>
</div>