<?php
class Database {
    public static function Connect() {
        $db = new mysqli('localhost', 'root', 'unicaes', 'ventas', '3308');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}
?>

