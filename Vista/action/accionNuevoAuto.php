<?php
require_once '../../Control/AbmAuto.php';    // Incluir la capa de control que maneja los autos
require_once '../../Control/AbmPersona.php'; // Incluir la capa de control que maneja las personas

$abmAuto = new AbmAuto();
$abmPersona = new AbmPersona();

if ($_POST) {
    $dniDuenio = $_POST['DniDuenio'];

    // Verificar si la persona dueña del auto ya existe
    $persona = $abmPersona->buscar(['NroDni' => $dniDuenio]);

    if (!empty($persona)) {
        // Si la persona existe, procedemos a registrar el auto
        $paramAuto = [
            'Patente' => $_POST['Patente'],
            'Marca' => $_POST['Marca'],
            'Modelo' => $_POST['Modelo'],
            'DniDuenio' => $dniDuenio
        ];

        $resultado = $abmAuto->alta($paramAuto);

        if ($resultado) {
            echo "<p>El auto fue registrado correctamente.</p>";
        } else {
            echo "<p>No se pudo registrar el auto.</p>";
        }
    } else {
        // Si la persona no existe, mostrar un mensaje con el link para agregarla
        echo "<p>El dueño con DNI $dniDuenio no está registrado en el sistema.</p>";
        echo '<p><a href="../NuevaPersona.php">Registrar nueva persona</a></p>';
    }
} else {
    echo "<p>No se recibieron datos.</p>";
}
echo '<p><a href="../menu.php">Volver al Menú Principal</a></p>';
?>
