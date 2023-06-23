<?php

require_once 'models/categoria.php';

class CategoriaController {

    public function index() {
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        require_once 'views/categoria/index.php';
    }

    public function create() {
        require_once 'views/categoria/crear.php';
    }

    public function edit() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $categoria = new Categoria();
            $categoria->setCodcate($id);
            $cate = $categoria->getOne();
            require_once 'views/categoria/crear.php';
        } else {
            header('Location:'.BASE_URL.'categoria/index');
        }
    }

    public function save() {
        if (isset($_POST) && isset($_POST['categoria'])) {
            $categoria = new Categoria();
            $categoria->setCategoria($_POST['categoria']);

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $categoria->setCodcate($id);
                $save = $categoria->update();
            } else {
                $save = $categoria->insert();
            }

            if ($save) {
                $_SESSION['categoria'] = "ok";
            } else {
                $_SESSION['categoria'] = "error";
            }
        }else{
            $_SESSION['categoria'] = "error";
        }
        header("Location:".BASE_URL."categoria/index");
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $categoria = new Categoria();
            $categoria->setCodcate($id);
            $delete = $categoria->delete();
            
            if ($delete) {
                $_SESSION['deleteCategoria'] = 'ok';
            } else {
                $_SESSION['deleteCategoria'] = 'error';
            }
        } else {
            $_SESSION['deleteCategoria'] = 'error';
        }
        header('Location:'.BASE_URL.'categoria/index');
    }

}
?>

