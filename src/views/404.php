<h1>404</h1>
<?php
$error = $_GET["error"] ?? ""
?>
<?php if( strlen($error) > 0 ){ ?>
<span class="text-center text-danger" >
    <?= $error ?>
</span>
<?php } ?>