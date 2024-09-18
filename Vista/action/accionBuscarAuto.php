<?php
require_once '../../Control/AbmAuto.php';

// Verificamos si se recibió la patente desde el formulario
if (isset($_POST['patente']) && !empty($_POST['patente'])) {
    $patente = $_POST['patente']; // Definir la patente desde el formulario
    
    // Instanciamos el controlador de autos
    $abmAuto = new AbmAuto();
    
    // Buscamos el auto por la patente
    $param = array('Patente' => $patente);
    $autos = $abmAuto->buscar($param);
    
    if (count($autos) > 0) {
        // Mostramos los datos del auto en una tabla
        echo "<h1>Datos del Auto</h1>";
        echo "<table border='1'>
                <tr>
                    <th>Patente</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>DNI Dueño</th>
                </tr>";
        
        foreach ($autos as $auto) {
            echo "<tr>
                    <td>{$auto->getPatente()}</td>
                    <td>{$auto->getMarca()}</td>
                    <td>{$auto->getModelo()}</td>
                    <td>{$auto->getDniDuenio()}</td>
                  </tr>";
                  
        }
        
        echo "</table>";
    } else {
        // Si no se encuentra el auto, mostramos un mensaje
        echo "<h1>No se encontró ningún auto con la patente ingresada.</h1>";
    }
} else {
    echo "<h1>Error: No se ingresó una patente válida.</h1>";
}
echo '<p><a href="../menu.php">Volver al Menú Principal</a></p>';
?>
