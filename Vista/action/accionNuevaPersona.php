<?php
require_once '../../Control/AbmPersona.php';  // Incluir la capa de control que maneja las personas

$abmPersona = new AbmPersona();

// Verificamos si se recibieron los datos del formulario
if ($_POST) {
    $param = [
        'NroDni' => $_POST['NroDni'],
        'Nombre' => $_POST['Nombre'],
        'Apellido' => $_POST['Apellido'],
        'FechaNac' => $_POST['FechaNac'],
        'Telefono' => $_POST['Telefono'],
        'Domicilio' => $_POST['Domicilio']
    ];

    // Intentamos registrar la nueva persona
    $resultado = $abmPersona->alta($param);

    if ($resultado) {
        echo "<p>La persona fue registrada correctamente.</p>";
    } else {
        echo "<p>No se pudo registrar la persona.</p>";
    }
} else {
    echo "<p>No se recibieron datos.</p>";
}
echo '<p><a href="../menu.php">Volver al Menú Principal</a></p>';
?>
