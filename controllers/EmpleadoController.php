<?php
require_once 'models/EmpleadoModel.php';

class EmpleadoController {
    private $model;

    public function __construct() { $this->model = new EmpleadoModel(); }

    public function inicio() {
        $empleados = $this->model->listar();
        require_once 'view/empleados/index.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->insertar($_POST['nombre'], $_POST['cargo']);
        }
        header("Location: index.php?controlador=empleados&accion=inicio");
    }

    public function eliminar() {
        if (isset($_GET['id'])) {
            $this->model->eliminar($_GET['id']);
        }
        header("Location: index.php?controlador=empleados&accion=inicio");
    }
}