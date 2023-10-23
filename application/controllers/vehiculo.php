<?php
class Vehiculo extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('vehiculo_model');
    }

    public function index() {
        $data['vehiculos'] = $this->vehiculo_model->listarVehiculos();
        $this->load->view('vehiculo/listar', $data);
    }

    public function agregar() {
        $this->load->view('vehiculo/agregar');
    }

    public function editar($id) {
        $data['vehiculo'] = $this->vehiculo_model->obtenerVehiculoPorID($id);
        $this->load->view('vehiculo/editar', $data);
    }

    public function guardar() {
        // Implementa la lógica para procesar el formulario de agregar o editar vehículo.
        // Asegúrate de validar los datos y llamar a los métodos del modelo adecuados.
    }

    public function eliminar($id) {
        $this->vehiculo_model->eliminarVehiculo($id);
        redirect('vehiculo/index');
    }
}
?>
