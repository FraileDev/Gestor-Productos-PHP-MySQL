<?php
class Producto {
    private $codproducto;
    private $nombre;
    private $precio;
    private $existencia;
    private $codcate;
    private $codmarca;
    private $imagen;
    
    public function __construct() {
        $this->db = Database::Connect();
    }

    public function getCodproducto() {
        return $this->codproducto;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getExistencia() {
        return $this->existencia;
    }

    public function getCodcate() {
        return $this->codcate;
    }

    public function getCodmarca() {
        return $this->codmarca;
    }
    
    public function getImagen() {
        return $this->imagen;
    }

    public function setCodproducto($codproducto) {
        $this->codproducto = $codproducto;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function setExistencia($existencia) {
        $this->existencia = $existencia;
    }

    public function setCodcate($codcate) {
        $this->codcate = $codcate;
    }

    public function setCodmarca($codmarca) {
        $this->codmarca = $codmarca;
    }
    
    public function setImagen($imagen){
        $this->imagen = $imagen;
    }

    public function getAll() {
        $productos = $this->db->query("SELECT * FROM productos ORDER BY codproducto;");
        return $productos;
    }
    
    public function getNewProducts() {
        $productos = $this->db->query("SELECT * FROM productos ORDER BY codproducto DESC LIMIT 6;");
        return $productos;
    }


    public function getOne() {
        $sql = "SELECT * FROM productos WHERE codproducto=?;";
        $stmt = $this->db->prepare($sql);
        $cod = $this->getCodproducto();
        $stmt->bind_param('i', $cod);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_object('Producto');
        $stmt->close();
        return $result;
    }

    public function insert() {
        $sql = "INSERT INTO productos VALUES(NULL, ?, ?, ?, ?, ?, ?);";
        $stmt = $this->db->prepare($sql);
        $nombre = $this->getNombre();
        $precio = $this->getPrecio();
        $existencia = $this->getExistencia();
        $codcate = $this->getCodcate();
        $codmarca = $this->getCodmarca();
        $imagen = $this->getImagen();
        $stmt->bind_param('sdiiis', $nombre, $precio, $existencia, $codcate, $codmarca, $imagen);
        $stmt->execute();
        $id = $stmt->insert_id;
        $stmt->close();
        return $id;
    }
    
    public function updateImage() {
        $sql = "UPDATE productos SET imagen=? WHERE codproducto=?;";
        $stmt = $this->db->prepare($sql);
        $codigo = $this->getCodproducto();
        $imagen = $this->getImagen();
        $stmt->bind_param('si', $imagen, $codigo);
        $stmt->execute();
        $stmt->close();
    }

    public function update() {
        $sql1 = "UPDATE productos SET nombre=?, precio=?, existencia=?, codcate=?, codmarca=? WHERE codproducto=?;";
        $sql2 = "UPDATE productos SET nombre=?, precio=?, existencia=?, codcate=?, codmarca=?, imagen=? WHERE codproducto=?;";
        $codigo = $this->getCodproducto();
        $nombre = $this->getNombre();
        $precio = $this->getPrecio();
        $existencia = $this->getExistencia();
        $codcate = $this->getCodcate();
        $codmarca = $this->getCodmarca();
        $imagen = $this->getImagen();
        if ($imagen == 'nodisponible.jpg') {
            $stmt = $this->db->prepare($sql1);
            $stmt->bind_param('sdiiii', $nombre, $precio, $existencia, $codcate, $codmarca, $codigo);
        }else{
            $stmt = $this->db->prepare($sql2);
            $stmt->bind_param('sdiiisi', $nombre, $precio, $existencia, $codcate, $codmarca, $imagen, $codigo);
        }
        $save = $stmt->execute();
        $stmt->close();
        $result = false;
        if ($save) {
            return true;
        }
        return $result;
    }

    public function delete() {
        $sql = "DELETE FROM productos WHERE codproducto=?;";
        $stmt = $this->db->prepare($sql);
        $codigo = $this->getCodproducto();
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