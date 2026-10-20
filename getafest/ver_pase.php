<?php
$usuario = "";
if (isset($_POST["usuario"])) {
    $usuario = $_POST["usuario"];
}
include "header.php";
?>

<main>
<?php
if ($usuario != "admin") {
    echo "<p class='aviso'>Acceso denegado: solo el administrador puede ver los pases.</p>";

} else {
    $id = 0;
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
    }

    $lineas = array();
    if (file_exists("reservas.txt")) {
        $lineas = file("reservas.txt", FILE_IGNORE_NEW_LINES);
    }

    $d = explode("|", $lineas[$id - 1]);
?>
    <h2>Acreditación #<?php echo $id; ?> (Vista Administrador)</h2>
    <div class="ticket">
        <img src="<?php echo $d[8]; ?>" alt="Foto">
        <h2><?php echo $d[1]; ?></h2>
        <p>Email: <?php echo $d[2]; ?></p>
        <p>Edad: <?php echo $d[3]; ?> años</p>
        <p>Tipo de pase: <?php echo $d[4]; ?></p>
        <p>Días de asistencia: <?php echo $d[5]; ?></p>
        <p>Método de pago: <?php echo $d[6]; ?></p>
        <p>Observaciones: <?php echo $d[9]; ?></p>
        <hr>
        <h3>Total: <?php echo $d[7]; ?></h3>
    </div>
    <form action="ver_reservas.php" method="POST">
        <input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
        <input type="submit" value="Volver al listado de reservas" class="btn-secundario">
    </form>
<?php } ?>
</main>

</body>
</html>
