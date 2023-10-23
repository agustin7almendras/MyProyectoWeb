<?php
class Vehiculo_model extends CI_Model {
    public function listarVehiculos() {
        return $this->db->get('vehiculo')->result();
    }

    public function agregarVehiculo($data) {
        $this->db->insert('vehiculo', $data);
        return $this->db->insert_id();
    }

    public function obtenerVehiculoPorID($id) {
        return $this->db->get_where('vehiculo', array('idVehiculo' => $id))->row();
    }

    public function actualizarVehiculo($id, $data) {
        $this->db->where('idVehiculo', $id);
        $this->db->update('vehiculo', $data);
    }

    public function eliminarVehiculo($id) {
        $this->db->where('idVehiculo', $id);
        $this->db->delete('vehiculo');
    }
}
?>
