<?php
require_once 'models/PrestamoModel.php';

class PrestamoController {
    private $model;

    public function __construct() {
        $this->model = new PrestamoModel();
    }

    public function inicio() {
        $prestamos = $this->model->listar();
        require_once 'view/prestamos/index.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->insertar(
                $_POST['id_libro'], $_POST['id_socio'], 
                $_POST['id_empleado'], $_POST['fecha_prestamo'], 
                $_POST['fecha_devolucion']
            );
        }
        header("Location: index.php?controlador=prestamos&accion=inicio");
    }

    public function eliminar() {
        if (isset($_GET['id'])) {
            $this->model->eliminar($_GET['id']);
        }
        header("Location: index.php?controlador=prestamos&accion=inicio");
    }
}