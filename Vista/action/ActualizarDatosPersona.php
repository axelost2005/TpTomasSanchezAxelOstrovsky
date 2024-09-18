<?php
require_once '../../Control/AbmPersona.php';  // Incluir la capa de control que maneja las personas

$abmPersona = new AbmPersona();

if ($_POST) {
    $param = [
        'NroDni' => $_POST['NroDni'],       // No se permite modificar el DNI
        'Nombre' => $_POST['Nombre'],
        'Apellido' => $_POST['Apellido'],
        'FechaNac' => $_POST['FechaNac'],
        'Telefono' => $_POST['Telefono'],
        'Domicilio' => $_POST['Domicilio']
    ];

    // Intentar modificar los datos de la persona
    $resultado = $abmPersona->modificacion($param);

    if ($resultado) {
        echo "<p>Los datos de la persona han sido actualizados correctamente.</p>";
    } else {
        echo "<p>No se pudieron actualizar los datos de la persona.</p>";
    }
} else {
    echo "<p>No se recibieron datos para actualizar.</p>";
}
echo '<p><a href="../menu.php">Volver al Menú Principal</a></p>';
?>
