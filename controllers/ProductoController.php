<?php
require_once 'models/categoria.php';
require_once 'models/marca.php';
require_once 'models/producto.php';

class ProductoController {

    public function index() {
        $producto = new Producto();
        $productos = $producto->getAll();
        
        require_once 'views/producto/index.php';
    }

    public function create() {
        $categoria = new Categoria();
        $categorias = $categoria->getCategorias();
        $marca = new Marca();
        $marcas = $marca->getMarcas();
        
        require_once 'views/producto/crear.php';
    }
    
    public function view() {
        $producto = new Producto();
        $productos = $producto->getNewProducts();
        
        require_once 'views/producto/nuevos.php';
    }
    
     public function edit() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $categoria = new Categoria();
            $categorias = $categoria->getCategorias();
            $marca = new Marca();
            $marcas = $marca->getMarcas();
            $producto = new Producto();
            $producto->setCodproducto($id);
            $prod = $producto->getOne();
            require_once 'views/producto/crear.php';
        } else {
            header('Location:'.BASE_URL.'producto/index');
        }
    }

    public function save() {
         if (isset($_POST)) {
            $nombre = isset($_POST['nombre'])? $_POST['nombre'] : false;
            $precio = isset($_POST['precio'])? $_POST['precio'] : false;
            $existencia = isset($_POST['existencia'])? $_POST['existencia'] : false;
            $codcate = isset($_POST['categoria'])? $_POST['categoria'] : false;
            $codmarca = isset($_POST['marca'])? $_POST['marca'] : false;
            if ($nombre && $precio && $existencia && $codcate && $codmarca) {
                $producto = new Producto();
                $producto->setNombre($nombre);
                $producto->setPrecio($precio);
                $producto->setExistencia($existencia);
                $producto->setCodcate($codcate);
                $producto->setCodmarca($codmarca);
                $producto->setImagen('nodisponible.jpg');
                
                if(!empty($_FILES)){
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                }

                $save = false;
                if (isset($_GET['id'])) {
                    //Actualizar producto
                    $id = $_GET['id'];
                    $producto->setCodproducto($id);
                    if (!empty($_FILES) && $ext!='') {
                       $filename = $id.'.'.$ext;
                       $producto->setImagen($filename);
                       move_uploaded_file($file['tmp_name'], 'uploads/'.$filename);
                    }
                    $save = $producto->update();
                } else {
                    //Nuevo producto
                    $id = $producto->insert(); 
                    if ($id > 0) {
                        if (!empty($_FILES) && $ext!='') {
                           $filename = $id.'.'.$ext;
                           $producto->setCodproducto($id);
                           $producto->setImagen($filename);
                           move_uploaded_file($file['tmp_name'], 'uploads/'.$filename);
                           $producto->updateImage();
                       }
                    }
                }

                if ($save || $id>0) {
                    $_SESSION['producto'] = "ok";
                } else {
                    $_SESSION['producto'] = "error";
                }
            }
            
        }else{
            $_SESSION['producto'] = "error";
        }
        header("Location:".BASE_URL."producto/index");
    }
    
    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setCodproducto($id);
            $prod = $producto->getOne();
            $delete = $producto->delete();
            if ($delete) {
                $_SESSION['deleteProducto'] = 'ok';
                if (file_exists('uploads/'.$prod->getImagen()) && $prod->getImagen()!='nodisponible.jpg' ) {
                    unlink('uploads/'.$prod->getImagen());
                }
            } else {
                $_SESSION['deleteProducto'] = 'error';
            }
        } else {
            $_SESSION['deleteProducto'] = 'error';
        }
        header('Location:'.BASE_URL.'producto/index');
    }

}

?>