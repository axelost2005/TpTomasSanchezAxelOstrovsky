<?php
require_once '../../Control/AbmAuto.php';    // Incluir la capa de control que maneja los autos
require_once '../../Control/AbmPersona.php'; // Incluir la capa de control que maneja las personas

$abmAuto = new AbmAuto();
$abmPersona = new AbmPersona();

if ($_POST) {
    $patente = $_POST['Patente'];
    $dniNuevoDuenio = $_POST['DniNuevoDuenio'];

    // Verificar si el auto existe
    $auto = $abmAuto->buscar(['Patente' => $patente]);

    // Verificar si la persona existe
    $persona = $abmPersona->buscar(['NroDni' => $dniNuevoDuenio]);

    if (!empty($auto)) {
        if (!empty($persona)) {
            // Si tanto el auto como la persona existen, cambiamos el dueño del auto
            $paramAuto = [
                'Patente' => $patente,
                'DniDuenio' => $dniNuevoDuenio
            ];

            $resultado = $abmAuto->modificacion($paramAuto);


            if ($resultado) {
                echo "<p>El dueño del auto con patente $patente ha sido cambiado correctamente.</p>";
            } else {
                echo "<p>No se pudo cambiar el dueño del auto.</p>";
            }
        } else {
            echo "<p>La persona con DNI $dniNuevoDuenio no está registrada en el sistema.</p>";
        }
    } else {
        echo "<p>El auto con patente $patente no está registrado en el sistema.</p>";
    }
} else {
    echo "<p>No se recibieron datos.</p>";
}
echo '<p><a href="../menu.php">Volver al Menú Principal</a></p>';
?>
