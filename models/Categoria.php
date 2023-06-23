<?php

class Categoria {

    private $codcate;
    private $categoria;
    private $descripcion;

    public function __construct() {
        $this->db = Database::Connect();
    }

    public function getCodcate() {
        return $this->codcate;
    }

    public function getCategoria() {
        return $this->categoria;
    }
    
    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setCodcate($codcate) {
        $this->codcate = $codcate;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }
    
    public function setDescripcion($descripcion){
        $this -> $descripcion = $descripcion;
    }

    public function getAll() {
        $categorias = $this->db->query("SELECT * FROM categorias ORDER BY codcate;");
        return $categorias;
    }

    public function getCategorias() {
        $categorias = $this->db->query("SELECT * FROM categorias ORDER BY categoria;");
        return $categorias;
    }

    public function getOne() {
        $sql = "SELECT * FROM categorias WHERE codcate=?;";
        $stmt = $this->db->prepare($sql);
        $cod = $this->getCodcate();
        $stmt->bind_param('i', $cod);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_object('Categoria');
        $stmt->close();
        return $result;
    }

    public function insert() {
        $sql = "INSERT INTO categorias VALUES(NULL, ?);";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $this->getCategoria());
        $save = $stmt->execute();
        $stmt->close();
        $result = false;
        if ($save) {
            return true;
        }
        return $result;
    }

    public function update() {
        $sql = "UPDATE categorias SET categoria=? WHERE codcate=?;";
        $stmt = $this->db->prepare($sql);
        $codigo = $this->getCodcate();
        $nombre = $this->getCategoria();
        $stmt->bind_param('si', $nombre ,$codigo);
        $save = $stmt->execute();
        $stmt->close();
        $result = false;
        if ($save) {
            return true;
        }
        return $result;
    }

    public function delete() {
        $sql = "DELETE FROM categorias WHERE codcate=?;";
        $stmt = $this->db->prepare($sql);
        $codigo = $this->getCodcate();
        $stmt->bind_param('i', $codigo);
        $delete = $stmt->execute();
        $stmt->close();
        $result = false;
        if ($delete) {
            return true;
        }
        return $result;
    }

}

?>