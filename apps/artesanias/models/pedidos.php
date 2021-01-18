}<?php

class Pedidos extends DAO {

    public function __construct() {
        $this->keyfield = "id";
        $this->id = 0;
        $this->fecha = "";
        $this->cliente_id = "";
        $this->formapago = "";
        $this->domicilioentrega = "";
    } 

}

?>