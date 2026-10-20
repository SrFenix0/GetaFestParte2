<?php
$usuario = "";
if (isset($_POST["usuario"])) {
    $usuario = $_POST["usuario"];
}
include "header.php";
?>

<main>
<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo "<p class='aviso'>Acceso no permitido.</p>";
    echo "<a href='index.php'>Volver al formulario</a>";

} elseif ($_POST["edad"] < 18) {
    echo "<p class='aviso'>El evento es exclusivo para mayores de edad.</p>";
    echo "<a href='index.php'>Volver al formulario</a>";

} else {
    $tipo = $_POST["tipo"];

    if (isset($_POST["dias"])) {
        $dias = $_POST["dias"];
    } else {
        $dias = array();
    }

    if ($tipo == "General") {
        $precioBase = 50;
    } elseif ($tipo == "VIP") {
        $precioBase = 120;
    } else {
        $precioBase = 180;
    }
    $suplemento = count($dias) * 10;
    $total = $precioBase + $suplemento;

    $extension = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
    $rutaFoto = "uploads/user_" . uniqid() . "." . $extension;

    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $rutaFoto)) {


        $linea = date("Y-m-d H:i:s") . "|" . $_POST["nombre"] . "|" . $_POST["email"] . "|" . $_POST["edad"] . "|" .
                 $tipo . "|" . implode(", ", $dias) . "|" . $_POST["pago"] . "|" . $total . "€|" .
                 $rutaFoto . "|" . $_POST["observaciones"] . "\n";
        file_put_contents("reservas.txt", $linea, FILE_APPEND);
?>
    <div class="ticket">
        <h2>Acreditación getafeFest</h2>
        <img src="<?php echo $rutaFoto; ?>" alt="Foto">
        <p>Nombre: <?php echo $_POST["nombre"]; ?></p>
        <p>Email: <?php echo $_POST["email"]; ?></p>
        <p>Tipo de pase: <?php echo $tipo; ?></p>
        <p>Días: <?php echo implode(", ", $dias); ?></p>
        <p>Método de pago: <?php echo $_POST["pago"]; ?></p>
        <p>Observaciones: <?php echo $_POST["observaciones"]; ?></p>
        <hr>
        <p>Precio base: <?php echo $precioBase; ?> €</p>
        <p>Suplemento por días: <?php echo $suplemento; ?> €</p>
        <h3>Total a pagar: <?php echo $total; ?> €</h3>
    </div>

    <a href="index.php">Nueva reserva</a>
<?php
    } else {
        echo "<p class='aviso'>Error al subir la foto.</p>";
        echo "<a href='index.php'>Volver al formulario</a>";
    }
}
?>
</main>

</body>
</html>
