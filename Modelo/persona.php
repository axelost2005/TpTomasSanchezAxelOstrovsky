<?php

require_once __DIR__ . '/conector/BaseDatos.php';


class persona{

    private $nroDni;
    private $apellido;
    private $nombre;
    private $fechaNac;
    private $telefono;
    private $domicilio;

    public function __construct(){
        $this->nroDni = "";
        $this->apellido = "";
        $this->nombre  ="";
        $this->fechaNac = "";
        $this->telefono = "";
        $this->domicilio = "";
    }

     // Getter para msjOperacion
     public function getMsjOperacion() {
        return $this->msjOperacion;
    }

    // Setter para msjOperacion
    public function setMsjOperacion($msjOperacion) {
        $this->msjOperacion = $msjOperacion;
    }

     // Getter y Setter para nroDni
     public function getNroDni() {
        return $this->nroDni;
    }

    public function setNroDni($nroDni) {
        $this->nroDni = $nroDni;
    }

    // Getter y Setter para apellido
    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    // Getter y Setter para nombre
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    // Getter y Setter para fechaNac
    public function getFechaNac() {
        return $this->fechaNac;
    }

    public function setFechaNac($fechaNac) {
        $this->fechaNac = $fechaNac;
    }

    // Getter y Setter para telefono
    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    // Getter y Setter para domicilio
    public function getDomicilio() {
        return $this->domicilio;
    }

    public function setDomicilio($domicilio) {
        $this->domicilio = $domicilio;
    }

    public function __toString(){
        return 
        "Dni:". $this->getNroDni() .
        "Apellido:" .$this->getApellido().
        "Nombre: " .$this->getNombre().
        "Fecha Nacimiento: ". $this->getFechaNac().
        "Telefono: ". $this->getTelefono().   
        "Domicilio: ".$this->getDomicilio();     
    }

    public function cargar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM persona WHERE NroDni = ". $this->getNroDni();
        if($base->Iniciar()){
            $res = $base->Ejecutar($sql);
            if($res>0){
                $row = $base->Registro();
                $this->setNroDni($row['NroDni']);
                $this->setApellido($row['Apellido']);
                $this->setNombre($row['Nombre']);
                $this->setFechaNac($row['fechaNac']);
                $this->setTelefono($row['Telefono']);
                $this->setDomicilio($row['Domicilio']);
                $resp = true;
            }
        }else{
            $this->setMsjOperacion("Persona->cargar" . $base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp = false;
        $base = new BaseDatos();
        
        // Asegúrate de que los valores estén entre comillas simples en la consulta
        $sql = "INSERT INTO persona (NroDni, Apellido, Nombre, FechaNac, Telefono, Domicilio) VALUES (
        '" . $this->getNroDni() . "', 
        '" . $this->getApellido() . "', 
        '" . $this->getNombre() . "', 
        '" . $this->getFechaNac() . "', 
        '" . $this->getTelefono() . "', 
        '" . $this->getDomicilio() . "')";
    
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMsjOperacion("Persona->insertar: " . $base->getError());
            }
        } else {
            $this->setMsjOperacion("Persona->insertar: " . $base->getError());
        }
    
        return $resp;
    }
    

    public function modificar() {
        $resp = false;
        $base = new BaseDatos();
    
        // Asegúrate de que los valores estén separados por comas en la consulta
        $sql = "UPDATE persona SET 
            Apellido = '" . $this->getApellido() . "',
            Nombre = '" . $this->getNombre() . "',
            FechaNac = '" . $this->getFechaNac() . "',
            Telefono = '" . $this->getTelefono() . "',
            Domicilio = '" . $this->getDomicilio() . "'
            WHERE NroDni = '" . $this->getNroDni() . "'";
    
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMsjOperacion("Persona->modificar: " . $base->getError());
            }
        } else {
            $this->setMsjOperacion("Persona->modificar: " . $base->getError());
        }
    
        return $resp;
    }
    

    public function eliminar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM persona WHERE NroDni =".$this->getNroDni();

        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $sqlAuto = "DELETE FROM auto WHERE DniDuenio =". $this->getNroDni();
                if($base->Ejecutar($sqlAuto)){
                    $resp=true;
                }else($this->setMsjOperacion("Persona->eliminar" .$base->getError()));
            }else($this->setMsjOperacion("Persona->eliminar" .$base->getError()));
        }else($this->setMsjOperacion("Persona->eliminar" .$base->getError()));

    }

    public function listar($parametro = ""){
        $array = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM persona"; // Base de la consulta
        
        // Solo concatenamos el parámetro si no está vacío
        if ($parametro != "") {
            $sql .= " " . $parametro;  // Aquí nos aseguramos de que se concatene correctamente sin un espacio antes de WHERE
        }
        
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {
                    $obj = new Persona();
                    $obj->setNroDni($row['NroDni']);
                    $obj->setApellido($row['Apellido']);
                    $obj->setNombre($row['Nombre']);
                    array_push($array, $obj);
                }
            }
        } else {
            $this->setMsjOperacion("Persona->listar: " . $base->getError());
        }
    
        return $array;
    }
    
    
    


}