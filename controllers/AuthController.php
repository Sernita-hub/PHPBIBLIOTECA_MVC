<?php
require_once 'models/UsuarioModel.php';

class AuthController {
    private $model;

    public function __construct() {
        $this->model = new UsuarioModel();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // BUG FIX: método correcto es validarUsuario(), no validar()
            $user = $this->model->validarUsuario($_POST['usuario'], $_POST['password']);
            if ($user) {
                $_SESSION['autenticado']  = true;
                $_SESSION['id_usuario']   = $user['id_usuario'];
                $_SESSION['nombre_usuario'] = $user['usuario'];
                header("Location: index.php?controlador=libros&accion=inicio");
                exit;
            } else {
                $error = "Usuario o contraseña incorrectos.";
                // BUG FIX: ruta correcta es view/auth/login.php (sin 's')
                require_once 'view/auth/login.php';
            }
        } else {
            require_once 'view/auth/login.php';
        }
    }

    // BUG FIX: este método faltaba por completo (el menú lo referenciaba)
    public function registro() {
        require_once 'view/auth/registro.php';
    }

    public function procesarRegistro() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // BUG FIX: método correcto es registrar(), no crear()
            if ($this->model->registrar($_POST['usuario'], $_POST['clave'])) {
                $exito = "Usuario registrado correctamente.";
                require_once 'view/auth/login.php';
            } else {
                $error = "No se pudo registrar el usuario.";
                require_once 'view/auth/registro.php';
            }
        } else {
            require_once 'view/auth/registro.php';
        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?controlador=auth&accion=login");
        exit;
    }
}
