<?php

class PedidosView  {

    public function agregar($list=[]){
        $str = file_get_contents(
            STATIC_DIR . "/static/html/artesanias/pedidos_agregar.html"); 
        $html = Template($str)->render_regex('LISTADO_PEDIDOS', $list);
        print Template('Confirmacion de pedido')->show($html);
    } 
    /*
    public function listar($pedidos = []){
        $str = file_get_contents(
            STATIC_DIR . "/static/html/artesanias/pedidos_listar.html"); 
        $html = Template($str)->render_regex('LISTADO_PEDIDOS', $pedidos);
        print Template('Pedidos')->show($html);
    } */
}

?>