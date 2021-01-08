
<?php

importar('apps/artesanias/models/productos');
//importar('apps/artesanias/models/productosimagen');
importar('apps/artesanias/views/productos');
importar('apps/artesanias/views/mensajes');

class ProductosController extends Controller  {

    public function agregar(){
        $sql = "SELECT * FROM clasificacion";
        $clasificaciones = $this->model->query($sql);
        $sql = "SELECT id, CONCAT(primerapellido,' ', segundoapellido, ' ',
            nombres) as nombres FROM artesanos";
        $artesanos = $this->model->query($sql);
        $this->view->agregar($artesanos, $clasificaciones);
    }

    public function editar($id=0){
        $sql= "SELECT  P.producto, P.descripcion, P.clasificacion_id, P.artesano_id, P.precio, P.existencias
            FROM productos P WHERE P.id=$id ";
        $clasificacionListado = $this->model->query($sql);
        $clasificacion = $this->model->getById($id);

        $this->view->editar($clasificacionListado, $clasificacion);
    }

    public function listar(){
        $sql = "SELECT * FROM productos ";
        $data = $this->model->query($sql);
        $this->view->listar($data);
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
        //--- validar imágenes
        $permitidos    = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
        $imagenes      = $_FILES['images'];
        $totalElements = count($imagenes['name']);
        for ($i=0; $i< $totalElements; $i++){
             $filesize = $imagenes["size"][$i];
             $filename = $imagenes["name"][$i];
             $ext = pathinfo($filename, PATHINFO_EXTENSION);
        
             if(!array_key_exists($ext, $permitidos)) {
                 Mensajes::show ("Formato  de imágen ($ext) no válido");
                 exit;
             }
             $maxsize = 3 * 1024 * 1024;
             if($filesize > $maxsize) {
                 Mensajes::show ("El tamaño del archivo es demasiado grande");
                 exit;
             }
      
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

         //--- guardar las imagenes en la tabla productoImagen
         for ($i=0; $i< $totalElements; $i++){
              $ext = pathinfo($imagenes["name"][$i],PATHINFO_EXTENSION);
              $filename = $id."_$i.$ext";
              move_uploaded_file($imagenes["tmp_name"][$i], APP_DIR."uploads/" . $filename);
              $productoimagen= new ProductoImagen();
              $productoimagen->id = 0;
              $productoimagen->producto_id = $id;
              $productoimagen->imagen = $filename;
              $productoimagen->save();
         }
         Mensajes::show ( "Guardado satisfactoriamente ...");
         //--- 
         //HTTPHelper::go("/artesanias/productos/listar");
      }
    }
?>