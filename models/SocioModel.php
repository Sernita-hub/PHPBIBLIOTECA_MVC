<?php
require_once 'core/Database.php';

class SocioModel extends Database {
    public function listar() {
        return $this->pdo->query("SELECT * FROM socios")->fetchAll();
    }

    public function insertar($nombre, $correo, $telefono) {
        $stmt = $this->pdo->prepare("INSERT INTO socios (nombre, correo, telefono) VALUES (?, ?, ?)");
        return $stmt->execute([$nombre, $correo, $telefono]);
    }

    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM socios WHERE id_socio = ?");
        return $stmt->execute([$id]);
    }
}