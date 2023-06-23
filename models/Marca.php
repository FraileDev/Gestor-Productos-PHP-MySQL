<?php

class Marca {

    private $codmarca;
    private $marca;
    private $descripcion;

    public function __construct() {
        $this->db = Database::Connect();
    }
    
    public function getCodmarca() {
        return $this->codmarca;
    }

    public function getMarca() {
        return $this->marca;
    }
    
    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setCodmarca($codmarca) {
        $this->codmarca = $codmarca;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }
    
    public function setDescripcion($descripcion){
        $this -> $descripcion = $descripcion;
    }

    public function getAll() {
        $marcas = $this->db->query("SELECT * FROM marcas ORDER BY codmarca;");
        return $marcas;
    }
    
    public function getMarcas() {
        $marcas = $this->db->query("SELECT * FROM marcas ORDER BY marca;");
        return $marcas;
    }

   public function getOne() {
        $sql = "SELECT * FROM marcas WHERE codmarca=?;";
        $stmt = $this->db->prepare($sql);
        $cod = $this->getCodmarca();
        $stmt->bind_param('i', $cod);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_object('Marca');
        $stmt->close();
        return $result;
    }

    public function insert() {
        $sql = "INSERT INTO marcas VALUES(NULL, ?);";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $this->getMarca());
        $save = $stmt->execute();
        $stmt->close();
        $result = false;
        if ($save) {
            return true;
        }
        return $result;
    }

    public function update() {
        $sql = "UPDATE marcas SET marca=? WHERE codmarca=?;";
        $stmt = $this->db->prepare($sql);
        $codigo = $this->getCodmarca();
        $nombre = $this->getMarca();
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
        $sql = "DELETE FROM marcas WHERE codmarca=?;";
        $stmt = $this->db->prepare($sql);
        $codigo = $this->getCodmarca();
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