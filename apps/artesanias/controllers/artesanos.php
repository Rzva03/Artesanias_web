
<?php

importar('apps/artesanias/models/artesanos');
importar('apps/artesanias/views/artesanos');

class ArtesanosController extends Controller  {

    public function agregar(){
        $sql = "SELECT * FROM artesanos";
        $data = $this->model->query($sql);

        $this->view->agregar($data);
    }

    public function editar($id=0){
        $sql= "SELECT  R.nombres, R.primerapellido, R.segundoapellido, R.domicilio, R.telefono, R.correo
            FROM artesanos R WHERE R.id=$id ";
        $clasificacionListado = $this->model->query($sql);
        $clasificacion = $this->model->getById($id);

        $this->view->editar($clasificacionListado, $clasificacion);
    }

    public function listar(){
        $sql = "SELECT * FROM artesanos";
        $data = $this->model->query($sql);
        $this->view->listar($data);
    }

    public function guardar(){
        $id          = $_POST['id']?? 0;
        $nombres = $_POST['nombres'];
        $primerapellido = $_POST['apellido1'];
        $segundoapellido = $_POST['apellido2'];
        $domicilio  = $_POST['domicilio'];
        $telefono  = $_POST['telefono'];
        $correo  = $_POST['correo'];
 
        //--- asociar al modelo
        $this->model->id=$id;
        $this->model->nombres = $nombres;
        $this->model->primerapellido = $primerapellido;
        $this->model->segundoapellido = $segundoapellido;
        $this->model->domicilio = $domicilio;
        $this->model->telefono = $telefono;
        $this->model->correo = $correo;
        $this->model->save();
        //--- 
        HTTPHelper::go("/artesanias/artesanos/listar");
     }

     public function eliminar($id){
        $this->model->delete($id);
        HTTPHelper::go("/artesanias/artesanos/listar");
    }

}


?>

