<?php

class Productos extends DAO {

    public function __construct() {
        $this->keyfield = "id";
        $this->id = 0;
        $this->producto = "";
        $this->descripcion = "";
        $this->clasificacion_id = "";
        $this->artesano_id = "";
        $this->precio = "";
        $this->existencias = "";
        $this->imagenes="";
    } 

}

?>