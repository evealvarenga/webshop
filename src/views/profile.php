<h1>Perfil de usuario</h1>

<?php 
if (session_status() === PHP_SESSION_NONE) {session_start();}
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
?>