<?php
class Vehiculo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('vehiculo_model');
    }

    public function listar()
    {
        $data['vehiculos'] = $this->vehiculo_model->listar();

        $this->load->view('inclte/cabecera');
        $this->load->view('inclte/menusuperior');
        $this->load->view('inclte/menulateral');
        $this->load->view('est_listataxi', $data);
        $this->load->view('inclte/pie');
    }

    public function agregar()
    {
        $this->load->view('inclte/cabecera');
        $this->load->view('inclte/menusuperior');
        $this->load->view('inclte/menulateral');
        $this->load->view('est_formulariotaxi'); // Vista para agregar un vehículo
        $this->load->view('inclte/pie');
    }

    public function insertar()
    {
        // Validación de datos
        $this->load->library('form_validation');
        $this->form_validation->set_rules('placa', 'Placa', 'required');
        $this->form_validation->set_rules('marca', 'Marca', 'required');
        $this->form_validation->set_rules('tipo', 'Tipo', 'required');
        $this->form_validation->set_rules('fechaRegistro', 'Fecha de Registro', 'required');
        $this->form_validation->set_rules('estado', 'Estado', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Si la validación falla, muestra la vista de agregar nuevamente con errores
            $this->load->view('inclte/cabecera');
            $this->load->view('inclte/menusuperior');
            $this->load->view('inclte/menulateral');
            $this->load->view('est_formulariotaxi'); // Vista para agregar un vehículo
            $this->load->view('inclte/pie');
        } else {
            // Si la validación es exitosa, inserta el vehículo en la base de datos
            $data = array(
                'placa' => $this->input->post('placa'),
                'marca' => $this->input->post('marca'),
                'tipo' => $this->input->post('tipo'),
                'fechaRegistro' => $this->input->post('fechaRegistro'),
                'estado' => $this->input->post('estado')
            );

            $this->vehiculo_model->agregar($data);
            redirect('vehiculo/listar');
        }
    }

    public function editar($idVehiculo)
    {
        $data['vehiculo'] = $this->vehiculo_model->obtenerPorId($idVehiculo);

        $this->load->view('inclte/cabecera');
        $this->load->view('inclte/menusuperior');
        $this->load->view('inclte/menulateral');
        $this->load->view('est_editartaxi', $data); // Vista para editar un vehículo
        $this->load->view('inclte/pie');
    }

    public function actualizar($idVehiculo)
    {
        // Validación de datos
        $this->load->library('form_validation');
        $this->form_validation->set_rules('placa', 'Placa', 'required');
        $this->form_validation->set_rules('marca', 'Marca', 'required');
        $this->form_validation->set_rules('tipo', 'Tipo', 'required');
        $this->form_validation->set_rules('fechaRegistro', 'Fecha de Registro', 'required');
        $this->form_validation->set_rules('estado', 'Estado', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Si la validación falla, muestra la vista de editar nuevamente con errores
            $data['vehiculo'] = $this->vehiculo_model->obtenerPorId($idVehiculo);

            $this->load->view('inclte/cabecera');
            $this->load->view('inclte/menusuperior');
            $this->load->view('inclte/menulateral');
            $this->load->view('est_editartaxi', $data); // Vista para editar un vehículo
            $this->load->view('inclte/pie');
        } else {
            // Si la validación es exitosa, actualiza el vehículo en la base de datos
            $data = array(
                'placa' => $this->input->post('placa'),
                'marca' => $this->input->post('marca'),
                'tipo' => $this->input->post('tipo'),
                'fechaRegistro' => $this->input->post('fechaRegistro'),
                'estado' => $this->input->post('estado')
            );

            $this->vehiculo_model->editar($idVehiculo, $data);
            redirect('vehiculo/listar');
        }
    }

    public function eliminar($idVehiculo)
    {
        $this->vehiculo_model->eliminar($idVehiculo);
        redirect('vehiculo/listar');
    }
}
