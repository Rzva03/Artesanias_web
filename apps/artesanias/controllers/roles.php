
<?php

importar('apps/artesanias/models/roles');
importar('apps/artesanias/views/roles');

class RolesController extends Controller  {

    public function agregar(){
        $sql = "SELECT * FROM roles";
        $data = $this->model->query($sql);

        $this->view->agregar($data);
    }

    public function editar($id=0){
        $sql= "SELECT  R.descripcion
            FROM roles R WHERE R.id=$id ";
        $clasificacionListado = $this->model->query($sql);
        $clasificacion = $this->model->getById($id);

        $this->view->editar($clasificacionListado, $clasificacion);
    }

    public function listar(){
        $sql = "SELECT * FROM roles";
        $data = $this->model->query($sql);
        $this->view->listar($data);
    }

    public function guardar(){
        $id          = $_POST['id']?? 0;
        $descripcion = $_POST['descripcion'];
 
        //--- asociar al modelo
        $this->model->id=$id;
        $this->model->descripcion = $descripcion;
        $this->model->save();
        //--- 
        HTTPHelper::go("/artesanias/roles/listar");
     }

     public function eliminar($id){
        $this->model->delete($id);
        HTTPHelper::go("/artesanias/roles/listar");
    }

}


?>

