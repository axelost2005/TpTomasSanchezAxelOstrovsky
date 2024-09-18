<?php
include_once(__DIR__ . '/../Modelo/auto.php');

class AbmAuto {
    
    // Cargar un objeto Auto con los parámetros del array
    private function cargarObjeto($param){
        $obj = null;
        if( array_key_exists('Patente', $param) && array_key_exists('Marca', $param) && array_key_exists('Modelo', $param)){
            $obj = new Auto();
            $obj->setPatente($param['Patente']);
            $obj->setMarca($param['Marca']);
            $obj->setModelo($param['Modelo']);
            $obj->setDniDuenio($param['DniDuenio']);
        }
        return $obj;
    }

    // Cargar un objeto Auto solo con la clave (Patente)
    private function cargarObjetoConClave($param){
        $obj = null;
        if (isset($param['Patente'])) {
            $obj = new Auto();
            $obj->setPatente($param['Patente']);
        }
        return $obj;
    }

    // Corroborar que los campos claves están seteados
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['Patente'])) {
            $resp = true;
        }
        return $resp;
    }

    // Alta (insertar) un objeto Auto en la base de datos
    public function alta($param){
        $resp = false;
        $elObjtAuto = $this->cargarObjeto($param);
        if ($elObjtAuto != null && $elObjtAuto->insertar()) {
            $resp = true;
        }
        return $resp;
    }

    // Baja (eliminar) un objeto Auto de la base de datos
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjtAuto = $this->cargarObjetoConClave($param);
            if ($elObjtAuto != null && $elObjtAuto->eliminar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    // Modificación de un objeto Auto en la base de datos
    public function modificacion($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjtAuto = $this->cargarObjeto($param);
            if($elObjtAuto != null && $elObjtAuto->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }

    public function buscar($param = null) {
        $where = "";
        
        if ($param != null) {
            if (isset($param['Patente'])) {
                $where = " WHERE Patente = '" . $param['Patente'] . "'";
            }
            if (isset($param['DniDuenio'])) {
                $where = " WHERE DniDuenio = '" . $param['DniDuenio'] . "'";
            }
        }
        
        $auto = new Auto();
        $arreglo = $auto->listar($where);
        return $arreglo;
    }
    
    
    
    /**asdasd
     *  public function buscar($param = null){
        $where = "";
        if ($param != NULL) {
            if (isset($param['Patente'])) {
                $where .= " and Patente = '" . $param['Patente'] . "'";
            }
            if (isset($param['DniDueño'])) {
                $where .= " and DniDueño = " . $param['DniDueño'];
            }
        }
        $auto = new Auto();
        $arreglo = $auto->listar($where);
        return $arreglo;
    } **/
    // Buscar objetos Auto con filtros (parámetros)
   
    
}
?>
