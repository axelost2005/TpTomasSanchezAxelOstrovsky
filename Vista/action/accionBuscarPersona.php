<?php
require_once '../../Control/AbmPersona.php';  // Incluir la capa de control que maneja las personas

$abmPersona = new AbmPersona();

if ($_POST) {
    $nroDni = $_POST['NroDni'];

    // Verificar si la persona existe
    $persona = $abmPersona->buscar(['NroDni' => $nroDni]);

    if (!empty($persona)) {
        $personaObj = $persona[0]; // Asumimos que la búsqueda devuelve un array de objetos
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Actualizar Datos de Persona</title>
        </head>
        <body>
            <h1>Actualizar Datos de Persona</h1>
            <form action="ActualizarDatosPersona.php" method="post">
                <label for="Nombre">Nombre:</label>
                <input type="text" name="Nombre" id="Nombre" value="<?php echo $personaObj->getNombre(); ?>" required><br>

                <label for="Apellido">Apellido:</label>
                <input type="text" name="Apellido" id="Apellido" value="<?php echo $personaObj->getApellido(); ?>" required><br>

                <label for="FechaNac">Fecha de Nacimiento:</label>
                <input type="date" name="FechaNac" id="FechaNac" value="<?php echo $personaObj->getFechaNac(); ?>" required><br>

                <label for="Telefono">Teléfono:</label>
                <input type="text" name="Telefono" id="Telefono" value="<?php echo $personaObj->getTelefono(); ?>" required><br>

                <label for="Domicilio">Domicilio:</label>
                <input type="text" name="Domicilio" id="Domicilio" value="<?php echo $personaObj->getDomicilio(); ?>" required><br>

                <!-- Enviamos el número de documento oculto para no permitir modificarlo -->
                <input type="hidden" name="NroDni" value="<?php echo $personaObj->getNroDni(); ?>">

                <button type="submit">Actualizar Datos</button>
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "<p>No se encontró a la persona con DNI $nroDni.</p>";
    }
} else {
    echo "<p>No se recibieron datos.</p>";
}
echo '<p><a href="../menu.php">Volver al Menú Principal</a></p>';
?>
