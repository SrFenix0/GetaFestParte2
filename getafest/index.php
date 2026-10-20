<?php
$usuario = "";
if (isset($_POST["usuario"])) {
    $usuario = $_POST["usuario"];
}
include "header.php";
?>

<main>
    <h2>Reserva tu pase</h2>

    <form action="procesar.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="usuario" value="<?php echo $usuario; ?>">

        <fieldset>
            <legend>Datos personales</legend>
            <label for="nombre">Nombre y apellidos</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="email">Correo electrónico</label>
            <input type="email" id="email" name="email" required>

            <label for="edad">Edad</label>
            <input type="number" id="edad" name="edad" required>
        </fieldset>

        <fieldset>
            <legend>Tipo de entrada</legend>
            <label class="opcion">
                <input type="radio" name="tipo" value="General" required>General (50 €)
            </label>
            <label class="opcion">
                <input type="radio" name="tipo" value="VIP">VIP (120 €)
            </label>
            <label class="opcion">
                <input type="radio" name="tipo" value="Super VIP">Super VIP (180 €)
            </label>
        </fieldset>

        <fieldset>
            <legend>Días de asistencia</legend>
            <label class="opcion">
                <input type="checkbox" name="dias[]" value="Viernes">Viernes (+10 €)
            </label>
            <label class="opcion">
                <input type="checkbox" name="dias[]" value="Sábado">Sábado (+10 €)
            </label>
            <label class="opcion">
                <input type="checkbox" name="dias[]" value="Domingo">Domingo (+10 €)
            </label>
        </fieldset>

        <fieldset>
            <legend>Método de pago</legend>
            <select name="pago">
                <option value="Tarjeta de crédito">Tarjeta de credito</option>
                <option value="Bizum">Bizum</option>
                <option value="PayPal">Paypal</option>
            </select>
        </fieldset>

        <fieldset>
            <legend>Acreditación</legend>
            <label for="foto">Foto del asistente</label>
            <input type="file" id="foto" name="foto" required>
        </fieldset>

        <fieldset>
            <legend>Comentarios</legend>
            <label for="observaciones">Comentarios o peticiones especiales</label>
            <textarea id="observaciones" name="observaciones" rows="4"></textarea>
        </fieldset>

        <input type="submit" value="Reservar" class="btn-enviar">
    </form>

    <form action="ver_reservas.php" method="POST">
        <input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
        <input type="submit" value="Ver listado de reservas" class="btn-secundario">
    </form>
</main>

</body>
</html>