<?php
session_start();

// El enrutador decide qué controlador cargar
$controladorNombre = $_GET['controlador'] ?? 'auth';
$accion            = $_GET['accion']      ?? 'login';

// Redirigir al login si no está autenticado (excepto para auth)
if ($controladorNombre !== 'auth' && empty($_SESSION['autenticado'])) {
    header("Location: index.php?controlador=auth&accion=login");
    exit;
}

// Mapa de controladores
switch ($controladorNombre) {
    case 'libros':
        require_once 'controllers/LibroController.php';
        $controller = new LibroController();
        break;
    case 'socios':
        require_once 'controllers/SocioController.php';
        $controller = new SocioController();
        break;
    case 'empleados':
        require_once 'controllers/EmpleadoController.php';
        $controller = new EmpleadoController();
        break;
    case 'prestamos':
        // BUG FIX: el archivo se llama PrestamosController.php (con 's')
        require_once 'controllers/PrestamosController.php';
        $controller = new PrestamoController();
        break;
    case 'auth':
        require_once 'controllers/AuthController.php';
        $controller = new AuthController();
        break;
    default:
        die("Controlador no encontrado.");
}

// Ejecuta la acción solicitada
if (method_exists($controller, $accion)) {
    $controller->$accion();
} else {
    die("La acción '$accion' no existe en el controlador '$controladorNombre'.");
}
