<?php
// Incluir los archivos de las clases necesarias
require_once '../Control/AbmAuto.php';
require_once '../Control/AbmPersona.php';

// Instanciar las clases de control
$abmAuto = new AbmAuto();
$abmPersona = new AbmPersona();

// Obtener todos los autos
$autos = $abmAuto->buscar();

// Verificar si hay autos cargados
if (count($autos) > 0) {
    echo "<h1>Listado de Autos</h1>";
    echo "<table border='1'>
            <tr>
                <th>Patente</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Dueño (Nombre y Apellido)</th>
            </tr>";
    
    // Recorrer cada auto y mostrar los datos
    foreach ($autos as $auto) {
        // Buscar el dueño de cada auto por su DNI (DniDueño)
        $paramPersona = array("NroDni" => $auto->getDniDuenio());
        $duenios = $abmPersona->buscar($paramPersona);
        
        if (count($duenios) > 0) {
            $duenio = $duenios[0]; // Se espera que haya un solo dueño con ese DNI
            $nombreCompleto = $duenio->getNombre() . " " . $duenio->getApellido();
        } else {
            $nombreCompleto = "Dueño no encontrado";
        }
        
        // Mostrar los datos del auto y del dueño
        echo "<tr>
                <td>{$auto->getPatente()}</td>
                <td>{$auto->getMarca()}</td>
                <td>{$auto->getModelo()}</td>
                <td>{$nombreCompleto}</td>
              </tr>";
    }
    
    echo "</table>";
} else {
    echo "<h1>No hay autos cargados.</h1>";
}
echo '<p><a href="menu.php">Volver al Menú Principal</a></p>';
?>
