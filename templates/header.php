<?php
$isuserlogged = false;

if (count(get_included_files()) == 1) {
    exit("No direct scripting");
}
?>

<script>
    $(function () {
        if (window.location.hash) {
            var hash = window.location.hash;
            $(hash).modal('toggle');
        }
    });
</script>

<div class="container myhead" style="background-image: url('asset/header.jpg'); background-repeat:no-repeat; -webkit-background-size:cover; -moz-background-size:cover;-o-background-size:cover; background-size:cover; background-position:center;">
    <div style="float: right" class="mysmallfont">
        <div class="form-inline" style='color:#fff'>
            Hi, <?php echo $_SESSION['myuser']; ?>
            <form action="core/core-logout.php" method="POST" class="form-group">
                <button class="btn btn-link btn-xs my-txt-red">
                    <span class="glyphicon glyphicon-log-in"/></span> Logout
                </button>
            </form>
        </div>
    </div>
    <p style='line-height: 130px'><img src="asset/logo_bg.png" alt="" width="150"/></p>

</div>