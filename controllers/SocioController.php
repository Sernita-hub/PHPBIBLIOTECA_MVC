<?php
require_once 'models/SocioModel.php';

class SocioController {
    private $model;

    public function __construct() {
        $this->model = new SocioModel();
    }

    public function inicio() {
        $socios = $this->model->listar();
        require_once 'view/socios/index.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->insertar($_POST['nombre'], $_POST['correo'], $_POST['telefono']);
        }
        header("Location: index.php?controlador=socios&accion=inicio");
    }

    public function eliminar() {
        if (isset($_GET['id'])) {
            $this->model->eliminar($_GET['id']);
        }
        header("Location: index.php?controlador=socios&accion=inicio");
    }
}