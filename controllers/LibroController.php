<?php
// controllers/LibroController.php
require_once 'models/LibroModel.php';

class LibroController {
    private $model;

    public function __construct() {
        $this->model = new LibroModel();
    }

    // Acción para mostrar la tabla
    public function inicio() {
        $libros = $this->model->listar();
        require_once 'view/libros/index.php';
    }

    // Acción para guardar
    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->insertar($_POST['titulo'], $_POST['autor'], $_POST['genero'], $_POST['disponible']);
        }
        header("Location: index.php?controlador=libros&accion=inicio");
    }

    // Acción para eliminar
    public function eliminar() {
        if (isset($_GET['id'])) {
            $this->model->eliminar($_GET['id']);
        }
        header("Location: index.php?controlador=libros&accion=inicio");
    }
}
?>