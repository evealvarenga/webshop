<?php

$id = $_GET["id"] ?? 0;
$client = (new Client())->getClientById($pdo, $id);
?>
<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow-sm p-4" style="width: 500px;">
        <h2 class="mb-4 text-center" >Quiere convertir el siguiente usuario a administrador?</h2>
        <p class="card-title text-center" ><?= $client->name ?> - <?= $client->email ?></p>
        <form action="src/controllers/client.controller.php?action=upgradeClient" method="POST" enctype="multipart/form-data" class="d-flex justify-content-center gap-3">
            <input type="hidden" name="id" value="<?= $client->id ?>">
            <button type="submit" class="btn btn-danger">Si</button>
            <a href="index.php?page=allClients" class="btn btn-success">No</a>
        </form>
    </div>
</div>