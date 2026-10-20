<?php
$usuario = "";
if (isset($_POST["usuario"])) {
    $usuario = $_POST["usuario"];
}
include "header.php";
?>

<main>
    <h2>Listado de reservas</h2>

    <form action="index.php" method="POST">
        <input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
        <input type="submit" value="+ Nueva reserva" class="btn-secundario">
    </form>

    <?php
    $lineas = array();
    if (file_exists("reservas.txt")) {
        $lineas = file("reservas.txt", FILE_IGNORE_NEW_LINES);
    }
    ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Edad</th>
            <th>Pase</th>
            <th>Pago</th>
            <th>Total</th>
            <th>Acción</th>
        </tr>
        <?php
        foreach ($lineas as $i => $linea) {
            if (trim($linea) != "") {
                $id = $i + 1; 
                $d = explode("|", $linea);
        ?>
        <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $d[0]; ?></td>
            <td><?php echo $d[1]; ?></td>
            <td><?php echo $d[2]; ?></td>
            <td><?php echo $d[3]; ?></td>
            <td><?php echo $d[4]; ?></td>
            <td><?php echo $d[6]; ?></td>
            <td><?php echo $d[7]; ?></td>
            <td>
                <form action="ver_pase.php" method="POST">
                    <input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" value="Ver Pase" class="btn-tabla">
                </form>
            </td>
        </tr>
        <?php
            }
        }
        ?>
    </table>
</main>

</body>
</html>
