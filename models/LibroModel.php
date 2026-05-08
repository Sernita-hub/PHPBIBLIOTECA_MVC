<?php
// models/LibroModel.php
require_once 'core/Database.php';

class LibroModel extends Database {

    // Reemplaza el SELECT * que tenías en libros.php
    public function listar() {
        $stmt = $this->pdo->query("SELECT * FROM libros");
        return $stmt->fetchAll();
    }

    // Reemplaza la lógica que tenías en guardar.php
    public function insertar($titulo, $autor, $genero, $disponible) {
        $sql = "INSERT INTO libros (titulo, autor, genero, disponible) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$titulo, $autor, $genero, $disponible]);
    }

    // Reemplaza la lógica que tenías en eliminar.php
    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM libros WHERE id_libro = ?");
        return $stmt->execute([$id]);
    }
}
?>