<?php
// models/UsuarioModel.php
require_once 'core/Database.php';

class UsuarioModel extends Database {
    
    public function validarUsuario($user, $pass) {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE usuario = ? AND password = ?");
        $stmt->execute([$user, $pass]);
        return $stmt->fetch();
    }

    public function registrar($user, $pass) {
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (usuario, password) VALUES (?, ?)");
        return $stmt->execute([$user, $pass]);
    }
}