<?php
require_once 'core/Database.php';

class PrestamoModel extends Database {
    public function listar() {
        // Podrías mejorar esto después con un JOIN para ver nombres en lugar de IDs
        return $this->pdo->query("SELECT * FROM prestamos")->fetchAll();
    }

    public function insertar($id_libro, $id_socio, $id_empleado, $f_p, $f_d) {
        $sql = "INSERT INTO prestamos (id_libro, id_socio, id_empleado, fecha_prestamo, fecha_devolucion) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id_libro, $id_socio, $id_empleado, $f_p, $f_d]);
    }

    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM prestamos WHERE id_prestamo = ?");
        return $stmt->execute([$id]);
    }
}