
<?php

importar('apps/artesanias/models/pedidos');
importar('apps/artesanias/views/pedidos');
importar('apps/artesanias/views/mensajes');
importar('core/helpers/Utilerias');

class PedidosController extends Controller  {

    public function agregar(){
        $sql = "SELECT * FROM pedidos";
        $pedidos = $this->model->query($sql);
        $this->view->agregar($pedidos);
    }

    public function editar($id=0){
        
    }

    public function listar($formato=""){
        $sql = "SELECT * FROM pedidos";
        $listaProductos = $this->model->query($sql);
        
        if (strtolower($formato)=="json"){
            echo json_encode($listaProductos);
        }else if ($formato=="xml"){
            $xml = Utilerias::toXML($listaProductos,"pedidos","pedidos");
            echo $xml;
        }else {
            $this->view->listar($listaProductos);
        }
 
    }

    public function guardar(){
       $id               = $_POST['id']?? 0;
       $descripcion      = $_POST['descripcion']??"";
       $producto         = $_POST['producto']??"";
       $clasificacion_id = $_POST['clasificacion_id']??0;
       $artesano_id      = $_POST['artesano_id']??0;
       $precio           = $_POST['precio']??0.0;
       $existencias      = $_POST['existencias']??0;

       //--- validar datos

       if (empty($descripcion) || empty($producto)){
           Mensajes::show ("Faltan datos importantes "); 
           exit;
       }
 
       //--- asociar al modelo
        $this->model->id = $id;
        $this->model->producto         = $producto;
        $this->model->descripcion      = $descripcion;
        $this->model->clasificacion_id = $clasificacion_id;
        $this->model->artesano_id      = $artesano_id;
        $this->model->precio           = $precio;
        $this->model->existencias      = $existencias;
        $id = $this->model->save();
        $this->model->id=$id;
        $this->model->imagenes      = $imageNames;
        $this->model->save();

       //--- guardar las imagenes en la tabla productoImagen

       Mensajes::show ( "Guardado satisfactoriamente ..."); 

    }

    public function eliminar($id){
        $this->model->delete($id);
        HTTPHelper::go("/artesanias/productos/listar");
    }
    
}

?>
