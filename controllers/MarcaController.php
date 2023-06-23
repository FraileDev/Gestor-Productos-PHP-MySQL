<?php
    
require_once 'models/marca.php';

class MarcaController {

    public function index() {
        $marca = new Marca();
        $marcas = $marca->getAll();
        require_once 'views/marca/index.php';
    }

    public function create() {
        require_once 'views/marca/crear.php';
    }

    public function edit() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $marca = new Marca();
            $marca->setCodmarca($id);
            $marca = $marca->getOne();
            require_once 'views/marca/crear.php';
        } else {
            header('Location:'.BASE_URL.'marca/index');
        }
    }

    public function save() {
        if (isset($_POST) && isset($_POST['marca'])) {
            $marca = new Marca();
            $marca->setMarca($_POST['marca']);

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $marca->setCodmarca($id);
                $save = $marca->update();
            } else {
                $save = $marca->insert();
            }

            if ($save) {
                $_SESSION['marca'] = "ok";
            } else {
                $_SESSION['marca'] = "error";
            }
        }else{
            $_SESSION['marca'] = "error";
        }
        header("Location:".BASE_URL."marca/index");
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $marca = new Marca();
            $marca->setCodmarca($id);
            $delete = $marca->delete();
            
            if ($delete) {
                $_SESSION['deleteMarca'] = 'ok';
            } else {
                $_SESSION['deleteMarca'] = 'error';
            }
        } else {
            $_SESSION['deleteMarca'] = 'error';
        }
        header('Location:'.BASE_URL.'marca/index');
    }

}
?>



