<?php
$usuario = "";
$error = "";
$correcto = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!file_exists("usuario.txt")) {
        $error = "Error: No existe el archivo usuario.txt";
    } else {
        $lineas = file("usuario.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lineas as $linea) {
            $partes = explode(":", $linea);
            if ($partes[0] == $_POST["usuario"] && $partes[1] == $_POST["password"]) {
                $correcto = true;
            }
        }

        if ($correcto) {
            $usuario = $_POST["usuario"];
        } else {
            $error = "Usuario o contraseña incorrectos.";
        }
    }
}

include "header.php";
?>

<main>
<?php if ($correcto) { ?>
    <form action="index.php" method="POST">
        <input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
    </form>
    <script>document.forms[0].submit();</script>
<?php } else { ?>
    <h2>Iniciar sesión</h2>
    <?php
    if ($error != "") {
        echo "<p class='aviso'>$error</p>";
    }
    ?>
    <form action="login.php" method="POST">
        <fieldset>
            <legend>Acceso</legend>
            <label for="usuario">Usuario</label>
            <input type="text" id="usuario" name="usuario" placeholder="Ingresa tu usuario" required>

            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required>
        </fieldset>
        <input type="submit" value="Entrar al sistema" class="btn-enviar">
    </form>
<?php } ?>
</main>

</body>
</html>
