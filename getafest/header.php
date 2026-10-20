<?php
if (!isset($usuario)) {
    $usuario = "";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>GetafeFest</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>
        <h1>GetafeFest</h1>
        <p>Festival de música</p>
        <?php if ($usuario != "") { ?>
            <p>Usuario activo: <strong><?php echo $usuario; ?></strong> - <a class="enlace-header" href="login.php">Cerrar sesión</a></p>
        <?php } else { ?>
            <p><a class="enlace-header" href="login.php">Iniciar sesión</a></p>
        <?php } ?>
    </header>
