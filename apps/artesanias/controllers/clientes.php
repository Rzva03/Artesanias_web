
<?php

importar('apps/artesanias/models/clientes');
importar('apps/artesanias/views/clientes');

class ClientesController extends Controller  {

    public function agregar(){
        $sql = "SELECT * FROM clientes";
        $data = $this->model->query($sql);

        $this->view->agregar($data);
    }

    public function editar($id=0){
        $sql= "SELECT  C.nombreorazonsocial , C.domicilio , C.telefono ,
        C.correo , C.contacto FROM clientes C WHERE C.id=$id ";
        $clienteListado = $this->model->query($sql);
        $cliente = $this->model->getById($id);

        $this->view->editar($clienteListado, $cliente);
    }

    public function listar(){
        $sql = "SELECT * FROM clientes";
        $data = $this->model->query($sql);
        $this->view->listar($data);
    }

    public function guardar(){
        $id          = $_POST['id']?? 0;
        $nombreorazonsocial = $_POST['razon'];
        $domicilio = $_POST['domicilio'];
        $telefono  = $_POST['telefono'];
        $correo   = $_POST['correo'];
        $contacto   = $_POST['contacto'];
 
        //--- asociar al modelo
        $this->model->id=$id;
        $this->model->nombreorazonsocial = $nombreorazonsocial;
        $this->model->domicilio = $domicilio;
        $this->model->telefono = $telefono;
        $this->model->correo = $correo;
        $this->model->contacto = $contacto;
        $this->model->save();
        //--- 
        HTTPHelper::go("/artesanias/clientes/listar");
     }

     public function eliminar($id){
        $this->model->delete($id);
        HTTPHelper::go("/artesanias/clientes/listar");
    }

}


?>

