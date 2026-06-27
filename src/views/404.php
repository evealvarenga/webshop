<?php
$error = $_GET["error"] ?? ""
?>
<?php if( strlen($error) > 0 ){ ?>
<span class="text-center text-danger" >
    <?= $error ?>
</span>
<?php } ?>
<section class="container py-4">
    <div class="contenedor">
        <div class="imagen">
            <img src="src/assets/404.png" alt="" srcset="">
        </div>
        <div class="contenido">
            <h1>Oh no...</h1>
            <p>Ha ocurrido un error.</p>
            <?php if( strlen($error) > 0 ){ ?>
                <span class="text-center text-danger" >
                    <?= $error ?>
                </span>
            <?php } ?>
        </div>
    </div>
</section>