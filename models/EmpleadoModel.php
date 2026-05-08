<?php
require_once 'core/Database.php';

class EmpleadoModel extends Database {
    public function listar() {
        return $this->pdo->query("SELECT * FROM empleados")->fetchAll();
    }

    public function insertar($nombre, $cargo) {
        $stmt = $this->pdo->prepare("INSERT INTO empleados (nombre, cargo) VALUES (?, ?)");
        return $stmt->execute([$nombre, $cargo]);
    }

    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM empleados WHERE id_empleados = ?");
        return $stmt->execute([$id]);
    }
}